$(document).ready(function() {
    $("#error_msg_f").hide();
    $("#error_msg_l").hide();
    $("#error_msg_usr").hide();
    $("#error_msg_email").hide();
    $("#error_msg_password").hide();
    $("#error_msg_password_re").hide();
    $("#error_msg_address").hide();
    
    $("#first_name").focusout(function() {
        first_name();
    });
    $("#last_name").focusout(function() {
        last_name();
    });
    $("#username").focusout(function() {
        user_name()
    });
    $("#email").focusout(function() {
        email()
    });
    $("#password").focusout(function() {
        password()
    });
    $("#confirm-password").focusout(function() {
        password_re()
    });

    function first_name() {
        var length = $("#first_name").val().length;
        if (length < 5 || length > 20) {
            $("#error_msg_f").html("Should between 5-20 character");
            $("#error_msg_f").show(150)
        } else {
            $("#error_msg_f").hide(150)
        }
    }

    function last_name() {
        var length = $("#last_name").val().length;
        if (length < 5 || length > 20) {
            $("#error_msg_l").html("Should between 5-20 character");
            $("#error_msg_l").show(150)
        } else {
            $("#error_msg_l").hide(150)
        }
    }

    function user_name() {
        var length = $("#username").val().length;
        if (length < 5 || length > 20) {
            $("#error_msg_usr").html("Should between 5-20 character");
            $("#error_msg_usr").show(150)
        } else {
            $("#error_msg_usr").hide(150)
        }
    }

    function email() {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        if (pattern.test($("#email").val())) {
            $("#error_msg_email").hide()
        } else {
            $("#error_msg_email").html("Invalid email address");
            $("#error_msg_email").show()
        }
    }

    function password() {
        var password_length = $("#password").val().length;
        if (password_length < 3) {
            $("#error_msg_password").html("At least 3 characters");
            $("#error_msg_password").show()
        } else {
            $("#error_msg_password").hide()
        }
    }

    function password_re() {
        var password = $("#password").val();
        var retype_password = $("#confirm-password").val();
        if (password != retype_password) {
            $("#error_msg_password_re").html("Passwords don't match");
            $("#error_msg_password_re").show()
        } else {
            $("#error_msg_password_re").hide()
        }
    }

    // function address() {
    //     var address = $("#address").val();
    //     if (address == 0) {
    //         $("#error_msg_address").html("Address can't be empty");
    //         $("#error_msg_address").show()
    //     } else {
    //         $("#error_msg_address").hide()
    //     }
    // }
})