<?php
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

session_start();

// Проверяю, авторизован ли пользователь
if (!isset($_SESSION['userLogin'])) {
    header('Location: index.php');
    exit;
}

// Получаю логин пользователя из сессии
$userLogin = $_SESSION['userLogin'];

// Переменная для отслеживания успешного изменения пароля
$passwordChanged = false;

// Если данные были отправлены методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword'];

    // Защита от SQL-инъекций
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    $updateSql = "UPDATE users SET pass = ? WHERE login = ?";

    // Создаю подготовленное выражение
    if ($stmt = $conn->prepare($updateSql)) {
        // Привязываю параметры
        $stmt->bind_param("ss", $newPassword, $userLogin);

        // Выполняю подготовленный запрос
        if ($stmt->execute()) {
            $passwordChanged = true;
        } else {
            echo "Ошибка при изменении пароля: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Ошибка при подготовке запроса: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <?php if ($passwordChanged) { ?>
        <p>Пароль успешно изменён!</p>
    <button onclick="history.go(-1);">Назад</button>
    <?php } ?>
</body>
</html>
