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
<header>
    <div class="container">
        <h1>Beauty Care Webshop</h1>
        <nav>
            <ul>
                <li><a href="#">Men Care</a></li>
                <li><a href="#">Women Care</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Sign in</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <section class="hero">
        <div class="container">
            <h2>Find Your Perfect Beauty Products</h2>
            <p>Shop our range of high-quality beauty products that cater to your every need.</p>
            <a href="#" class="btn btn-primary">Shop Now</a>
        </div>
    </section>

    <section class="featured-products">
        <div class="container">
            <h3>Featured Products</h3>
            <div class="products">
                <?php foreach ($featured_products as $product): ?>
                    <div class="product">
                        <img src="<?php echo $product['image']; ?>">
                        <h4><?php echo $product['name']; ?></h4>
                        <p><?php echo '$' . $product['price']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; 2023 Beauty Care Webshop</p>
    </div>
</footer>
</body>
</html>
