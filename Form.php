<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5a29577bff.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Sign In | Sign Up • Zebra.com</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
            margin: 0px;
            padding: 0px;
        }

        body {
            background: #f6f5f7;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        h2 {
            text-align: center;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        button {
            border-radius: 20px;
            border: 1px solid #FF4B2B;
            background-color: #FF4B2B;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            margin: 15px 0px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background-color: transparent;
            border-color: #FFFFFF;
        }

        form {
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        input {
            background-color: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
                0 10px 10px rgba(0, 0, 0, 0.22);
            position: relative;
            overflow: hidden;
            width: 700px;
            max-width: 100%;
            min-height: 578px;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .container.right-panel-active .sign-in-container {
            transform: translateX(100%);
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: show 0.6s;
        }

        @keyframes show {

            0%,
            49.99% {
                opacity: 0;
                z-index: 1;
            }

            50%,
            100% {
                opacity: 1;
                z-index: 5;
            }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
        }

        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        .overlay {
            background: #FF416C;
            background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
            background: linear-gradient(to right, #FF4B2B, #FF416C);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 0 0;
            color: #FFFFFF;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left {
            transform: translateX(-20%);
        }

        .container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #DDDDDD;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="POST" id="sign-up">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input autocomplete="off" onkeyup="validname()" id="name" name="name" type="text" placeholder="Name" />
                <span class="field_error" id="name_error"></span>
                <input autocomplete="off" onkeyup="validphone()" id="mobile_no" name="mobile" type="tel" placeholder="Mobile No" />
                <span class="field_error" id="mobile_error"></span>
                <input autocomplete="off" onkeyup="validmail()" class="email" id="email" name="email" type="email" placeholder="Email ID" />
                <span class="field_error" id="email_error"></span>
                <input name="pass" id="pass" onkeyup="validpass()" type="password" placeholder="Password" />
                <button id="show" type="button" onclick="showpass()"><span>Show</span></button>
                <style>
                    #show {
                        position: absolute;
                        top: 362px;
                        left: 220px;
                        width: 50px;
                        background-color: transparent;
                        color: #FF4B2B;
                        border: none;
                    }

                    #show span {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }
                </style>
                <span class="field_error" id="pass_error"></span>
                <input name="cpass" onkeyup="validcpass()" id="cpass" type="password" placeholder="Confirm Password" />
                <span class="field_error" id="cpass_error"></span>
                <button type="button" onclick="userRegister()" name="sign-up" value="sign-up">Sign Up</button>
                <span class="register_msg"></span>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" method="POST" id="sign-in">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-twitter"></i></a>
                </div>
                <span>or use your account</span>
                <input autocomplete="off" name="email" type="email" id="login_email" placeholder="Email" />
                <span class="field_error" id="login_email_error"></span>
                <input name="pass" type="password" placeholder="Password" id="login_password" />
                <span class="field_error" id="login_password_error"></span>
                <!-- <a href="#">Forgot your password?</a> -->
                <button type="button" name="login" value="login" onclick="userLogin()">Sign In</button>
                <span class="login_msg"></span>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>One of us ?</h1>
                    <p>You are one among the million milestones achieved by Zebra.com.</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>New here ?</h1>
                    <p>Join one among your million friends and start the journey with us.</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/vendor/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/waypoints.min.js"></script>

    <script>
        var nameerror = document.getElementById("name_error");
        var mailerror = document.getElementById("email_error");
        var numerror = document.getElementById("mobile_error");
        var passerror = document.getElementById("pass_error");

        function validname() {
            uname = document.getElementById("name").value;
            if (uname.length == 0) {
                nameerror.innerHTML = " Username is Required";
                document.getElementById("name").style.color = "red";
                return false;
            }
            if (uname.length < 6) {
                nameerror.innerHTML = " Username Must Be Greater Than 6";
                document.getElementById("name").style.color = "red";
                return false;
            }
            nameerror.innerHTML = "";
            document.getElementById("name").style.color = "black";
            return true;
        }

        function validphone() {
            unumber = document.getElementById("mobile_no").value;
            if (unumber.length == 0) {
                numerror.innerHTML = " Phone Number is Required";
                document.getElementById("mobile_no").style.color = "red";
                return false;
            }
            if (unumber.length !== 10) {
                numerror.innerHTML = " Phone Number must contain  only 10 digits";
                document.getElementById("mobile_no").style.color = "red";
                return false;
            }
            numerror.innerHTML = "";
            document.getElementById("mobile_no").style.color = "black";
            return true;
        }

        function validmail() {
            umail = document.getElementById("email").value;
            if (umail.length == 0) {
                mailerror.innerHTML = " Email is Required";
                document.getElementById("email").style.color = "red";
                return false;
            }
            if (!umail.match(/^[A-Za-z\._\[0-9]*[@][A-Za-z\-[0-9]*[\.][a-z]{2,4}$/)) {
                mailerror.innerHTML = " Invalid Email";
                document.getElementById("email").style.color = "red";
                return false;
            }

            mailerror.innerHTML = "";
            document.getElementById("email").style.color = "black";
            return true;
        }

        function validpass() {
            upass = document.getElementById("pass").value;

            if (upass.length == 0) {
                passerror.innerHTML = " Password is required";
                document.getElementById("pass").style.color = "red";
                return false;
            }
            if (upass.length < 8) {
                passerror.innerHTML = " Password Length Must Be Greater Than 8";
                document.getElementById("pass").style.color = "red";
                return false;
            } else {
                passerror.innerHTML = "";
                document.getElementById("pass").style.color = "black";
            }

            if (!upass.match(/[0-9]/)) {
                passerror.innerHTML = "Password Must Contain Atleast 1 Number";
                document.getElementById("pass").style.color = "red";
                return false;
            } else {
                passerror.innerHTML = "";
                document.getElementById("pass").style.color = "black";
            }

            if (!upass.match(/[A-Z]/)) {
                passerror.innerHTML = "Password Must Contain Atleast 1 UpperCase";
                document.getElementById("pass").style.color = "red";
                return false;
            } else {
                passerror.innerHTML = "";
                document.getElementById("pass").style.color = "black";
            }

            if (!upass.match(/[!\@\#\$\%\^\&\*\(\)\-\_\=\+\>\<\?\.\,]/)) {
                passerror.innerHTML = "Password Must Contain Atleast 1 Special Character";
                document.getElementById("pass").style.color = "red";
                return false;
            } else {
                passerror.innerHTML = "";
            document.getElementById("pass").style.color = "black";
            }

            if (!upass.match(/[a-z]/)) {
                passerror.innerHTML = "Password Must Contain Atleast 1 LowerCase";
                document.getElementById("pass").style.color = "red";
                return false;
            } else {             passerror.innerHTML = "";
            document.getElementById("pass").style.color = "black";
                return true;
            }
        }

        function showpass() {
            var passvalue = document.getElementById("pass");
            if (passvalue.type === "password") {
                passvalue.type = "text";
                document.getElementById("showhide").innerHTML = "Hide";
            } else {
                passvalue.type = "password";
                document.getElementById("showhide").innerHTML = "Show";
            }
        }

        function validcpass() {
            var pass = document.getElementById("pass").value;
            var cpass = document.getElementById("cpass").value;
            var err = document.getElementById("cpass_error");
            if (pass !== cpass) {
                err.innerHTML = "Password Did Not Match";
                document.getElementById("cpass").style.color = "red";
                return false;
            } else {
                err.innerHTML = "";
            document.getElementById("cpass").style.color = "black";
                return true;
            }
        }

        function userRegister() {
            jQuery('.field_error').html('');
            var name = jQuery("#name").val();
            var email = jQuery("#email").val();
            var mobile = jQuery("#mobile_no").val();
            var pass = jQuery("#pass").val();
            var cpass = jQuery("#cpass").val();
            var is_error = '';
            if (name == "") {
                jQuery('#name_error').html('Please enter name');
                is_error = 'yes';
            }
            if (email == "") {
                jQuery('#email_error').html('Please enter email');
                is_error = 'yes';
            }
            if (mobile == "") {
                jQuery('#mobile_error').html('Please enter mobile');
                is_error = 'yes';
            }
            if (pass == "") {
                jQuery('#pass_error').html('Please enter password');
                is_error = 'yes';
            }
            if (cpass != '') {
                if (cpass !== pass) {
                    jQuery('#cpass_error').html('Password did not match');
                    is_error = 'yes';
                }
            }
            if (is_error == '') {
                jQuery.ajax({
                    url: 'SignUp.php',
                    type: 'post',
                    data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&pass=' + pass,
                    success: function(result) {
                        if (result == 'email') {
                            jQuery('#email_error').html('Email id already present');
                        }
                        if (result == 'insert') {
                            $('form :input').val('');
                            alert('Thank you for registeration.Please Login Once Again To Continue');
                            window.location.href=window.location.href;
                        }
                    }
                });
            }

        }

        function userLogin() {
            jQuery('.field_error').html('');
            var email = jQuery("#login_email").val();
            var password = jQuery("#login_password").val();
            var is_error = '';
            if (email == "") {
                jQuery('#login_email_error').html('Please enter email');
                is_error = 'yes';
            }
            if (password == "") {
                jQuery('#login_password_error').html('Please enter password');
                is_error = 'yes';
            }
            if (is_error == '') {
                jQuery.ajax({
                    url: 'SignIn.php',
                    type: 'post',
                    data: 'email=' + email + '&password=' + password,
                    success: function(result) {
                        if (result == 'wrong') {
                            jQuery('.login_msg').html('Please enter valid login details');
                        }
                        if (result == 'valid') {
                            window.location.href = 'index-0.php';
                        }
                    }
                });
            }
        }

        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>