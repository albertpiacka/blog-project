<?php

    require('_inc/config.php');

    $message = $_POST['message'];

    $id = $DB->query("INSERT INTO posts (text)
              VALUES ('$message')");

    if($id){

        header('Location: '.$base_url.'posts.php');
        die();

    }