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
								echo '<article data-aos="fade-up" class="article article-'.$post['id'].'">';
								echo 	'<div class="header-container">';
								echo		'<div class="title">';
								echo			'<a href="'.BASE_URL.'posts.php#post-'.$post['id'].'"><h1>'.$post['title'].'</h1></a>';
								echo		'</div>';
								echo		'<div class="post-author">';
								echo			'<span>Author</span>';
								$id = $post['user_id'];
								$queryUsers = $dbh->query("SELECT * FROM phpauth_users WHERE id = $id");

								$users = $queryUsers->fetchAll();
								if($post['user_name'] == 'empty empty'){
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

				<div class="about-wrapper">
					<h2>What is this about anyway?</h2>

					<div class="about">
						<p>	
							Chefly is a small project focused in the world of culinary and gastronomy. Main goal is to gather useful information and spread them to the world.  
						</p>
					</div>

					<div class="info">
						<h3 data-aos="fade-up">Chefly lets you..</h3>
						<div class="info-collection">
							<div data-aos="fade-up" class="info-item">
								<h4>Create and customize your articles</h4>
								<p data-aos="fade-up" data-aos-delay="50">Chefly has intuitive system of creating articles. It's simple, yet effective!</p>
							</div>

							<div data-aos="fade-up" class="info-item">
								<h4>Discuss topics with anyone</h4>
								<p data-aos="fade-up" data-aos-delay="50">You can see what people say about your newest post. Wheter they liked it or not.</p>
							</div>

							<div data-aos="fade-up" class="info-item">
								<h4>Share your thoughts through your profile</h4>
								<p data-aos="fade-up" data-aos-delay="50">Tell people about yourself!</p>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>

		<footer data-aos="fade-up">
			<div class="contact">
				<h3 data-aos="fade-up" data-aos-delay="50">Leave us a message</h3>
				<form action="#" data-aos="fade-up" data-aos-delay="100">
					<input type="email" placeholder="Email">
					<textarea name="yourmessage" id="yourmessage" cols="30" rows="10" placeholder="Leave a message"></textarea>
					<input type="submit" value="Send">
				</form>
			</div>
		</footer>


<?php include_once('_partials/footer.php') ?>

