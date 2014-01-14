<?php

	require 'vendor/autoload.php';
	
	Predis\Autoloader::register();

	$h_parent = md5($_SERVER['HTTP_HOST']); //Domain used as primary key
	$h_path = md5($_SERVER[REQUEST_URI]); //Requested URI used as field
	$expireTime = strtotime("+24 hours"); //Expiration time, measured in Unixtime stamp from moment key is set.

	$predis_config = array('host'=>'127.0.0.1','password'=>"3.9OmMak&a4!");


	
	//Connecting to Redis
	session_start();
	if (!$_SESSION["predicon"]){
	$_SESSION["predicon"] = new Predis\Client($predis_config);
	}
	$redis = $_SESSION["predicon"];
	//end	

	//Get New Contents
	function get_page_content(){
        ob_start();
        require 'index.php';
	$contents = ob_get_contents();
        ob_end_clean();
	return str_replace("/index_cache.php",'',$contents);
	}
	//End

	//No Cache Request
	if($_SERVER['HTTP_CACHE_CONTROL'] == 'no-cache'){

	echo get_page_content();

	}

	//Getting Cache and Setting Cache	

	if (!$redis->hexists($h_parent,$h_path))
	{
	$redis->hset($h_parent,$h_path,get_page_content());
        $redis->expireat($h_parent,$expireTime);	
	}

	echo $redis->hget($h_parent,$h_path);

?>
