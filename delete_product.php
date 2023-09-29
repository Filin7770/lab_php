<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new mysqli("localhost", "root", "", "foodstore");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    if (isset($_POST['deleteProductId'])) {
        $productId = $_POST['deleteProductId'];

        // SQL-запрос для удаления продукта по его ID
        $sql = "DELETE FROM products WHERE id = $productId";

        if ($conn->query($sql) === TRUE) {
            header("Location: catalog.php");
        exit;
        } else {
            echo "Ошибка при удалении продукта: " . $conn->error;
        }
    }

    $conn->close();
}

?>