<?php 

    require('config.php');

    $id = $database->insert('articles', [
        'text' => $_POST['message']
    ]);

    if($id){

        header('Location: '.$base_url.'posts.php');
        die();

    }