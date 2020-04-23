$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#btn-submit").attr("disabled", true);
$("#btn-submit").addClass('button-clicked');
$(".checkemail").hide();

function duplicateEmail(element) {
    var email = $(element).val();
    $.ajax({
        type: "POST",
        url: '/checkemail',
        data: {
            email: email
        },
        dataType: "json",
        success: function(res) {
            if (res.empty) {
                $(".checkemail").show();
                $(".textemail").html("The email field is required.");
                $(".emailinput").addClass('is-invalid');
                $(".emaildiv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.filter) {
                $(".checkemail").show();
                $(".textemail").html("The email must be a valid email address.");
                $(".emailinput").addClass('is-invalid');
                $(".emaildiv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.exists) {
                $(".checkemail").show();
                $(".textemail").html("The email has already been taken");
                $(".emailinput").addClass('is-invalid');
                $(".emaildiv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else {
                $(".checkemail").hide();
                $(".emailinput").removeClass('is-invalid');
                $(".emailinput").addClass('is-valid');
                $(".emaildiv").removeClass('has-error has-feedback');
                $(".emaildiv").addClass('has-success has-feedback');
                $("#btn-submit").attr("disabled", false);
                $("#btn-submit").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}

$(".checkusername").hide();

function duplicateUsername(element) {
    var username = $(element).val();
    $.ajax({
        type: "POST",
        url: '/checkusername',
        data: {
            username: username
        },
        dataType: "json",
        success: function(res) {
            if (res.empty) {
                $(".checkusername").show();
                $(".textusername").html('The username field is required.');
                $(".usernameinput").addClass('is-invalid');
                $(".usernamediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.filter) {
                $(".checkusername").show();
                $(".textusername").html('The username include only characters and numbers and more than 5 characters.');
                $(".usernameinput").addClass('is-invalid');
                $(".usernamediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.exists) {
                $(".checkusername").show();
                $(".textusername").html('The username has already been taken');
                $(".usernameinput").addClass('is-invalid');
                $(".usernamediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else {
                $(".checkusername").hide();
                $(".usernameinput").removeClass('is-invalid');
                $(".usernameinput").addClass('is-valid');
                $(".usernamediv").removeClass('has-error has-feedback');
                $(".usernamediv").addClass('has-success has-feedback');
                $("#btn-submit").attr("disabled", false);
                $("#btn-submit").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}

$(".checkname").hide();

function duplicateName(element) {
    var name = $(element).val();
    $.ajax({
        type: "POST",
        url: '/checkname',
        data: {
            name: name
        },
        dataType: "json",
        success: function(res) {
            if (res.exists) {
                $(".checkname").show();
                $(".textname").html('The name field is required.');
                $(".nameinput").addClass('is-invalid');
                $(".namediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else {
                $(".checkname").hide();
                $(".nameinput").removeClass('is-invalid');
                $(".nameinput").addClass('is-valid');
                $(".namediv").removeClass('has-error has-feedback');
                $(".namediv").addClass('has-success has-feedback');
                $("#btn-submit").attr("disabled", false);
                $("#btn-submit").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}

$(".checkaddress").hide();

function duplicateAddress(element) {
    var address = $(element).val();
    $.ajax({
        type: "POST",
        url: '/checkaddress',
        data: {
            address: address
        },
        dataType: "json",
        success: function(res) {
            if (res.exists) {
                $(".checkaddress").show();
                $(".textaddress").html('The address field is required.');
                $(".addressinput").addClass('is-invalid');
                $(".addressdiv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else {
                $(".checkaddress").hide();
                $(".addressinput").removeClass('is-invalid');
                $(".addressinput").addClass('is-valid');
                $(".addressdiv").removeClass('has-error has-feedback');
                $(".addressdiv").addClass('has-success has-feedback');
                $("#btn-submit").attr("disabled", false);
                $("#btn-submit").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}

$(".checkphone").hide();

function duplicatePhone(element) {
    var phone = $(element).val();
    $.ajax({
        type: "POST",
        url: '/checkphone',
        data: {
            phone: phone
        },
        dataType: "json",
        success: function(res) {
            if (res.empty) {
                $(".checkphone").show();
                $(".textphone").html("The phone field is required.");
                $(".phoneinput").addClass('is-invalid');
                $(".phonediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.filter) {
                $(".checkphone").show();
                $(".textphone").html("The phone must be a valid phone and less than 9 number.");
                $(".phoneinput").addClass('is-invalid');
                $(".phonediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else if (res.exists) {
                $(".checkphone").show();
                $(".textphone").html("The phone has already been taken.");
                $(".phoneinput").addClass('is-invalid');
                $(".phonediv").addClass('has-error has-feedback');
                $("#btn-submit").attr("disabled", true);
                $("#btn-submit").addClass('button-clicked');
            } else {
                $(".checkphone").hide();
                $(".phoneinput").removeClass('is-invalid');
                $(".phoneinput").addClass('is-valid');
                $(".phonediv").removeClass('has-error has-feedback');
                $(".phonediv").addClass('has-success has-feedback');
                $("#btn-submit").attr("disabled", false);
                $("#btn-submit").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}