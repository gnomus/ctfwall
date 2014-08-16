<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !$_SESSION['loggedin'] || !$_SESSION['isAdmin']) {
        header('Location: http://ctf.gnomus.de/noadmin.php');
    }
?>
