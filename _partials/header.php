<?php
	require('_inc/config.php');

	$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');

	$new_name = return_string($page_name);

	if($page_name == 'index') $page_name = 'home';
	if($new_name == 'index') $new_name = 'home';

	$query = $dbh->query("SELECT * FROM posts ORDER by id DESC");

	$posts = $query->fetchAll();

	if($auth->isLogged()){
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
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="referrer" content="strict-origin-when-cross-origin">
		<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/node_modules/aos/dist/aos.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/normalize.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/main.css">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo ucfirst($new_name); ?> / Chefly</title>
		<!-- <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script> -->
	</head>
	<body class="<?php echo $page_name; ?>">

		<div class="side-menu">
			<?php if($auth->isLogged()) : ?>
				<div class="account-info">
					
					<?php
						if(!$info['user_img']){
							echo '<a href="sub_pages/profile.php"><img src="assets/img/user-default.png" alt="#"></a>';
						} else if($info['user_img']){
							echo '<a href="sub_pages/profile.php"><img src="assets/files/'.$info['user_img'].'" alt="#"></a>';
						} 
					?>
					
				</div>
			<?php endif ?>
			<div class="account-controls">
				<?php
					if ($auth->isLogged()) {
						echo '<button class="sign-out"><a href="_inc/logout.php">Sign out</a></button>';
					} else {
						echo '<button class="sign-up"><a href="sub_pages/sign-up.php">Sign up</a></button>';
						echo '<button class="sign-in"><a href="sub_pages/sign-in.php">Sign in</a></button>';
					}
				?>
			</div>

			<div class="content-container">
				<section class="menu">
					<ul class="ul-menu">

						<?php
							
							$pages = glob('*.php');

							foreach( $pages as $file ) {

								$page = basename($file, '.php');
								if($page == 'index'){
									$page = 'home';
								} else if($page == 'add-post'){
									$page = 'add post';
								}
								
								if($new_name == $page ) echo '<li class="selected-page">'.ucfirst($page).'</li>';
								else echo '<li><a href="'.$file.'">'.ucfirst($page).'</a></li>';

							}	

						?>
						
					</ul>
				</section>

				<section class="search-bar">
					<form id="searchbar" action="<?php echo BASE_URL ?>sub_pages/people.php" method="post">
						<input type="text" name="searchbar" placeholder="Search for profile">
					</form>
				</section>

				<section class="articles">
					<?php

						foreach($posts as $post){
							echo '<article class="article-'.$post['id'].'">';
							echo	'<h2>'.$post['title'].'</h2>';
							echo	'<div class="img-container">';
							echo		'<a href="'.BASE_URL.'posts.php#post-'.$post['id'].'"><img src="assets/files/'.$post['img_dir'].'" alt=""></a>';
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
					
					<?php include('svg-heading.php') ?>
					<ul>
						<li>
							<a href="#"><i class="fas fa-hashtag"></i></a>
						</li>
						<li>
							<a href="#"><i class="fab fa-facebook-f"></i></a>
						</li>
					</ul>
					<div class="toggle-container">
						<input type="checkbox" id="switch" name="theme" /><label for="switch">Toggle</label>
					</div>
					
				</header>