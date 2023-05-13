
<!DOCTYPE html>
<html>
<head>
  <title>Product Details</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <?php
    if ($product) {
      $productPage = new ProductPage($product);
      $productPage->render();
    } else {
      echo "<p>Product not found.</p>";
    }
    ?>
  </div>
</body>
</html>