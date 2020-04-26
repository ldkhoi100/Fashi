$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".checkusernamelogin").hide();

function duplicateUsernamelogin(element) {
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
                $(".checkusernamelogin").show();
                $(".textusernamelogin").html('The username field is required.');
                $(".usernameinputlogin").addClass('is-invalid');
                $(".usernamedivlogin").addClass('has-error has-feedback');
                $("#btn-submitlogin10").attr("disabled", true);
                $("#btn-submitlogin10").addClass('button-clicked');
            } else if (res.exists) {
                $(".checkusernamelogin").show();
                $(".textusernamelogin").html('The username does not match.');
                $(".usernameinputlogin").addClass('is-invalid');
                $(".usernamedivlogin").addClass('has-error has-feedback');
                $("#btn-submitlogin10").attr("disabled", true);
                $("#btn-submitlogin10").addClass('button-clicked');
            } else {
                $(".checkusernamelogin").hide();
                $(".usernameinputlogin").removeClass('is-invalid');
                $(".usernameinputlogin").addClass('is-valid');
                $(".usernamedivlogin").removeClass('has-error has-feedback');
                $(".usernamedivlogin").addClass('has-success has-feedback');
                $("#btn-submitlogin10").attr("disabled", false);
                $("#btn-submitlogin10").removeClass('button-clicked');
            }
        },
        error: function(jqXHR, exception) {

        }
    });
}