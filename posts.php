<?php include_once('_partials/header.php') ?>

				<section class="post-section">
					<div class="post-wrapper">
						<div class="post post-1">
							<div class="img-container">
								<div style="background-image: url('assets/img/img-1.jpg')" class="img"></div>
							</div>
							<div class="post-menu secondary">
								<div class="search-box">
									<input type="text" placeholder="Search">
								</div>

								<div class="post-thumbnail">Article</div>
								<div class="post-thumbnail">Article</div>
								<div class="post-thumbnail">Article</div>
							</div>
							<div class="header-container">
								<h3>#Poached madness</h2>
								<div class="author">
									<i class="far fa-user"></i>
									<div class="author-name">
										<span>Author</span>
										<span>John</span>
									</div>
								</div>
							</div>
							<div class="paragraphs">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>

							<form action="new-post.php" method="post">
								<textarea name="message" id="message" cols="30" rows="10" placeholder="type"></textarea>
								<input type="submit" placeholder="submit">
							</form>

							<div class="fetch-data">
								<ul>
									<?php
										$posts = $DB->query("SELECT * FROM posts");

										var_dump($posts->fetchAll());

									?>
								</ul>
							</div>
						</div>

						<div class="post post-2">
							<div class="img-container">
								<div style="background-image: url('assets/img/img-2.jpg')" class="img"></div>
							</div>
							<div class="post-menu secondary">
								<div class="search-box">
									<input type="text" placeholder="Search">
								</div>

								<div class="post-thumbnail">Article</div>
								<div class="post-thumbnail">Article</div>
								<div class="post-thumbnail">Article</div>
							</div>
							<div class="header-container">
								<h3>#Poached madness</h2>
								<div class="author">
									<i class="far fa-user"></i>
									<div class="author-name">
										<span>Author</span>
										<span>John</span>
									</div>
								</div>
							</div>
							<div class="paragraphs">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>
						</div>
					</div>

					<div class="post-menu primary">
						<div class="search-box">
							<input type="text" placeholder="Search">
						</div>

						<div class="post-thumbnail">Article</div>
						<div class="post-thumbnail">Article</div>
						<div class="post-thumbnail">Article</div>
					</div>
				</section>
			</div>

		</div>

<?php include_once('_partials/footer.php') ?>	



		