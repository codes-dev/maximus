<?php
    /**
     * Color Customizer Options
     * 
     * @package maximus
     */

    function maximus_colors_options( $wp_customize ) {
        require_once get_template_directory() . '/inc/customizer/customizer-variables.php';
        
        // code...
        $wp_customize->add_setting(
            'maximus_text_color',
            array(
                'default'          => '#000000',
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
        $wp_customize->add_setting(
            'maximus_top_navigation_background',
            array(
                'default'          => $maximus_default_colors['primary']['normal'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_brand',
            array(
                'default'          => $maximus_default_colors['navbar_brand']['normal'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_brand_hover',
            array(
                'default'          => '#000000',
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_links',
            array(
                'default'          => $maximus_default_colors['navbar_links']['normal'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_links_hover',
            array(
                'default'          => $maximus_default_colors['navbar_links']['hover'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_links_focus',
            array(
                'default'          => $maximus_default_colors['navbar_links']['focus'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_dropdown_links',
            array(
                'default'          => $maximus_default_colors['dropdowns']['links'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_dropdown_links_hover',
            array(
                'default'          => $maximus_default_colors['dropdowns']['links_hover'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_top_navigation_dropdown_background',
            array(
                'default'          => $maximus_default_colors['dropdowns']['background'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        ); 
    
        $wp_customize->add_setting(
            'maximus_body_links',
            array(
                'default'          => $maximus_default_colors['body_links']['normal'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_body_links_hover',
            array(
                'default'          => $maximus_default_colors['body_links']['hover'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_body_links_focus',
            array(
                'default'          => $maximus_default_colors['body_links']['focus'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_footer_widgets_background',
            array(
                'default'          => $maximus_default_colors['footer']['widgets_area']['background'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_setting(
            'maximus_footer_credits_background',
            array(
                'default'          => $maximus_default_colors['footer']['credits_area']['background'],
                'santize_callback' => 'sanitize_hex_color',
                'transport'        => 'postMessage',
            )
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_text_color',
                array(
                    'label'   => __( 'Text Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_background',
                array(
                    'label'   => __( 'Top Navigation Background Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_brand',
                array(
                    'label'   => __( 'Top Navigation Brand Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_brand_hover',
                array(
                    'label'   => __( 'Top Navigation Brand Hover Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_links',
                array(
                    'label'   => __( 'Top Navigation Links Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_links_hover',
                array(
                    'label'   => __( 'Top Navigation Links Hover Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_links_focus',
                array(
                    'label'   => __( 'Top Navigation Links Focus Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_dropdown_links',
                array(
                    'label'   => __( 'Top Navigation Dropdown Links Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_dropdown_links_hover',
                array(
                    'label'   => __( 'Top Navigation Dropdown Links Hover Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_top_navigation_dropdown_background',
                array(
                    'label'   => __( 'Top Navigation Dropdown Background Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_body_links',
                array(
                    'label'   => __( 'Body Links Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_body_links_hover',
                array(
                    'label'   => __( 'Body Links Hover And Focus Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_body_links_focus',
                array(
                    'label'   => __( 'Body Links Visited Color', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_footer_widgets_background',
                array(
                    'label'   => __( 'Footer Widgets Background', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    
        $wp_customize->add_control(
            new WP_Customize_Color_Control(
                $wp_customize,
                'maximus_footer_credits_background',
                array(
                    'label'   => __( 'Footer Credits Background', 'maximus' ),
                    'section' => 'colors',
                ) 
            ) 
        );
    }
?>