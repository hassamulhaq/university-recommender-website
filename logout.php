<?php
session_start();

if (isset($_SESSION['user_session'])) {
    unset($_SESSION['user_session']);
    session_destroy();
    header("Location: login.php");
} else {
    header('Location: index.php');
}


