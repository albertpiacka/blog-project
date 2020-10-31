<?php
	require('../_inc/config.php');

	$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');

	$new_name = return_string($page_name);

	if($page_name == 'index') $page_name = 'home';
	if($new_name == 'index') $new_name = 'home';

	$item = get_item();
	if(!$item) show_404();

	$post = $item->fetchAll();

	if (!$auth->isLogged()) {
		header('HTTP/1.0 403 Forbidden');
		echo "Forbidden";
		echo '<a href="../index.php">Home</a>';
	
		die();
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
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/node_modules/aos/dist/aos.css">
		<link rel="stylesheet" href="<?php echo BASE_URL ?>assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
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
						echo '<button class="sign-out"><a href="../_inc/logout.php">Sign out</a></button>';
					} else {
						echo '<button class="sign-up"><a href="sign-up.php">Sign up</a></button>';
						echo '<button class="sign-in"><a href="sign-in.php">Sign in</a></button>';
					}
				?>
			</div>

			<div class="content-container">
				<section class="menu">
					<ul class="ul-menu">
                        <li class="selected-page">Editing</li>
                        <li><a href="../add-post.php">Add post</a></li>
                        <li><a href="../gallery.php">Gallery</a></li>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../posts.php">Posts</a></li>
					</ul>
				</section>

				<section class="articles">
					<?php
						
						$query = $dbh->query("SELECT * FROM posts ORDER by id DESC");

						$postPreviews = $query->fetchAll();

						foreach($postPreviews as $preview){
							echo '<article class="article-'.$preview['id'].'">';
							echo	'<h2>'.$preview['title'].'</h2>';
							echo	'<div class="img-container">';
							echo		'<a href="'.BASE_URL.'posts.php#post-'.$preview['id'].'"><img src="../assets/files/'.$preview['img_dir'].'" alt=""></a>';
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
					
					<?php include('../_partials/svg-heading.php') ?>
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

                <div class="form-container">
					<form id="delete-form" action="../_inc/delete-post.php" method="post">
						<a href="<?php echo BASE_URL.'posts.php' ?>"><i class="fas fa-arrow-left"></i></a>
						<input name="title" type="text" value="<?php echo $post[0]['title']?>" id="title" readonly>
						<input name="id" type="hidden" value="<?php echo $_GET['id']?>">
						<input name="txtOldLength" id="txtOldLength" type="hidden">
						<input name="txtNewLength" id="txtNewLength" type="hidden">
						<input name="titleOldLength" id="titleOldLength" type="hidden">
						<input name="titleNewLength" id="titleNewLength" type="hidden">
						<textarea name="message" id="message" cols="30" rows="20" placeholder="Type something" readonly><?php echo $post[0]['text']?></textarea>
						<input type="submit" value="Delete">
					</form>
				</div>

	    	</div>

<?php include_once('../_partials/footer.php') ?>
