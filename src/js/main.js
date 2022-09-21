import * as REST_API_data from "postcss";

jQuery(document).ready(function ($) {

    function start() {
        let apiURL = rest_data.root + 'ix/v1/get_form/';

        let data = {
            form_type: 'auth',
        }

        get_forms(data, apiURL)
    }
    start();

    $(document)

        .on('submit', '.user_action_form', function (e) {
            e.preventDefault();

            let thisForm = $(this);
            let data = thisForm.serialize();
            let apiURL = thisForm.find('button[type="submit"]').attr('data-rout');

            // let apiURL = rest_data.root;

            console.log(apiURL);

            send_data(data, apiURL)

        })

        .on('click', '.get_forms', function (e) {
            e.preventDefault();

            let apiURL = $(this).attr('data-rout');
            let form_type = $(this).attr('data-form_type');

            let data = {
                form_type: form_type,
            }

            // console.log(apiURL);
            // console.log(form_type);

            get_forms(data, apiURL)

        })

        .on('keyup', '#password, #confirm_password', function () {
            if ($('#password').val() == $('#confirm_password').val()) {
                $('.compare_pass').html('Matching').css('color', 'green');
            } else
                $(this).html('Not Matching').css('color', 'red');
        })

    function send_data(data, apiURL) {

        $.ajax({
            url: apiURL,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', rest_data.nonce);
            },
            success: function (request) {
                if(request.status === 200 && request.form === 'register') {
                    $('.ixpc_forms_wrapper').html('<div class="ixpc_forms_success"> ' + request.message + ' </div>');
                }
                if(request.status === 200 && request.form === 'auth') {
                    $('.ixpc_forms_wrapper').html('<div class="ixpc_forms_success"> ' + request.message + ' </div>');
                }
                console.log('successful', request);
            },
            error: function (err) {

                    $('.ixpc_forms_wrapper').append('<div class="ixpc_forms_err"> ошибка </div>');

                console.log('errors: ', err);
            }
        });

    }

    function get_forms(data, apiURL) {

        $.ajax({
            url: apiURL,
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-WP-Nonce', rest_data.nonce);
            },
            success: function (request) {
                $('.ixpc_forms_wrapper').html(request)
                // console.log('successful', request);
            },
            error: function (err) {
                // console.log('errors: ', err);
            }
        });

    }



})