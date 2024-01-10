<?php
session_start();

// Подключение к базе данных
require_once 'db.php';

// Проверка аутентификации пользователя
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получение user_id из параметра запроса
if (isset($_GET['user_id'])) {
    $selectedUserId = $_GET['user_id'];

    // Запрос к базе данных для получения информации о выбранном пользователе
    $getUserInfoQuery = "SELECT * FROM users WHERE id = '$selectedUserId'";
    $result = $conn->query($getUserInfoQuery);

    if ($result->num_rows > 0) {
        $selectedUser = $result->fetch_assoc();
        $selectedUserName = $selectedUser['login'];
        $selectedUserEmail = $selectedUser['email'];
        
    } else {
        // Если пользователь не найден, перенаправляем обратно на страницу профиля
        header("Location: profile.php");
        exit();
    }
} else {
    // Если не указан user_id, перенаправляем обратно на страницу профиля
    header("Location: profile.php");
    exit();
}

// Обработка изменения имени пользователя
if (isset($_POST['change_name'])) {
    $newName = $_POST['new_name'];

    // Запрос к базе данных для изменения имени пользователя
    $updateNameQuery = "UPDATE users SET login = '$newName' WHERE id = '$selectedUserId'";
    $conn->query($updateNameQuery);

    // Перезагрузка страницы после изменения имени
    header("Location: user_info.php?user_id=$selectedUserId");
    exit();
}

// Обработка изменения роли пользователя
if (isset($_POST['change_role'])) {
    $newRole = $_POST['new_role'];

    // Запрос к базе данных для изменения роли пользователя
    $updateRoleQuery = "UPDATE users_has_role SET role_id = '$newRole' WHERE user_id = '$selectedUserId'";
    $conn->query($updateRoleQuery);

    // Перезагрузка страницы после изменения роли
    header("Location: user_info.php?user_id=$selectedUserId");
    exit();
}

// Обработка удаления пользователя
if (isset($_POST['delete_user'])) {
    // Проверка, был ли передан идентификатор пользователя для удаления
    if (isset($_POST['selected_user_id'])) {
        $selectedUserId = $_POST['selected_user_id'];

        // Удаление связанных записей из users_has_role
        $deleteUserRoleQuery = "DELETE FROM users_has_role WHERE user_id = '$selectedUserId'";
        $conn->query($deleteUserRoleQuery);

        // Удаление пользователя из users
        $deleteUserQuery = "DELETE FROM users WHERE id = '$selectedUserId'";
        $conn->query($deleteUserQuery);

        // Перенаправление на страницу с сообщением об успешном удалении или другой логикой
        header("Location: user_info.php");
        exit();
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о пользователе</title>
</head>
<body>
<style>
    body{
        color:white;
    }
</style>
<h2>Информация о пользователе</h2>
<p>Имя пользователя: <?php echo $selectedUserName; ?></p>
<p>Email: <?php echo $selectedUserEmail; ?></p>
<form method="post" action="">
    <label for="new_name">Новое имя пользователя:</label>
    <input type="text" name="new_name" required>
    <input type="submit" name="change_name" value="Изменить имя">
</form>


<form method="post" action="">
    <label for="new_role">Новая роль пользователя:</label>
    <select name="new_role" required>
        <option value="1">User</option>
        <option value="2">Admin</option>
    </select>
    <input type="submit" name="change_role" value="Изменить роль">
</form>

<form action="" method="post">
    <input type="hidden" name="selected_user_id" value="<?php echo $selectedUserId; ?>">
    <input type="submit" name="delete_user" value="Удалить пользователя">
</form>


</body>
</html>