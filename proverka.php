<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'users');
$login=$_POST['login'];
//$login=mysqli_real_escape_string($connect, $login);
$password=$_POST['password'];
//$password=mysqli_real_escape_string($connect, $password);
$password=hash('md5', "$password");
$password_again=$_POST['password_again'];

$check_user=mysqli_query($connect, "SELECT `login` FROM `user` WHERE login='$login' AND password='$password'");
$check_user=mysqli_fetch_array($check_user);

if (!$check_user) {
    $_SESSION['message']='Пользователь не найден';
    header('Location: voiti.php');

}

    else {
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('Location: lc.php');
    }



