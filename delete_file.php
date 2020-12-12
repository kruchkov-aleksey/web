<?php
$connect = mysqli_connect('localhost',  'root', '', 'laba4');
if (!$connect) {
    die('error');}
$id_delete=strip_tags(mysqli_real_escape_string($connect, $_GET['id']));

mysqli_query($connect, "UPDATE `baza` SET `file` = '' WHERE `baza`.`id` = '$id_delete'");
header('Location: lab4_added.php');
?>