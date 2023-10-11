<?php
include 'connection.php';

if (isset($_POST['submit'])) { // Check if the form has been submitted

    // Get user input from the form and sanitize it
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $role = $conn->real_escape_string($_POST['role']); // Role selection

    // Determine the table based on the selected role
    $table_name = '';

    switch ($role) {
        case 'student':
            $table_name = 'students';
            break;
        case 'admin':
            $table_name = 'admin';
            break;
        case 'professor':
            $table_name = 'professors';
            break;
        default:
            // Handle other roles or set a default table name as needed
            break;
    }

    // Check if the provided role and table name are valid
    if (!empty($table_name)) {
        // Prepare and execute the SQL query (replace with prepared statements for security)
        $sql = "INSERT INTO $table_name (email, password) VALUES ('$email', '$password')";

        if ($conn->query($sql) === true) {
            echo "Registration successful!";
            header("Location: ../signup.php");
            exit; // Terminate the script to prevent further execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid role selected or missing table name.";
    }
} else {
    echo "Form not submitted.";
}

// Close the database connection
$conn->close();
?>
