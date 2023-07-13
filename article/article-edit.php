<?php
if (!isset($_GET["id"])) {
    header("location: ../404.php");
}
$id = $_GET["id"];

require_once("../db_connect.php");
$sql = "SELECT * FROM article WHERE id = $id ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqlImages = "SELECT * FROM article_images 
WHERE article_id = '$id'
ORDER BY id DESC";
$resultImages = $conn->query($sqlImages);
$articleImages = $resultImages->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Aticle Edit</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .height200 {
            height: 200px;
        }

        .height500 {
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">訊息</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    確認刪除?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <a href="doDelete.php?id=<?= $id ?>" class="btn btn-danger">確認</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1 class="pt-5">文章修改頁</h1>
        <div class="nav py-4">
            <a class="btn btn-warning" href="article-list.php">回文章列表</a>
        </div>
        <form class="py-5" action="doUpdate.php" method="post" enctype="multipart/form-data">
            <table class="table table-bordered ">
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <tr>
                    <th>文章標題</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["title"] ?>" name="title">
                    </td>
                </tr>
                <tr>
                    <th>文章首圖</th>
                    <td>
                        <img src="../article_images/<?= $articleImages["img"] ?>" alt="">
                        <input type="file" name="image" class="form-control" required>
                    </td>
                </tr>
                <tr>
                    <th>文章摘要</th>
                    <td>
                        <textarea type="text" class="form-control height200" name="abstract"><?= $row["abstract"] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>文章內容</th>
                    <td>
                        <textarea type="text" class="form-control height500" name="content"><?= $row["content"] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th>建立時間</th>
                    <td><?= $row["created_date"] ?></td>
                </tr>
            </table>
            <div class="py-2 d-flex justify-content-between">
                <div>
                    <button class="btn btn-warning" type="submit" href="">儲存</button>
                    <a class="btn btn-warning" href="article.php?id=<?= $row["id"] ?>">取消</a>
                </div>
                <button action="doDelete.php" class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">刪除</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>