<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Enter Product Names</h1>
    <form method="post" action="">
        <label for="products">Enter a comma-separated list of products:</label><br><br>
        <input type="text" name="products" id="products" style="width: 100%;" placeholder="e.g., Apple, Banana, Orange"><br><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve and sanitize user input
        $input = isset($_POST['products']) ? trim($_POST['products']) : '';

        if (!empty($input)) {
            // Convert the input string into an array and trim whitespace
            $productArray = array_map('trim', explode(',', $input));

            // Remove duplicates within the current input
            $productArray = array_unique($productArray);

            // Sort the array alphabetically
            sort($productArray, SORT_STRING);

            // Display the sorted product list
            echo "<h2>Sorted Product List:</h2>";
            echo "<ul>";
            foreach ($productArray as $product) {
                echo "<li>" . htmlspecialchars($product) . "</li>";
            }
            echo "</ul>";

            // Define the file name
            $filename = "products.txt";

            // Check if the file exists and read existing contents
            $existingProducts = [];
            if (file_exists($filename)) {
                $existingProducts = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            }

            // Merge existing products with the new products, remove duplicates, and sort
            $allProducts = array_unique(array_merge($existingProducts, $productArray));
            sort($allProducts, SORT_STRING);

            // Write the updated list to the file
            file_put_contents($filename, implode(PHP_EOL, $allProducts) . PHP_EOL);

            echo "<p>Products have been written to <strong>$filename</strong>.</p>";
        } else {
            echo "<p style='color: red;'>Please enter some product names!</p>";
        }
    }
    ?>
</body>
</html>
