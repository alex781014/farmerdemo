<?php

$db_host = 'localhost'; // 主機名稱
$db_user = 'root'; // 資料庫連線的用戶
$db_pass = ''; // 連線用戶的密碼
$db_name = 'farmer26';  // 資料庫名稱

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8mb4";


//設定
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  //ERRMODE_EXCEPTION 可以用tyr/catch除錯
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //單一筆資料會變關聯式陣列 //沒設定這個會給兩組 一個關聯式陣列(一般用這個) 另一個 索引式陣列  但可以自己決定
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    //utf8 可以直接寫死 記得NAMES 要加S
];


try {
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} catch (PDOException $ex) {  //前面規定要先告類型 $ex是自己決定
    // -> 相當於JS的 . 
    echo $ex->getMessage();
}
