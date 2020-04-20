<?php
session_start();

//print_r(PDO::getAvailableDrivers());
error_reporting(-1);
require './config.php';
require './vendor/autoload.php';

$core = new Core\Core();
$core->run();