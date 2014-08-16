<?php
    require('util.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && validSession()) {

        $name = $_POST['name'];

        $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
	$query = mysqli_prepare($db, 'INSERT INTO categories (name) VALUES (?)');
	mysqli_stmt_bind_param($query, 's', $name); 
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        mysqli_close($db);
    }
    header('Location: http://ctf.gnomus.de/');
?>
