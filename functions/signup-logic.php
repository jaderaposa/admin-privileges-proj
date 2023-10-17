<?php

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];

    // Check if the password and confirm password match
    if ($password !== $confirm_password) {
        echo '<script>alert("Password and Confirm Password do not match."); window.location = "../signup.php";</script>';
    } else {
        // Check if the user already exists in any of the tables
        $checkQuery = "SELECT * FROM user WHERE username = ? OR email = ? UNION
                      SELECT * FROM staff WHERE username = ? OR email = ? UNION
                      SELECT * FROM admin WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("ssssss", $username, $email, $username, $email, $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo '<script>alert("Username or email already exists in the database. Registration failed."); window.location = "../signup.php";</script>';
        } else {
            // Rest of your code
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
                    echo '<script>alert("Invalid role selection."); window.location = "../signup.php";</script>';
                }

                if (!empty($insertQuery)) {
                    $stmt = $conn->prepare($insertQuery);
                    $stmt->bind_param("sss", $username, $email, $hashedPassword);

                    if ($stmt->execute()) {
                        // Set a session variable to indicate successful registration
                        session_start();
                        $_SESSION['registration_success'] = true;

                        // Display a success message and then redirect to the login page
                        echo '<script>alert("Successfully registered!"); window.location = "../login.php";</script>';
                        exit();
                    } else {
                        echo '<script>alert("Error: ' . $stmt->error . '"); window.location = "../signup.php";</script>';
                    }

                    $stmt->close();
                }
            } else {
                echo '<script>alert("Invalid password: ' . $passwordCheck . '"); window.location = "../signup.php";</script>';
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
