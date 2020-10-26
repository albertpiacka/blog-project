<?php

    require('config.php');

    $comment = $_POST['comment'];

    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $user_name = $_POST['user_name'];

    $new_comment = $dbh->query("INSERT INTO comments (user_id, post_id, user_name, comment) VALUES ('$user_id', '$post_id', '$user_name', '$comment')");

    if($new_comment){
        $json = json_encode([$comment, $user_name]);
        // header('Location: '.BASE_URL.'posts.php#post-'.$post_id.'');
        die($json);
    }

    
    
