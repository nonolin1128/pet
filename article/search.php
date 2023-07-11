<?php

if (isset($_GET["name"])) {
    $name = $_GET["name"];

    require_once("../db_connect.php");

    $sql = "SELECT id, name, phone, email FROM users WHERE name LIKE '%$name%' AND valid=1";
    $result = $conn->query($sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $user_count = $result->num_rows;
}else{
    $user_count=0;
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Search</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-2">
            <a class="btn btn-info" href="user-list.php">回使用者列表</a>
        </div>
        <div class="py-2">
            <form action="search.php">
                <div class="row gx-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="搜尋使用者" name="name">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-info" type="submit">搜尋</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="py-2 d-flex justify-content-between align-items-center">
            <?php if(isset($_GET["name"])): ?>
            <div>
                搜尋 <?=$name?> 的結果, 共有 <?= $user_count ?> 筆符合的資料
            </div>
            <?php endif; ?>
        </div>
        <?php if ($user_count != 0) : ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>名稱</th>
                        <th>電話</th>
                        <th>email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["phone"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td>
                                <a href="user.php?id=<?= $row["id"] ?>" class="btn btn-info">顯示</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>