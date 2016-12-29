$(document).ready(function() {
    // Toggle the side menu
    $('#menu-button').on('click', function() {
        $('#side-bar-div').toggleClass('show-side-bar hide-side-bar');
        $('#menu-button').toggleClass('fa fa-times fa fa-bars');
    });
});