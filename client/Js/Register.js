$(document).ready(function() {
    $(function() {
        var $registerForm = $("#registerForm");
        if ($registerForm.length) {
            $registerForm.validate({
                rules: {
                    username: {
                        required: true,
                        onfocusout: true
                    }
                },
                messeages: {
                    username: {
                        required: "What's is your username?"
                    }
                }
            });
        }
    });
});