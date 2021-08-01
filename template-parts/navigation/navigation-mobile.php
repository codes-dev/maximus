<?php
    /**
     * Navigation Mobile
     */

    ?>
        <div id="mySidenav" class="c-sidenav sidenav hide-if-large">
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
                        'theme_location'    =>  'top-nav',
                        'menu_class'    => esc_html( 'navbar-nav mx-auto' ),
                        'menu_id'    => esc_html('c-mobile-nav'),
                        'container' =>  'ul',
                        'container_class' =>  esc_html('c-mobile-nav'), 
                        'container_id' =>  esc_html('c-mobile-nav__menu'),
                        'container_aria_label'  => esc_html__('Mega Navigation Menu', 'maximus')
                    ) );
                ?>
            </div>
        </div>

        <!-- Image and text -->
        <nav class="c-mobile-nav navbar hide-if-large">
            <div class="container-fluid">
                <div class="navbar-brand mx-auto">
                    <?php
                        echo get_custom_logo(  );
                    ?>
                    <span>
                        <h1 class="site-title m-0 p-0 h3">
                            <?php 
                                esc_html_e( 
                                    bloginfo( 'name' ), 
                                    'maximus' 
                                ); 
                            ?>
                        </h1>
                        <p class="site-description text-center m-0 p-0 h6">
                            <?php
                                esc_html_e( 
                                    bloginfo( 'description' ), 
                                    'maximus' 
                                );
                            ?>
                        </p>
                    </span>
                </div>
                <button class="btn c-sidenav__openbtn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
    <?php
?>
