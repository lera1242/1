<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/favicion.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наши работы</title>
</head>
<body>
    <body>
        <header class="header">
            <div class="container header__container">
                <button class="header__burger-btn" id="burger">
                    <span></span><span></span><span></span>
                </button>
                <a href="index.php" class="logo">
                    <img class="logo__img" src="img/logo.svg" alt="Логотип">
                </a>
                <nav class="menu">
                    <ul class="menu__list">
                        <li class="menu__item"><a class="menu__link col" href="index.php">ГЛАВНАЯ</a></li>
                        <li class="menu__item"><a class="menu__link " href="work.php">НАШИ РАБОТЫ</a></li>
                    </ul>
                </nav>
                <?php
                session_start();
                require_once 'db.php'; 

    
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

                // Закрытие соединения с базой данных
                $conn->close();
                ?>
            </div>
    </header>
    

    <div class="top">

    </div>
   

    <section class="title-text element-animation">
        <p>
            Добро пожаловать, вот наши работы
        </p>

        <img src="img/index/hero.png" width="50%" alt="">

    </section>

    <section class="work-section">
        <div class="work-container element-animation">
            <img src="img/work/1.webp" width="400px" alt="">
            <img src="img/work/2.webp" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/3.jpg" width="400px" alt="">
            <img src="img/work/4.webp" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/5.webp" width="400px" alt="">
            <img src="img/work/6.webp" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/7.webp" width="400px" alt="">
            <img src="img/work/8.webp" width="400px" alt="">
        </div>
        
        <div class="work-container element-animation">
            <img src="img/work/9.webp" width="400px" alt="">
            <img src="img/work/10.jpg" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/11.jpg" width="400px" alt="">
            <img src="img/work/12.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/13.jpg" width="400px" alt="">
            <img src="img/work/14.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/15.jpg" width="400px" alt="">
            <img src="img/work/16.jpg" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/17.webp" width="400px" alt="">
            <img src="img/work/18.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/19.jpg" width="400px" alt="">
            <img src="img/work/20.jpg" width="400px" alt="">
        </div>

        <div class="work-container element-animation">
            <img src="img/work/21.jpg" width="400px" alt="">
            <img src="img/work/22.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/23.jpg" width="400px" alt="">
            <img src="img/work/24.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/25.jpg" width="400px" alt="">
            <img src="img/work/26.jpg" width="400px" alt="">
        </div>



        <div class="work-container element-animation">
            <img src="img/work/27.webp" width="400px" alt="">
            <img src="img/work/28.jpg" width="400px" alt="">
        </div>



        <div class="work-container element-animation">
            <img src="img/work/29.jpg" width="400px" alt="">
            <img src="img/work/30.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/31.jpg" width="400px" alt="">
            <img src="img/work/32.jpg" width="400px" alt="">
        </div>

        
        <div class="work-container element-animation">
            <img src="img/work/33.jpg" width="400px" alt="">
            <img src="img/work/34.jpg" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/1.webp" width="400px" alt="">
            <img src="img/work/2.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/35.jpg" width="400px" alt="">
            <img src="img/work/36.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/37.webp" width="400px" alt="">
            <img src="img/work/28.jpg" width="400px" alt="">
        </div>



        <div class="work-container element-animation">
            <img src="img/work/39.webp" width="400px" alt="">
            <img src="img/work/39.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/40.webp" width="400px" alt="">
            <img src="img/work/41.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/42.jpg" width="400px" alt="">
            <img src="img/work/43.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/44.webp" width="400px" alt="">
            <img src="img/work/45.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/46.webp" width="400px" alt="">
            <img src="img/work/47.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/48.webp" width="400px" alt="">
            <img src="img/work/49.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/50.webp" width="400px" alt="">
            <img src="img/work/51.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation">
            <img src="img/work/52.webp" width="400px" alt="">
            <img src="img/work/53.webp" width="400px" alt="">
        </div>


        <div class="work-container element-animation" >
            <img src="img/work/54.webp" width="400px" alt="">
            <img src="img/work/55.webp" width="400px" alt="">
        </div>

    </section>

<script src="js/main.js"></script> 
</body>
</html>