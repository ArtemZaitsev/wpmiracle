<?
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// $full_info = $_GET['name'].'-'.$_GET['email'].'-'.$_GET['tel'].'-'.$_GET['text'];

$DB_HOST = 'localhost';
$DB_USER = 'u0741356_first-l' ;
$DB_PASS = '4JSu_zto';
$DB_NAME = 'u0741356_first-lp';

$name = $_GET['name'];
$email = $_GET['email'];
$tel = $_GET['tel'];
$text = $_GET['text'];

$link = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
mysqli_set_charset($link, "utf8");
$qr = "INSERT INTO form (id, name, email, tel, text) VALUES (NULL,'$name','$email','$tel','$text')";
$result = mysqli_query($link,$qr);
if($result){
    header ('Location: index.php');

        

} else {
    echo 'не получилось передать';
}

// echo $_SERVER['DOCUMENT_ROOT'];

// echo  $_SERVER['REMOTE_ADDR'];


?>