<?php
$conn = require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_check = $_POST["password_check"];

    // 檢查密碼長度與雙次輸入驗證
    if (mb_strlen($password) <= 6 || $password != $password_check) {
        echo "<script>alert('密碼長度必須大於等於 6 並且密碼必須相同')</script>";
        header("refresh:1;url=register.html");
        exit;
    }

    // 加密密碼
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    //檢查帳號是否重複
    $check = "SELECT * FROM user WHERE name='" . $username . "'";
    if (mysqli_num_rows(mysqli_query($conn, $check)) == 0) {
        $sql = "INSERT INTO user (id,name,password) VALUES(NULL,'" . $username . "','" . $password_hash . "')";

        if (mysqli_query($conn, $sql)) {
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:3;url=index.html");
            exit;
        } else {
            // debug 用
            // echo "Error creating table: " . mysqli_error($conn);
            echo "不明錯誤 , 請聯繫管理員";
        }
    } else {
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        header("refresh:3;url=register.html", true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message)
{

    // Display the alert box
    echo "<script>alert('$message');
     window.location.href='index.html';
    </script>";

    return false;
}
