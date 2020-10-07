<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];
    $id = $_POST['id'];

    $post_id = $DB->query("UPDATE posts SET
                title = '$title',
                text = '$message'
            WHERE id = $id
    ");

    if($post_id){
        header('Location: '.BASE_URL.'posts.php');
        die(); 
    }

    