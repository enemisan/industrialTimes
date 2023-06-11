<?php
    session_start();

    // Check if the user is already logged in
    if (isset($_SESSION['user_id'])) {
        // Redirect the user to the protected page
        header("Location: justadmin.php");
        exit;
    }

    // Check if the login form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate the login credentials (you may replace this with your own authentication logic)
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (($username === 'admin' or $username == 'adeolu') && $password === 'password') {
            // Authentication successful, store the user ID in the session
            $_SESSION['user_id'] = 1;

            // Authentication successful, store the admin name in the session
            $_SESSION['username'] = $username;

            // Redirect the user to the protected page
            header("Location: index.php");
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/global/global.css">
    <link rel="stylesheet" href="../assets/global/flex.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Admin</title>
</head>

<body>
    <div class="container" onclick="onclick">
        <div class="top"></div>
        <div class="bottom"></div>
        <form method="POST" class="center">
            <h2>Hello there!</h2>
            <input type="text" placeholder="username" name="username" />
            <input type="password" placeholder="password" name="password" />
            <input type="submit" value="Login" class="submit">
            <h2>&nbsp;</h2>
        </form>
    </div>
</body>

</html>