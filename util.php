<?php

session_start();

function validSession() {
    return (isset($_SESSION['loggedin']) && $_SESSION['loggedin']);
}

function validAdminSession() {
    return validSession() && $_SESSION['isAdmin'];
}

function noSessionRedirect($target) {
    if (!validSession()) {
        header("Location: " + $target);
    }
}

function noAdminSessionRedirect($target) {
    if (!validAdminSession()) {
        header("Location: " + $target);
    }
}

?>
