<?php
    session_start();
    session_destroy();

    header('Location: http://ctf.gnomus.de/');
?>
