<?php

class ProductPage {
    private $product;

    public function __construct($product) {
        $this->product = $product;
    }

    public function render() {
        // Output the product information and purchase button
        echo "<h1>" . $this->product->getName() . "</h1>";
        echo "<p>Price: $" . $this->product->getPrice() . "</p>";
        echo "<a href='" . $this->product->getId() . "'>Buy Now</a>";
    }
}