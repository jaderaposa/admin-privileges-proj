<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =============================================================================================== -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="css/yep.css"> <!-- You can add this line for your custom CSS -->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/bebas-neue" type="text/css"/>
    <!-- =============================================================================================== -->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">


                <form class="login100-form validate-form" method="post" action="functions/signup-logic.php">
                    <span class="login100-form-title" style="padding-bottom: 1rem;">
                        Register Account
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid username is required" style="margin-bottom:0.5rem;">
                        <input class="input100" type="text" name="username" placeholder="Username" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100" style="font-size: x-large;">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz" style="margin-bottom:0.5rem;">
                        <input class="input100" type="email" name="email" placeholder="Email" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100" style="font-size: x-large;">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required" style="margin-bottom:0.5rem;">
                        <input class="input100" type="password" name="password" id="password" placeholder="Password" required>
                        <span toggle="#password" class="eye-icon field-icon toggle-password" style="font-size: x-large;">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                        <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100" style="font-size: x-large;">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Confirm Password is required" style="padding-top: 1rem;">
                        <label for="role"><span style="font-size: larger;">Role</span></label>
                        <div style="display:flex; gap: 5px;justify-content:center;margin-top:0.5rem;margin-bottom:0.5rem;">
                            <input type="radio" name="role" value="user" checked>User
                            <input type="radio" name="role" value="staff">Staff
                            <input type="radio" name="role" value="admin">Admin
                        </div>
                    </div>

                    <div class="container-login100-form-btn" style="margin-top: 1rem;">
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-136" style="padding-top: 2rem;">
                        <a class="txt2" href="login.php" style="text-decoration:none;color:black;">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .limiter {
            height: 100vh;
        }

    </style>

    <script>
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


<!-- <!DOCTYPE html>
<html>
<head>
  <title>Register Account</title>
</head>
<body>
  <h1>Register Account</h1>
  <form action="functions/signup-logic.php" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <label for="confirm_password">Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <label for="role">Role</label>
    <input type="radio" name="role" value="user" checked> User
    <input type="radio" name="role" value="admin"> Admin
    <input type="radio" name="role" value="staff"> Staff

    <button type="submit">Register</button>
  </form>
</body>
</html> -->