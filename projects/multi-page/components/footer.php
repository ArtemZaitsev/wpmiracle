<footer>
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
<!--------------------------------------------------------- 1 блок  ------------------------------------------------------------------------>
    <div class="footer-up">
        <div class="footer-up-headline">
            <? $result = mysqli_query($link, 'SELECT * FROM logo');
            while($arr = mysqli_fetch_assoc($result)){?>
                <div class="logo-container headline-footer-up-items">
                    <div class="logo bg-fix"style="background-image: url(<?=$project_root.$arr['path']?>)"></div>
                    <div class="logo-message"><?=$arr['name']?></div>
                </div>
                <div class="headline-footer-up-items">
                    Контакты
                </div>
            <?}?>
            <div class="headline-footer-up-items">
                Последние новости
            </div>
        </div>
        <div class="footer-up-description">
            <div class="description-column">
                <div class="footer-text-description">
                    Мы приглашаем тебя на самые разные экскурсии по Москве. Автобусные и пешеходные, на
                    целый
                    день
                    или на несколько часов, на свежем воздухе или с заходом в здания - у нас в ассортименте
                    более
                    20 авторских экскурсий по Москве, выбирай и узнавай Москву вместе с нами!
                </div>
            </div>
            <div class="description-column">
                <? $result = mysqli_query($link, 'SELECT * FROM contacts');
                while($arr = mysqli_fetch_assoc($result)){?>
                    <div class="contacts">
                        <div class="adress">
                            <div class="adress-logo-footer bg-fix"></div>
                            <div class="adress-text"><?=$arr['address']?></div>
                        </div>
                        <div class="email">
                            <div class="email-logo-footer bg-fix"></div>
                            <div class="email-text"><a href="<?=$arr['mail_real']?>"></a><?=$arr['mail']?></div>
                        </div>
                        <div class="tel">
                            <div class="tel-logo-footer bg-fix"></div>
                            <div class="tel-text"><a href="tel:<?=$arr['tel_real']?>"></a><?=$arr['tel']?></div>
                        </div>
                    </div>
                <?}?>
            </div>
            <div class="last-news-column"">
            <? $result = mysqli_query($link, 'SELECT * FROM news');
            while($arr = mysqli_fetch_assoc($result)){?>
                <div class="last-news footer-text-description">
                    <div class="down-text"><?=$arr['description']?></div>
                    <div class="date"><?=$arr['date']?></div>
                </div>
            <?}?>
            </div>
        </div>
    </div>
    <div class="footer-down">
        <div class="footer-down-items">
            <div class="left-column one-third-footer-down">
                &#169 2018 Copyright. Все права защищены
            </div>
            <div class="center-column one-third-footer-down">
                Designid by Nordic IT School
            </div>
            <div class="rigth-column one-third-footer-down">
                <div class="social-network">
                    <div class="vk icon bg-fix"></div>
                    <div class="facebook icon bg-fix"></div>
                    <div class="insta icon bg-fix"></div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="js/main.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
