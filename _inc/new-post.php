<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];

    $id = $DB->query("INSERT INTO posts (text, title) VALUES ('$message', '$title')");

    if($id){
        // $json = json_encode([$message, $title]);
        header('Location: '.BASE_URL.'posts.php');
        die(); //tento json obsahuje vsetko co sa odosiela , pozri vyssie.. v javascripte k hodnotam pristupujeme pomocou indexu
    }

    
    
