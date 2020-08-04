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
<!---------------------------------------------------- 1 блок  ---------------------------------------------------------------->

    <div class="wrapper">
   
        <?require_once ('components/header.php')?>

<!---------------------------------------------------- 2 блок  ---------------------------------------------------------------->

        <section class="advantages">
            <div class="line">
                <?  foreach((new Goods(0))->getAllUnitsId() as $item){?>
                <?$goods = new Goods($item);?>
                    <div class="half-line">
                        <div class="container-logo">
                            <div class="logo-line bg-fix first-item" style="background-image: url(<?=$hostpath.$goods->getField('photo')?>)"></div> 
                        </div>
                        <div class="line-message">
                            <div class="column headline"><?=$goods->getField('title')?></div>
                            <div class="column text"><?=$goods->getField('description')?></div>
                        </div>
                    </div>
                <?}?>  
            </div>
        </section>


<!---------------------------------------------------- 3 блок  ---------------------------------------------------------------->
  
        <div class="want-line">
            <div class="want-text">Хотите начать зарабатывать в интернете? Просто свяжитесь с нами</div>
            <div class="connect-button">Связаться</div>
        </div>

<!---------------------------------------------------- 5 блок  ---------------------------------------------------------------->

        <div class="porfolio">
            <div class="h-title">Последние работы</div>
            <div class="red-line"></div>
            <div class="last-examples"> 
                <?  foreach((new Portfolio(0))->getAllUnitsId() as $item){?>
                    <?$portfolio = new Portfolio($item);?>
                    <div class="example"><a href="http://www.ya.ru"> <img src="<?=$hostpath.$portfolio->getField('photo')?>" alt=""></a></div>
                <?}?>
            </div>
        </div>

        <div class="facts-line">
            <? foreach((new Facts(0))->getAllUnitsId() as $item){?>
            <?$facts = new Facts($item);?>
                <div class="fact-item">
                    <div class="number"><?=$facts->getField('number')?></div>
                    <div class="white-line"></div>
                    <div class="fact-text"><?=$facts->getField('text')?></div>
                </div>
            <?}?>
        </div>

        <div class="porfolio">
            <div class="h-title">Новости</div>
            <div class="red-line"></div>
            <div class="news-line">
                <? foreach((new News(0))->getAllUnitsId() as $item){?>
                <?$news = new News($item);?>
                    <div class="news-container">
                        <div class="photo bg-fix" style="background-image: url(<?=$hostpath.$news->getField('photo')?>)" ></div>
                        <div class="desription">
                            <div class="date-new"><?=$news->getField('date')?></div>
                            <div class="text-new"><?=$news->getField('text')?></div>
                            <div class="detail">Подробнее</div>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>


<!---------------------------------------------------- 6 блок  ---------------------------------------------------------------->

        <section class="write-us">
            <div class="h-title">Напишите нам</div>
            <div class="red-line"></div>
            <div class="forms-columns">
                <form class="form-glav" action="form.php" method="post">
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