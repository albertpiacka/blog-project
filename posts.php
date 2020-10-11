<?php 
	include_once('_partials/header.php');
	
	$query = $DB->query("SELECT * FROM posts ORDER by id DESC");

	$posts = $query->fetchAll();	
?>

				<section class="post-section">
						<div class="flash-message">
							<?php $msg->display(); ?>
						</div>

						<!-- tahame udaje z databazy -->
						<div class="posts-wrapper">
							<?php 
								if(!$posts){
									echo "<p>I'm so empty :-(</p>";
								} else {
									foreach($posts as $post){
										echo '<div class="post post-'.$post['id'].'">';
										echo 	'<div class="img-container">';
										echo 		'<img src="'.$post['img_url'].'" alt="">';
										echo	'</div>';
	
										echo 	'<div class="post-container">';
										echo 		'<div class="post-header">';
										echo     		'<div class="post-title">';
										echo        		'<h1>'.$post['title'].'</h1>';
										echo 				'<span>'.$post['created_at'].'</span>';
										echo     		'</div>';
										echo 			'<div class="post-author">';
										echo				'<a href="#">Author</a>';
										echo				'<a href="sub_pages/edit.php?id='.$post['id'].'"><i class="far fa-edit"></i></a>';	
										echo				'<a href="sub_pages/delete.php?id='.$post['id'].'"><i class="fas fa-minus"></i></a>';
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



		



		