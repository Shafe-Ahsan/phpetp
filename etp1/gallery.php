<?php
// Start session for potential error messages
session_start();

// Directory to store uploaded images
$uploadDir = "uploads/";

// Ensure the uploads directory exists


// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];

        // File properties
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Allowed file types and size
        $allowedExtensions = ['jpeg', 'jpg', 'png', 'gif'];
        $maxFileSize = 3 * 1024 * 1024; // 3MB

        // Validate file type
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExt, $allowedExtensions)) {
            $_SESSION['error'] = "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
        } elseif ($fileSize > $maxFileSize) {
            $_SESSION['error'] = "File size exceeds 3MB.";
        } elseif ($fileError !== 0) {
            $_SESSION['error'] = "An error occurred while uploading the file.";
        } else {
            // Generate a unique name for the file and move it to the uploads directory
            $newFileName = uniqid('', true) . '.' . $fileExt;
            $fileDestination = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                $_SESSION['success'] = "Image uploaded successfully.";
            } else {
                $_SESSION['error'] = "Failed to move the uploaded file.";
            }
        }
    }
}

// Fetch images from the uploads directory
$images = array_diff(scandir($uploadDir), ['.', '..']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .gallery img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .message {
            margin-bottom: 20px;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
        .error {
            background-color: #f44336;
        }
        .success {
            background-color: #4caf50;
        }
    </style>
</head>
<body>
    <h1>Image Gallery</h1>

    <!-- Display messages -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php elseif (isset($_SESSION['success'])): ?>
        <div class="message success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <!-- Upload form -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Select an image to upload (JPEG, PNG, GIF):</label><br><br>
        <input type="file" name="image" id="image" accept="image/jpeg, image/png, image/gif" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>

    <!-- Display uploaded images -->
    <h2>Uploaded Images</h2>
    <div class="gallery">
        <?php if (count($images) > 0): ?>
            <?php foreach ($images as $image): ?>
                <img src="<?php echo $uploadDir . $image; ?>" alt="Uploaded Image">
            <?php endforeach; ?>
        <?php else: ?>
            <p>No images uploaded yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>
