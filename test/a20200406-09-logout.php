<?php
    session_start();
    unset($_SESSION['loginUser']);
    header('Location: a20200406-08-login.php');
?>