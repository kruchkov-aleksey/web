<?php
$connect1 = mysqli_connect('localhost',  'root', '', 'laba4');

    require_once "header.html";
    require_once "links.html";

    $img=mysqli_query($connect1, "SELECT file FROM baza");


?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>База данных</title>
        <link rel="stylesheet" href="style2.css">
    </head>
    <style>
        table{
            font-family: 'Playfair Display', serif;
            letter-spacing: 1px;
            color: black;
            margin: 30px;
            border-collapse: separate;
            border-spacing: 7px;
        }
        td{
            padding: 5px;
        }


    </style>

    <body>

    <main>
        <div class='bar'>
            <p class='barcon'><a class='catalhov' href='catalog.php'>Каталог</a></p>
            <p class='barcon'><a class='catalhov' href='magaz.php'>Магазины</a></p>
        </div>

        <h4 id='nazv'>Вы добавили или изменили страницу в базе данных! Показываю базу данных...</h4>

            <table border="1" bordercolor="white" class="list">

                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>author</th>
                        <th>price</th>
                        <th>year</th>
                    </tr>
                <?php
                    /*
                    echo "{$result['name']} - {$result['author']} - {$result['price']} рублей<br>";
                    while($result = mysqli_fetch_array($sql)) {
                        echo "{$result['name']} - {$result['author']} - {$result['price']} рублей<br>";
                    }
                    */

                    $sql = mysqli_query($connect1, "SELECT baza.id, baza.name, baza.author, baza.price, baza.file, years.year FROM baza JOIN years ON baza.id=years.id");
                    $result = mysqli_fetch_all($sql);

                    //print_r($result);


                    foreach ($result as $result){
                        ?>

                            <tr>
                                    <td><?= $result[0] ?></td>
                                    <td><?= $result[1] ?></td>
                                    <td><?= $result[2] ?></td>
                                    <td><?= $result[3] ?></td>
                                    <td><?= $result[5] ?></td>
                                    <td><a style="color: #0d0d0d" href="<?=$result[4]?>">Файл</td>
                                    <td><a style="color: #0d0d0d" href="update.php?id=<?=$result[0]?>">Изменить</td>
                                    <td><a style="color: #0d0d0d" href="delete.php?id=<?=$result[0]?>">Удалить</td>
                            </tr>
                            <?php

                        }
                ?>

            </table>
        <a href='lab4.php' style="color: black"><h4 id='nazv'>На форму добавления</h4></a>
    </main>

   <?php
    require_once "footer.html";
   ?>
    </body>
    </html>


