<footer>

<!--------------------------------------------------------- 1 блок  ------------------------------------------------------------------------>
    <div class="footer-up">
        <div class="footer-up-headline">
            <div class="headline-footer-up-items">О нас</div>
            <div class="headline-footer-up-items">Читайте в новостях</div>
            <div class="headline-footer-up-items">Контакты</div>
        </div>
        <div class="footer-up-description">
            <div class="description-column">
                <div class="footer-text-description">
                    Мы оказываем всестороннюю помощь компаниям и физическим лицам - собственникам веб-ресурсов, которые готовы использовать сайт, как эффективный рекламный инструмент, позволяющий развивать бизнес.
                </div>
            </div>
            <div class="last-news-column">
                <div class="footer-text-description">
                    Новые разработки <br>
                    Мы работаем, Вы отдыхаете
                </div>
            </div>
            <div class="description-column">
                <? foreach((new Contacts(0))->getAllUnitsId() as $item){?>
                <?$contacts = new Contacts($item);?>
                    <div class="contacts">
                        <div class="adress">
                            <div class="adress-logo-footer bg-fix"></div>
                            <div class="adress-text"><?=$contacts->getField('address')?></div>
                        </div>
                        <div class="email">
                            <div class="email-logo-footer bg-fix"></div>
                            <div class="email-text"><a href="<?=$contacts->getField('mail_real')?>"></a><?=$contacts->getField('mail')?></div>
                        </div>
                        <div class="tel">
                            <div class="tel-logo-footer bg-fix"></div>
                            <div class="tel-text"><a href="tel:<?=$contacts->getField('tel_real')?>"></a><?=$contacts->getField('tel')?></div>
                        </div>
                    </div>
                <?}?>
            </div>
        </div>
    </div>
    <div class="footer-down">
        <div class="footer-down-items">
            <div class="center-column">
                Все права защищены
            </div>
        </div>
    </div>
</footer>

<script src="js/main.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>
