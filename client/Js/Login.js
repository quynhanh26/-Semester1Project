$(document).ready(function() {
    $(function() {
        var $loginForm = $("#loginForm");
        if ($loginForm.length) {
            $loginFm.validate({
                rules: {
                    username: {
                        required: true
                    }
                },
                messagesss: {
                    username: {
                        required: 'There is no account matching the username entered. <a href="">Sign up for an account.</a>'
                    }
                }
            })
        }
    });
});