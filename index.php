<?php 
	include_once('_partials/header.php');

	$numPosts = count($posts);
	
?>

				<div class="articles-heading">
					<a href="#">Dont't miss out</a>
				</div>

				<section id="articles" class="articles <?php echo $numPosts ?>">
					<?php 
						if(!$posts){
							echo "<p>I'm so empty :-(</p>";
						} else {
							foreach($posts as $post){
								echo '<article class="article article-'.$post['id'].'">';
								echo 	'<div class="header-container">';
								echo		'<div class="title">';
								echo			'<a href="'.BASE_URL.'posts.php#post-'.$post['id'].'"><h1>'.$post['title'].'</h1></a>';
								echo		'</div>';
								echo		'<div class="post-author">';
								echo			'<span>Author</span>';
								$id = $post['user_id'];
								$queryUsers = $dbh->query("SELECT * FROM phpauth_users WHERE id = $id");

								$users = $queryUsers->fetchAll();
								if($post['user_name'] == 'empty'){
									echo			'<span class="author-name">'.$users[0]['email'].'</span>';
								} else echo 		'<span class="author-name">'.$post['user_name'].'</span>';
								echo		'</div>';
								echo	'</div>';

								echo 	'<div class="img-container">';
								echo		'<a href="'.BASE_URL.'posts.php#post-'.$post['id'].'"><img src="assets/files/'.$post['img_dir'].'" alt=""></a>';
								echo	'</div>';
								echo	'<p>';
								echo		$post['text'];
								echo	'</p>';
								echo '</article>';
							}
						}
					?>
				</section>

			</div>

		</div>


<?php include_once('_partials/footer.php') ?>

