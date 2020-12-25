<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'users');

$url='https://www.google.com/recaptcha/api/siteverify';
$key='6Le8GxAaAAAAAJXot4QvJbiLfrfEtphA8KuXI64A';
$query=$url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];
$data=json_decode(file_get_contents($query));



print_r($data);

$login=$_POST['login'];
$password=$_POST['password'];
$inf=$_POST['inf'];
$lenght_of_password=strlen($password);
$password=hash('md5', "$password");
$password_again=$_POST['password_again'];
$lenght_of_login=strlen($login);
$lenght_of_password_again=strlen($password_again);


$login=mysqli_real_escape_string($connect, $login);
$password=mysqli_real_escape_string($connect, $password);
$inf=mysqli_real_escape_string($connect, $inf);

if($inf===''){
    $inf=$login." - Наш любимый пользователь!";
    print_r($inf);
}

$path_file='uploads/'.  $_FILES['upload']['name'];
move_uploaded_file($_FILES['upload']['tmp_name'], $path_file);

if($path_file==='uploads/')
    $path_file='uploads/nophoto.jpg';

$check_login=mysqli_query($connect, "SELECT `login` FROM `user` WHERE login='$login'");
$check_login=mysqli_fetch_array($check_login);

if ($check_login){
    $_SESSION['message']='Логин занят';
    header('Location: registration.php');
}
    else if (!($_POST['password']===$_POST['password_again'])) {
        $_SESSION['message']='Пароли не совпадают';
        header('Location: registration.php');
    }
        else if (($lenght_of_login<=3)||($lenght_of_password<=3)) {
            $_SESSION['message']='Данные введены неверно';
             header('Location: registration.php');
        }

            else if ($data->success==false) {
                $_SESSION['message'] = 'Вы не прошли капчу';
                header('Location: registration.php');
            }
                else{
                        $_SESSION['login'] = $login;
                        $_SESSION['password']=$password;
                        mysqli_query($connect, "INSERT INTO `user` (`id`, `login`, `password`, `img`, `inf`) VALUES (NULL, '$login', '$password', '$path_file', '$inf')");
                        header('Location: lc.php');
                }



