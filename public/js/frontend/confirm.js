$(document).ready(function() {
    $('#delete-account-button').on('click', function () {
        var confirmation = confirm("Are you sure you want to delete your account? This will be permanent and you can not get it back");

        if (!confirmation) {
            event.preventDefault();
        } else {
            $(this).attr('href', '/delete-account');
        }
    });
});