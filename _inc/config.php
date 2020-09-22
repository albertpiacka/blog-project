<?php

//Require stuff
require 'vendor/autoload.php';

//Namespace
use Medoo\Medoo;
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//Global variables
$base_url = 'http://localhost/blog-project/';

//Connect to DB
$config =[

    'db' => [
        'db_type' => 'mysql',
        'db_name' => 'blog',
        'server'        => 'localhost',
        'username'      => 'root',
        'password'      => '',
        'charset'       => 'utf8'
    ]

];

$DB = new PDO(

    "{$config['db']['db_type']}:host={$config['db']['server']};dbname={$config['db']['db_name']}",
    $config['db']['username'], $config['db']['password']

);
