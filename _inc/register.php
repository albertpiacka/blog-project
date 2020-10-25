<?php

    require('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    $register = $auth->register($email, $password, $repeat_password);

    if($register){ 
        $login = $auth->login($email, $password);
        if($login){
            $uid = $auth->getSessionUID($_COOKIE[$auth_config->cookie_name]);

            $user = $auth->getUser($uid);

            $user_id = (int)$user['uid'];

            $id = $dbh->query("INSERT INTO users_info (user_id) VALUES ('$user_id')");
            if($id){
                header('Location: '.BASE_URL.'sub_pages/profile.php');
                die();
            } else echo 'something went wrong';
        }
    }

    