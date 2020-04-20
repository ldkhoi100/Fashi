$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".checkusername").hide();

function duplicateUsername(element) {
    var username = $(element).val();
    $.ajax({
        type: "POST",
        url: '/loginusername',
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
            } else if (res.exists) {
                $(".checkusername").show();
                $(".textusername").html('The username does not match.');
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