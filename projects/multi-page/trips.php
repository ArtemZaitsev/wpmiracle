<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Путешествия</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!--------------------------------------------- Объявляем переменные  ------------------------------------------------------------>

    <?
    $project_root = "http://wpmiracle.ru/projects/multi-page/";
    ?>

<!--------------------------------------------- вот ниже это надо убрать как-то  ------------------------------------------------------------>
    <?
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $DB_HOST = 'localhost';
        $DB_USER = 'u0741356_multi-p' ;
        $DB_PASS = '4JSu_zto';
        $DB_NAME = 'u0741356_multi-page';

        $link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        mysqli_set_charset($link, "utf8");
    ?>

<!---------------------------------------------------------- 1 блок  ----------------------------------------------------------------------->

    <div class="wrapper">

        <? 
        include 'components/header.php';
        ?>

<!---------------------------------------------------------- 2 блок  ----------------------------------------------------------------------->

        <div class="h3">Выберите тур</div>
        <? $result = mysqli_query($link, 'SELECT * FROM trips');
            while($arr = mysqli_fetch_assoc($result)){?>
            <div class="trips-container flex">
                <div class="trips-img bg-fix" style="background-image: url(<?=$project_root.$arr['photo']?>)"></div>
                <div class="trips-offer">
                    <div class="headline"><?=$arr['title']?></div>
                    <div class="text-offer"><?=$arr['description']?></div>
                    <div class="button-about-us">Забронировать</div>
                </div>
            </div>
        <?}?>

<!---------------------------------------------------------- 3 блок  ----------------------------------------------------------------------->
        <?php
        include 'components/footer.php';
        ?>
    </div>
</body>

</html>