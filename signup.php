<?php
    include 'functions/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<form action="functions/signup_function.php" method="POST" style="border: 1px solid #ccc; max-width: 300px; margin: 0 auto;">
    <div style="padding: 20px;">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <!-- Input fields with labels and placeholders -->
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <!-- Role selection using radio buttons (example) -->
        <p>Select your role:</p>
        <input type="radio" name="role" value="student" required> Student
        <input type="radio" name="role" value="admin"> Admin
        <input type="radio" name="role" value="professor"> Professor

        <!-- Terms and conditions link -->
        <p>By creating an account, you agree to our <a href="#" style="color: dodgerblue">Terms & Privacy</a>.</p>

        <!-- Form submission buttons -->
        <div style="text-align: right;">
            <button type="reset" class="cancelbtn">Cancel</button>
            <button type="submit" class="signupbtn" name="submit">Sign Up</button>
        </div>
    </div>
</form>
</body>
</html>
