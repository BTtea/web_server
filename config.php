<?php
// 控制錯誤訊息
ini_set('display_errors', 'on');

define("DB_SERVER", "127.0.0.1");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "web_data");

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    mysqli_query($link, "SET NAMES utf8");
    return $link;
}
