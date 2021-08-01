/* global jQuery */
/**
 * Ajax Api Callbacks
 *
 */

( function( $ ) {

    $crisp.push(["set", "user:email", js_vars['user_email']]);

    let sendingTab = $('.maximus_currencies_sending');
    let receivingTab = $('.maximus_currencies_receiving');
    let converted = false;

    let sendingCountry = '';

    sendingTab.find('.maximus_init_select').on("change", (e) => {
        sendingInitCountry = sendingTab.find('.maximus_init_select').val();

        if (sendingInitCountry.length) {
            if (sendingInitCountry === 'ghana') {
                sendingTab.find('.maximus_pre_select').find('option[selected]').attr('selected', false);
                sendingTab.find('.maximus_pre_select').find('option[value*=nigeria]').attr('selected', true);
            }else if (sendingInitCountry === 'nigeria') {
                sendingTab.find('.maximus_pre_select').find('option[selected]').attr('selected', false);
                sendingTab.find('.maximus_pre_select').find('option[value*=ghana]').attr('selected', true);
            }
            sendingTab.find('.maximus_pre_select').trigger('change');
        }
    });

    sendingTab.find('.maximus_pre_select').on("change", (e) => {
        sendingTab.find('.maximus_currencies_convert').attr('disabled', true);
        sendingCountry = sendingTab.find('.maximus_pre_select').val();

        if (sendingCountry.length) {
            if (sendingCountry === 'ghana') {
                sendingTab.find('.maximus_input_con.gh').css('display', 'block');
                sendingTab.find('.maximus_input_con.ng').find("input").val('');
                sendingTab.find('.maximus_input_con.ng').css('display', 'none');
                sendingTab.find('.maximus_converter_rates_header').css('display', 'block');  
                sendingTab.find('.maximus_converter_rates').prop('innerHTML', 'GHS ' + js_vars['rates']['naria_to_cedis']['quote_symbol'] + '1 = NGN ' + js_vars['rates']['naria_to_cedis']['base_symbol'] + js_vars['rates']['naria_to_cedis']['bid_per_unit'].toFixed(3) ); 
            }else if (sendingCountry === 'nigeria') {
                sendingTab.find('.maximus_input_con.ng').css('display', 'block');
                sendingTab.find('.maximus_input_con.gh').find("input").val('');
                sendingTab.find('.maximus_input_con.gh').css('display', 'none');
                sendingTab.find('.maximus_converter_rates_header').css('display', 'block');
                sendingTab.find('.maximus_converter_rates').prop('innerHTML', 'NGN ' + js_vars['rates']['naria_to_cedis']['base_symbol'] + '1 = GHS ' + js_vars['rates']['naria_to_cedis']['quote_symbol'] + ( 1/ js_vars['rates']['naria_to_cedis']['bid_per_unit']).toFixed(3) );
            }
        }else{
            sendingTab.find('.maximus_converter_rates_header').css('display', 'none');
            sendingTab.find('.maximus_input_con').css('display', 'none');
        }

        sendingTab.find('.gh .maximus_pre_input').on("input", (e) => {
            if (sendingTab.find('.gh .maximus_pre_input').val().length && !isNaN(sendingTab.find('.gh .maximus_pre_input').val()) ) {
                sendingAmount = sendingTab.find('.gh .maximus_pre_input').val();
                sendingTab.find('.maximus_currencies_convert').attr('disabled', false);
            } else {
                sendingTab.find('.maximus_currencies_convert').attr('disabled', true);
            }
        });

        sendingTab.find('.ng .maximus_pre_input').on("input", (e) => {
            if (sendingTab.find('.ng .maximus_pre_input').val().length && !isNaN(sendingTab.find('.ng .maximus_pre_input').val()) ) {
                sendingAmount = sendingTab.find('.ng .maximus_pre_input').val();
                sendingTab.find('.maximus_currencies_convert').attr('disabled', false);
            } else {
                sendingTab.find('.maximus_currencies_convert').attr('disabled', true);
            }
        });
    });

    let sendingAmount = 0;

    switch (sendingCountry) {
        case 'ghana':
            sendingTab.find('.maximus_input_con.gh .maximus_pre_input').on("input", (e) => {
                if (sendingTab.find('.maximus_input_con.gh .maximus_pre_input').val().length) {
                    sendingAmount = $(this).val();
                    sendingTab.find('.maximus_currencies_convert').attr('disabled', false);
                } else {
                    sendingTab.find('.maximus_currencies_convert').attr('disabled', true);
                }
            });
            /*sendingTab.find('.maximus_input_con.gh .maximus_post_input').on("input", (e) => {
                
            });*/
            break;
        case 'nigeria':
            sendingTab.find('.maximus_input_con.ng .maximus_pre_input').on("input", (e) => {
                if (sendingTab.find('.maximus_input_con.ng .maximus_pre_input').val().length) {
                    sendingAmount = $(this).val();
                    sendingTab.find('.maximus_currencies_convert').attr('disabled', false);
                } else {
                    sendingTab.find('.maximus_currencies_convert').attr('disabled', true);
                }
            });
            break;
    
        default:
            sendingTab.find('.maximus_currencies_convert').on("click", (e) => {
                e.preventDefault()
                if ($(this).attr('disabled') !== 'true') {
                    switch (sendingCountry) {
                        case 'ghana':                            
                            sendingTab.find('.maximus_input_con.gh .maximus_post_input').val(
                                (sendingTab.find('.maximus_input_con.gh .maximus_pre_input').val() / js_vars['rates']['naria_to_cedis']['bid_per_unit']).toFixed(0) 
                            );
                            converted = true;
                            $('.maximus_currency_converter_row .maximus_currencies_proceed_con').css('display', 'block');
                            break;
                        case 'nigeria':                            
                            sendingTab.find('.maximus_input_con.ng .maximus_post_input').val(
                                (sendingTab.find('.maximus_input_con.ng .maximus_pre_input').val() * js_vars['rates']['naria_to_cedis']['bid_per_unit']).toFixed(0) 
                            );
                            converted = true;
                            $('.maximus_currency_converter_row .maximus_currencies_proceed_con').css('display', 'block');
                            break;
                    
                        default:
                            break;
                    }
                }
            });
            break;
    }

    let receivingCountry = '';

    receivingTab.find('.maximus_init_select').on("change", (e) => {
        receivingInitCountry =  receivingTab.find('.maximus_init_select').val();

        if (receivingInitCountry.length) {
            if (receivingInitCountry === 'ghana') {
                 receivingTab.find('.maximus_pre_select').find('option[selected]').attr('selected', false);
                 receivingTab.find('.maximus_pre_select').find('option[value*=nigeria]').attr('selected', true);
            }else if (receivingInitCountry === 'nigeria') {
                 receivingTab.find('.maximus_pre_select').find('option[selected]').attr('selected', false);
                 receivingTab.find('.maximus_pre_select').find('option[value*=ghana]').attr('selected', true);
            }
             receivingTab.find('.maximus_pre_select').trigger('change');
        }
    });

    receivingTab.find('.maximus_pre_select').on("change", (e) => {
        receivingTab.find('.maximus_currencies_convert').attr('disabled', true);
        receivingCountry =  receivingTab.find('.maximus_pre_select').val();

        if (receivingCountry.length) {
            if (receivingCountry === 'ghana') {
                $('.maximus_input_con.gh').css('display', 'block');
                $('.maximus_input_con.ng').find("input").val('');
                $('.maximus_input_con.ng').css('display', 'none'); 
                receivingTab.find('.maximus_converter_rates_header').css('display', 'block');  
                receivingTab.find('.maximus_converter_rates').prop('innerHTML', 'GHS ' + js_vars['rates']['naria_to_cedis']['quote_symbol'] + '1 = NGN ' + js_vars['rates']['naria_to_cedis']['base_symbol'] + js_vars['rates']['naria_to_cedis']['reverse_per_unit'].toFixed(3) );   
            }else if (receivingCountry === 'nigeria') {
                $('.maximus_input_con.ng').css('display', 'block');
                $('.maximus_input_con.gh').find("input").val('');
                $('.maximus_input_con.gh').css('display', 'none');
                receivingTab.find('.maximus_converter_rates_header').css('display', 'block');
                receivingTab.find('.maximus_converter_rates').prop('innerHTML', 'NGN ' + js_vars['rates']['naria_to_cedis']['base_symbol'] + '1 = GHS ' + js_vars['rates']['naria_to_cedis']['quote_symbol'] + ( 1/ js_vars['rates']['naria_to_cedis']['reverse_per_unit']).toFixed(3) );
            }
        }else{
            $('.maximus_input_con').css('display', 'none');
        }

        receivingTab.find('.gh .maximus_pre_input').on("input", (e) => {
            if (receivingTab.find('.gh .maximus_pre_input').val().length && !isNaN(receivingTab.find('.gh .maximus_pre_input').val()) ) {
                receivingAmount = receivingTab.find('.gh .maximus_pre_input').val();
                receivingTab.find('.maximus_currencies_convert').attr('disabled', false);
            } else {
                receivingTab.find('.maximus_currencies_convert').attr('disabled', true);
            }
        });

        receivingTab.find('.ng .maximus_pre_input').on("input", (e) => {
            if (receivingTab.find('.ng .maximus_pre_input').val().length && !isNaN(receivingTab.find('.ng .maximus_pre_input').val()) ) {
                receivingAmount = receivingTab.find('.ng .maximus_pre_input').val();
                receivingTab.find('.maximus_currencies_convert').attr('disabled', false);
            } else {
                receivingTab.find('.maximus_currencies_convert').attr('disabled', true);
            }
        });
    });

    let receivingAmount = 0;

    switch (receivingCountry) {
        case 'ghana':
            receivingTab.find('.maximus_input_con.gh .maximus_pre_input').on("input", (e) => {
                if (receivingTab.find('.maximus_input_con.gh .maximus_pre_input').val().length) {
                    receivingAmount = $(this).val();
                    receivingTab.find('.maximus_currencies_convert').attr('disabled', false);
                } else {
                    receivingTab.find('.maximus_currencies_convert').attr('disabled', true);
                }
            });
            /*receivingTab.find('.maximus_input_con.gh .maximus_post_input').on("input", (e) => {
                
            });*/
            break;
        case 'nigeria':
            receivingTab.find('.maximus_input_con.ng .maximus_pre_input').on("input", (e) => {
                if (receivingTab.find('.maximus_input_con.ng .maximus_pre_input').val().length) {
                    receivingAmount = $(this).val();
                    receivingTab.find('.maximus_currencies_convert').attr('disabled', false);
                } else {
                    receivingTab.find('.maximus_currencies_convert').attr('disabled', true);
                }
            });
            break;
    
        default:
            receivingTab.find('.maximus_currencies_convert').on("click", (e) => {
                e.preventDefault()
                if ($(this).attr('disabled') !== 'true') {
                    switch (receivingCountry) {
                        case 'ghana':
                            receivingTab.find('.maximus_input_con.gh .maximus_post_input').val(
                                (receivingTab.find('.maximus_input_con.gh .maximus_pre_input').val() * js_vars['rates']['naria_to_cedis']['reverse_per_unit']).toFixed(0) 
                            );
                            converted = true;
                            $('.maximus_currency_converter_row .maximus_currencies_proceed_con').css('display', 'block');
                            break;
                        case 'nigeria':
                            receivingTab.find('.maximus_input_con.ng .maximus_post_input').val(
                                (receivingTab.find('.maximus_input_con.ng .maximus_pre_input').val() / js_vars['rates']['naria_to_cedis']['reverse_per_unit']).toFixed(0) 
                            );
                            converted = true;
                            $('.maximus_currency_converter_row .maximus_currencies_proceed_con').css('display', 'block');
                            break;
                    
                        default:
                            break;
                    }
                }
            });
            break;
    }

    let data = {};

    let proceedBtn = $('.maximus_currency_converter_row .maximus_currencies_proceed');
    proceedBtn.on("click", (e) => {
        e.preventDefault();

        let proceed = false;

        let reason = $('.maximus_currency_converter .nav .active').attr('data-target');
        data.reason = $('.maximus_currency_converter .nav .active').attr('data-target');

        switch (reason) {
            case 'sending':
                switch (sendingTab.find('.maximus_pre_select').val()) {
                    case 'ghana':
                        if ( converted ) {
                            proceed = true;
                            $('.maximus_currencies_form_amount_symbol').prop('innerHTML', js_vars['rates']['naria_to_cedis']['quote_symbol']);
                            $('.maximus_currencies_form_amount').val(sendingTab.find('.maximus_input_con.gh .maximus_post_input').val());
                            data.from = sendingTab.find('.maximus_init_select').val();
                            data.to = sendingTab.find('.maximus_pre_select').val();
                            data.convertingAmount = js_vars['rates']['naria_to_cedis']['base_symbol'] + sendingTab.find('.maximus_input_con.gh .maximus_pre_input').val();
                            data.amount = js_vars['rates']['naria_to_cedis']['quote_symbol'] + $('.maximus_currencies_form_amount').val();
                        }
                        break;
                    case 'nigeria':
                        if (converted) {
                            proceed = true;
                            $('.maximus_currencies_form_amount_symbol').prop('innerHTML', js_vars['rates']['naria_to_cedis']['base_symbol']);
                            $('.maximus_currencies_form_amount').val(sendingTab.find('.maximus_input_con.ng .maximus_post_input').val());
                            data.from = sendingTab.find('.maximus_init_select').val();
                            data.to = sendingTab.find('.maximus_pre_select').val();
                            data.convertingAmount = js_vars['rates']['naria_to_cedis']['quote_symbol'] + sendingTab.find('.maximus_input_con.ng .maximus_pre_input').val();
                            data.amount = js_vars['rates']['naria_to_cedis']['base_symbol'] + $('.maximus_currencies_form_amount').val();
                        }
                        break;
                
                    default:
                        break;
                }
                break;

            case 'receiving':
                switch (receivingTab.find('.maximus_pre_select').val()) {
                    case 'ghana':
                        if ( converted ) {
                            proceed = true;
                            $('.maximus_currencies_form_amount_symbol').prop('innerHTML', js_vars['rates']['naria_to_cedis']['base_symbol']);
                            $('.maximus_currencies_form_amount').val(receivingTab.find('.maximus_input_con.gh .maximus_post_input').val());
                            data.from = receivingTab.find('.maximus_init_select').val();
                            data.to = receivingTab.find('.maximus_pre_select').val();
                            data.convertingAmount = js_vars['rates']['naria_to_cedis']['quote_symbol'] + receivingTab.find('.maximus_input_con.gh .maximus_pre_input').val();
                            data.amount = js_vars['rates']['naria_to_cedis']['base_symbol'] + $('.maximus_currencies_form_amount').val();
                        }
                        break;
                    case 'nigeria':
                        if (converted) {
                            proceed = true;
                            $('.maximus_currencies_form_amount_symbol').prop('innerHTML', js_vars['rates']['naria_to_cedis']['quote_symbol']);
                            $('.maximus_currencies_form_amount').val(receivingTab.find('.maximus_input_con.ng .maximus_post_input').val());
                            data.from = receivingTab.find('.maximus_init_select').val();
                            data.to = receivingTab.find('.maximus_pre_select').val();
                            data.convertingAmount = js_vars['rates']['naria_to_cedis']['base_symbol'] + receivingTab.find('.maximus_input_con.ng .maximus_pre_input').val();
                            data.amount = js_vars['rates']['naria_to_cedis']['quote_symbol'] + $('.maximus_currencies_form_amount').val();
                        }
                        break;
                
                    default:
                        break;
                }
                break;
        
            default:
                break;
        }

        if (proceed) {
            let form = $('.maximus_currency_converter_row .maximus_currencies_form');
            if (form.css('display') === 'none') {
                form.css('display', 'block');
            }
        }
    });

    $(".maximus_converter_finalize").on( "click", (e) => {
        e.preventDefault(); 
        let user_id = $(".maximus_converter_finalize").attr("data-user");
        let nonce = $(".maximus_converter_finalize").attr("data-nonce");

        let prevContent = '';
  
        $.ajax({
           type : "post",
           dataType : "json",
           url : js_vars.ajax_url,
           data : {action: "crisp_sync", user_id : user_id, nonce: nonce, data: data},
           beforeSend: function(obj) {
               prevContent = $('.maximus_currency_converter_row').prop('innerHTML');
               $('.maximus_currency_converter_row').prop('innerHTML', '<div class="d-flex justify-content-center">\
                <div class="spinner-border text-primary" role="status" style="width: 10rem; height: 10rem">\
                    <span class="visually-hidden">Loading...</span>\
                </div>\
                </div>');
           },
           success: function(response) {
                if (response.success && response.data.logged) {
                    let text = 'Reason : '+ data.reason +'\n\From : '+ data.from +'\n\To : '+ data.to +'\n\Converting Amount : '+ data.convertingAmount +'\n\Sending Amount : '+ data.amount;
                    $crisp.push(['do', 'chat:open']);
                    $crisp.push(["do", "message:send", ["text", text]]);
                    $('.maximus_currency_converter_row').prop('innerHTML', '<div class="d-flex justify-content-center">\
                    <div class="card">\
                        <div class="card-header"><h1><span style="color: #01055e">First Step Complete</span> <i class="fas fa-check-circle text-success"></i></h1></div>\
                            <div class="card-body">\
                                <blockquote class="blockquote mb-0">\
                                <p>\
                                    Continue with one of our dedicated online agents.\
                                </p>\
                                <footer class="blockquote-footer">\
                                    via the live chat\
                                </footer>\
                                </blockquote>\
                            </div>\
                        </div>\
                    </div>');
              
                    setTimeout(function () {
                        window.location.replace(js_vars['home_url']);
                    }, 10000);
                }
           },
           error: function(error) {
                $('.maximus_currency_converter_row').prop('innerHTML', '<div class="d-flex justify-content-center">\
                <div class="card">\
                    <div class="card-header"><h1><span class="text-danger">Oops!, Couldn\'t complete</span> <i class="fas fa-times-circle text-danger"></i></h1></div>\
                        <div class="card-body">\
                            <blockquote class="blockquote mb-0">\
                            <p>\
                                '+ error.responseText +'.\
                            </p>\
                            </blockquote>\
                        </div>\
                    </div>\
                </div>');
                setTimeout(function () {
                    window.location.replace(js_vars['home_url']);
                }, 5000);
           }
        })   
  
     })
}( jQuery ) );
