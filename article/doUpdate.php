<?php

$id=$_POST["id"];
$title=$_POST["title"];
$abstract=$_POST["abstract"];
$content=$_POST["content"];

require_once("../db_connect.php");

$sql="UPDATE article SET title='$title', abstract='$abstract', content='$content' WHERE id=$id";

if ($conn->query($sql) === TRUE) {

    header("location: article-edit.php?id=".$id);

} else {
    echo "修改文章失敗: " . $conn->error;
}
