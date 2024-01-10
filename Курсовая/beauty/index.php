<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicion.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Салон красоты</title>
</head>
<style>

 .footer-section {
	display: inline-block;
    margin-left: 80px;
	margin: 15px 60px 0px 50px;
	font: sans-serif;
	font-size: 30px;
    color: #dbdbdb;
    font-family: montserrat;
    justify-content: space-between;
  }
   </style>
    <body>
        <header class="header">
            <div class="container header__container">
                <button class="header__burger-btn" id="burger">
                    <span></span><span></span><span></span>
                </button>
                <a href="#" class="logo">
                    <img class="logo__img" src="img/logo.svg" alt="Логотип">
                </a>
                <nav class="menu">
                    <ul class="menu__list">
                        <li class="menu__item"><a class="menu__link " href="index.php">ГЛАВНАЯ</a></li>
                        <li class="menu__item"><a class="menu__link col" href="work.php">НАШИ РАБОТЫ</a></li>
                    </ul>
                </nav>
                <?php
                session_start();
                require_once 'db.php'; 

                // Проверка, был ли пользователь аутентифицирован
                if (isset($_SESSION['user_id'])) {
                    // Если пользователь аутентифицирован, показываем его имя и кнопку "Выйти"
                    $userId = $_SESSION['user_id'];
                    $getUserQuery = "SELECT login FROM users WHERE id = '$userId'";
                    $result = $conn->query($getUserQuery);

                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        $userName = $user['login'];
                        echo "<div class='menu__link'><a href='profile.php'>$userName</a></div>";
                        echo "<a href='logout.php'><button class='button'>Выйти</button></a>";
                    }
                } else {
                    // Если пользователь не аутентифицирован, показываем кнопку "Войти"
                    echo "<a href='login.php'><button class='button'>Войти</button></a>";
                }

                
                $conn->close();
                ?>
            </div>
    </header>
    <div class="top">

</div>

    <section class="title-text element-animation">
        <p>
            Добро пожаловать в наш салон красоты
        </p>

        <img src="img/index/hero.png" width="500px" alt="">

    </section>

    <section class="section-container element-animation">
        <div class="section-box">
            <img class="section-img" src="img/index/ресницы.png" width="450px" alt="">
            <div class="section-text-paragraph">
                <p class="section-box-title">Хотите сделать ресницы гуще, длиннее, придать им красивый изгиб? Запиcывайтесь к нам на наращивание.</p>
                <p class="section-box-title-two">Классика-1000 руб<br>1,5D-1100 руб. <br>2D-1200 руб<br>Мокрый эффект-1300 руб<br>Снятие моих реснииц-бесплатно<br>Снятие чужих-200 руб</p>
            </div>
        </div>
    </section>
    <div class="top">

</div>
    <section class="section-container element-animation">
        <div class="section-box">
            <div class="section-text-paragraph">
                <p class="section-box-title">АРХИТЕКТУРА БРОВЕЙ <br> В наших салонах доступны услуги коррекции и окрашивания бровей (краской или хной).</p>
                <p class="section-box-title-two">1300 рублей за комбо:<br>коррекцию + окрашивание у стилиста. </p>
            </div>
            <img class="section-img" src="img/index/брови.img" width="450px" alt="">
        </div>
    </section>
    <div class="top">

</div>
    <section class="section-container element-animation">
        <div class="section-box">
            <img class="section-img" src="img/index/лами.webp" width="450px" alt="">
            <div class="section-text-paragraph">
                <p class="section-box-title">АРХИТЕКТУРА БРОВЕЙ <br> Пример:</p>
            </div>
        </div>
    </section>
    <div class="top">

</div>
    <section class="section-container element-animation">
        <div class="section-box">
            <div class="section-text-paragraph">
                <p class="section-box-title">УКЛАДКА, ПРИЧЁСКА</p>
                <p class="section-box-title-two">Как насчёт стильной укладки? <br>Экспресс-укладка (сушка феном): 800/800/ 800р. <br>Укладка (укладка с использованием горячих инструментов: разновидные локоны, выпрямление): <br>мастер - 1 200 /1 800/ 2 400р <br>стилист - 1 500/ 2 100/ 2 600р <br>топ-стилист - 1 800/ 2 400/ 3 000р <br>Вечерняя причёска (конструирование причёски с использованием горячих инструментов, закрепляющих инструментов и стайлинга): <br>мастер - 2 400/ 3 000/ 3 600р. <br>стилист - 3 000/3 600/4 200р. <br>топ-стилист - 3 600/ 4 200/ 4 800р. <br>*** градация длинны волос на причёску: средние/длинные/очень длинные <br>Укладка афро-кудри: мастер - 3 000/ 3 600р. <br>
            </div>
            <img class="section-img" src="img/index/прическа.webp" width="450px" alt="">
        </div>
    </section>
    <div class="top">

    </div>
    <section class="section-container element-animation">
        <div class="section-box">
            <img class="section-img" src="img/index/ногти.webp" width="450px" alt="">
            <div class="section-text-paragraph">
                <p class="section-box-title">МАНИКЮР<br>Красивый маникюр с покрытием (гель-лак, лак) или без покрытия.</p>
                <p class="section-box-title-two">Маникюр + однотон покрытие гель-лак 2 300 ₽ <br> Маникюр + покрытие френч 2 600 ₽<br>Японский маникюр 2 300 ₽ <br>Маникюр без покрытия 1 500 ₽<br>Маникюр + покрытие лак 1 800 ₽<br><br>АКЦИЯ!<br> <br>Снятие+маникюр+покрытие гель-лак 1 200 ₽ <br>Пилочный маникюр без покрытия 2 100₽</p>
            </div>
        </div>
    </section>
    <div class="top">

</div>
    <section class="section-container element-animation">
        <div class="section-box">
            <div class="section-text-paragraph">
                <p class="section-box-title">ЭКСПРЕСС-ОБРАЗ</p>
                <p class="section-box-title-two">Быстро собраться на деловую встречу или подготовиться к фотосессии поможет услуга "Экспресс-образ". <br>
                    В неё входит: лёгкий макияж в стиле touch-up и укладка (локоны или выпрямление волос). <br>
                    Услуга занимает всего 45 минут. <br>
                    Стоимость:2000 руб</p>
            </div>
            <img class="section-img" src="img/index/экспресс-образ.webp" width="450px" alt="">
        </div>
    </section>
    <div class="top">

</div>
    <section class="section-container element-animation">
        <div class="section-box">
            <img class="section-img" src="img/index/макияж.webp" width="450px" alt="">
            <div class="section-text-paragraph">
                <p class="section-box-title">МАКИЯЖ + Супер акция</p>
                <p class="section-box-title-two">Дневной Макияж 2 100 ₽<br>
                    Вечерний Макияж 2 800 ₽<br>
                    Макияж глаз 1 000 ₽</p>
            </div>
        </div>
    </section>

    <div class="top">

    </div>
    <br><br><br><br><br><br><br><br><br>
    <footer>
				<div class="footer-section">
				  <h4> Если вы решили записаться,<br> свяжитесь с нами по номеру: 89994567384</h4>
				</div>
				<div class="footer-section">
				  <h4>Адрес: <br> Такучет, ул.Центральная, 49-2</h4>
				</div>
			  </footer>

<script src="js/main.js"></script>
</body>
</html>