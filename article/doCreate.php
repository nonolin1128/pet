<?php

if(!isset($_POST["name"])){
    die("請依正常管道到此頁");
}

require_once("../db_connect.php");

$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$now=date('Y-m-d H:i:s');

// echo "$name, $phone, $email";
$sql="INSERT INTO users (name, phone, email, created_at) VALUES ('$name', '$phone', '$email', '$now')";

// echo $sql;


if ($conn->query($sql) === TRUE) {

    $latestId=$conn->insert_id;
    echo "資料表 users 新增資料完成, id 為 $latestId";
    header("location: user-list.php");

} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();