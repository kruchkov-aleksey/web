<?php
$connect = mysqli_connect('localhost',  'root', '', 'laba4');
if (!$connect) {
    die('error');}
$id_delete=strip_tags(mysqli_real_escape_string($connect, $_GET['id']));

mysqli_query($connect, "DELETE FROM `baza` WHERE `baza`.`id` = '$id_delete'");
mysqli_query($connect, "DELETE FROM `years` WHERE `years`.`id` = '$id_delete'");
header('Location: lab4_added.php');
    ?>