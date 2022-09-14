$(document).ready(function () {

    $('.user_action_form').submit(function(e){
        e.preventDefault();

        let thisForm = $( this );
        let data = thisForm.serialize();

        let apiURL = 'http://wpdev.loc/wp-json';

        $.ajax( {
            url: apiURL + '/ix/v1/auth/',
            data: data,
            type: 'POST',
            success: function ( request ) {
                console.log( 'Array of posts', request );
            },
            error:  function( err ) {
                console.log( 'Error: ', err );
            }
        } );
    })

})