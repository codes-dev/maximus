/* eslint-disable linebreak-style */
/* eslint-disable no-undef */
/* eslint-disable no-unused-vars */
/* eslint-disable linebreak-style */
import gulp from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCSS from 'gulp-clean-css';
import gulpIf from 'gulp-if';
import sourcemaps from 'gulp-sourcemaps';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import uglify from 'gulp-uglify';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
//import reload from "browser-sync/dist/public/reload";
import zip from 'gulp-zip';
import replace from 'gulp-replace';
import info from './package.json';
import rename from 'gulp-rename';

const renameRegex = require( 'gulp-regex-rename' );

const PRODUCTION = yargs.argv.prod;

const server = browserSync.create();

const paths = {
	styles: {
		src: [ 
			'src/assets/sass/style.scss', 
			'src/assets/sass/admin.scss', 
			'src/assets/sass/editor.scss', 
			'src/assets/sass/woocommerce.scss',
		],
		dest: 'dist/assets/css',
	},
	images: {
		src: 'src/assets/images/**/*.{jpg,jpeg,png,svg,gif}',
		dest: 'dist/assets/images',
	},
	scripts: {
		src: [ 
			'src/assets/js/bundle.js', 
			'src/assets/js/admin.js', 
			'src/assets/js/customizer.js', 
			'src/assets/js/navigation.js',
		],
		dest: 'dist/assets/js',
	},
	plugins: {
		src: [
			'../../plugins/maximus_support/packaged/*',
		],
		dest: 'lib/plugins/',
	},
	others: {
		src: [
			'src/assets/**/*', '!src/assets/{sass,js,images}', '!src/assets/{sass,js,images}/**/*' ],
		dest: 'dist/assets/',
	},
	loaders: {
		src: '',
	},
	package: {
		src: [
			'**/*',
			'!.vscode',
			'!node_modules{,/**}',
			'!packaged{,/**}',
			'!src{,/**}',
			'!.babelrc',
			'!.gitignore',
			'!gulpfile.babel.js',
			'!package-lock.json',
			'!package.json',
		],
		dest: 'packaged',
	},
};

export const clean = ( cb ) => {
	return del( [ 'dist' ] );
};

export const styles = ( cb ) => {
	return gulp.src( paths.styles.src )
		.pipe( gulpIf( ! PRODUCTION, sourcemaps.init() ) )
		.pipe( sass().on( 'error', sass.logError ) )
		.pipe( gulpIf( PRODUCTION, cleanCSS( { compatibility: 'ie8' } ) ) )
		.pipe( gulpIf( ! PRODUCTION, sourcemaps.write() ) )
		.pipe( gulp.dest( paths.styles.dest ) )
		.pipe( server.stream() );
};

export const images = ( cb ) => {
	return gulp.src( paths.images.src )
		.pipe( gulpIf( PRODUCTION, imagemin() ) )
		.pipe( gulp.dest( paths.images.dest ) );
};

export const scripts = ( cb ) => {
	return gulp.src( paths.scripts.src )
		.pipe( named() )
		.pipe( webpack( {
			module: {
				rules: [
					{ test: /\.js$/, loader: 'babel-loader', options: { presets: [ '@babel/preset-env' ] } },
				],
			},
			mode: ! PRODUCTION ? 'development' : 'production',
			output: {
				filename: '[name].js',
			},
			externals: {
				jquery: 'jQuery',
			},
			devtool: ! PRODUCTION ? 'inline-source-map' : false,
		} ) )
		.pipe( gulpIf( PRODUCTION, uglify() ) )
		.pipe( gulp.dest( paths.scripts.dest ) );
};

export const copy = ( cb ) => {
	return gulp.src( paths.others.src )
		.pipe( gulp.dest( paths.others.dest ) );
};

export const copyPlugins = ( cb ) => {
	return gulp.src( paths.plugins.src )
		.pipe( gulp.dest( paths.plugins.dest ) );
};

export const refresh = ( cb ) => {
	server.reload();
	cb();
};

export const watch = ( cb ) => {
	gulp.watch( 'src/assets/sass/**/*.scss', styles );
	gulp.watch( 'src/assets/js/**/*.js', gulp.series( scripts, refresh ) );
	gulp.watch( '**/*.php', refresh );
	gulp.watch( paths.images.src, gulp.series( images, refresh ) );
	gulp.watch( paths.others.src, gulp.series( copy, refresh ) );
};

export const serve = ( cb ) => {
	server.init( {
		proxy: 'http://localhost/wpg',
	} );
	cb();
};

export const dev = gulp.series( clean, gulp.parallel( styles, scripts, images, copy ), serve, watch );

export const compress = ( cb ) => {
	return gulp.src( paths.package.src )
		.pipe( replace( '_themename', info.name ) )
		.pipe( renameRegex( /_themename/, info.name ) )
		.pipe(
			rename(
				function( path ) {
					path.dirname = `${ info.name }/` + path.dirname;
				}
			)
		)
		.pipe( zip( `${ info.name }.zip` ) )
		.pipe( gulp.dest( paths.package.dest ) );
};

export const build = gulp.series( clean, gulp.parallel( styles, scripts, images, copy ) );

//export const bundle = gulp.series(build, compress, copyPlugins);
export const bundle = gulp.series( build, compress );

export default dev;
