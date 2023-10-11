<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="css/yep.css">
</head>
<body>

<div class="welcome-message yep">
    <?php
    session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
        $username = $_SESSION['username'];
        $role = $_SESSION['role'];
        echo "Welcome, $username! You are logged in as a $role.";
    } else {
        // Handle the case where the session data is not set.
        echo "Session data not found. Please log in first.";
    }
    ?>
</div>

</body>
</html>
