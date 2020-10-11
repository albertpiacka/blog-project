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
								echo			'<h1>'.$post['title'].'</h1>';
								echo		'</div>';
								echo		'<div class="post-author">';
								echo			'<span>Author</span>';
								echo			'<span class="author-name">Name</span>';
								echo		'</div>';
								echo	'</div>';

								echo 	'<div class="img-container">';
								echo		'<img src="'.$post['img_url'].'" alt="">';
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

