<!----------------------- 1 блок  ----------------------->
<head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/slider.js"></script> 
</head> 

<!--------------------------------------------- вот ниже это надо убрать как-то  ------------------------------------------------------------>
<?
    $project_root = "http://wpmiracle.ru/projects/multi-page/";
?>

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


<header>

    <nav>

        <?
        $result = mysqli_query($link, 'SELECT * FROM logo');
        while($arr = mysqli_fetch_assoc($result)){?>
        <div class="logo-container">
            <div class="logo bg-fix" style="background-image: url(<?=$project_root.$arr['path']?>)"></div>
            <div class="logo-message"><?=$arr['name']?></div>
        </div>
        <?}?>
        <div class="items">
        <?
        $result = mysqli_query($link, 'SELECT * FROM pages');
        while($arr = mysqli_fetch_assoc($result)){?>
            
                <div class="item"><a href="<?=$arr['ref']?>"><?=$arr['name']?></a></div>
            
        <?}?>
        </div>
    </nav>
       
    <?php
    $slides = [
        ['img/top.jpg','Путешествие в одиночку','https://yandex.ru'],
        ['img/top1.jpg','Путешествие вдвоем','#'],
        ['img/top2.jpg','Путешествие втроем','#'],
    ];
    ?>

    <div class="slider flex-box horizontal-nav horizontal-arrows">
        <ul class="slides">
            <?foreach($slides as $elem){?>
                <li>
                    <div class="bg-fix for-button" style="background-image: url('<?=$elem[0]?>');  height: 560px">
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
