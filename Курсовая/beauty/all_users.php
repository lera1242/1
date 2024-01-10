<?php
session_start();

require_once 'db.php';

// Проверка, был ли пользователь аутентифицирован
if (!isset($_SESSION['user_id'])) {
    // Если пользователь не аутентифицирован, перенаправляем на страницу входа
    header("Location: login.php");
    exit();
}
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

// Проверяем, имеет ли пользователь роль admin для доступа к этой странице
if ($userRole !== 'admin') {
    // Если у пользователя нет прав admin, перенаправляем на профиль пользователя
    header("Location: profile.php");
    exit();
}

// Получаем информацию о выбранном пользователе из запроса GET
if (isset($_GET['user_id'])) {
    $selectedUserId = $_GET['user_id'];

    // Запрос к базе данных для получения информации о выбранном пользователе
    $getSelectedUserQuery = "SELECT * FROM users WHERE id = '$selectedUserId'";
    $result = $conn->query($getSelectedUserQuery);

    if ($result->num_rows > 0) {
        $selectedUser = $result->fetch_assoc();
        $selectedUserName = $selectedUser['login'];
        $selectedUserEmail = $selectedUser['email'];
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
<?php if (isset($selectedUserName) && isset($selectedUserEmail)): ?>
    <h2>Информация о пользователе</h2>
    <p>Имя пользователя: <?php echo $selectedUserName; ?></p>
    <p>Email: <?php echo $selectedUserEmail; ?></p>

<?php else: ?>
    <p>Пользователь не найден</p>
<?php endif; ?>

</body>
</html>

