<!----------------------- 1 блок  ----------------------->
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/slider.js"></script> 
</head> 

<header>
<!--------------------------------------------- Общие настройки ------------------------------------------------------------->


<!--Выводим ошибки -->
<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!-- Подключаем глобальные переменные и автозагрузчик  -->

<?require_once($_SERVER['DOCUMENT_ROOT'].'/projects/oop-lp/global_pass.php');?>
<?require_once(PROJECT_ROOT.'/system/classes/autoload.php');?>




<!------------------------------------------------- 1 блок ----------------------------------------------------------------->
    <nav>
        <?  foreach((new Logo(0))->getAllUnitsId() as $item){?>
        <?$logo = new Logo($item);?>
        <div class="logo-container">
            <div class="logo bg-fix" style="background-image: url(<?=$hostpath.$logo->getField('path')?>)"></div>
            <div class="logo-message blue-word">GO</div>
            <div class="logo-message blue-word">TO</div>
            <div class="logo-message pink-word">TOP</div>
        </div>
        <?}?>
        <div class="items">
            <?  foreach((new Pages(0))->getAllUnitsId() as $item){?>
            <?$pages = new Pages($item);?>
                <div class="item"><a href=""><?=$pages->getField('name')?></a></div>
            <?}?>
        </div>
    </nav>
       
    <?php
    $slides = [
        ['img/back1.jpg','ВАШ САЙТ - ГЛАВНЫЙ БИЗНЕС-ИНСТРУМЕНТ','https://yandex.ru'],
        ['img/back2.jpg','ВАШ САЙТ - ГЛАВНЫЙ БИЗНЕС-ИНСТРУМЕНТ','https://yandex.ru'],
        ['img/back3.jpg','ВАШ САЙТ - ГЛАВНЫЙ БИЗНЕС-ИНСТРУМЕНТ','https://yandex.ru'],
    ];
    ?>

    <div class="slider flex-box horizontal-nav horizontal-arrows">
        <ul class="slides">
            <?foreach($slides as $elem){?>
                <li>
                    <div class="bg-fix for-button" style="background-image: url('<?=$elem[0]?>');  height: 500px">
                        <div >
                            <a class="slide" href="<?=$elem[2]?>"><?=$elem[1]?></a>
                        </div>
                    </div>
                </li>
            <?}?>
        </ul>
    </div>

    <div>
        <br>
        <br>
    </div>

</header>
