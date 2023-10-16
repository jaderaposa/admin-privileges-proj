<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input for email or username
    $email_or_username = $_POST['email_or_username'];
    $password = $_POST['pass'];

    // Create an array of table names to search
    $tables = ['admin', 'staff', 'user'];

    $userFound = false; // Initialize a flag to track if the user is found

    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE email = ? OR username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email_or_username, $email_or_username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $userFound = true; // Set the flag to true
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Verify the entered password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct
                session_start(); // Start a session
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $table; // The table name might be the role

                // Redirect to the welcome page
                header("Location: ../home.php");
                exit();
            } else {
                // Display an alert for invalid password
                echo "<script>alert('Invalid password.');</script>";
                // Redirect back to the login page
                echo "<script>window.location.href = '../login.php';</script>";
                // Set the value of the username input field back to the entered value
                echo "<script>document.querySelector('[name=\"email_or_username\"]').value = '$email_or_username';</script>";

                exit();
            }
        }
    }

    // If the loop finishes and no user is found, display an alert
    if (!$userFound) {
        // Display an alert for user not found
        echo "<script>alert('User not found.');</script>";
        // Redirect back to the login page
        echo "<script>window.location.href = '../login.php';</script>";
        // Set the value of the username input field back to the entered value
        echo "<script>document.querySelector('[name=\"email_or_username\"]').value = '$email_or_username';</script>";
        exit();
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
