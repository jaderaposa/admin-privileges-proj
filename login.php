<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =============================================================================================== -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="css/yep.css">
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="limiter">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="post" action="functions/login-logic.php">
                <span class="login100-form-title" style="padding-bottom: 1rem;font-size:large;text-transform:uppercase;">
                    Login
                </span>

                <div class="wrap-input100 validate-input" style="margin-bottom: 0.5rem;" data-validate="Valid email/username is required: ex@abc.xyz or username">
                    <input class="input100" type="text" name="email_or_username" placeholder="Email or Username" value="<?php echo isset($_SESSION['previous_input']) ? $_SESSION['previous_input'] : ''; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" id="password" placeholder="Password">
                    <span toggle="#password" class="eye-icon field-icon toggle-password">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn" style="padding-top: 1rem;">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>

                <div class="text-center" style="margin-top: 2rem;">
                    <a class="txt2" href="signup.php" style="text-decoration: none; color:black">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .limiter {
            height: 100vh;
        }
    </style>

    <script>
        // Check if the URL has a query parameter for an invalid password
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('invalid_password')) {
            alert('Invalid password.');
            // Populate the email/username field with the previous input
            const previousInput = '<?php echo isset($_SESSION['previous_input']) ? $_SESSION['previous_input'] : ''; ?>';
            document.querySelector('input[name="email_or_username"]').value = previousInput;
        }

        // Clear the session variable to avoid showing the value on successful login or other pages
        <?php
        if (isset($_SESSION['previous_input'])) {
            unset($_SESSION['previous_input']);
        }
        ?>

        // JavaScript to toggle password visibility
        const passwordInput = document.querySelector('#password');
        const togglePassword = document.querySelector('.toggle-password');
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePassword.querySelector('i').classList.toggle('fa-eye');
            togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
        });
    </script>



</body>

</html>