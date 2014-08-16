<?php
    require('util.php');
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && validAdminSession()) {

        $id = $_GET['id'];
        
        $db = mysqli_connect('localhost','ctfdash','ctfdash','ctfdash');
	$query = mysqli_prepare($db, 'DELETE FROM categories WHERE id=?');
	mysqli_stmt_bind_param($query, 'i', $id); 
        mysqli_stmt_execute($query);
        mysqli_stmt_close($query);
        mysqli_close($db);
    }
    header('Location: http://ctf.gnomus.de/');
?>
