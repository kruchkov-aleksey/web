<?php
    session_start();
if (isset($_SESSION['user']['login'])) {header('Location: index.php');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Войти</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/cr32_action_contents2.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="style2.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet"></head>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<body>
  <!-- Start your project here-->  
   
  <header>
	
   
    <a href='index.php'><img class="logo" src="img/study-icon-19.png" alt="Logo" width="auto" height="auto"></a>
	<h2><a href='index.php'> Читалочка </a></h2>
	
</header>

<main>

<div class='bar'>
	<p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
	<p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
</div>

<div class='fpc'>

<form action="proverka.php" method="post">
	<label>Логин</label>
	<input type='text' name='login' placeholder='Введите свой логин'>
	<br>
	<label>Пароль</label>
	<input type='text' name='password' placeholder='Введите свой пароль'>
    <button type='submit'>Войти</button>
    <?php


        if (isset($_SESSION['message'])) {

            echo '<p style="border: 2px solid #00bfff;border-radius: 3px;padding: 5px; font-family: Roboto Slab, serif; text-align: center;font-weight: bold; margin-top: 4px;">' . $_SESSION['message'] . '</p>' ;
        }
        unset($_SESSION['message']);


    ?>
</form>
</div>

</main>
<footer class='footer'>
	<h5 class='footercon'>2020-2020 OOO"ПМИ"</h5>
</footer>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
