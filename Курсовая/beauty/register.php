<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<form action="register_user.php" method="post">
    <div class="container-register">
        <div class="container-register-box"><br>
            <p>Зарегистрироваться</p>
            <p>Введите логин</p>
            <input class="input" type="text" name="login" placeholder="Login" required>
            <p>Пароль</p>
            <input class="input" type="password" name="password" placeholder="Пароль" required id="password">
            <p>Повторите пароль</p>
            <input class="input" type="password" name="confirm_password"  placeholder="Повторите пароль" required id="confirm_password">
            <p>Почта</p>
            <input class="input" type="email" placeholder="email" required name="email" id="email"><br><br><br>
            <button class="buttone" type="submit">Войти</button><br><br><br>
            <p class="link">Уже есть аккаунт?</p>
            <a class="link" href="login.php">Войдите</a><br><br>
        </div> 
    </div>
</form>

<div class="top">

</div>

</body></html>