<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];

    $name = $_FILES['file']['name'];
    $target_dir = "C:/laragon/www/blog-project/assets/files/";
    $file = basename($_FILES["file"]["name"]);

    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];

    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    $id = $dbh->query("INSERT INTO posts (text, title, img_dir, user_id, user_name) VALUES ('$message', '$title', '$file', '$user_id', '$user_name')");

    if($id){
        // $json = json_encode([$message, $title]);
        $msg->success('The post was succesfully added!');
        header('Location: '.BASE_URL.'posts.php');
        die(); //tento json obsahuje vsetko co sa odosiela , pozri vyssie.. v javascripte k hodnotam pristupujeme pomocou indexu
    }

    
    
