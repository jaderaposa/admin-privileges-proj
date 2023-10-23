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
            $loginAttempts = $row['login_attempts'];
            $accountLocked = $row['account_locked'];

            // Check if the account is locked
            if ($accountLocked) {
                // Redirect back to the login page with a message
                header("Location: ../login.php?account_locked=true");
                exit();
            }

            // Verify the entered password
            if (password_verify($password, $hashedPassword)) {
                // Password is correct
                session_start(); // Start a session
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $table; // The table name might be the role
                $_SESSION['email_or_username'] = $email_or_username; // Store the entered email or username in the session

                // Reset the login attempts
                $sql = "UPDATE $table SET login_attempts = 0 WHERE email = ? OR username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $email_or_username, $email_or_username);
                $stmt->execute();

                // Redirect to the welcome page
                header("Location: ../home.php");
                exit();
            } else {
                // Increment the login attempts
                $loginAttempts++;
                $sql = "UPDATE $table SET login_attempts = ? WHERE email = ? OR username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $loginAttempts, $email_or_username, $email_or_username);
                $stmt->execute();

                // Check if the account should be locked
                if ($loginAttempts >= 3) {
                    $sql = "UPDATE $table SET account_locked = 1 WHERE email = ? OR username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $email_or_username, $email_or_username);
                    $stmt->execute();

                    // Redirect back to the login page with a message
                    header("Location: ../login.php?account_locked=true");
                    exit();
                }

                // Store the previously entered value in a session variable
                $_SESSION['previous_input'] = $email_or_username;
                // Redirect back to the login page with a message
                header("Location: ../login.php?invalid_password=true");
                exit();
            }
        }
    }

    // If the loop finishes and no user is found, display an alert
    if (!$userFound) {
        // Display an alert for user not found
        echo "<script>alert('User not found.');</script>";
        // Redirect back to the login page with a message
        echo "<script>window.location.href = '../login.php';</script>";
        exit();
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>