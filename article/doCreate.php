<?php

if(!isset($_POST["title"])){
    die("請依正常管道到此頁");
}

require_once("../db_connect.php");

$title=$_POST["title"];
$abstract=$_POST["abstract"];
$content=$_POST["content"];
$category=$_POST["category"];
$now=date('Y-m-d H:i:s');
$valid = 1;
$sql="INSERT INTO article (title, abstract, content, category, created_date, valid) VALUES ('$title', '$abstract', '$content','$category', '$now','$valid')";

// echo $sql;


if ($conn->query($sql) === TRUE) {

    $latestId=$conn->insert_id;
    echo "文章新增完成, 文章編號為 $latestId";
    header("location: article-list.php");

} else {
    echo "新增文章錯誤: " . $conn->error;
}

$conn->close();