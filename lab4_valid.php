<?php
session_start();
$connect = mysqli_connect('localhost',  'root', '', 'laba4');


    $name=trim(strip_tags($_POST['name']));
    $author=trim(strip_tags($_POST['author']));
    $price=intval(trim(strip_tags($_POST['price'])));
    $year=intval(trim(strip_tags($_POST['year'])));
    $inf=$_POST['inf'];

    $name=mysqli_real_escape_string($connect, $name);
    $author=mysqli_real_escape_string($connect, $author);
    $inf=mysqli_real_escape_string($connect, $inf);

    if($inf===''){
        $inf=$name." - одна из множества книг в нашей библиотеке!";

    }

    $path_file='uploads/'.  $_FILES['upload']['name'];
    move_uploaded_file($_FILES['upload']['tmp_name'], $path_file);

    if($path_file==='uploads/')
        $path_file='uploads/nophoto.jpg';

if ((preg_match('/[0-9]/', $name)===1)||(preg_match('/[0-9]/', $author)===1)||($price===0)) {
        $_SESSION['msg']='Данные не соответствуют требованиям';
        header('Location: lab4.php');

    }

    else {
        mysqli_query($connect, "INSERT INTO `baza` (`id`, `name`, `author`, `price`, `file`, `inf`) VALUES (NULL, '$name', '$author', '$price', '$path_file', '$inf')");
        $latest_id = mysqli_insert_id($connect);

       // $id_for_year=mysqli_query($connect, "SELECT `id` FROM `baza` WHERE name='$name' AND price='$price' AND author='$author'");
        //$id_for_year=mysqli_fetch_array($id_for_year);
        //$id_for_year=$id_for_year['id'];
       // print_r ($id_for_year);


        mysqli_query($connect, "INSERT INTO `years` (`id`, `year`) VALUES ('$latest_id', '$year')");

        header('Location: lab4_added.php');
    }
