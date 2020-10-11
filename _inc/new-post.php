<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];
    $img = $_POST['img_url'];

    $id = $DB->query("INSERT INTO posts (text, title, img_url) VALUES ('$message', '$title', '$img')");

    if($id){
        // $json = json_encode([$message, $title]);
        $msg->success('The post was succesfully added!');
        header('Location: '.BASE_URL.'posts.php');
        die(); //tento json obsahuje vsetko co sa odosiela , pozri vyssie.. v javascripte k hodnotam pristupujeme pomocou indexu
    }

    
    
