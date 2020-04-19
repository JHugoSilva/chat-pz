<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost:8080/chat/");
	$config['dbname'] = 'chart';
	$config['host'] = '127.0.0.1';
	$config['dbuser'] = 'postgres';
	$config['dbpass'] = '123';
} else {
	define("BASE_URL", "http://localhost/chat/");
	$config['dbname'] = 'chat';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

global $db;
try {
	$db = new PDO("pgsql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
	//$db = new \PDO("pgsql:dbname=chart;host=127.0.0.1;","postgres","123");
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage().'\/'.$e->getLine();
	exit;
}