<?php
// Connect to the database using PDO
$servername = "localhost";
$username = "root";
$dbname = "I_care";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Retrieve the featured products from the database
$sql = "SELECT * FROM products WHERE featured = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$featured_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Beauty Care Webshop</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require "navbar.php"
?>

<body>
<div class="container">
    <h1>Welcome to our Webshop</h1>
    <div class="product-list">
        <?php
        foreach ($products as $product) {
            $productPage = new ProductPage($product);
            echo "<div class='product-item'>";
            echo "<a href='product.php?productId=" . $product->getId() . "'>";
            echo $productPage->render();
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>