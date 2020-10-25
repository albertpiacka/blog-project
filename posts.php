<?php include_once('_partials/header.php') ?>

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
										echo '<div id="post-'.$post['id'].'" class="post post-'.$post['id'].'">';
										echo 	'<div class="img-container">';
										if($post['img_dir']){
											echo 		'<img src="files/'.$post['img_dir'].'" alt="haha">';
										} else {
											echo 		'<div class="empty-div	"></div>';
										}
										echo	'</div>';
	
										echo 	'<div class="post-container">';
										echo 		'<div class="post-header">';
										echo     		'<div class="post-title">';
										echo        		'<h1>'.$post['title'].'</h1>';
										echo 				'<span>'.$post['created_at'].'</span>';
										echo     		'</div>';
										echo 			'<div class="post-author">';
										$id = $post['user_id'];
										$queryUsers = $dbh->query("SELECT * FROM phpauth_users WHERE id = $id");

										$users = $queryUsers->fetchAll();
										if($post['user_name'] == 'empty'){
											echo			'<h3 class="author-name">'.$users[0]['email'].'</h3>';
										} else echo 		'<h3 class="author-name">'.$post['user_name'].'</h3>';

										if($auth->isLogged()){
											if($post['user_id'] == $user_id){
												echo		'<a href="sub_pages/edit.php?id='.$post['id'].'"><i class="far fa-edit"></i></a>';	
												echo		'<a href="sub_pages/delete.php?id='.$post['id'].'"><i class="fas fa-minus"></i></a>';
											}
										}
										echo			'</div>';
										echo		'</div>';
	
										echo		'<div class="post-body">';
										echo     		'<div class="post-paragraphs">';
															return_paragraphs($post['text']);
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



		



		