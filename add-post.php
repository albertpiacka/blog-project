<?php include_once('_partials/header.php') ?>

                <div class="form-container">
                   
                    <!-- formular na spracovanie udajov -->
                    <form id="add-form" action="_inc/new-post.php" method="post">
                        <a href="<?php echo BASE_URL.'posts.php' ?>"><i class="fas fa-arrow-left"></i></a>
                        <input name="title" type="text" placeholder="Title" id="title">
                        <input name="img_url" type="text" placeholder="Image url" id="img_url">
                        <textarea name="message" id="message" cols="30" rows="20" placeholder="Type something"></textarea>
                        <input type="submit" value="Post">
                    </form>

                </div>

			</div>
		</div>

<?php include_once('_partials/footer.php') ?>	



	