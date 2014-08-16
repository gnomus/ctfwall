<?php
    require('lib/password.php');
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password != $password2) {
            echo ("Passwords differ");
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
	    $query = mysqli_prepare($db, 'INSERT INTO users (username,password,isAdmin) VALUES (?,?,0)');
	    mysqli_stmt_bind_param($query, 'ss', $username, $hash); 
            mysqli_stmt_execute($query);
            mysqli_stmt_close($query);
            mysqli_close($db);
            header('Location: http://ctf.gnomus.de/');
        }
    }
?>
<form method="POST">
    <input name="username">
    <input type="password" name="password">
    <input type="password" name="password2">
    <input type="submit" value="Register">
</form>
