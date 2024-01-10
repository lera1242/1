<?php
session_start();

// Проверка, был ли пользователь аутентифицирован
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не аутентифицирован, перенаправляем на страницу входа
    header("Location: login.php");
    exit();
}

// Включение файла подключения к базе данных
require_once 'db.php';

// Получение информации о текущем пользователе
$userId = $_SESSION['user_id'];

// Проверка, есть ли роль в сессии
if (isset($_SESSION['role'])) {
    $userRole = $_SESSION['role'];
} else {
    // Если роли нет в сессии, получаем ее из базы данных
    $getUserRoleQuery = "SELECT r.name AS role FROM roles r
                        JOIN users_has_role ur ON r.id = ur.role_id
                        WHERE ur.user_id = '$userId'";
    $result = $conn->query($getUserRoleQuery);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $userRole = $user['role'];
    } else {
        // Если не удалось получить роль, перенаправляем на страницу входа
        header("Location: login.php");
        exit();
    }
}

$getUserQuery = "SELECT * FROM users WHERE id = '$userId'";
$result = $conn->query($getUserQuery);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $userName = $user['login'];
    $userEmail = $user['email'];
}
if ($userRole === 'admin') {
    $getAllUsersQuery = "SELECT * FROM users";
    $allUsersResult = $conn->query($getAllUsersQuery);
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
    <title>Профиль пользователя</title>
</head>
<body>
<style>
    body{
        color: white;
    }
</style>
<h2>Профиль пользователя</h2>
<p>Имя пользователя: <?php echo $userName; ?></p>
<p>Email: <?php echo $userEmail; ?></p>
<a href="change_username.php">Изменить имя пользователя</a>
<br>
<a href="logout.php">Выйти</a>
<?php if ($userRole === 'admin'): ?>
    <h3>Список всех пользователей:</h3>
    <ol>
        <?php while ($user = $allUsersResult->fetch_assoc()): ?>
            <li>
                <a href="user_info.php?user_id=<?php echo $user['id']; ?>">
                    <?php echo $user['login']; ?>
                </a>
                
            </li>
        <?php endwhile; ?>
    </ol>
<?php endif; ?>
</body>
</html>
