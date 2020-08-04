<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Контакты</title>
    <link rel="stylesheet" href="css/style.css">

    
    <script src="icon_customImage.js" type="text/javascript"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=1dedc7d3-692d-4131-9d42-55bfead0a83e" type="text/javascript"></script>
    <script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    <div class="wrapper">

    <? 
    include 'components/header.php';
    ?>

    <div class="wrapper">
        <div class="h3">Контакты</div>
        <? $result = mysqli_query($link, 'SELECT * FROM about');
        while($arr = mysqli_fetch_assoc($result)){?>
        <div class="contact-message"><?=$arr['description']?></div>
        <?}?>
        <div class="line-staff">
            <? $result = mysqli_query($link, 'SELECT * FROM staff');
            while($arr = mysqli_fetch_assoc($result)){?>
            <div class="staff-container">
                <div class="foto-first bg-fix" style="background-image: url(<?=$project_root.$arr['photo']?>)"></div>
                <div class="info-container">
                    <div class="staff-name"><?=$arr['name']?></div>
                    <div class="staff-position"><?=$arr['position']?></div>
                    <div class="staff-why-write"><?=$arr['functional']?></div>
                    <div class="staff-mail"><a href="mailto:<?=$arr['mail_real']?>"><?=$arr['mail']?></a></div>
                </div>
            </div>
            <div style="width: 30px"></div>
            <?}?>
        </div>
        
            <div class="coordinates">
            <? $result = mysqli_query($link, 'SELECT * FROM contacts');
            while($arr = mysqli_fetch_assoc($result)){?>
                <div class="contacts">
                    <div class="adress flex-left">
                        <div class="adress-logo bg-fix"></div>
                        <div class="adress-text px26"><?=$arr['address']?></div>
                    </div>
                    <div class="email flex-left">
                        <div class="email-logo bg-fix"></div>
                        <div class="email-text px26"><a href="mailto:<?=$arr['mail_real']?>"></a><?=$arr['mail']?></div>
                    </div>
                    <div class="tel flex-left">
                        <div class="tel-logo bg-fix"></div>
                        <div class="tel-text px26"><a href="tel:<?=$arr['tel_real']?>"></a><?=$arr['tel']?></div>
                    </div>
                </div>
            <?}?>
            <form class="forms-columns" style="padding-left:0;" action="test.html" method="post">
                <div class="forms-columns-first" style="width:100%;">
                        <input type="text" class="box-small" placeholder="Имя">
                        <input type="text" class="box-small" placeholder="E-mail">
                        <textarea type="text" rows="7" class="box-small" placeholder="Ваше сообщение"></textarea>
                        <button class="box-small">отправить запрос</button>
                </div>
            </form>
        </div>

<!-- блок карты яндекса -->

    <div id="map"></div>

    <?php
    include 'components/footer.php';
    ?>
</div>
</body>
<script>
    ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
            center: [55.776107, 37.648142],
            zoom: 15,
            // Добавим панель маршрутизации.
            controls: ['routePanelControl']
        });

        var control = myMap.controls.get('routePanelControl');

        // Зададим состояние панели для построения машрутов.
        control.routePanel.state.set({
            // Тип маршрутизации.
            type: 'masstransit',
            // Выключим возможность задавать пункт отправления в поле ввода.
            fromEnabled: false,
            // Адрес или координаты пункта отправления.
            from: 'ул.Большая Спасская, д.12',
            // Включим возможность задавать пункт назначения в поле ввода.
            toEnabled: true
            // Адрес или координаты пункта назначения.
            //to: 'Петербург'
        });

        // Зададим опции панели для построения машрутов.
        control.routePanel.options.set({
            // Запрещаем показ кнопки, позволяющей менять местами начальную и конечную точки маршрута.
            allowSwitch: false,
            // Включим определение адреса по координатам клика.
            // Адрес будет автоматически подставляться в поле ввода на панели, а также в подпись метки маршрута.
            reverseGeocoding: true,
            // Зададим виды маршрутизации, которые будут доступны пользователям для выбора.
            types: { masstransit: true, pedestrian: true, taxi: true }
        });

        // Создаем кнопку, с помощью которой пользователи смогут менять местами начальную и конечную точки маршрута.
        var switchPointsButton = new ymaps.control.Button({
            data: {content: "Поменять местами", title: "Поменять точки местами"},
            options: {selectOnClick: false, maxWidth: 160}
        });
        // Объявляем обработчик для кнопки.
        switchPointsButton.events.add('click', function () {
            // Меняет местами начальную и конечную точки маршрута.
            control.routePanel.switchPoints();
        });
        myMap.controls.add(switchPointsButton);
    });
 </script>
</html>