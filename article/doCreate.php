<?php

if(!isset($_POST["name"])){
    die("請依正常管道到此頁");
}

require_once("../db_connect.php");

$title=$_POST["title"];
$abstract=$_POST["abstract"];
$content=$_POST["content"];
$category=$_POST["category"];
$now=date('Y-m-d H:i:s');
$published_date=$_POST["published_date"];

// echo "$name, $phone, $email";
$sql="INSERT INTO article (title, abstract, content, category, created_date, published_date) VALUES ('$title', '$abstract', '$content','$category', '$now', '$published_date')";

// echo $sql;


if ($conn->query($sql) === TRUE) {

    $latestId=$conn->insert_id;
    echo "文章新增完成, 文章編號為 $latestId";
    header("location: article-list.php");

} else {
    echo "新增文章錯誤: " . $conn->error;
}

$conn->close();