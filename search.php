<?php
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_text'];

    $sql = "SELECT * FROM products WHERE name_of_product LIKE '%$search_query%' OR composition LIKE '%$search_query%'";

    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['name_of_product'] . "</h2>";
            echo "<p>Состав: " . $row['composition'] . "</p>";
        }
        $result->free();
    } else {
        echo "Ошибка запроса: " . $conn->error;
    }
}

if (isset($_POST['newUsername'], $_POST['newPassword'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    $sql = "INSERT INTO `users` (login, pass) VALUES ('$newUsername', '$newPassword')";

    $conn->query($sql);
}

if (isset($_POST['login'], $_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        echo "Заполните все поля";
    } else {
        $sql = "SELECT * FROM `users` WHERE login = '$login' AND pass = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Добро пожаловать, " . $row['login'];
            }
            exit(); // Останавливаем скрипт после успешной авторизации
        } else {
            echo "Нет такого пользователя";
        }
    }
}

$conn->close();
?>
