<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- =============================================================================================== -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!-- =============================================================================================== -->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">  <!-- You can add this line for your custom CSS -->
    <!-- =============================================================================================== -->
</head>
<style>
.wrap-login100 {
  width: 960px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  padding: 50px;
  padding-top: 60px;
  align-items: center;
}
</style>


<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="functions/signup-logic.php">
                <span class="login100-form-title">
                    Register Account
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid username is required">
                    <input class="input100" type="text" name="username" placeholder="Username" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirm Password is required">
                    <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Confirm Password is required" style="text-align: center;margin-top:2rem;margin-bottom:3rem">
                    <label for="role"><h5 style="font-family: Poppins-Bold;font-size: 24px;color: #333333;line-height: 1.2;text-align: center;margin-bottom:0.5rem">Role</h5></label>
                    <div style="display:flex; gap: 10px;justify-content:center;">
                        <input type="radio" name="role" value="user" checked>User
                        <input type="radio" name="role" value="admin">Admin
                        <input type="radio" name="role" value="staff">Staff
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>

                <div class="text-center p-t-136" style="padding-top: 3rem;">
                    <a class="txt2" href="index.php">
                        <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- =============================================================================================== -->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!-- =============================================================================================== -->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- =============================================================================================== -->
<script src="vendor/select2/select2.min.js"></script>
<!-- =============================================================================================== -->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!-- =============================================================================================== -->
<script src="js/main.js"></script>

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