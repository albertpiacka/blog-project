<?php

    require('config.php');

    $message = $_POST['message'];
    $title = $_POST['title'];
    $id = $_POST['id'];

    $txtOldLength = $_POST['txtOldLength'];
    $txtNewLength = $_POST['txtNewLength'];

    $titleOldLength = $_POST['titleOldLength'];
    $titleNewLength = $_POST['titleNewLength'];

    if((int)$txtOldLength === (int)$txtNewLength && (int)$titleOldLength === (int)$titleNewLength){
        $msg->warning("You haven't changed it at all!");
        redirect('back');
    } else {
        $post_id = $dbh->query("UPDATE posts SET
                title = '$title',
                text = '$message'
            WHERE id = $id
        ");

        if($post_id){
            $msg->success('The post was succesfully changed!');
            header('Location: '.BASE_URL.'posts.php');
            die(); 
        } 
    }
