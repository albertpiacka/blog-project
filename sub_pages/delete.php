<?php
	require('../_inc/config.php');

	function return_string($string) {
		return str_replace('-', ' ', $string);
	}

	$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');

	$new_name = return_string($page_name);

	if($page_name == 'index') $page_name = 'home';
	
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
					<article>
						<h2>#Poached madness</h2>
						<div class="img-container">
							<div style="background-image: url('../assets/img/img-1.jpg')" class="img img1"></div>
						</div>
					</article>

					<article>
						<h2>How to ferment anything</h2>
						<div class="img-container">
							<div style="background-image: url('../assets/img/img-2.jpg')" class="img img2"></div>
						</div>
					</article>
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
                    <?php 
                        $id = $_GET['id'];
                        $query = $DB->query("SELECT * FROM posts WHERE id = $id");
                        $post = $query->fetchAll();
					?>
					<form id="delete-form" action="../_inc/delete-post.php" method="post">
						<input name="title" type="text" value="<?php echo $post[0]['title']?>" id="title" readonly>
						<input name="id" type="hidden" value="<?php echo $_GET['id']?>">
						<textarea name="message" id="message" cols="30" rows="20" placeholder="Type something" readonly><?php echo $post[0]['text']?></textarea>
						<input type="submit">
					</form>
				</div>

	    	</div>

                            
        <script src="<?php echo BASE_URL ?>assets/js/post.module.js"></script>
		<script src="<?php echo BASE_URL ?>assets/js/script.js"></script>

	</body>
</html>