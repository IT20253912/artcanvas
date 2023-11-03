<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Connect to the database
    $conn = mysqli_connect('db', 'shoo', 'shoo', 'shooshop');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Remove the product by ID
    $sql = "DELETE FROM products WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Product removed successfully. <a href='products.php'>Back to Products</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Product ID not provided.";
}
?>
