<?php
$connect1 = mysqli_connect('localhost',  'root', '', 'laba4');

require_once "header.html";
require_once "links.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Поис ко запросу: <?=$_GET['search']?></title>
    <link rel="stylesheet" href="style2.css">
</head>


<body>

<main>
    <div class='bar'>
        <p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
        <p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
    </div>

    <h4 id='nazv'>Поиск дал результат...</h4>

    <div class='text'>
    <p>
        <?php

        $search=strip_tags(mysqli_real_escape_string($connect1, $_GET['search']));

        $search_result=mysqli_query($connect1, "SELECT * FROM `baza` WHERE `name` LIKE '%$search%' OR `author` LIKE '%$search%'OR `id` LIKE '%$search%' OR `price` LIKE '%$search%'");


        while ($row=mysqli_fetch_assoc($search_result)){
        ?>
        <br>
        <a style="color: #0d0d0d" href="product.php?id=<?php echo $row['id'];?>"><?php echo $row['author']; echo " - "; echo $row['name']?></a>
        <?php
}


?>



    </p>
    </div>


</main>

<?php
require_once "footer.html";
?>
</body>
</html>



