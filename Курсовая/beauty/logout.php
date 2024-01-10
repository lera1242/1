<?php
session_start();

// Закрытие текущей сессии
session_destroy();

// Перенаправление на главную страницу
header("Location: index.php");
exit();
?>

