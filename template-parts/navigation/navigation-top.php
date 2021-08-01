<?php
    /**
     * Navigation Top
     */

    ?>

        
        <nav class="c-top-nav navbar hide-if-mobile">
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

    <?php
?>