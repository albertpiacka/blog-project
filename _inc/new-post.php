<?php

    require('config.php');

    $message = $_POST['message'];

    if(isset($message)){
        $id = $DB->query("INSERT INTO posts (text)
              VALUES ('$message')");
    } else return;

    if($id){
        $json = json_encode($message);
        // header('Location: '.$base_url.'add-post.php');
        die($json);
    }


