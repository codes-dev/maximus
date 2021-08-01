<?php
    /**
     * Customizer Multi-site Options
     * 
     * @package maximus
     */

    function maximus_multisite_options( $wp_customize )
    {
        # code...
        $wp_customize->add_section( 'maximus_multisite_section', array(
            'title' => __( 'Multisite Settings', 'maximus' ),
            'description' => __( 'Edit theme\'s multi-site settings' ),
            'priority' => 160,
            'capability' => 'edit_theme_options',
            'active_callback' => 'is_multisite'
        ) );

        $wp_customize->add_setting( 'maximus_show_primary_site_link', array(
            'default'  => 0,
            'transport'	=> 'postMessage',
        ) );

        $wp_customize->add_setting( 'maximus_site_theme', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'maximus_sanitize_select',
            'default' => 'general',
            'transport'	=> 'postMessage',
        ) );

        $wp_customize->add_control( 'maximus_show_primary_site_link', array(
            'type' => 'checkbox',
            'priority' => 20, // Within the section.
            'section' => 'maximus_multisite_section', // Add a default or your own section
            'label' => __( 'Show Primary Site Link', 'maximus' ),
            'description' => __( 'Show link to our network primary site in the top navigation.', 'maximus' ),
        ) );

        $wp_customize->add_control( 'maximus_site_theme', array(
            'type' => 'select',
            'priority' => 10, // Within the section.
            'section' => 'maximus_multisite_section', // Required, core or custom.
            'label' => __( 'Site Theme', 'maximus' ),
            'description' => __( 'Choose site theme.', 'maximus' ),
            'choices' => array(
                'general' => __( 'General', 'maximus' ),
                'finances' => __( 'Finances And Ecommerce', 'maximus' ),
                'entertainment' => __( 'Music and Entertainment', 'maximus' ),
                'laundry' => __( 'Laundry', 'maximus' ),
            ),
          ) );
    }

    function maximus_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );
      
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
      
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
      }
?>