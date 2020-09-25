<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];

    $id = $DB->query("INSERT INTO posts (text, title) VALUES ('$message', '$title')");

    if($id){
        $json = json_encode([$message, $title]);
        // header('Location: '.$base_url.'add-post.php');
        die($json); //tento json obsahuje vsetko co sa odosiela , pozri vyssie.. v javascripte k hodnotam pristupujeme pomocou indexu
    }


