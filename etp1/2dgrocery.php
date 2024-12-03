<?php
// Multi-dimensional array to store product details
$products = [
    [
        'name' => 'Laptop',
        'price' => 999.99,
        'stock' => 10
    ],
    [
        'name' => 'Smartphone',
        'price' => 499.99,
        'stock' => 25
    ],
    [
        'name' => 'Tablet',
        'price' => 299.99,
        'stock' => 0
    ],
    [
        'name' => 'Headphones',
        'price' => 89.99,
        'stock' => 50
    ]
];

// Function to list all products
function listProducts($products) {
    echo "Available Products:\n";
    foreach ($products as $product) {
        echo "Name: " . $product['name'] . ", Price: $" . number_format($product['price'], 2) . ", Stock: " . $product['stock'] . "\n";
    }
}

// Function to search for a product by name
function searchProduct($products, $productName) {
    foreach ($products as $product) {
        if (strcasecmp($product['name'], $productName) == 0) {
            return $product;
        }
    }
    return null; // Return null if the product is not found
}

// Display all products
listProducts($products);

// Example of searching for a product
$productToSearch = 'Tablet'; // Change this value to test with different products
$searchedProduct = searchProduct($products, $productToSearch);

if ($searchedProduct) {
    echo "\nProduct Found:\n";
    echo "Name: " . $searchedProduct['name'] . ", Price: $" . number_format($searchedProduct['price'], 2) . ", Stock: " . $searchedProduct['stock'] . "\n";
    
    // Check availability
    if ($searchedProduct['stock'] > 0) {
        echo "Status: Available\n";
    } else {
        echo "Status: Out of Stock\n";
    }
} else {
    echo "\nProduct '$productToSearch' not found.\n";
}
?>