<?php

/**
 * This example shows how to add a new tab into the Profile page of the Ultimate Member. 
 * See the article https://docs.ultimatemember.com/article/69-how-do-i-add-my-extra-tabs-to-user-profiles
 *
 * This example adds the tab 'mycustomtab' that contains the field 'description'. You can add your own tabs and fields.
 * Important! Each profile tab has an unique key. Replace 'mycustomtab' to your unique key.
 *
 * You can add this code to the end of the file functions.php in the active theme (child theme) directory.
 * 
 * Ultimate Member documentation: https://docs.ultimatemember.com/
 * Ultimate Member support (for customers): https://ultimatemember.com/support/ticket/
 */
 
/**
 * Add a new Profile tab
 *
 * @param array $tabs
 * @return array
 */
function um_mycustomtab_add_tab( $tabs ) {

	$tabs[ 'mycustomtab' ] = array(
		'name'   => 'History',
		'icon'   => 'um-faicon-pencil',
		'custom' => true
	);

	UM()->options()->options[ 'profile_tab_' . 'mycustomtab' ] = true;

	return $tabs;
}
add_filter( 'um_profile_tabs', 'um_mycustomtab_add_tab', 2000 );

/**
 * Render tab content
 *
 * @param array $args
 */
function um_profile_content_mycustomtab_default( $args ) {
    global $wpdb;
    $user_id = get_current_user_id(  );
    $sending = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}transactions WHERE reason='sending' AND account_owner_id={$user_id}", OBJECT );
    $receiving = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}transactions WHERE reason='receiving' AND account_owner_id={$user_id}", OBJECT );
	/* START. You can paste your content here, it's just an example. */
	?>

            <div class="w-100 c-transactions">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a
                        class="nav-link active"
                        id="ex2-tab-1"
                        data-mdb-toggle="tab"
                        href="#ex2-tabs-1"
                        role="tab"
                        aria-controls="ex2-tabs-1"
                        aria-selected="true"
                        >Sending</a
                        >
                    </li>
                    <li class="nav-item" role="presentation">
                        <a
                        class="nav-link"
                        id="ex2-tab-2"
                        data-mdb-toggle="tab"
                        href="#ex2-tabs-2"
                        role="tab"
                        aria-controls="ex2-tabs-2"
                        aria-selected="false"
                        >Receiving</a
                        >
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex2-content">
                    <div
                        class="tab-pane fade show active"
                        id="ex2-tabs-1"
                        role="tabpanel"
                        aria-labelledby="ex2-tab-1"
                    >
                        <?php

                            if ($sending) {
                                # code...
                                ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">To</th>
                                            <th scope="col">From</th>
                                            <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ( $sending as $key => $value) {
                                                    # code...
                                                    ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?php esc_html_e( $value->to_country, 'maximus' ); ?>
                                                            </th>
                                                            <td><b><?php esc_html_e( $value->from_country, 'maximus' ); ?></b></td>
                                                            <td><b><?php esc_html_e( $value->amount, 'maximus' ); ?></b></td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>                                            
                                        </tbody>
                                    </table>
                                <?php
                            } else {
                                # code...
                                ?>
                                    <p class="text-center lead">
                                        <?php esc_html_e( 'No Transactions', 'maximus' ); ?>
                                    </p>
                                <?php
                            }
                        ?>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="ex2-tabs-2"
                        role="tabpanel"
                        aria-labelledby="ex2-tab-2"
                    >
                        <?php
                            
                            if ($receiving) {
                                # code...
                                ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                            <th scope="col">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ( $receiving as $key => $value) {
                                                    # code...
                                                    ?>                                    
                                                        <tr>
                                                            <th scope="row">
                                                                <?php esc_html_e( $value->from_country, 'maximus' ); ?>
                                                            </th>
                                                            <td><b><?php esc_html_e( $value->to_country, 'maximus' ); ?></b></td>
                                                            <td><b><?php esc_html_e( $value->amount, 'maximus' ); ?></b></td>
                                                        </tr>
                                                    <?php
                                                }
                                            ?>                                            
                                        </tbody>
                                    </table>
                                <?php
                            }else {
                                # code...
                                ?>
                                    <p class="text-center lead">
                                        <?php esc_html_e( 'No Transactions', 'maximus' ); ?>
                                    </p>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- Tabs content -->	
            </div>

            <?php
    
	/* END. You can paste your content here, it's just an example. */
}
add_action( 'um_profile_content_mycustomtab_default', 'um_profile_content_mycustomtab_default' );

/**
 * Add a new Profile tab
 *
 * @param array $tabs
 * @return array
 */
function um_myinfotab_add_tab( $tabs ) {

	$tabs[ 'myinfotab' ] = array(
		'name'   => 'Info',
		'icon'   => 'um-faicon-pencil',
		'custom' => true
	);

	UM()->options()->options[ 'profile_tab_' . 'myinfotab' ] = true;

	return $tabs;
}
add_filter( 'um_profile_tabs', 'um_myinfotab_add_tab', 1000 );

/**
 * Render tab content
 *
 * @param array $args
 */
function um_profile_content_myinfotab_default( $args ) {
    $current_user = wp_get_current_user();
    
    ?>
        <ul class="list-group list-group-flush m-0">
            <li class="list-group-item"><?php printf( __( '<b>Username:</b> %s', 'textdomain' ), esc_html( $current_user->user_login ) ); ?></li>
            <li class="list-group-item"><?php printf( __( '<b>Email:</b> %s', 'textdomain' ), esc_html( $current_user->user_email ) ); ?></li>
            <?php
                if ($current_user->user_firstname) {
                    # code...
                    ?>
                        <li class="list-group-item"><?php printf( __( '<b>First Name:</b> %s', 'textdomain' ), esc_html( $current_user->user_firstname ) ); ?></li>
                    <?php
                }
            ?>
            <?php
                if ($current_user->user_lastname) {
                    # code...
                    ?>
                        <li class="list-group-item"><?php printf( __( '<b>Last Name:</b> %s', 'textdomain' ), esc_html( $current_user->user_lastname ) ); ?></li>
                    <?php
                }
            ?>
            <?php
                if (get_the_author_meta('maximus_residence_country', get_current_user_id(  ))) {
                    # code...
                    ?>
                        <li class="list-group-item"><?php printf( __( '<b>Residence Country:</b> %s', 'textdomain' ), esc_html( get_the_author_meta('maximus_residence_country', get_current_user_id(  )) ) ); ?></li>
                    <?php
                }
            ?>
        </ul>
    <?php
}
add_action( 'um_profile_content_myinfotab_default', 'um_profile_content_myinfotab_default' );