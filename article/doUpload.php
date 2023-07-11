<?php

require_once("../db_connect.php");

$product_id = $_POST["product_id"];
// echo $product_id;

if ($_FILES["file"]["error"] == 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"])) {

        $filename = $_FILES["file"]["name"];
        echo "上傳成功, 檔名為" . $filename;

        $sql = "INSERT INTO product_images (product_id, name) VALUES ('$product_id', '$filename')";

        // echo $sql;


        if ($conn->query($sql) === TRUE) {

            $latestId = $conn->insert_id;
            echo "資料表 users 新增資料完成, id 為 $latestId";
            header("location: product-picture.php");

        } else {
            echo "新增資料錯誤: " . $conn->error;
        }
    } else {
        echo "上傳失敗";
    }
} else {
    var_dump($_FILES["file"]["error"]);
}
