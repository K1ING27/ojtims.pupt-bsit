<?php
// Retrieve the email query parameter from the URL
$email = $_GET['email'];
// You can now use the '$email' variable in your PHP code as needed.
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css') }}">
    <link rel="stylesheet" href="/frontend/css/custom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJTIMS-PUPT</title>
    <link rel="shortcut icon" href="/images/final-puptg_logo-ojtims_nbg.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-cCXd5x7ZjD7bBOV8i6IVqo10Q1EBIvZvzFH+b6ScQQ5/BQO8Y05fMT6QRK+4+PJr8noY5dFNYvJnBQb9abXr+g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="card">
        <img src="/images/final-puptg_logo-ojtims_nbg.png">
        <br>

        <div class="container">
            <div class="row">
                <h2>ON-THE-JOB TRAINING <br> INFORMATION MANAGEMENT SYSTEM</h2>
                <h4>Reset Password</h4>
                <form action="{{ url('/reset-password') }}?email={{ $email }}" method="post">

                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <!-- Remove the email input field and its label -->
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter New Password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm New Password" name="confirm_password" id="confirm_password">
                        <div id="passwordMatchMessage"></div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Reset</button>
                    </div>
                    <br>
                    <a href="/auth/studentlogin" style="text-decoration: none; color: maroon;">Login Here...</a>
                </form>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>


<script>
    // Function to get the email query parameter from the URL
    function getEmailQueryParam() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.get('email');
    }

    // Get the email value and store it in a variable
    const email = getEmailQueryParam();
    // You can now use the 'email' variable in your JavaScript code as needed.
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordMatchMessage = document.getElementById('passwordMatchMessage');

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (password.length >= 8 && confirmPassword.length >= 8 && password === confirmPassword && password !== '' && confirmPassword !== '') {
                passwordMatchMessage.innerHTML = '<span style="color: green;">Passwords match and meet minimum length requirement</span>';
            } else if (password.length >= 8 && confirmPassword.length >= 8) {
                passwordMatchMessage.innerHTML = '<span style="color: red;">Passwords do not match</span>';
            } else {
                passwordMatchMessage.innerHTML = '<span style="color: red;">Password length must be at least 12 characters</span>';
            }
        }

        function limitInputLength(input, maxLength) {
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength); // Truncate input to maxLength characters
            }
        }

        passwordInput.addEventListener('input', function(event) {
            limitInputLength(passwordInput, 8);
            checkPasswordMatch();
        });

        confirmPasswordInput.addEventListener('input', function(event) {
            limitInputLength(confirmPasswordInput, 8);
            checkPasswordMatch();
        });

        // Prevent typing after reaching 12 characters
        passwordInput.addEventListener('keydown', function(event) {
            if (passwordInput.value.length >= 8 && event.key !== 'Backspace') {
                event.preventDefault(); // Prevent further key presses
            }
        });

        confirmPasswordInput.addEventListener('keydown', function(event) {
            if (confirmPasswordInput.value.length >= 8 && event.key !== 'Backspace') {
                event.preventDefault(); // Prevent further key presses
            }
        });
    });
</script>



