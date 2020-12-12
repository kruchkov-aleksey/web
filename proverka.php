<?php
session_start();
$valid_users = [
    ['login' => 'petrov', 'password' => 'hell'],
    ['login' => 'ivanov', 'password' => 'papa'],
];

if (!in_array($_POST['login'], array_column($valid_users, 'login'))) {
    $_SESSION['message']='Ошибка, неверный логин';
    header('Location: voiti.php');

}

else
    if (!in_array($_POST['password'], array_column($valid_users, 'password'))) {
        $_SESSION['message']='Ошибка, неверный пароль';
        header('Location: voiti.php');

    }
    else {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = hash('md5', $_POST['password']);

        header('Location: lc.php');
    }



