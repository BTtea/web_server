<?php
// Initialize the session
session_start();

// 如果直接連線到 index.php 便導向到 index.html
if(!isset($_SESSION["loggedin"])){
    header("refresh:1;url=index.html");
}

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
