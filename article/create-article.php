<!doctype html>
<html lang="en">

<head>
  <title>Create Article</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <div class="py-2">
      <a class="btn btn-warning" href="article-list.php">回文章列表</a>
    </div>
    <form action="doCreate.php" method="post">
        <div class="mb-2">
            <label for="">文章標題</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-2">
            <label for="">文章摘要</label>
            <input type="text" class="form-control" name="abstract">
        </div>
        <div class="mb-2">
            <label for="">文章內容</label>
            <input type="text" class="form-control" name="content">
        </div>
        <button class="btn btn-info" type="submit">送出</button>
    </form>
  </div>
</body>

</html>