<?php
// Включение файла подключения к базе данных
require_once 'db.php';

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Подготовка SQL-запроса для получения данных пользователя по логину
    $getUserQuery = "SELECT id, password FROM users WHERE login = '$login'";
    $result = $conn->query($getUserQuery);

    if ($result->num_rows > 0) {
        // Пользователь с таким логином найден
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Проверка введенного пароля с хешированным паролем в базе данных
        if (password_verify($password, $hashedPassword)) {
            // Аутентификация успешна
            session_start();
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php"); // Перенаправление на страницу приветствия или другую защищенную страницу
            exit();
        } else {
            // Неверный пароль
            echo "Неверный логин или пароль";
        }
    } else {
        // Пользователь с таким логином не найден
        echo "Неверный логин или пароль";
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>

