<?php
    /**
     * Currency Conveter
     */

    // [maximus_currency_converter foo="foo-value"]
    function maximus_currency_converter( $atts ) {
        $a = shortcode_atts( array(
            'foo' => 'something',
            'bar' => 'something else',
        ), $atts );

        ob_start();

        ?>
            <div class="row maximus_currency_converter_row">
                <div class="col 12 col-lg-4">
                        <div class="maximus_currency_converter card mx-auto">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills mb-3 mx-auto" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a
                                class="nav-link active"
                                id="ex1-tab-1"
                                data-target="sending"
                                data-mdb-toggle="pill"
                                href="#ex1-pills-1"
                                role="tab"
                                aria-controls="ex1-pills-1"
                                aria-selected="true"
                                >I'M Sending</a
                                >
                            </li>
                            <li class="nav-item" role="presentation">
                                <a
                                class="nav-link"
                                id="ex1-tab-2"
                                data-target="receiving"
                                data-mdb-toggle="pill"
                                href="#ex1-pills-2"
                                role="tab"
                                aria-controls="ex1-pills-2"
                                aria-selected="false"
                                >I'M Receiving</a
                                >
                            </li>
                        </ul>
                        <!-- Pills navs -->

                        <?php require_once get_template_directory(  ) . '/inc/admin/lib/rates.php'; ?>

                        <form class="maximus_converter mx-auto" action="">
                            <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">
                            <div
                                class="maximus_currencies_sending tab-pane fade show active"
                                id="ex1-pills-1"
                                role="tabpanel"
                                aria-labelledby="ex1-tab-1"
                            >
                                <div class="text-center">
                                    <div class="text-center">
                                        <h2 class="maximus_converter_rates_header text-underline">Rates</h2>
                                        <h4 class="maximus_converter_rates">
                                        </h4>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="maximus_currency">
                                            <?php
                                                esc_html_e( 'Sender\'s Country', 'maximus' );
                                            ?>
                                        </label>
                                        <Select class="maximus_init_select form-control mb-3" name="maximus_currency">
                                            <option disabled selected>Sender's Country</option>
                                            <option value="nigeria">
                                                <?php esc_html_e( 'Nigeria', 'maximus' ); ?>
                                            </option>
                                            <option value="ghana">
                                                <?php esc_html_e( 'Ghana', 'maximus' ); ?>
                                            </option>
                                        </Select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="form-label" for="maximus_currency">
                                            <?php
                                                esc_html_e( 'Recipient\'s Country', 'maximus' );
                                            ?>
                                        </label>
                                        <Select class="maximus_pre_select form-control mb-3" name="maximus_currency" disabled>
                                            <option disabled selected>Recipient's Country</option>
                                            <option value="nigeria">
                                                <?php esc_html_e( 'Nigeria', 'maximus' ); ?>
                                            </option>
                                            <option value="ghana">
                                                <?php esc_html_e( 'Ghana', 'maximus' ); ?>
                                            </option>
                                        </Select>
                                    </div>
                                    <div class="maximus_input_con ng form-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Cedis', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\ghana.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['quote_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_pre_input form-control" style="border: none; display: inline; width: 75%;"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Naria', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\nigeria.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['base_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_post_input form-control" style="border: none; display: inline; width: 75%;" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="maximus_input_con gh form-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Naria', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\nigeria.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['base_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_pre_input form-control" style="border: none; display: inline; width: 75%;"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Cedis', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img  style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\ghana.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['quote_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_post_input form-control" style="border: none; display: inline; width: 75%;" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="maximus_currencies_convert btn" disabled>
                                        <?php
                                            esc_html_e( 'Convert','maximus' );
                                        ?>
                                    </button>
                                </div>
                            </div>
                            <div class="maximus_currencies_receiving tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                            <div class="text-center">
                                    <div class="text-center">
                                        <h2 class="maximus_converter_rates_header text-underline">Rates</h2>
                                        <h4 class="maximus_converter_rates"></h4>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="maximus_currency">
                                            <?php
                                                esc_html_e( 'Recipient\'s Country', 'maximus' );
                                            ?>
                                        </label>
                                        <Select class="maximus_init_select form-control mb-3" name="maximus_currency">
                                            <option disabled selected>Recipient's Country</option>
                                            <option value="nigeria">
                                                <?php esc_html_e( 'Nigeria', 'maximus' ); ?>
                                            </option>
                                            <option value="ghana">
                                                <?php esc_html_e( 'Ghana', 'maximus' ); ?>
                                            </option>
                                        </Select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="maximus_currency">
                                            <?php
                                                esc_html_e( 'Sender\'s Country', 'maximus' );
                                            ?>
                                        </label>
                                        <Select class="maximus_pre_select form-control mb-3" name="maximus_currency" disabled>
                                            <option disabled selected>Sender's Country</option>
                                            <option value="nigeria">
                                                <?php esc_html_e( 'Nigeria', 'maximus' ); ?>
                                            </option>
                                            <option value="ghana">
                                                <?php esc_html_e( 'Ghana', 'maximus' ); ?>
                                            </option>
                                        </Select>
                                    </div>
                                    <div class="maximus_input_con ng form-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Naria', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\nigeria.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['base_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_pre_input form-control" style="border: none; display: inline; width: 75%;"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Cedis', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\ghana.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['quote_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_post_input form-control" style="border: none; display: inline; width: 75%;" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="maximus_input_con gh form-group" style="display: none;">
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Cedis', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img  style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\ghana.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['quote_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_pre_input form-control" style="border: none; display: inline; width: 75%;"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="maximus_currency">
                                                <?php
                                                    esc_html_e( 'Amount in Naria', 'maximus' );
                                                ?>
                                            </label>
                                            <div class="mb-3" style="border: 1px solid #DDD;">
                                                <img style="width: 25px;" src="<?php echo esc_attr( get_template_directory_uri(  ) .'\dist\assets\images\flags\nigeria.png' ); ?>"/>
                                                <span>
                                                    <?php
                                                        esc_html_e( $maximus_exchange_rates['naria_to_cedis']['base_symbol'], 'maximus' );
                                                    ?>
                                                </span>
                                                <input class="maximus_post_input form-control" style="border: none; display: inline; width: 75%;" disabled/>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="maximus_currencies_convert btn" disabled>
                                        <?php
                                            esc_html_e( 'Convert','maximus' );
                                        ?>
                                    </button>
                                </div>
                            </div>
                            <div class="maximus_currencies_proceed_con text-center my-2" style="display: none;">
                                <button type="button" class="maximus_currencies_proceed btn btn-success">
                                            <?php
                                                esc_html_e( 'proceed','maximus' );
                                            ?>
                                </button>
                            </div>
                        </div>
                        <!-- Pills content -->
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="maximus_currencies_form" style="display: none;">
                        <form>
                          <!-- Email input -->
                          <div class="form-group mb-4">
                            <label class="form-label" for="form1Example1">Amount</label>
                            <span class="maximus_currencies_form_amount_symbol"></span>
                            <input type="number" class="maximus_currencies_form_amount form-control" />
                          </div>

                          <?php                          
                                $nonce = wp_create_nonce("maximus_converter_nonce");
                            ?>
                        
                          <!-- Submit button -->
                          <button type="button" data-nonce="<?php echo esc_attr( $nonce ); ?>" data-user="<?php echo esc_attr( get_current_user_id(  ) ); ?>" class="maximus_converter_finalize btn btn-primary btn-block">Finalize</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php

        return ob_get_clean();
    }
    add_shortcode( 'maximus_currency_converter', 'maximus_currency_converter' );
?>