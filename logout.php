<?php

$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
setcookie('login', $login, 0);
setcookie('password', $password, 0);
header('Location: index.php');