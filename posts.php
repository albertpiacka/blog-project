<?php include_once('_partials/header.php') ?>

				<section class="post-section">

						<!-- tahame udaje z databazy -->
						<div class="posts-wrapper">
							<div class="flash-message">
								<?php $msg->display(); ?>
							</div>
							<?php 
								$query = $DB->query("SELECT * FROM posts ORDER by id DESC");

								$posts = $query->fetchAll();

								if(!$posts){
									echo "<p>I'm so empty :-(</p>";
								} else {
									foreach($posts as $post){
										echo '<div class="post post-'.$post['id'].'">';
										echo 	'<div class="img-container">';
										echo 		'<div class="img"></div>';
										echo	'</div>';
	
										echo 	'<div class="post-container">';
										echo 		'<div class="post-header">';
										echo     		'<div class="post-title">';
										echo        		'<h1>'.$post['title'].'</h1>';
										echo 				'<span>'.$post['created_at'].'</span>';
										echo     		'</div>';
										echo 			'<div class="post-author">';
										echo				'<h2>Author</h2>';
										echo				'<a href="sub_pages/edit.php?id='.$post['id'].'">Edit</a>';	
										echo				'<a href="sub_pages/delete.php?id='.$post['id'].'">Delete</a>';
										echo			'</div>';
										echo		'</div>';
	
										echo		'<div class="post-body">';
										echo     		'<div class="post-paragraphs">';
															$oldArr = explode('.', $post['text']);
															return_paragraphs($oldArr);
										echo     		'</div>';
										echo 		'</div>';
										echo 	'</div>';
										echo '</div>';
									}
								}
							?>
						</div>
						
				</section>
			</div>

		</div>

<?php include_once('_partials/footer.php') ?>	



		



		