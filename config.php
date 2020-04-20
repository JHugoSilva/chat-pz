<?php
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost/chat-pz/");
	$config['dbname'] = 'chat';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'hugodev';
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
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage().'\/'.$e->getLine();
	exit;
}