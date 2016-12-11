$(document).ready(function() {
    // Toggle the side menu
    $('#menu-button').on('click', function() {
        $('#user-options-box').removeClass('show-user-options-box').addClass('hide-user-options-box');
        $('#side-bar-div').toggleClass('show-side-bar hide-side-bar');
        $('#menu-button').toggleClass('fa fa-times fa fa-bars');
    });

    // Toggle user-options-box
    $('#user-box').on('click', function() {
        $('#side-bar-div').removeClass('show-side-bar').addClass('hide-side-bar');
        $('#menu-button').removeClass('fa fa-times').addClass('fa fa-bars');;
        $('#user-options-box').toggleClass('show-user-options-box hide-user-options-box');
    });
});