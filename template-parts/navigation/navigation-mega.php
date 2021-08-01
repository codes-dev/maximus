<?php
    /**
     * Navigation Mega
     */

    ?>

        
        <nav class="c-mega-nav navbar sticky-top hide-if-mobile">

                <?php
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
        </nav>

    <?php
?>