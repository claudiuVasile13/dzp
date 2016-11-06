$(document).ready(function() {
    labelAnimation();
});

//input and label animation for login and register
function labelAnimation() {
    $('.fields').blur(function () {
        var $this = $(this);
        if ($this.val()) {
            $this.addClass('used');
        }
        else {
            $this.removeClass('used');
        }
    });
}