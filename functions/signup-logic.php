<?php

include('connection.php');

// Function to validate password strength
function isPasswordStrong($password) {
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

    // Validate password strength
    $passwordCheck = isPasswordStrong($password);
    if ($passwordCheck === true) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the respective table based on the role
        $sql = "";

        if ($role === "user") {
            $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        } elseif ($role === "admin") {
            $sql = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";
        } elseif ($role === "staff") {
            $sql = "INSERT INTO staff (username, email, password) VALUES (?, ?, ?)";
        } else {
            echo "Invalid role selection.";
        }

        if (!empty($sql)) {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                // Redirect to the index.php file after successful registration
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        echo "Invalid password: " . $passwordCheck;
    }

    // Close the database connection
    $conn->close();
}
?>