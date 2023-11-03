<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect('db', 'shoo', 'shoo', 'shooshop');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = floatval($_POST['price']);
    $rrp = floatval($_POST['rrp']);
    $quantity = intval($_POST['quantity']);

    $target_dir = "../../cart/imgs/"; // Update the directory path
    $imageFileName = "";

    if (!empty($_FILES["image"]["name"])) {
        $imageFileName = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $imageFileName;
        
        if (getimagesize($_FILES["image"]["tmp_name"])) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        } else {
            echo "Invalid file. Please upload an image.";
        }
    }

    $stmt = $conn->prepare("INSERT INTO `products` (`name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssddis", $name, $description, $price, $rrp, $quantity, $imageFileName);
    
    if ($stmt->execute()) {
        echo "Product added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    mysqli_close($conn);
}
?>
