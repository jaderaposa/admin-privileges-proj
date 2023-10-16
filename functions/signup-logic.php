<?php

include('connection.php');

// Check if the username or email already exists in any of the tables
$checkQuery = "SELECT * FROM user WHERE username = ? OR email = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

$checkQueryStaff = "SELECT * FROM staff WHERE username = ? OR email = ?";
$stmtStaff = $conn->prepare($checkQueryStaff);
$stmtStaff->bind_param("ss", $username, $email);
$stmtStaff->execute();
$resultStaff = $stmtStaff->get_result();

$checkQueryAdmin = "SELECT * FROM admin WHERE username = ? OR email = ?";
$stmtAdmin = $conn->prepare($checkQueryAdmin);
$stmtAdmin->bind_param("ss", $username, $email);
$stmtAdmin->execute();
$resultAdmin = $stmtAdmin->get_result();

if ($result->num_rows > 0 || $resultStaff->num_rows > 0 || $resultAdmin->num_rows > 0) {
    echo "Username or email already exists in the database. Registration failed.";
} else {
    // Function to validate password strength
    function isPasswordStrong($password)
    {
        // Define your password strength criteria
        $length_check = (strlen($password) >= 8);
        $uppercase_check = (preg_match("/[A-Z]+/", $password));
        $lowercase_check = (preg_match("/[a-z]+/", $password));
        $digit_check = (preg_match("/[0-9]+/", $password));

        if (!$length_check) {
            return "Password must be at least 8 characters long.";
        }

        if (!$uppercase_check) {
            return "Password must contain at least one uppercase letter.";
        }

        if (!$lowercase_check) {
            return "Password must contain at least one lowercase letter.";
        }

        if (!$digit_check) {
            return "Password must contain at least one digit.";
        }

        return true;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user inputs
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Check if the username or email already exists in the database
        $checkQuery = "SELECT * FROM $role WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Username or email already exists in the database. Registration failed.";
        } else {
            // Validate password strength
            $passwordCheck = isPasswordStrong($password);
            if ($passwordCheck === true) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert the user data into the respective table based on the role
                $insertQuery = "";

                if ($role === "user") {
                    $insertQuery = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
                } elseif ($role === "admin") {
                    $insertQuery = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
                } elseif ($role === "staff") {
                    $insertQuery = "INSERT INTO staff (username, email, password) VALUES (?, ?, ?)";
                } else {
                    echo "Invalid role selection.";
                }

                if (!empty($insertQuery)) {
                    $stmt = $conn->prepare($insertQuery);
                    $stmt->bind_param("sss", $username, $email, $hashedPassword);

                    if ($stmt->execute()) {
                        // Set a session variable to indicate successful registration
                        session_start();
                        $_SESSION['registration_success'] = true;

                        // Redirect to the login page
                        header("Location: ../login.php");
                        exit();
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                }
            } else {
                echo "Invalid password: " . $passwordCheck;
            }
        }

        // Close the database connection
        $conn->close();
    }
}
