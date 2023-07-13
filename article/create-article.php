<?php
require_once("../db_connect.php");
$sqlCategory = "SELECT * FROM article_category ORDER BY id ASC";
$resultCate = $conn->query($sqlCategory);
$cateRows = $resultCate->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Create Article</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="py-2">
      <a class="btn btn-warning" href="article-list.php">回文章列表</a>
    </div>
    <form action="doCreate.php" method="post">
      <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Action
        </button>
        <ul class="dropdown-menu">
        <?php foreach ($cateRows as $category) : ?>
          <li><a class="dropdown-item" href="#"><?=$category?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="mb-2">
        <label for="">文章標題</label>
        <input type="text" class="form-control" name="title">
      </div>
      <div class="mb-2">
        <label for="">文章摘要</label>
        <textarea name="abstract" id="" cols="30" rows="10"></textarea>
      </div>
      <div class="mb-2">
        <label for="">文章內容</label>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
      </div>
      <button class="btn btn-info" type="submit">送出</button>
    </form>
  </div>

  <?php include("../js.php") ?>
  <script>

  </script>
</body>

</html>