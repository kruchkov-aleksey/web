<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');

$id_hidden=$_POST['id'];
$name=trim(strip_tags($_POST['name']));
$author=trim(strip_tags($_POST['author']));
$price=intval(trim(strip_tags($_POST['price'])));
$year=intval(trim(strip_tags($_POST['year'])));

$name=mysqli_real_escape_string($connect, $name);
$author=mysqli_real_escape_string($connect, $author);

//echo $id_hidden;



if ((preg_match('/[0-9]/', $name)===1)||(preg_match('/[0-9]/', $author)===1)||($price===0)) {
    $_SESSION['msg']='Данные не соответствуют требованиям';
    header('Location: update.php');

}

else {
    mysqli_query($connect, "UPDATE `baza` SET `name` = '$name', `author` = '$author', `price` = '$price' WHERE `baza`.`id` = '$id_hidden'");
    mysqli_query($connect, "UPDATE `years` SET `year` = '$year' WHERE years.id = '$id_hidden'");
    header('Location: lab4_added.php');
}

