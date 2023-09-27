<?php
session_start();

// Проверяю, авторизован ли пользователь
if (!isset($_SESSION['userLogin'])) {
    header('Location: index.php');
    exit;
}

// Получаю логин пользователя из сессии
$userLogin = $_SESSION['userLogin'];

// Устанавливаю соединение с базой данных
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// SQL-запрос для удаления аккаунта
$deleteAccountSql = "DELETE FROM users WHERE login = '$userLogin'";

if ($conn->query($deleteAccountSql) === TRUE) {
    // Успешно удалено
    echo "success";
} else {
    echo "Ошибка при удалении аккаунта: " . $conn->error;
}

$conn->close();
?>
