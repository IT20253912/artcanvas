<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="navbar">
        <a href="../../home">Home</a>
        <a href="#">Products</a>
        <a href="products.php">Manage Products</a>
    </div>
    
    <h1>Add a New Product</h1>
    <form action="insert_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>
        <label for="description">Product Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="price">Price:</label>
        <input type="text" name="price" required><br>
        <label for="rrp">RRP:</label>
        <input type="text" name="rrp"><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" required><br>
        <label for="image">Product Image:</label>
        <input type="file" name="image" accept="image/*" required><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
