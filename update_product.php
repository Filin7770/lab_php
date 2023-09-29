<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "foodstore");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    if (isset($_POST['editProductId'])) {
        $productId = $_POST['editProductId'];
        $productName = $_POST['editProductName'];
        $productComposition = $_POST['editProductComposition'];
        $productWeight = $_POST['editProductWeight'];
        $productPrice = $_POST['editProductPrice'];
        $productImageUrl = $_POST['editProductImageUrl'];

        $sql = "UPDATE products SET name = '$productName', composition = '$productComposition', weight = '$productWeight', price = '$productPrice', image_url = '$productImageUrl' WHERE id = $productId";

        if ($conn->query($sql) === TRUE) {
            header("Location: catalog.php");
        exit;
        } else {
            echo "Ошибка при редактировании продукта: " . $conn->error;
        }
    }

    $conn->close();
}
