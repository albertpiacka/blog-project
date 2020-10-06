<?php

//Require stuff
require 'vendor/autoload.php';

//Namespace
use Medoo\Medoo;
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

//Constants 
define('BASE_URL', 'http://localhost/blog-project/');
define('APP_PATH', realpath(__DIR__ . '/../') );


//Config, connect to DB
$config = [

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

/**
 * Create paragraph
 * @param $array
 */
function return_paragraphs($array){
    $newArray = array_chunk($array, 10);
    foreach($newArray as $array){
        $finalArr = implode('.', $array);
        echo '<div class="post-text">';
        echo    '<p>'.$finalArr.'.</p>';
        echo '</div>';
    }
}

/**
 * Return new date
 * @param $date
 */

function return_date($date){
    $newDate = explode(' ', $date);
    return $newDate[0];
}




