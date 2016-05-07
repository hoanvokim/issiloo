$(document).ready(function () {

    var faIcon = {
        valid: 'fa fa-check-circle fa-lg text-success',
        invalid: 'fa fa-times-circle fa-lg',
        validating: 'fa fa-refresh'
    }

    $('#form-login').bootstrapValidator({
        message: 'This value is not valid',
        excluded: [':disabled'],
        feedbackIcons: faIcon,
        fields: {
            signupInputUserName: {
                container: 'tooltip',
                validators: {
                    notEmpty: {
                        message: 'User name is required and cannot be empty'
                    }
                }
            },
            signupInputPassword: {
                validators: {
                    notEmpty: {
                        message: 'Password is required and cannot be empty'
                    }
                }
            }
        }
    })
});
