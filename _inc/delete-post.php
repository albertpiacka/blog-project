<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];
    $id = $_POST['id'];

    $post_id = $DB->query("DELETE FROM posts 
            WHERE id = $id
    ");

    if($post_id){
        $msg->success('The post was successfully deleted!');
        header('Location: '.BASE_URL.'posts.php');
        die(); 
    }

    

    