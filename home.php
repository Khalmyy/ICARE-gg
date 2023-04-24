<?php
// Database connection
$mysqli = new mysqli("localhost", "root", "", "beauty_care");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch products from the database
$product_query = "SELECT * FROM products";
$product_result = $mysqli->query($product_query);

// Fetch services from the database
$service_query = "SELECT * FROM services";
$service_result = $mysqli->query($service_query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Beauty & Care</title>
    <link rel="stylesheet" href="style.css"> <!-- Replace with your CSS file path -->
</head>
<body>
<h1>Products</h1>
<div class="product-container">
    <?php
    // Loop through products and display them
    while ($product_row = $product_result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $product_row["image"] . '" alt="' . $product_row["name"] . '">';
        echo '<h2>' . $product_row["name"] . '</h2>';
        echo '<p>' . $product_row["description"] . '</p>';
        echo '<p>Price: $' . $product_row["price"] . '</p>';
        echo '</div>';
    }
    ?>
</div>

<h1>Services</h1>
<div class="service-container">
    <?php
    // Loop through services and display them
    while ($service_row = $service_result->fetch_assoc()) {
        echo '<div class="service">';
        echo '<img src="' . $service_row["image"] . '" alt="' . $service_row["name"] . '">';
        echo '<h2>' . $service_row["name"] . '</h2>';
        echo '<p>' . $service_row["description"] . '</p>';
        echo '<p>Price: $' . $service_row["price"] . '</p>';
        echo '</div>';
    }
    ?>
</div>
</body>
</html>
