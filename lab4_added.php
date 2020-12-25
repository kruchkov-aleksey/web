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
                        <th>info</th>
                    </tr>
                <?php
                    /*
                    echo "{$result['name']} - {$result['author']} - {$result['price']} рублей<br>";
                    while($result = mysqli_fetch_array($sql)) {
                        echo "{$result['name']} - {$result['author']} - {$result['price']} рублей<br>";
                    }
                    */

                    $sql = mysqli_query($connect1, "SELECT baza.id, baza.name, baza.author, baza.price, baza.file, baza.inf, years.year FROM baza JOIN years ON baza.id=years.id");
                    $result = mysqli_fetch_all($sql);

                    //print_r($result);


                    foreach ($result as $result){
                        ?>

                            <tr>
                                    <td><?= $result[0] ?></td>
                                <td><a style="color: #0d0d0d" href="product.php?id=<?=$result[0]?>"><?= $result[1] ?></a></td>
                                    <td><?= $result[2] ?></td>
                                    <td><?= $result[3] ?></td>
                                    <td><?= $result[6] ?></td>
                                    <td><?php
                                                $inf_text=mb_substr($result[5], 0, 6);
                                                echo $inf_text."...";
                                    ?></td>
                                    <td><a style="color: #0d0d0d" href="<?=$result[4]?>">Файл</td>
                                    <td><a style="color: #0d0d0d" href="update.php?id=<?=$result[0]?>">Изменить</td>
                                    <td><a style="color: #0d0d0d" href="delete.php?id=<?=$result[0]?>">Удалить</td>
                            </tr>
                            <?php

                        }
                ?>

            </table>


        <?php
        $url='https://speller.yandex.net/services/spellservice.json/checkText';
        @($user_inf=$_GET['check']);
        $query=$url.'?text='.$user_inf;
        $data=file_get_contents($query);
        $data=json_decode($data, true);

        @(print_r( $data["0"]["s"]["0"]));


        ?>

        <form style="display: inline;" method="get" action="search.php">
            <input type="search" name="search" placeholder="Поиск по базе...">
            <input type="submit">
        </form>

        <form style="display: inline;" method="get" action="check_word.php">
            <input style="margin-left: 20px;" type="search" name="check" placeholder="Проверьте слово...">
            <input type="submit">
        </form>

        <a href='lab4.php' style="color: black"><h4 id='nazv'>На форму добавления</h4></a>

    </main>

   <?php
    require_once "footer.html";
   ?>
    </body>
    </html>


