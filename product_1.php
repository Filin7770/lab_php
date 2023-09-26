<?php
$conn = new mysqli("localhost", "root", "", "foodstore");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$row = null; // Инициализируйте переменную $row значением null

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Присвойте $row результат запроса
    } else {
        echo 'Продукт не найден.';
    }
} else {
    echo 'Неверный запрос.';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap");
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/drink.css" />
    <title><?php echo $row['name']; ?></title>
</head>

<body>
    <header class="header">
        <div class="header__wrapper">
            <h1 class="header__heading">
                <h1 class="header__heading">
                    <a href="index.php" class="header__link">Food Store</a>
                </h1>
                <form class="search" method="post" action="search.php">
                    <input class="search__text" type="text" name="search_text" placeholder="Искать здесь...">
                    <button class="search__submit" name="search_query" type="submit">
                        <svg class="search__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5 14H14.71L14.43 13.73C15.4439 12.554 16.0011 11.0527 16 9.5C16 8.21442 15.6188 6.95772 14.9046 5.8888C14.1903 4.81988 13.1752 3.98676 11.9874 3.49479C10.7997 3.00282 9.49279 2.87409 8.23192 3.1249C6.97104 3.3757 5.81285 3.99477 4.90381 4.90381C3.99477 5.81285 3.3757 6.97104 3.1249 8.23192C2.87409 9.49279 3.00282 10.7997 3.49479 11.9874C3.98676 13.1752 4.81988 14.1903 5.8888 14.9046C6.95772 15.6188 8.21442 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z" fill="black" />
                        </svg>
                    </button>
                </form>
                <nav class="navigation navigation">
                    <ul class="navigation__list list">
                        <li class="list__text">
                            <a href="#models" class="list__link"> Каталог </a>
                        </li>
                        <li class="list__text">
                            <a href="#contacts" class="list__link"> Контакты </a>
                        </li>
                        <li class="list__text">
                            <a href="#contacts" class="list__link"> Войти </a>
                        </li>
                    </ul>
                </nav>
                <ul class="user__list list">

                </ul>
        </div>
    </header>
    <section class="info">
        <div class="info__wrapper">
            <div class="info__header">
                <p class="info__heading">
                <?php echo $row['name']; ?>
                </p>
                <p class="info__text">
                <?php echo $row['weight']; ?>
                </p>
            </div>
            <div class="info__card">
                <div class="info__models">
                    <img class="models__img" src="img/1-drink.svg" alt="<?php echo $row['name']; ?>" />
                </div>
                <div>
                    <div class="info__container">
                        <p class="info__cost"><?php echo $row['price']; ?></p>
                        <button class="info__basket">
                            <a href="" target="_blank" class="basket">
                                <p class="basket__text">В корзину</p>
                            </a>
                        </button>

                    </div>
                    <div class="info__descriptions">
                        <span class="info__about">О товаре</span>
                        <p class="info__wording">Состав</p>
                        <p class="info__primary"><?php echo $row['composition']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="contacts" class="footer">
        <div class="footer__wrapper">
            <div class="footer__heading">
                <h3 class="footer__head">Food Store</h3>
                <p class="footer__text">
                    ©️ 2016–2023, ООО «ФудCтор»
                </p>
                <p class="footer__text">
                    Вся представленная на сайте информация, касающаяся продуктов и сервисного
                    обслуживания, носит информационный характер и не является публичной офертой.
                </p>
                <div class="footer__information">
                    <a href="https://t.me/Filin_77" target="_blank" class="information__link">
                        <img src="img/tg 1.svg" alt="telegram" class="link__img-1" />
                    </a>
                    <a href="https://vk.com/max1m_77" target="_blank" class="information__link 2">
                        <img src="img/vk 1.svg" alt="vkontakte" class="link__img-2" />
                    </a>
                    <a href="" target="_blank" class="information__link-3">
                        <img src="img/inst 1.svg" alt="instagram" class="link__img-3" />
                    </a>
                </div>


            </div>

        </div>
    </section>
</body>

</html>