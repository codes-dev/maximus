<?php
    /**
     * Exchange Rates
     */

     $maximus_exchange_rates = array(
        'naria_to_cedis' => array(
             'base_currency' => 'NGN',
             'quote_currency' => 'GHS',
             'base_symbol' => '₦',
             'quote_symbol' => '₵',
             'base_flag' => esc_attr( get_template_directory_uri(  ) .'\src\assets\images\flags\nigeria.png' ),
             'quote_flag' => esc_attr( get_template_directory_uri(  ) .'\src\assets\images\flags\ghana.png' ),
             'label' => __( 'Naria To Cedis', 'maximus' ),
             'bid_per_unit' => get_option( 'maximus_ng_gh_bide') ? floatval(get_option( 'maximus_ng_gh_bide')) : 87.7192982,
             'reverse_per_unit' => get_option( 'maximus_ng_gh_reverse') ? floatval(get_option( 'maximus_ng_gh_reverse')) : 80.6451613,
         ),
     );
?>