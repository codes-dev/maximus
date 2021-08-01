<?php
    /**
     * Footer Customizer Options
     * 
     * @package maximus
     */

    function maximus_footer_options( $wp_customize ) {
        // code...
        $wp_customize->add_section(
            'maximus_footer_section',
            array(
                'title'       => esc_html__( 'Footer Options', 'maximus' ),
                'description' => esc_html__( 'Edit footer options and styles.', 'maximus' ),
                'priority'    => 105,
            ) 
        );
    
        ob_start();
        ?>
            © 2020 Copyright:
            <a href="<?php echo esc_url( __( site_url(), 'maximus' ) ); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'maximus' ), 'maximus' );
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'maximus' ), 'maximus', '<a href="https://www.codesport.com">codes</a>' );
            ?>
        <?php
        $default = ob_get_clean();
    
        $wp_customize->add_setting(
            'maximus_footer_credit',
            array(
                'default'          => $default,
                'santize_callback' => 'maximus_sanitize_html_text',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_footer_columns',
            array(
                'default'          => 4,
                'santize_callback' => 'maximus_sanitize_html_text',
                'transport'        => 'postMessage',
            )
        );
    
    
        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial(
                'maximus_footer_credit',
                array(
                    'selector'        => '.c-site-credit',
                    'render_callback' => 'maximus_customize_partial_footer_credit',
                )
            );
    
            $wp_customize->selective_refresh->add_partial(
                'maximus_footer_columns',
                array(
                    'selector'        => '.c-footer-widgets-area',
                    'render_callback' => 'maximus_customize_partial_footer_columns',
                )
            );
        };
    
        $wp_customize->add_control(
            'maximus_footer_credit',
            array(
                'type'    => 'textarea',
                'label'   => esc_html__( 'Site Credit', 'maximus' ),
                'section' => 'maximus_footer_section',
            )
        );
    
        $wp_customize->add_control(
            'maximus_footer_columns',
            array(
                'type'        => 'number',
                'label'       => esc_html__( 'Footer Columns', 'maximus' ),
                'section'     => 'maximus_footer_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 4,
                ),
            )
        );
    
    }
    
    function maximus_customize_partial_footer_columns() {
        return get_template_part( 'template-parts/footer/footer', 'widgets' );
    }

    function maximus_customize_partial_footer_credit() {
        return get_theme_mod( 'maximus_footer_credit' );
    }
    
?>