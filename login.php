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
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/bebas-neue" type="text/css"/>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/prata-regular" type="text/css"/>

    <style>
        .limiter {
            height: 100vh;
        }

        .eye-icon {
            /* position: absolute; */
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .eye-icon i {
            position: relative;
            z-index: 2;
        }

        .eye-icon:before {
            content: '';
            /* position: absolute; */
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 1;
        }

        .eye-icon input[type="password"] {
            padding-right: 30px;
        }

        .eye-icon input[type="password"]:focus {
            padding-right: 30px;
        }
    </style>
</head>

<body>
    <?php
    // Check if there is a message to display
    if (isset($_GET['account_locked'])) {
        echo "<script>alert('Your account has been locked. Please contact support.');</script>";
    } else if (isset($_GET['invalid_password'])) {
        // echo "<script>alert('Invalid email/username or password.');</script>";
    }
    ?>
    <div class="limiter">
        <div class="wrap-login100">

            <form class="login100-form validate-form" method="post" action="functions/login-logic.php">
                <span class="login100-form-title" style="padding-bottom: 1rem;font-size:xx-large;text-transform:uppercase;">
                    Login
                </span>

                <div class="wrap-input100 validate-input" style="margin-bottom: 0.5rem;" data-validate="Valid email/username is required: ex@abc.xyz or username">
                    <input class="input100" type="text" name="email_or_username" placeholder="Email or Username" value="<?php echo isset($_SESSION['previous_input']) ? $_SESSION['previous_input'] : ''; ?>">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100" style="font-size: x-large;">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" id="password" placeholder="Password">
                    <span class="eye-icon toggle-password" style="font-size: x-large;">
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