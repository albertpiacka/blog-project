<?php

//Require stuff
require 'vendor/autoload.php';

// Start a Session
if (!session_id()) @session_start();
	
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

//Namespace
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

/******************************************
 * Functions
 * 
 ****************************************/


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


/**
 * Return new string
 * @param $string
 */

function return_string($string) {
    return str_replace('-', ' ', $string);
}

/**
 * Shows 404.php
 * @param none
 */

function show_404(){
    header('Location: '.BASE_URL.'sub_pages/404.php');
	die();
}

/**
 * Get item by id from $_GET['id']
 * @param none
 */

function get_item(){
    if(!isset($_GET['id']) || empty($_GET['id'])){
        return false;
    }

    global $DB;

    $id = $_GET['id'];
    $item = $DB->query("SELECT * FROM posts WHERE id = $id");
    
    if(!$item){
        return false;
    } 

    return $item;
}

/**
 * Redirects you to previous page
 * @param $page, $status_code
 */

function redirect( $page, $status_code = 302 )
	{
		global $base_url;

		if ( $page === 'back' )
		{
			$location = $_SERVER['HTTP_REFERER'];
		}
		else
		{
			$page = ltrim($page, '/');
			$location = "$base_url/$page";
		}

		header("Location: $location", true, $status_code);
		die();
	}

