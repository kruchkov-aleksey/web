<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');

$id_hidden=$_POST['id'];

//echo $id_hidden;

//print_r($_FILES);

$path_file='uploads/' . $_FILES['upload']['name'];
move_uploaded_file($_FILES['upload']['tmp_name'], $path_file);



mysqli_query($connect, "UPDATE `baza` SET  `file` = '$path_file' WHERE `baza`.`id` = '$id_hidden'");
header('Location: lab4_added.php');



