<?define('PROJECT_ROOT',$_SERVER['DOCUMENT_ROOT'].'/projects/oop-lp');

define('DB_HOST','localhost');
define('DB_NAME','u0741356_oop-lp');
define('DB_USER','u0741356_default');
define('DB_PASSWORD','4JSu_zto');   


	$isHttps = !empty($_SERVER['HTTPS']) && 'off' !== strtolower($_SERVER['HTTPS']);
	if($isHttps){
		$protocol = 'https';
	}else{
		$protocol = 'http';
	}
    $hostpath = $protocol.'://'.$_SERVER['HTTP_HOST'].'/projects/oop-lp';
	
	//var_dump($_SERVER);
	
	
	define('PROJECT_URL',$hostpath);
	

