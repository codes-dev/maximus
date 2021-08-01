<?php
    /**
     * Financial Utility Navigation
     * 
     * @package maximus
     */

    $maximus_site_theme = maximus_get_site_theme();
?>
<div id="mySidenav" class="c-sidenav sidenav">
    <a href="javascript:void(0)" class="c-sidenav__closebtn closebtn">&times;</a>
    <div class="mx-auto text-center">
        <?php
            echo get_custom_logo(  );
            wp_nav_menu( array(
                'theme_location'    =>  'social-nav',
                'menu_class'    => esc_html( 'c-utils-navigation navbar-nav' ),
                'menu_id'    => esc_html('c-social-navigation'),
                'container' =>  'ul',
                'container_class' =>  esc_html('c-social-navigation__menu'), 
                'container_id' =>  esc_html('c-social-navigation__menu'),
                'container_aria_label'  => esc_html__('Social Navigation Menu', 'maximus')
            ) );
        ?>
    </div>
    <div class="mt-3">
        <?php
            wp_nav_menu( array(
                'theme_location'    =>  'main-nav',
                'menu_class'    => esc_html( 'navbar-nav mx-auto' ),
                'menu_id'    => esc_html('c-finances-nav'),
                'container' =>  'ul',
                'container_class' =>  esc_html('c-finances-nav'), 
                'container_id' =>  esc_html('c-finances-nav__menu'),
                'container_aria_label'  => esc_html__('Main Navigation Menu', 'maximus')
            ) );
        ?>
    </div>
</div>
<nav class="c-utils-nav-<?php echo esc_attr( $maximus_site_theme ); ?> navbar">
	<!-- Container wrapper -->
	<div class="container">
        <div class="d-flex justify-content-between align-items-center c-navbar-brand">
                <?php
                    echo get_custom_logo(  );
                ?>
                <span>
                    <h1 class="site-title m-0 p-0">
                        <?php 
                            esc_html_e( 
                                bloginfo( 'name' ), 
                                'maximus' 
                            ); 
                        ?>
                    </h1>
                    <h2 class="site-description text-center m-0 p-0">
                        <?php
                            esc_html_e( 
                                bloginfo( 'description' ), 
                                'maximus' 
                            );
                        ?>
                    </h2>
                </span>
        </div>

		<div class="hide-if-mobile">
            <?php
                $maximus_site_theme = maximus_get_site_theme();
                wp_nav_menu( array(
                    'theme_location'    =>  'top-nav',
                    'menu_class'    => esc_html( 'navbar-nav mx-auto' ),
                    'menu_id'    => esc_html('c-mega-navigation'),
                    'container' =>  'ul',
                    'container_class' =>  esc_html('c-mega-navigation__menu'), 
                    'container_id' =>  esc_html('c-mega-navigation__menu'),
                    'container_aria_label'  => esc_html__('Mega Navigation Menu', 'maximus')
                ) );
            ?>
        </div>
	</div>
	<!-- Container wrapper -->
</nav>

<!-- Navbar -->
<nav class="navbar sticky-top c-utils-finances-mobile hide-if-large">
  <!-- Container wrapper -->
  <div class="container">
    <?php
        $maximus_site_theme = maximus_get_site_theme();
        wp_nav_menu( array(
            'theme_location'    =>  'top-nav',
            'menu_class'    => esc_html( 'navbar-nav mx-auto' ),
            'menu_id'    => esc_html('c-mega-navigation'),
            'container' =>  'ul',
            'container_class' =>  esc_html('c-mega-navigation__menu'), 
            'container_id' =>  esc_html('c-mega-navigation__menu'),
            'container_aria_label'  => esc_html__('Mega Navigation Menu', 'maximus')
        ) );
    ?>
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->