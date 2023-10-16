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
    <link rel="stylesheet" href="css/yep.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="
    height: fit-content;
    align-items: center;
    display: flex;
    justify-content: center;
">
            <div class="wrap-login100">
                <!-- <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="IMG">
                </div> -->

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
                    ?>

                    <!-- Add some space with CSS margin -->
                    <div class="space"></div>

                    <div>
                        <?php
                        if ($role === 'admin') {
                            echo '<table>';
                            echo '
                        <tr>
                            <th>Staffs</th>
                        </tr>';
                            echo '
                        <tr>
                            <td>Maam Janine</td>
                        </tr>
                        <tr>
                            <td>Maam Shaira</td>
                        </tr>
                        <tr>
                            <td>Sir Reilan</td>
                        </tr>
                        ';
                            echo '</table>';
                        }

                        if ($role === 'admin' || $role === 'staff') {
                            echo '<table>';
                            echo '
                        <tr>
                            <th>User</th>
                        </tr>
                        ';
                            echo '
                        <tr>
                            <td>Jade Raposa</td>
                        </tr>
                        <tr>
                            <td>Glaiza Millete</td>
                        </tr>
                        <tr>
                            <td>Richy Rich</td>
                        </tr>
                        ';
                            echo '</table>';
                        }

                        if ($role === 'user') {
                            echo '<p>You cannot use this because you are a student</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="container">
                    <a href="functions/logout.php">
                        <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>Log Out
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            position: absolute;
            display: flex;
            justify-content: end;
            top: 0;
            right: 0;
            margin-right: 1rem;
            margin-top: 1rem;
        }
    </style>


</body>

</html>