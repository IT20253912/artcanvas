<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <link rel="stylesheet" type="text/css" href="styletable.css">
</head>
<body>
    <div class="navbar">
        <a href="../../home">Home</a>
        <a href="#">Products</a>
        <a href="insert.php">Insert</a>
    </div>

    <h1>Product Management</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
           
            <th>Actions</th>
        </tr>
        <?php
        // Connect to the database and retrieve product data
        $conn = mysqli_connect('db', 'shoo', 'shoo', 'shooshop');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['desc'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";

                echo "<td>| <a href='remove_product.php?id=" . $row['id'] . "'>Remove</a></td>";
                echo "</tr>";
            }
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
