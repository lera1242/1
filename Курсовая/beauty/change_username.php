<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Включение файла подключения к базе данных
require_once 'db.php';

// Обработка формы изменения имени пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['new_username'];
    $userId = $_SESSION['user_id'];

    // Проверка, является ли пользователь администратором
    if ($_SESSION['role'] === 'admin' && isset($_GET['user_id'])) {
        // Если админ изменяет имя другого пользователя
        $userId = $_GET['user_id'];
    }

    // Обновление имени пользователя в базе данных
    $updateUsernameQuery = "UPDATE users SET login = '$newUsername' WHERE id = '$userId'";
    $conn->query($updateUsernameQuery);

    // Перенаправление на профиль пользователя после обновления
    header("Location: profile.php");
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение имени пользователя</title>
</head>
<body>
<style>
    body{
        color: white;
    }
</style>
<h2>Изменение имени пользователя</h2>
<form action="" method="post">
    <label for="new_username">Новое имя пользователя:</label>
    <input type="text" id="new_username" name="new_username" required>
    <button type="submit">Изменить</button>
</form>
</body>
</html>
