
<?php

define('TOKEN', '');
define('URL', 'https://api.telegram.org/bot'.TOKEN.'/');

$tmp = file_get_contents("php://input");
$bot = json_decode($tmp, true);
$chat = $bot["message"]["chat"]["id"];
$user_first_name = $bot["message"]["from"]["first_name"];
$user_last_name = $bot["message"]["from"]["last_name"];
$user = $user_last_name.' '.$user_first_name;
$text = $bot["message"]["text"];

if($text =='/start') {
    $msg = 'Я знаю команды: Привет, Поедем в Анапу?, Пока.';  
    send ($chat, $msg); 
}elseif($text =='Привет'){
    $msg = 'Привет дружок';
    send ($chat, $msg); 
}elseif($text =='Поедем в Анапу?'){
    $msg = 'Да, конечно. Я уже положил деньги на транспондер';
    send ($chat, $msg); 
}elseif($text =='Пока'){
    $msg = 'Пока жирок!';
    send ($chat, $msg); 
}else{
    $msg = 'Я не знаю такой команды. Позвоните моему корешу Артему';
    send ($chat, $msg); 
}

function send( $chat, $msg ){
    file_get_contents(URL."sendmessage?parse_mode=HTML&text=$msg&chat_id=$chat");
}


?>
    
