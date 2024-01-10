<?php
// Включение файла подключения к базе данных
require_once 'db.php';

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Проверка совпадения паролей
    if ($password !== $confirm_password) {
        echo "Пароли не совпадают";
        exit();
    }

    // Хеширование пароля (рекомендуется использовать более безопасные методы хеширования)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Проверка уникальности email
    $checkEmailQuery = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {
        echo "Пользователь с таким email уже зарегистрирован";
        exit();
    }

    // Подготовка SQL-запроса для вставки данных пользователя в таблицу users
    $sql = "INSERT INTO users (login, password, email) VALUES ('$login', '$hashedPassword', '$email')";

    // Выполнение запроса
    if ($conn->query($sql) === TRUE) {
        // Получаем ID только что добавленного пользователя
        $userId = $conn->insert_id;

        // Присваиваем роль "user" пользователю
        $userRoleQuery = "INSERT INTO users_has_role (user_id, role_id) VALUES ('$userId', (SELECT id FROM roles WHERE name = 'user'))";
        $conn->query($userRoleQuery);

        header("Location: login.php");
        exit();
    } else {
        echo "Ошибка при регистрации пользователя: " . $conn->error;
    }
}

$conn->close();
?>
