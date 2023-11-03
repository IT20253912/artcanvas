<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Contact</a>
    </div>

    <h1>Update Product</h1>

    <?php
    // Check if the product ID is provided
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Connect to the database and retrieve the product data by ID
        $conn = mysqli_connect('db', 'shoo', 'shoo', 'shooshop');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Product not found.";
            exit;
        }
        mysqli_close($conn);
    } else {
        echo "Product ID not provided.";
        exit;
    }
    ?>

    <form action="process_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        <label for="description">Product Description:</label>
        <textarea name="description" required><?php echo $row['desc']; ?></textarea><br>
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo $row['price']; ?>" required><br>
        <label for="rrp">RRP:</label>
        <input type="text" name="rrp" value="<?php echo $row['rrp']; ?>"><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" required><br>
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
