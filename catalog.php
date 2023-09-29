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
    <link rel="stylesheet" href="./css/catalog.css" />
    <title>Food Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #D9D9D9;">
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
                            <li><a class="dropdown-item" href="./catalog.php">Продукты в наличии</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Контакты</a>
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
    <section class=" content mb-5">
        <div class="container mt-5">
            <h3 class="text-center mb-4">Продукты в наличии</h3>
            <div class="container text-center mb-4">
                <button class="btn btn-success " data-bs-toggle="modal" data-bs-target="#addProductModal">Добавить продукт</button>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal">Редактировать продукт</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProductModal">Удалить продукт</button>
            </div>
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Добавить продукт</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Форма для добавления продукта -->
                            <form method="post" action="add_product.php">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Название продукта</label>
                                    <input type="text" class="form-control" id="productName" name="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productComposition" class="form-label">Состав</label>
                                    <input type="text" class="form-control" id="productComposition" name="productComposition" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productWeight" class="form-label">Вес</label>
                                    <input type="text" class="form-control" id="productWeight" name="productWeight" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Цена</label>
                                    <input type="text" class="form-control" id="productPrice" name="productPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productImageUrl" class="form-label">URL изображения</label>
                                    <input type="text" class="form-control" id="productImageUrl" name="productImageUrl" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Модальное окно для редактирования продукта -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Редактировать продукт</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="update_product.php">
                                <!-- Выпадающий список продуктов для редактирования -->
                                <div class="mb-3">
                                    <label for="editProductIdSelect" class="form-label">Выберите продукт для редактирования</label>
                                    <select class="form-select" id="editProductIdSelect" name="editProductId" required>
                                        <option value="" disabled selected>Выберите продукт</option>
                                        <?php
                                        $conn = new mysqli("localhost", "root", "", "foodstore");

                                        if ($conn->connect_error) {
                                            die("Ошибка подключения к базе данных: " . $conn->connect_error);
                                        }

                                        // SQL-запрос для выбора всех продуктов
                                        $sql = "SELECT id, name FROM products";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="" disabled>Нет доступных продуктов</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- Скрытое поле для хранения ID продукта -->
                                <input type="hidden" id="editProductId" name="editProductId" value="">
                                <div class="mb-3">
                                    <label for="editProductName" class="form-label">Название продукта</label>
                                    <input type="text" class="form-control" id="editProductName" name="editProductName" required>
                                </div>
                                <!-- Обработчик события изменения для выпадающего списка -->
                                <script>
                                    document.getElementById("editProductIdSelect").addEventListener("change", function() {
                                        // Обновление значения скрытого поля при выборе продукта
                                        var selectedProductId = this.value;
                                        document.getElementById("editProductId").value = selectedProductId;
                                    });
                                </script>
                                <div class="mb-3">
                                    <label for="editProductComposition" class="form-label">Состав</label>
                                    <input type="text" class="form-control" id="editProductComposition" name="editProductComposition" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductWeight" class="form-label">Вес</label>
                                    <input type="text" class="form-control" id="editProductWeight" name="editProductWeight" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductPrice" class="form-label">Цена</label>
                                    <input type="text" class="form-control" id="editProductPrice" name="editProductPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductImageUrl" class="form-label">URL изображения</label>
                                    <input type="text" class="form-control" id="editProductImageUrl" name="editProductImageUrl" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteProductModalLabel">Удалить продукт</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Выберите продукт для удаления:</p>
                            <!-- Форма для выбора продукта для удаления -->
                            <form method="post" action="delete_product.php">
                                <div class="mb-3">
                                    <label for="deleteProductId" class="form-label">Продукт</label>
                                    <select class="form-select" id="deleteProductId" name="deleteProductId" required>
                                        <option value="" disabled selected>Выберите продукт</option>
                                        <?php
                                        $conn = new mysqli("localhost", "root", "", "foodstore");

                                        if ($conn->connect_error) {
                                            die("Ошибка подключения к базе данных: " . $conn->connect_error);
                                        }

                                        // SQL-запрос для выбора всех продуктов
                                        $sql = "SELECT * FROM products";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="" disabled>Нет доступных продуктов</option>';
                                        }

                                        $conn->close();
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                $conn = new mysqli("localhost", "root", "", "foodstore");

                if ($conn->connect_error) {
                    die("Ошибка подключения к базе данных: " . $conn->connect_error);
                }

                // SQL-запрос для выбора всех продуктов
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-sm-6 mb-3">';
                        echo '<div class="product-card">';
                        echo '<div class="product-img">';
                        echo '<a href="product.php?product_id=' . $row['id'] . '"> <img src="' . $row['image_url'] . '" class="d-block w-100" alt="' . $row['name'] . '"> </a>';
                        echo '</div>';
                        echo '<div class="product-details">';
                        echo '<h4><a href="product.php?product_id=' . $row['id'] . '">' . $row['name'] . '</a></h4>';
                        echo '<p>' . $row['weight'] . '</p>';
                        echo '<div class="product-bottom-details d-flex justify-content-between">';
                        echo '<div class="product-price">' . $row['price'] . '</div>';
                        echo '<div class="product-link">';
                        echo '<a href="#"><i class="fa-solid fa-cart-shopping"></i></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo 'Продукты не найдены.';
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <footer>
        <section id="contact" class="footer">
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