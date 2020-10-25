<?php

    require('config.php');

    $auth->logout($_COOKIE[$auth_config->cookie_name]);

    header('Location: '.BASE_URL.'index.php');