<?php
session_start();

// Products available (can also be fetched from a database)
$products = [
    1 => ['name' => 'Product A', 'price' => 50],
    2 => ['name' => 'Product B', 'price' => 30],
    3 => ['name' => 'Product C', 'price' => 20],
];

// Initialize cart in session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle Add to Cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['quantity' => 1, 'price' => $products[$productId]['price']];
    } else {
        $_SESSION['cart'][$productId]['quantity'] += 1;
    }
}

// Handle Remove from Cart
if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['product_id'];
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

// Calculate Total Cost
$totalCost = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalCost += $item['quantity'] * $item['price'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Shopping Cart</h1>

    <h2>Available Products</h2>
    <form method="post" action="">
        <?php foreach ($products as $id => $product): ?>
            <div>
                <strong><?php echo $product['name']; ?></strong> - $<?php echo $product['price']; ?>
                <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </div>
        <?php endforeach; ?>
    </form>

    <h2>Your Cart</h2>
    <?php if (!empty($_SESSION['cart'])): ?>
        <table border="1">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $productId => $cartItem): ?>
                <tr>
                    <td><?php echo $products[$productId]['name']; ?></td>
                    <td><?php echo $cartItem['price']; ?></td>
                    <td><?php echo $cartItem['quantity']; ?></td>
                    <td><?php echo $cartItem['quantity'] * $cartItem['price']; ?></td>
                    <td>
                        <form method="post" action="" style="display:inline;">
                            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                            <button type="submit" name="remove_from_cart">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <h3>Total Cost: $<?php echo $totalCost; ?></h3>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</body>
</html>
