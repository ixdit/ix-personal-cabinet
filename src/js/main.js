import * as REST_API_data from "postcss";

jQuery(document).ready(function ($) {

    $('.user_action_form').on ('submit', function(e){
        e.preventDefault();

        let thisForm = $( this );
        let data = thisForm.serialize();
        let apiURL = thisForm.find('button[type="submit"]').attr('data-rout');

        // let apiURL = rest_data.root;

        console.log(apiURL);

        send_data( data, apiURL )


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
                console.log( 'successful', request );
            },
            error:  function( err ) {
                console.log( 'errors: ', err );
            }
        } );

    }

})