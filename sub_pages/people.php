<?php
	require('../_inc/config.php');

    $users_info = $dbh->query("SELECT * FROM users_info");
    $user_info = $users_info->fetchAll();
    
    if(!$_POST){
        echo 'forbidden asshole';
    } else if($_POST){
        $search = $_POST['searchbar'];

        foreach($user_info as $user){
            $user_name = $user['first_name'].' '.$user['last_name'];

            if(strpos($user_name, $search) !== false){
                echo '<div class="user">';
                echo    '<a href="#"><i class="far fa-times-circle"></i></a>';
                echo    '<div class="img-container">';
                if(!$user['user_img']){
                echo        '<img src="assets/img/user-default.png" alt="haha">';
                } else echo '<img src="assets/files/'.$user['user_img'].'" alt="haha">';
                echo    '</div>';
                echo    '<div class="user-info">';
                echo        '<div class="block">';
                echo            '<h3>'.$user_name.'</h3>';
                if($user['age'] == 0){
                echo            '<span>Not set</span>';
                } else echo     '<span>'.$user['age'].'</span>';
                echo        '</div>';
                echo        '<div class="block">';
                if($user['location'] == 'empty'){
                    echo            '<h4>Not set</h4>';
                } else echo         '<h4>'.$user['location'].'</h4>';
                echo        '</div>';
                echo        '<div class="block">';
                echo            '<p>'.$user['about'].'</p>';
                echo        '</div>';
                echo    '</div>';
                echo '</div>';
            } else {
                echo    '<div class="user user-notfound">';
                echo    '<a href="#"><i class="far fa-times-circle"></i></a>';
                echo        '<h3>No user found!</h3>';
                echo    '</div>'; 
            }
                

        }
    }

?>

