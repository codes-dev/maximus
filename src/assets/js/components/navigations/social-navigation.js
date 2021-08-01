import svg_supported from "../../helpers/svg-supported";

( function( $ ) {
	let socialNavigationLinks = $('.c-utils-navigation .nav-link');
	$.each(socialNavigationLinks, (key, value) => {
		if (svg_supported) {
			social_nav_load_svgs(value);
		} else {
			social_nav_load_pngs(value);
		}
	});

	function social_nav_load_svgs(element) {
		if ($(element).attr('href').indexOf('facebook.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-facebook fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('twitter.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-twitter fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('github.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-github fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('instagram.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-instagram fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('youtube.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-youtube fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('linkedin.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-linkedin fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('soundcloud.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-soundcloud fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('spotify.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-spotify fa-lg"></i>');
		}else if ($(element).attr('href').indexOf('music.apple.com') > 0) {
			$(element).prop('innerHTML', '<i class="fab fa-apple fa-lg"></i>');
		}
	}

	function social_nav_load_pngs(element){
		if ($(element).attr('href').indexOf('facebook.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/facebook.png' +'"/>');   
		}else if ($(element).attr('href').indexOf('twitter.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/twitter.png' +'"/>');   
		}else if ($(element).attr('href').indexOf('github.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/github.png' +'"/>');
		}else if ($(element).attr('href').indexOf('instagram.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/instagram.png' +'"/>');
		}else if ($(element).attr('href').indexOf('youtube.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/youtube.png' +'"/>');
		}else if ($(element).attr('href').indexOf('linkedin.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/linkedin2.png' +'"/>');
		}else if ($(element).attr('href').indexOf('soundcloud.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/soundcloud.png' +'"/>');
		}else if ($(element).attr('href').indexOf('spotify.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/spotify.png' +'"/>');
		}else if ($(element).attr('href').indexOf('music.apple.com') > 0) {
			$(element).prop('innerHTML', '<img src="'+ js_vars['temp_dir'] + '/dist/assets/images/icomoon/PNG/appleinc.png' +'"/>');
		}
	}
}( jQuery ) );
