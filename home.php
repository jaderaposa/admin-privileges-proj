<?php
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'user';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome</title>
    <!-- =============================================================================================== -->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- =============================================================================================== -->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div>

                <div class="welcome-message yep">
                    <?php
                    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
                        $username = $_SESSION['username'];
                        $role = $_SESSION['role'];
                        echo "Welcome, <b>$username</b>! You are logged in as a $role.<br>";
    
                    } else {
                        // Handle the case where the session data is not set.
                        echo "Session data not found. Please log in first.";
                    }
                    if ($role === 'admin') {
                        echo '<br><table>';
                        echo '<tr><th>Admin Table 1</th></tr>';
                        // Add table content here for the first admin table
                        echo '<tr><td>Admin Table 1 Data</td></tr>';
                        // Repeat for additional rows
                        echo '</table>';

                        echo '<table>';
                    }

                    if ($role === 'admin' || $role === 'staff') {
                        echo '<table>';
                        echo '<tr><th>Staff Table</th></tr>';
                        // Add table content here for the staff table
                        echo '<tr><td>Staff Table Data</td></tr>';
                        // Repeat for additional rows
                        echo '</table>';
                    }

                    if ($role === 'admin' || $role === 'staff' || $role === 'user') {
                        echo '<table>';
                        echo '<tr><th>User Table</th></tr>';
                        // Add table content here for the user table
                        echo '<tr><td>User Table Data</td></tr>';
                        // Repeat for additional rows
                        echo '</table>';
                    }
                    ?>

                </div>

                <div class="container">
                    <a href="functions/logout.php">
                        <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            position: relative;
            display: flex;
            justify-content: end;
        }
    </style>

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