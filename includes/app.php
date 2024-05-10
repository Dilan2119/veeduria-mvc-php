<?php
use Dotenv\Dotenv;
use Model\ActiveRecord;

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'funciones.php';
require 'config/databases.php';


//Conectarnos a la base de datos
$db = conectarDB();



ActiveRecord::setDB($db);


//var_dump($proyecto);