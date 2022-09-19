import * as REST_API_data from "postcss";

jQuery(document).ready(function ($) {

    $(document).ready(function ($) {

        let apiURL = rest_data.root + 'ix/v1/get_form/';

        let data = {
            form_type: 'auth',
        }

        get_forms( data, apiURL )
    })

    $('.user_action_form').on ('submit', function(e){
        e.preventDefault();

        let thisForm = $( this );
        let data = thisForm.serialize();
        let apiURL = thisForm.find('button[type="submit"]').attr('data-rout');

        // let apiURL = rest_data.root;

        console.log(apiURL);

        send_data( data, apiURL )

    })

    $(document).on ('click', '.get_forms',function(e){
        e.preventDefault();

        let apiURL = $(this).attr('data-rout');
        let form_type = $(this).attr('data-form_type');

        let data = {
            form_type: form_type,
        }

        // let apiURL = rest_data.root;

        console.log(apiURL);
        console.log(form_type);

        get_forms( data, apiURL )

    })

    function send_data( data, apiURL) {

        $.ajax( {
            url: apiURL,
            data: data,
            type: 'POST',
            beforeSend : function ( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', rest_data.nonce );
            },
            success: function ( request ) {
                $('.ixpc_forms_wrapper').html(request)
                console.log( 'successful', request );
            },
            error:  function( err ) {
                console.log( 'errors: ', err );
            }
        } );

    }

    function get_forms ( data, apiURL) {

        $.ajax( {
            url: apiURL,
            data: data,
            type: 'POST',
            beforeSend : function ( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', rest_data.nonce );
            },
            success: function ( request ) {
                $('.ixpc_forms_wrapper').html(request)
                console.log( 'successful', request );
            },
            error:  function( err ) {
                console.log( 'errors: ', err );
            }
        } );

    }

})