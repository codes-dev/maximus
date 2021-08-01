<?php
    /**
     * Navigation Top
     * 
     * @package maximus
     */

    $maximus_site_theme = maximus_get_site_theme();
    ?>
        <nav class="c-top-nav-<?php echo esc_attr( $maximus_site_theme ); ?> navbar hide-if-mobile">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    =>  'domain-nav',
                            'menu_class'    => esc_html( 'c-domain-navigation navbar-nav' ),
                            'menu_id'    => esc_html('c-domain-navigation'),
                            'container' =>  'ul',
                            'container_class' =>  esc_html('c-domain-navigation__menu'), 
                            'container_id' =>  esc_html('c-domain-navigation__menu'),
                            'container_aria_label'  => esc_html__('Domain Navigation Menu', 'maximus')
                        ) );
                    ?>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    =>  'utils-nav',
                            'menu_class'    => esc_html( 'c-utility-navigation navbar-nav' ),
                            'menu_id'    => esc_html('c-utility-navigation'),
                            'container' =>  'ul',
                            'container_class' =>  esc_html('c-utility-navigation__menu'), 
                            'container_id' =>  esc_html('c-utility-navigation__menu'),
                            'container_aria_label'  => esc_html__('Utility Navigation Menu', 'maximus')
                        ) );
                    ?>
                </div>
            </div>
        </nav>

        <div id="utilitySidenav" class="c-sidenav-<?php echo $maximus_site_theme; ?> c-sidenav-utils hide-if-large">
            <a href="javascript:void(0)" class="c-sidenav-utils__closebtn closebtn">&times;</a>
            <div class="mt-3">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    =>  'domain-nav',
                        'menu_class'    => esc_html( 'c-domain-navigation navbar-nav' ),
                        'menu_id'    => esc_html('c-domain-navigation'),
                        'container' =>  'ul',
                        'container_class' =>  esc_html('c-domain-navigation__menu'), 
                        'container_id' =>  esc_html('c-domain-navigation__menu'),
                        'container_aria_label'  => esc_html__('Domain Navigation Menu', 'maximus')
                    ) );
                ?>
            </div>
            <div class="mt-3">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    =>  'utils-nav',
                        'menu_class'    => esc_html( 'c-utility-navigation navbar-nav' ),
                        'menu_id'    => esc_html('c-utility-navigation'),
                        'container' =>  'ul',
                        'container_class' =>  esc_html('c-utility-navigation__menu'), 
                        'container_id' =>  esc_html('c-utility-navigation__menu'),
                        'container_aria_label'  => esc_html__('Utility Navigation Menu', 'maximus')
                    ) );
                ?>
            </div>
        </div>
        
        <nav class="c-top-nav-<?php echo esc_attr( $maximus_site_theme ); ?>-mobile p-0 navbar hide-if-large">
        <!-- Container wrapper -->
        <div class="container justify-content-center">
            <button class="btn btn-link c-sidenav-utils__openbtn">
                <?php esc_html_e( 'Utilities', 'maximus' ); ?>&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i>
            </button>
        </div>
        <!-- Container wrapper -->
        </nav>
    <?php
?>