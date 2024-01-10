<?php
session_start();

// Включение файла подключения к базе данных
require_once 'db.php';

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  

    // Проверка, был ли пользователь аутентифицирован
    if (isset($_SESSION['user_id'])) {
       
        header("Location: profile.php");
        exit();
    }

    
}
// Закрытие соединения с базой данных
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация и вход</title>
</head>
<style>
   .buttone {
    width: 300px;
    height: 40px;
    background-color: #7bff00;
    color: #000000;
    font-family: sans-serif;
    font-size: 19px;
    border: 0px;
    transition: transform 0.3s ease-in-out;
    border-radius: 10px;
}


.buttone:hover {
    transform: scale(1.1);
    background-color: #63d816;
}

</style>
<body>


    <div class="top">

    </div>
    <form action="login_user.php" method="post">
        <div class="container-register">
            <div class="container-register-box"><br>
                <p>Войти</p>
                <p>Введите логин</p>
                <input type="text" class="input" name="login" placeholder="Login" required>
                <p>Пароль</p>
                <input class="input" type="password" name="password" placeholder="Пароль" required id="password"><br><br><br>   
                <button class="buttone" type="submit">Войти</button><br><br><br>
                <p class="link">Еще нет аккаунта?</p>
                <a class="link" href="register.php">Зарегистрируйтесь</a><br><br>
            </div>
        </div>
    </form>
</body>
</html>