<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Многостраничный сайт</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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


<!---------------------------------------------------- 1 блок  ---------------------------------------------------------------->

    <div class="wrapper">
   
   <? 
    include 'components/header.php';
    ?>

<!---------------------------------------------------- 2 блок  ---------------------------------------------------------------->

    <section class="advantages">
        <div class="second-message">
            <div class="h3">Что мы предлагаем?</div>
            <div class="h-description">Наша главная цель - рассказать о Москве так,чтобы это было интересно
                всем!</div>
        </div>
            <div class="line">
            <? $result = mysqli_query($link, 'SELECT * FROM goods');
            while($arr = mysqli_fetch_assoc($result)){?>
                <div class="half-line">
                    <div class="container-logo">
                        <div class="logo-line bg-fix first-item" style="background-image: url(<?=$project_root.$arr['photo']?>)"></div> 
                    </div>
                    <div class="line-message">
                        <div class="column headline"><?=$arr['name']?></div>
                        <div class="column text"><?=$arr['description']?></div>
                    </div>
                </div>
            <?}?>
            </div>
            
    </section>


<!---------------------------------------------------- 3 блок  ---------------------------------------------------------------->

    <section class="who-we-are"id="who-we-are">
        <? $result = mysqli_query($link, 'SELECT * FROM about');
        while($arr = mysqli_fetch_assoc($result)){?>
            <div class="photo bg-fix" style="background-image: url(<?=$project_root.$arr['photo']?>)"></div>
            <div class="description">
                <div class="text-to-left">
                    <div class="headline"><?=$arr['name']?></div>
                    <div class="we-are"><?=$arr['description']?></div>
                    <div class="button-about-us">Подробнее о нас</div>
                </div>
            </div>
        <?}?>
    </section>


<!---------------------------------------------------- 4 блок  ---------------------------------------------------------------->

<section class="moscow-in-photos">
        <div class="h3">Москва в фотографиях</div>
        <div class="h3-line"></div>
        <div class="h-description">Проще всего рассказать обо всем в фотографиях. Смотрите наши фотоотчеты и
            присылайте нам свои фотографии.</div>
        <div class="photos-line">
            <?
            $result = mysqli_query($link, 'SELECT * FROM gallery');
            while($arr = mysqli_fetch_assoc($result)){?>
                <div>
                <img src="<?=$project_root.$arr['path']?>">
                </div>
            <?}?>
    </section>


<!---------------------------------------------------- 5 блок  ---------------------------------------------------------------->
    <section class="reviews" id="reviews">
        <div class="h3">Отзывы</div>
        <div class="h3-line"></div>
        
        <?$arr = [];
        $result = mysqli_query($link, 'SELECT * FROM review');
        while($pro = mysqli_fetch_assoc($result)){
            $arr[] = $pro; 
        }?>
        <div class="slider flex-box horizontal-nav">
            <ul class="slides">
                <?$num = count($arr)?>
                <?for($i=0; $i<$num; $i=$i+2){?>
                    <li class="slider">
                        <div class="reviews-columns">
                            <div class="review-columns-flex">
                                <div class="review first-review">
                                    <div class="review-text">
                                        <i><?=$arr[$i]['description']?></i>
                                    </div>
                                    <div class="review-human">
                                        <div class="review-photo bg-fix" style="background-image: url(<?=$project_root.$arr[$i]['photo']?>)"></div>
                                        <div class="review-human-name"><?=$arr[$i]['name']?></div>
                                    </div>
                                </div>
                                <div class="review first-review">
                                    <div class="review-text">
                                        <i><?=$arr[$i+1]['description']?></i>
                                    </div>
                                    <div class="review-human">
                                        <div class="review-photo bg-fix" style="background-image: url(<?=$project_root.$arr[$i+1]['photo']?>)"></div>
                                        <div class="review-human-name"><?=$arr[$i+1]['name']?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?}
                ?>
            </ul>
            <div>
                <br>
                <br>
                <br>
                <br>
             </div>
        </div>

    </section>


<!---------------------------------------------------- 6 блок  ---------------------------------------------------------------->

    <section class="write-us">
        <div class="h3">Напишите нам</div>
        <div class="h3-line"></div>
        <div class="forms-columns">
            <form class="form-glav" action="form.php" method="get">
                <div class="forms-columns-first">
                    <input name="name" type="text" class="box-small" placeholder="Имя">
                    <input name="email" type="text" class="box-small" placeholder="E-mail">
                    <input name="tel" type="text" class="box-small" placeholder="Телефон">
                    <button class="box-small">отправить запрос</button>
                </div>
                <div class="forms-columns-second">
                    <textarea name="text" id="" class="box-small" placeholder="Ваше сообщение"></textarea>
                </div>
            </form>
        </div>
    </section>



<!---------------------------------------------------- 7 блок  ---------------------------------------------------------------->
        <?php
            include 'components/footer.php';
        ?>

    </div>
</body>    
<script src="js/main.js"></script> 
</html>