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
    <link rel="stylesheet" href="./css/index.css" />
    <title>Food Store</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #D9D9D9;">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="#">Food Store</a>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal-cart">
                                <i class="fa-solid fa-cart-shopping"></i></a>
                            <div class="modal fade" id="modal-cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary bg-gradient text-white">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Корзина</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Товар</th>
                                                        <th scope="col">Наименование</th>
                                                        <th scope="col">Цена</th>
                                                        <th scope="col">Количество</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td><img src="img/1.svg" alt="Лимонад"></td>
                                                        <td><a href="#">Напиток Лимонад Черноголовка 500 мл</a></td>
                                                        <td>75 ₽</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td><img src="img/2.svg" alt="Филе"></td>
                                                        <td><a href="#">Филе грудки цыплёнка кубиками Троекурово 500г</a></td>
                                                        <td>219 ₽</td>
                                                        <td>1</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td><img src="img/3.svg" alt="Макароны"></td>
                                                        <td><a href="#">Макароны Barilla Farfalle бантики 400г</a></td>
                                                        <td>145 ₽</td>
                                                        <td>1</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Продолжить
                                                покупки</button>
                                            <button type="button" class="btn btn-primary">Перейти к оформлению заказа</button>
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
    <section class="first__content">
        <div class="container mt-5 mx-auto text-center">
            <!-- Одна колонка для заголовков и кнопок -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="first__text">Продаем продукты с 2016 года</h2>
                    <h3 class="second__text">Продукты всегда свежие, в наличии или под заказ</h3>
                </div>
            </div>
        </div>
    </section>


    <section class="main-content mt-5 mb-5">
        <div class="container mt-5 mx-auto text-center">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h2 class="third__text">Продукты в наличии</h2>
                </div>
            </div>
            <div class="container mb-5">
                <form class="search custom-width" method="post" action="search.php">
                    <div class="input-group">
                        <input class="form-control search__text" type="text" name="search_text" placeholder="Искать здесь..." aria-label="Искать" aria-describedby="search-button">
                        <button class="btn btn-light search__submit" style="background-color: #D9D9D9" name="search_query" type="submit" id="search-button">
                            <svg class="search__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.5 14H14.71L14.43 13.73C15.4439 12.554 16.0011 11.0527 16 9.5C16 8.21442 15.6188 6.95772 14.9046 5.8888C14.1903 4.81988 13.1752 3.98676 11.9874 3.49479C10.7997 3.00282 9.49279 2.87409 8.23192 3.1249C6.97104 3.3757 5.81285 3.99477 4.90381 4.90381C3.99477 5.81285 3.3757 6.97104 3.1249 8.23192C2.87409 9.49279 3.00282 10.7997 3.49479 11.9874C3.98676 13.1752 4.81988 14.1903 5.8888 14.9046C6.95772 15.6188 8.21442 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="white" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-3">
                    <div class="product-card">
                        <div class="product-img">
                            <a href="product.php?product_id=3"> <img src="img/1.png" class="d-block w-100" alt="Лимонад"> </a>
                        </div>
                        <div class="product-details">
                            <h4><a href="product.php?product_id=3"></a>Напиток Лимонад Черноголовка</h4>
                            <p>500 мл</p>
                            <div class="product-bottom-details d-flex justify-content-between">
                                <div class="product-price">75 ₽</div>
                                <div class="product-link">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-3">
                    <div class="product-card">
                        <div class="product-img">
                            <a href="product.php?product_id=13"> <img src="img/2.png" class="d-block w-100" alt="Филе"> </a>
                        </div>
                        <div class="product-details">
                            <h4><a href="product.php?product_id=13"></a>Филе грудки цыплёнка Троекурово</h4>
                            <p>500г</p>
                            <div class="product-bottom-details d-flex justify-content-between">
                                <div class="product-price">219 ₽</div>
                                <div class="product-link">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-3">
                    <div class="product-card">
                        <div class="product-img">
                            <a href="product.php?product_id=7"> <img src="img/3.png" class="d-block w-100" alt="Макароны"> </a>
                        </div>
                        <div class="product-details">
                            <h4><a href="product.php?product_id=7"></a>Макароны Barilla Farfalle бантики</h4>
                            <p>400г</p>
                            <div class="product-bottom-details d-flex justify-content-between">
                                <div class="product-price">145 ₽</div>
                                <div class="product-link">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="additional-content mt-5 mb-5">
        <<div class="container mt-4">
            <h3 class="text-center mb-4">Выгодные покупки с Food Store</h3>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card w-100 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="img/ruble.svg" class="models__ruble" alt="ruble">
                                <h5 class="card-title models__heading">Фиксированная цена</h5>
                            </div>
                            <p class="card-text models__head">Сумма покупок не вырастет из-за доставки</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card w-100 h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="img/shield.svg" class="models__shield" alt="shield">
                                <h5 class="card-title models__heading">Безопасная оплата</h5>
                            </div>
                            <p class="card-text models__head">Контролируем транзакции, если товар пришел не качественным, то вернём деньги</p>
                        </div>
                    </div>
                </div>
            </div>
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