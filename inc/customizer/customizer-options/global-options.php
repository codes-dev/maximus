<?php
    /**
     * Global Customizer Options
     * 
     * @package maximus
     */

    function maximus_globals_options($wp_customize)
    {
        # code...
        $wp_customize->add_section(
            'maximus_globals_section',
            array(
                'title'       => esc_html__( 'Global Toolbar Options', 'maximus' ),
                'description' => esc_html__( 'Edit global toolbar options.', 'maximus' ),
                'priority'    => 115,
            ) 
        );
    
        $wp_customize->add_setting( 'maximus_allow_global_toolbar', array(
            'default'  => 0,
            'type'	=> 'option',
            'transport'	=> 'postMessage',
        ) );
    
        if ( isset( $wp_customize->selective_refresh ) ) {
            $wp_customize->selective_refresh->add_partial(
                'maximus_allow_global_toolbar',
                array(
                    'selector'        => '.c-globals',
                    'render_callback' => 'maximus_customize_partial_global_toolbar',
                )
            );
    
            $wp_customize->selective_refresh->add_partial(
                'maximus_show_scroll_to_top',
                array(
                    'selector'        => '.c-scroll-to-top',
                    'render_callback' => 'maximus_customize_partial_scroll_to_top',
                )
            );
        };
    
        $wp_customize->add_control( 'maximus_allow_global_toolbar', array(
            'type' => 'checkbox',
            'section' => 'maximus_globals_section', // Add a default or your own section
            'label' => __( 'Allow global toolbar', 'maximus' ),
            'description' => __( 'Allow fixed global toolbar to be shown', 'maximus' ),
        ) );
    
        $wp_customize->add_setting( 'maximus_show_scroll_to_top', array(
            'default'  => 0,
            'type'	=> 'option',
            'transport'	=> 'postMessage',
        ) );
    
        $wp_customize->add_control( 'maximus_show_scroll_to_top', array(
            'type' => 'checkbox',
            'section' => 'maximus_globals_section', // Add a default or your own section
            'label' => __( 'Show scroll to top button.', 'maximus' ),
            'description' => __( 'Show scroll to top button in global toolbar.', 'maximus' ),
        ) );
    }

    function maximus_customize_partial_global_toolbar() {
        return get_template_part( 'template-parts/globals/global', 'toolbar' );
    }
    
    function maximus_customize_partial_scroll_to_top() {
        return get_template_part( 'template-parts/globals/global', 'toolbar' );
    }
?>