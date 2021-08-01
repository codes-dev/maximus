<?php
    /**
     * Ajax Request
     */

    add_action("wp_ajax_crisp_sync", "maximus_sync_crisp");
    add_action("wp_ajax_nopriv_crisp_sync", "maximus_must_login");

    function maximus_sync_crisp() {
        global $wpdb;
        if ( !wp_verify_nonce( $_POST['nonce'], "maximus_converter_nonce")) {
            exit("No naughty business please");
        } 

        if ( $_POST['user_id'] && $_POST['data'] ) {
            # code...
            $current_user = wp_get_current_user();
            $table_name = $wpdb->prefix . 'transactions';
            $logged = $wpdb->insert(
                $table_name,
                array(
                    'reason'    => $_POST['data']['reason'],
                    'transaction_date'    => current_time( 'mysql' ),
                    'from_country'    => $_POST['data']['from'],
                    'to_country'    => $_POST['data']['to'],
                    'conversion_amount'   => $_POST['data']['convertingAmount'],
                    'amount' => $_POST['data']['amount'], 
                    'account_id'  => $_POST['user_id'],
                    'account_email'  => $current_user->user_email,
                    'account_owner'  => $current_user->user_login,
                    'account_owner_id'  => get_current_user_id(),
                    'account_country'  => get_the_author_meta('maximus_residence_country', get_current_user_id(  )),
                )
            );
            $success = false;
            if ($logged) {
                # code...
                $success = true;
            } else {
                # code...
                $success = false;
            }
            
            wp_send_json_success( array(
                'logged' => $success
            ) );
            /*$user_transactions = get_user_meta( $_POST['user_id'], 'maximus_user_transactions', true );
            if (!$user_transactions &&  $_POST['data']) {
                # code...
                $data =  array(
                    array_merge($_POST['data'], array(
                        'time' => current_time( 'mysql' ),
                        'date' => get_the_date('c'),
                    ) )
                );
                add_user_meta( $_POST['user_id'], 'maximus_user_transactions', $data);
                wp_send_json_success( $data );
            }else{
                array_push($user_transactions, array_merge($_POST['data'], array(
                    'time' => current_time( 'mysql' ),
                    'date' => get_the_date('c'),
                ) ));
                update_user_meta( $_POST['user_id'], 'maximus_user_transactions', $user_transactions );
                wp_send_json_success( $user_transactions );
            }*/ 
        } else {
            # code...
            wp_send_json_error(  );
        }

        die();
    }

    function maximus_must_login() {
        echo "You must log in to Transfer or Receive.";
        die();
    } 
?>