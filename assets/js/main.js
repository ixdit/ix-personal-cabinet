/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
$(document).ready(function () {
  $('.user_action_form').submit(function (e) {
    e.preventDefault();
    var thisForm = $(this);
    var data = thisForm.serialize();
    var apiURL = 'http://wpdev.loc/wp-json';
    $.ajax({
      url: apiURL + '/ix/v1/auth/',
      data: data,
      type: 'POST',
      success: function success(request) {
        console.log('Array of posts', request);
      },
      error: function error(err) {
        console.log('Error: ', err);
      }
    });
  });
});
/******/ })()
;
//# sourceMappingURL=main.js.map