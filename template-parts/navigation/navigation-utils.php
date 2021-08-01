<?php
    /**
     * Navigation Utild
     */

    ?>

        
        <nav class="c-utils-nav navbar  hide-if-mobile">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="d-flex justify-content-between align-items-center">
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
                                <p class="site-description text-center m-0 p-0">
                                    <?php
                                        esc_html_e( 
                                            bloginfo( 'description' ), 
                                            'maximus' 
                                        );
                                    ?>
                                </p>
                            </span>
                    </div>
                    <div>
                        <?php
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
                </div>
            </div>
        </nav>

    <?php
?>