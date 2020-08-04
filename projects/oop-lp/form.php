<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
	require_once($_SERVER['DOCUMENT_ROOT'].'/projects/oop-lp/global_pass.php');
    require_once(PROJECT_ROOT.'/system/classes/autoload.php');


    foreach($_POST as $key=>$value){
        $arr_fields[] = $key;
        $arr_values[] = $value;
    }

	$leads = new Leads(0);
	if ($leads->createLine($arr_fields,$arr_values)){
        header('Location:index.php');
    }else{
        echo 'Не получилось передать данные. Позвоните нам, пожалуйста, по номеру 7777777';
    }
	
		
?>