<?php
session_start();

// Проверьте, авторизован ли пользователь
if (!isset($_SESSION['userLogin'])) {
    // Если пользователь не авторизован, перенаправьте его на страницу авторизации или другую страницу по вашему выбору
    header('Location: index.php');
    exit;
}

// Получите логин пользователя из сессии
$userLogin = $_SESSION['userLogin'];
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Подготавливаем SQL-запрос для получения пароля пользователя
$getPasswordSql = "SELECT pass FROM users WHERE login = '$userLogin'";
$result = $conn->query($getPasswordSql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userPassword = $row['pass'];
} else {
    // Пользователь не найден
    $userPassword = "Пароль не найден";
}

// Закрываем соединение с базой данных
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");
</style>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1e25c286d4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/profile.css" />
    <title>Food Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light text-white">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="index.php">Food Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 top-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Каталог
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Еда</a></li>
                            <li><a class="dropdown-item" href="#">Напитки</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Продукты в наличии</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="container quantity ">
                                <?php include('search.php'); ?>
                                <p class="quantity__users " style="color: black;">Количество зарегистрированных пользователей:<span class="number" style="color: black;"><?php echo $userCount; ?></span></p>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal-login">
                                <i class="fa-regular fa-user"></i></a>
                            <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary bg-gradient text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Авторизация</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Вход</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="register-tab" data-bs-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Регистрация</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabsContent">
                                                <!-- Вкладка Вход -->
                                                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                                                    <form method="post" action="search.php">
                                                        <div class="mb-3">
                                                            <label for="login" class="form-label">Логин</label>
                                                            <input type="text" class="form-control" id="login" name="login" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="password" class="form-label">Пароль</label>
                                                            <input type="password" class="form-control" id="password" name="password" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Войти</button>
                                                    </form>
                                                </div>
                                                <!-- Вкладка Регистрация -->
                                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                                    <form method="post" action="search.php">
                                                        <div class="mb-3">
                                                            <label for="newUsername" class="form-label">Новый логин</label>
                                                            <input type="text" class="form-control" id="newUsername" name="newUsername" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="newPassword" class="form-label">Новый пароль</label>
                                                            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <section class="main_content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Личный кабинет</h1>
                <p>Ваш логин: <?php echo $userLogin; ?></p>
                <p>Ваш пароль: <?php echo $userPassword; ?></p>
                <!-- Форма для изменения пароля -->
                <form action="user.php" method="post">
                    <div class="form-group">
                        <label for="newPassword">Новый пароль</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Подтверждение нового пароля</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить пароль</button>
                </form>
                <!-- Кнопка для удаления аккаунта -->
                <button class="btn btn-danger" onclick="confirmDelete()">Удалить аккаунт</button>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript для подтверждения удаления аккаунта -->
<script>
    function confirmDelete() {
        if (confirm("Вы уверены, что хотите удалить аккаунт?")) {
            // Перенаправьте пользователя на страницу удаления аккаунта
            window.location.href = "delete_account.php";
        }
    }
</script>

    <footer>
        <section class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6 mt-3">
                        <h4 class="my-custom-font-size">Информация</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Главная</a></li>
                            <li><a href="#">О магазине</a></li>
                            <li><a href="#">Оплата и доставка</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-6 mt-3">
                        <h4 class="my-custom-font-size">Время работы</h4>
                        <ul class="list-unstyled">
                            <li>г. Москва, пр. Ленина д.20</li>
                            <li>24/7</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <h4 class="my-custom-font-size">Контакты</h4>
                        <ul class="list-unstyled">
                            <li><a href="tel:89150435568">89150435568</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-6 mt-3">
                        <h4 class="my-custom-font-size">Мы в сети</h4>
                        <div class="footer-icon">
                            <a href="#"><i class="fab fa-vk"></i></a>
                            <a href="#"><i class="fab fa-telegram"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>