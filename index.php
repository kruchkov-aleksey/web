<?php
$connect = mysqli_connect('localhost',  'root', '', 'users');
session_start();
?>
<!DOCTYPE html>
<head lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Сеть книжных магазинов "Читалочка"</title>
  <!-- MDB icon -->
  <link rel="shortcut icon" href="cr32_action_contents2.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="/style.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet"></head>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Start your project here-->  
  <header>
	

    <a href='index.php'><img class="logo" src="img/study-icon-19.png" alt="Logo" width="auto" height="auto"></a>
	<h2><a title='Главная' href='index.php'> Читалочка </a></h2>
      <?php
      if (isset($_SESSION['user']['login'])) {
          echo '
          <a href = "vyity.php" ><button class="voiti" type = "submit" >Выйти</a ></button ></a>
          ';

	} else {
          echo '
          <a href = "voiti.php" ><button class="voiti" type = "submit" >Войти</a ></button ></a>
          ';
      }
      ?>
</header>
<main>
<div class='bar'>
	<p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
	<p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
    <p class='barcon'><a class='catalhov' href='lab4.php'>Добавить запись в базу данных</a></p>
<?php
if ((@$_SESSION['user']['login']))
    echo '<p class="barcon"><a class="catalhov" href="lc.php">Личный Кабинет</a></p>' ?>

</div>


<div class='novinki'>
<a href='fathers.php'><img alt='oops' title='Отцы и Дети' class='novinkiimg' src='img/61714595_ottsyi-i-deti-ast.jpg'></a>
<a href='souls.php'><img alt='oops' title='Мёртвые Души' class='novinkiimg' src='img/cover1.jpg'></a>
<a href='mumu.php'><img alt='oops' title='Муму' class='novinkiimg' src='img/Безымянный.png'></a>
<a href='petushki.php'><img alt='oops' title='Москва-Петушки' class='novinkiimg' src='img/Moscow_Petushki.jpg'></a>
</div>


  <div class='ofis'>
  <img alt='oops' class='ofisimg' src='img/ofis1.png'>
  </div>


  

	<div class='text'>
		<p>«Читалочка» – сеть книжных магазинов, успешно работающих в Москве и других регионах России.<br><br> А ещё это – крупный интернет-магазин книг. В нём вы можете заказывать книги в любое время 24 часа в сутки.
		В магазине «Читалочка» вы найдёте книги на любой вкус, для этого мы сделали удобный каталог.<br><br> А также в наших магазинах обустроены читальные залы в которых вы сможете провести время наедине с собой и любимым произведением!  
		<br><br>
		Добро пожаловать!</p>
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
