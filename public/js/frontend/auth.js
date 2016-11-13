$(document).ready(function() {
    fieldsValue();
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

function fieldsValue() {
    $('.fields').each(function(index) {
        if($(this).val().length > 0) {
            $(this).addClass('used');
        }
    });
}