<?php 
    session_start();
    require_once "db_connect.php";
    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $pwd = trim($_POST['pwd']);
        $stmt = $db->prepare('SELECT pwd FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $stored = $stmt->fetchColumn();
        if (password_verify($pwd, $stored)) {
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['authorized'] = TRUE;
            header('Location: main.php');
            exit;
        } else {
            $error = 'Login failed. Check username and password.';
        }
    }
    
?> 


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Auto Login</title>
</head>

<body>
<h1>Music App login</h1>

<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
    </p>
    <p>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me </label>
    </p>
    <p>
        <input type="submit" name="login" id="login" value="Log In">
    </p>
</form>

<form action="register.php" method="post">
    <p>
        <input type="submit" name="login" id="login" value="Create an Account">
    </p>
</form>

</body>
</html>