<?php
require_once("../db_connect.php");
$sql = "SELECT article.id, article.title, article.abstract, article.published_date, article.created_date, article_category.name 
FROM article
JOIN article_category ON article.category = article_category.id";
;
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
// $article_count = $result->num_rows;

?>


<!doctype html>
<html lang="en">

<head>
    <title>Article List</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="nav py-5">
            <h1>文章列表頁</h1>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>文章編號</th>
                    <th>文章類別</th>
                    <th>文章標題</th>
                    <th>文章摘要</th>
                    <th>發佈時間</th>
                    <th>建立時間</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["title"] ?></td>
                        <td><?= $row["abstract"] ?></td>
                        <td><?= $row["published_date"] ?></td>
                        <td><?= $row["created_date"] ?></td>
                        <td><a href="article.php?id=<?= $row["id"] ?>" class="btn btn-info">編輯</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>