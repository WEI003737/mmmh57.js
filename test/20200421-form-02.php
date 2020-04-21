<?php
//$user_post = array(
//    'email' => $_POST['email'],
//    'password' => $_POST['password']
//);
$user_get = array(
    'email' => $_GET['email'],
    'password' => $_GET['password']
);

//echo print_r($user_post);
echo print_r($user_get);

?>