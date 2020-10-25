<?php
	require('../_inc/config.php');

	$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');

	$new_name = return_string($page_name);

	if($page_name == 'index') $page_name = 'home';
	if($new_name == 'index') $new_name = 'home';
	
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

		<div class="wrapper">
	
			<div class="main">

				<header>

					<div class="toggle-container">
						<input type="checkbox" id="switch" name="theme"><label for="switch">Toggle</label>
					</div>
					
				</header>

                <div class="form-container">
					<form id="sign-up-form" action="../_inc/register.php" method="post">
						<a href="<?php echo BASE_URL.'posts.php' ?>"><i class="fas fa-arrow-left"></i></a>
						<input name="email" type="email" placeholder="Email">
						<input name="password" type="password" placeholder="Password">
                        <input name="repeat_password" type="password" placeholder="Repeat password">
                        <input type="submit" value="Sign up">
					</form>
				</div>

	    	</div>

                            
<?php include_once('../_partials/footer.php') ?>