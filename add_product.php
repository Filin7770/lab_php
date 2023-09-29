<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $productComposition = $_POST['productComposition'];
    $productWeight = $_POST['productWeight'];
    $productPrice = $_POST['productPrice'];
    $productImageUrl = $_POST['productImageUrl'];

    $conn = new mysqli("localhost", "root", "", "foodstore");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "INSERT INTO products (name, composition, weight, price, image_url) VALUES ('$productName', '$productComposition', '$productWeight', '$productPrice', '$productImageUrl')";

    if ($conn->query($sql) === TRUE) {
        header("Location: catalog.php");
        exit;
    } else {
        echo "Ошибка при добавлении продукта: " . $conn->error;
    }

    $conn->close();
}
?>
