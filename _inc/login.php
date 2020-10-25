<?php

    require('config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $auth->login($email, $password);

    if($login){
        header('Location: '.BASE_URL.'sub_pages/profile.php');
        die(); 
    }