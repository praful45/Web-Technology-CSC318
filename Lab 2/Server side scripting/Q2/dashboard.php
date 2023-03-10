<?php
session_start();

if(!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['logout'])) {
    session_unset(); // clears all session variables
    session_destroy(); // destroys the session
    header("Location: login.php"); // redirects the user to the login page
    exit;
}
?>

<html>
<head>
    <title>My Dashboard</title>
</head>
<body>
    <h1>Welcome to My Dashboard</h1>
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
