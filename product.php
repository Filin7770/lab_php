<?php
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$row = null;

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo 'Продукт не найден.';
    }
} else {
    echo 'Неверный запрос.';
}


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
    <link rel="stylesheet" href="./css/product1.css" />
    <title><?php echo $row['name']; ?></title>
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
                        <a class="nav-link" href="#">Контакты</a>
                    </li>
                </ul>

            </div>
        </div>
        </div>
    </nav>
    <section class="info mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="info__heading"><?php echo $row['name']; ?></h2>
                    <p class="info__text"><?php echo $row['weight']; ?></p>
                </div>
                <section class="info mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 img">
                                <img class="img-fluid mx-auto d-block" src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>" />
                            </div>
                            <div class="col-md-6">
                                <p class="info__cost"><?php echo $row['price']; ?></p>
                                <button class="btn btn-primary float-md-right">В корзину</button>
                                <h3 class="info__about mt-4">О товаре</h3>
                                <h4 class="info__wording">Состав</h4>
                                <p class="info__primary"><?php echo $row['composition']; ?></p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="info mb-5">
                    <div class="container">
                        <h3>Заказы с этим продуктом:</h3>
                        <ul>
                            <?php
                            $sql = "SELECT o.* FROM orders o INNER JOIN ordering_products op ON o.id = op.id_order WHERE op.id_product = $product_id";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li>Заказ #' . $row['id'] . ' (Дата: ' . $row['order_opening_time'] . ')</li>';
                                }
                            } else {
                                echo '<li>Этот продукт не был заказан.</li>';
                            }

                            $conn->close();
                            ?>
                        </ul>
                    </div>
                </section>
            </div>
    </section>

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