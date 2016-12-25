$(document).ready(function() {
    $('#delete-account-button').on('click', function () {
        var confirmation = confirm("Are you sure you want to delete your account? This will be permanent and you can not get it back");

        if (!confirmation) {
            event.preventDefault();
        } else {
            $(this).attr('href', '/delete-account');
        }
    });

    $('#delete-pm-button').on('click', function () {
        var confirmation = confirm("Are you sure you want to delete this private message? This will be permanent and you can not undo it");

        if (!confirmation) {
            event.preventDefault();
        } else {
            var pm_id = $(this).attr('pm-id');
            console.log(pm_id);
            $(this).attr('href', '/delete-pm/' + pm_id);
        }
    });
});