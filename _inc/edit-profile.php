<?php

    require('config.php');

    if (!$auth->isLogged()) {
		header('HTTP/1.0 403 Forbidden');
		echo "Forbidden";
		echo '<a href="../index.php">Home</a>';
	
		die();
    } else if($auth->isLogged()){
      $uid = $auth->getSessionUID($_COOKIE[$auth_config->cookie_name]);

      $user = $auth->getUser($uid);

      $user_id = (int)$user['uid'];

      $users_info = $dbh->query("SELECT * FROM users_info WHERE user_id = $user_id");
		  $info = $users_info->fetch();
    }

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $location = $_POST['location'];
    $age = (int)$_POST['age'];
    $phone = $_POST['phone'];
    $degree = $_POST['degree'];
    $about = $_POST['about'];

    $name = $_FILES['file']['name'];
    $target_dir = "C:/laragon/www/blog-project/files/";
    $file = basename($_FILES["file"]["name"]);

    if($file == ''){
      $file = $info['user_img'];
    } 

    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

    $user_update = $dbh->query("UPDATE users_info SET 
              first_name = '$first_name',
              location = '$location',
              last_name = '$last_name',
              phone = '$phone',
              age = '$age',
              degree = '$degree',
              about = '$about',
              user_img = '$file'
          WHERE user_id = $user_id;
    ");

    $user_name = $first_name.' '.$last_name;

    $post_update = $dbh->query("UPDATE posts SET
              user_name = '$user_name'
            WHERE user_id = $user_id;
    ");

    if($user_update && $post_update){
        header('Location: '.BASE_URL.'sub_pages/profile.php');
        die(); 
    } else {
        echo 'something went wrong :-(';
    }


    