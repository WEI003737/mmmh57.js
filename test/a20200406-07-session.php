<?php
if(! isset($_SESSION)){
    session_start(); //啟動session功能
};

if(isset($_SESSION['myvar'])){
    $_SESSION['myvar']++;
}else {
    $_SESSION['myvar'] = 1;
};
?>