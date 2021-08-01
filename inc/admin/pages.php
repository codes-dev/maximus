<?php
    /**
     * Admin Custom Pages
     */

    function my_admin_menu() {

       

        add_menu_page(
        
            __( 'Currency Converter', 'maximus' ),
            
            __( 'Currency Converter', 'maximus' ),
            
            'manage_options',
            
            'converter_settings_page',
            
            'maximus_converter_settings_page_contents',
            
            'dashicons-schedule',
            
            90        
        );
        
    }
        
        
        
    add_action( 'admin_menu', 'my_admin_menu' );

    /**
    * Screen options
    */
    function screen_option() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Customers',
            'default' => 5,
            'option'  => 'customers_per_page'
        ];

        add_screen_option( $option, $args );
    }


    function maximus_converter_settings_page_contents()
    {
        # code...
        // Check that the user is allowed to update options
        if (!current_user_can('manage_options')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }
        ?>
			<div class="maximus_currencies_div">
                <h1>
                    <?php esc_html_e( 'Maximus Converter Settings.', 'maximus' ); ?>
                </h1>

                <div>
                    <form method="post" action="options.php">
                        <section>
                            <ul class="maximus_currencies_list">
                                <?php settings_fields( 'maximus_currencies_settings' ); ?>
                                
                                <?php 
                                    require_once get_template_directory(  ) . '/inc/admin/lib/rates.php';

                                    foreach ($maximus_exchange_rates as $key => $value) {
                                        # code...
                                        $sendingVal = get_option( 'maximus_ng_gh_bide') ? get_option( 'maximus_ng_gh_bide') : $value["bid_per_unit"];
                                        $receivingVal = get_option( 'maximus_ng_gh_reverse') ? get_option( 'maximus_ng_gh_reverse') : $value["reverse_per_unit"];
                                        ?>
                                            <li>
                                                <div>
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form1">
                                                            <h2>
                                                                <?php
                                                                    esc_html_e( $value['label'], 'maximus' );
                                                                ?>
                                                            </h2>
                                                        </label>
                                                        <div class="form-group">
                                                            <h4>Sending<h4>
                                                            <input name="maximus_ng_gh_bide" type="text" placeholder="Enter bid" class="form-control" value="<?php echo esc_attr( $sendingVal ); ?>"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <h4>Receiving<h4>
                                                            <input name="maximus_ng_gh_reverse" type="text" placeholder="Enter Reverse" class="form-control" value="<?php echo esc_attr( $receivingVal ); ?>"/>
                                                        </div>                                                        
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </section>
                        <?php submit_button( 'Save Currencies' ); ?>
                    </form>
                </div>
            </div>
		<?php
    }

    function maximus_update_converter_settings()
    {
        # code...
        register_setting( 'maximus_currencies_settings', 'maximus_ng_gh_bide');
        register_setting( 'maximus_currencies_settings', 'maximus_ng_gh_reverse');
    }
    
    add_action( 'admin_init', 'maximus_update_converter_settings' );

?>