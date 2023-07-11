<?php
require_once("../db_connect.php");

$sql="SELECT * FROM product ORDER BY id ASC";
$result=$conn->query($sql);
$products=$result->fetch_all(MYSQLI_ASSOC);


$sqlImages="SELECT * FROM product_images ORDER BY id DESC";
$resultImages=$conn->query($sqlImages);
$productImages=$resultImages->fetch_all(MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
  <title>Product Picture</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php include("../css.php") ?>


</head>

<body>
  <div class="container">
    <form action="doUpload.php" method="post" enctype="multipart/form-data">
        <div class="mb-2">
            <label for="">選擇產品</label>
            <select class="form-select" name="product_id" id="">
                <?php foreach($products as $product): ?>
                <option value="<?=$product["id"]?>"><?=$product["name"]?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-2">
            <label for="">選取圖片</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button class="btn btn-info" type="submit">送出</button>
    </form>
    <div class="py-3">
      <div class="row g-3">
        <?php foreach($productImages as $image): ?>
        <div class="col-lg-3 col-md-4 col-6">
          <div class="ratio ratio-1x1">
            <img class="object-fit-cover" src="/images/<?=$image["name"]?>" alt="">
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>