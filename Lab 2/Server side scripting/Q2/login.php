<?php
// Start session
session_start();

// Check if user is already logged in
if(isset($_SESSION['email'])) {
    // Redirect to dashboard page
    header("Location: dashboard.php");
    exit();
}

// Check if form is submitted
if(isset($_POST['login'])) {
    // Get user inputs
    $email = $_POST['email'];
    $userpassword = $_POST['password'];

    // Validate inputs
    $errors = array();

    if(empty($email)) {
        $errors[] = "Email is required";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if(empty($userpassword)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, check if user exists in database
    if(empty($errors)) {
        // Connect to database
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "webtechdb";
        $conn = mysqli_connect($host, $username, $password, $database);

        // Check connection
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL statement
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$userpassword'";

        // Execute SQL statement
        $result = mysqli_query($conn, $sql);

        // Check if user exists in database
        if(mysqli_num_rows($result) == 1) {
            // User exists, set session variable and redirect to dashboard page
            $_SESSION['email'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // User does not exist in database
            $errors[] = "Invalid email or password";
        }

        // Close connection
        mysqli_close($conn);
    }

    // Show error messages in red color
    echo '<div style="color:red">';
    foreach($errors as $error) {
        echo $error . "<br>";
    }
    echo '</div>';
}
?>

<!-- HTML form -->
<form method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <input type="submit" name="login" value="Login">
</form>

<style>
div {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
