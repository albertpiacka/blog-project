<?php
	require('../_inc/config.php');

	$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');

	$new_name = return_string($page_name);

	if($page_name == 'index') $page_name = 'home';
	if($new_name == 'index') $new_name = 'home';

	$query = $dbh->query("SELECT * FROM posts ORDER by id DESC");

    $posts = $query->fetchAll();
    
    if (!$auth->isLogged()) {
		header('HTTP/1.0 403 Forbidden');
		echo "Forbidden";
	
		exit();
	} else if($auth->isLogged()){
		$uid = $auth->getSessionUID($_COOKIE[$auth_config->cookie_name]);

		$user = $auth->getUser($uid);

		$user_id = $user['uid']; 

		$users_info = $dbh->query("SELECT * FROM users_info WHERE user_id = $user_id");
		$info = $users_info->fetch();
	}
	
?>

<!DOCTYPE html>
<html data-theme="light">
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/fontawesome-free-5.13.0-web/css/all.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/normalize.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/main.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo ucfirst($new_name); ?> / Chefly</title>
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
		<![endif]-->
	</head>
	<body class="<?php echo $page_name; ?>">

		<div class="side-menu">
			<div class="account-info">
				<?php
					if($auth->isLogged() && !$info['user_img']){
						echo '<a href="profile.php"><img src="../assets/img/user-default.png" alt="#"></a>';
					} else {
						echo '<a href="profile.php"><img src="../assets/files/'.$info['user_img'].'" alt="#"></a>';
					}
				?>
			</div>

			<div class="account-controls">
				<?php
					if ($auth->isLogged()) {
						echo '<button class="sign-up"><a href="../_inc/logout.php">Sign out</a></button>';
					} else {
						echo '<button class="sign-up"><a href="sign-up.php">Sign up</a></button>';
						echo '<button class="sign-in"><a href="sign-in.php">Sign in</a></button>';
					}
				?>
			</div>

			<div class="content-container">
				<section class="menu">
					<ul class="ul-menu">
                        <li class="selected-page">Add post</li>
                        <li><a href="../gallery.php">Gallery</a></li>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../posts.php">Posts</a></li>
					</ul>
				</section>

				<section class="articles">
					<?php

						foreach($posts as $post){
							echo '<article class="article-'.$post['id'].'">';
							echo	'<h2>'.$post['title'].'</h2>';
							echo	'<div class="img-container">';
							echo		'<a href="'.BASE_URL.'posts.php#post-'.$post['id'].'"><img src="../assets/files/'.$post['img_dir'].'" alt=""></a>';
							echo	'</div>';
							echo '</article>';
						}

					?>
				</section>
			</div>

			<section class="footer">

			</section>
		</div>

		<div class="wrapper">
	
			<div class="main">
				<div id="strip-menu" class="menu-toggle">
					<i><i class="fas fa-ellipsis-h"></i></i>
				</div>
				<header>
					
					<div class="toggle-container">
						<input type="checkbox" id="switch" name="theme" /><label for="switch">Toggle</label>
					</div>
					
				</header>

                <div class="profile-container">
					
					<div class="profile-box">
						<div class="go-back">
							<a href="<?php echo BASE_URL.'sub_pages/profile.php' ?>"><i class="fas fa-arrow-left"></i></a>
						</div>
						<form id="edit-profile-form" action="../_inc/edit-profile.php" method="post" enctype="multipart/form-data">
							
                            <div class="img-container">
								<?php
									if($auth->isLogged() && !$info['user_img']){
										echo '<img class="userImg" src="../assets/img/user-default.png" alt="#">';
										echo '<img class="insertImg" src="../assets/img/img-insert-icon.png" alt="#">';
									} else {
										echo '<img class="userImg" src="../assets/files/'.$info['user_img'].'" alt="#">';
										echo '<img class="insertImg" src="../assets/img/img-insert-icon.png" alt="#">';
									}
								?>
								<input name="file" id="file" type="file">
							</div>
							
                            <div class="info-container">
								<div class="box box-1">

									<div class="input-box">
										<span>First name</span>
										<input name="first_name" type="text" value="<?php echo $info['first_name'] ?>">
									</div>

									<div class="input-box">
										<span>Last name</span>
										<input name="last_name" type="text" value="<?php echo $info['last_name'] ?>">
									</div>

									<div class="input-box">
										<span>Location</span>
										<input name="location" type="text" value="<?php echo $info['location'] ?>">
									</div>

									<div class="input-box">
										<span>Phone</span>
										<input name="phone" type="text" value="<?php echo $info['phone'] ?>">
									</div>

									<div class="input-box">
										<span>Age</span>
										<input name="age" type="text" value="<?php echo $info['age'] ?>">
									</div>

									<div class="input-box">
										<span>Degree</span>
										<input name="degree" type="text" value="<?php echo $info['degree'] ?>">
									</div>

								</div>

								<div class="box box-2">
									<span>About</span>
									<textarea name="about" id="about" cols="30" rows="10"><?php echo $info['about'] ?></textarea>
									<input type="submit" value="Change">	
								</div>
                            </div>	

                        </form>
					</div>
				</div>

	    	</div>

                            
<?php include_once('../_partials/footer.php') ?>