/* Custom jQuery for Recipe Project */

/* AJAX for Login Form */
$(document).ready(function() {
    $("#lgForm").submit(function(e) {
        e.preventDefault();
        var email = $("#emailLogin").val();
        var pass = $("#passwordLogin").val();
        var dataString = 'emailLogin1=' + email + '&passwordLogin1=' + pass;
        $.ajax({
            url: "login.php",
            method: "POST",
            data: dataString,
            cache: false,
            success: function(responseText) {
                if(responseText == 0) {
                    window.location = 'index_login.php';
                }
                else if(responseText == 1) {
                    $("#msgLogin").fadeIn();
                    $("#msgLogin").text('Niepoprawny e-mail lub hasło!');
                    $("#lgForm")[0].reset();
                    $("#msgLogin").delay(4000).fadeOut();
                }
                else if(responseText == 2) {
                    $("#msgLogin").fadeIn();
                    $("#msgLogin").text('Niepoprawny e-mail lub hasło!');
                    $("#lgForm")[0].reset();
                    $("#msgLogin").delay(4000).fadeOut();
                }
            }
        });
    });
});

/* AJAX for Register Form */
$(document).ready(function() {
    $("#regForm").submit(function(e) {
        e.preventDefault();
        var username = $("#usernameReg").val();
        var email = $("#emailReg").val();
        var pass = $("#passwordReg").val();
        var dataString = 'usernameReg1=' + username + '&emailReg1=' + email + '&passwordReg1=' + pass;
        $.ajax({
            url: "register.php",
            method: "POST",
            data: dataString,
            cache: false,
            success: function(responseText) {
                if(responseText == 0) {
                    $("#msgReg").fadeIn();
                    $("#msgReg").text('Przepraszamy nazwa użytkownika jest zajęta!');
                    $("#regForm")[0].reset();
                    $("#msgReg").delay(4000).fadeOut();
                }
                else if(responseText == 1) {
                    $("#msgReg").fadeIn();
                    $("#msgReg").text('Przepraszamy adres e-mail jest już zarejestrowany!');
                    $("#regForm")[0].reset();
                    $("#msgReg").delay(4000).fadeOut();
                }
                else if(responseText == 2) {
                    $("#regForm")[0].reset();
                    $("#registerForm").modal('hide');
                    $("#loginForm").modal('show');
                    $("#msgsuccessReg").fadeIn();
                    $("#msgsuccessReg").text('Zarejestrowano pomyślnie!');
                    $("#msgsuccessReg").delay(4000).fadeOut();
                }
            }
        });
    });
});

/* AJAX for Reset Password */
$(document).ready(function() {
    $("#resetForm").submit(function(e) {
        e.preventDefault();
        var email = $("#emailReset").val();
        var pass = $("#passwordReset").val();
        var dataString = 'emailReset1=' + email + '&passwordReset1=' + pass;
        $.ajax({
            url: "resetPassword.php",
            method: "POST",
            data: dataString,
            cache: false,
            success: function(responseText) {
                if(responseText == 0) {
                    $("#resetForm")[0].reset();
                    $("#resetPasswordModal").modal('hide');
                    $("#loginForm").modal('show');
                    $("#msgsuccessReg").fadeIn();
                    $("#msgsuccessReg").text('Hasło zostało pomyślnie zmienione!');
                    $("#msgsuccessReg").delay(4000).fadeOut();
                }
                else if(responseText == 1) {
                    $("#msgReset").fadeIn();
                    $("#msgReset").text('Niepoprawny adres e-mail!');
                    $("#resetForm")[0].reset();
                    $("#msgReset").delay(4000).fadeOut();
                }
            }
        });
    });
});

$("#backtoLogin").click(function() {
    $('#resetPasswordModal').modal('hide');
});

$("#accountExist").click(function() {
    $('#registerForm').modal('hide');
});

$("#reg").click(function() {
    $('#loginForm').modal('hide');
});

 $("#lostPass").click(function() {
    $('#loginForm').modal('hide');
});

$("#breakfast").click(function() {
    $('#loginForm').modal('show');
});

$("#dinner").click(function() {
    $('#loginForm').modal('show');
});

$("#supper").click(function() {
    $('#loginForm').modal('show');
});
