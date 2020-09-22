<?php include_once('_partials/header.php') ?>

                <form id="myForm" action="_inc/new-post.php" method="post">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="type"></textarea>
                    <input type="submit" placeholder="submit">
                </form>

                <div>
                    <ul id="posts">
                        <?php
                            $posts = $DB->query("SELECT * FROM posts");

                            foreach($posts as $post){
                                echo '<li>';
                                echo $post['text'];
                                echo '<li>';
                            }

                        ?>
                    </ul>
                </div>
			</div>

		</div>

<?php include_once('_partials/footer.php') ?>	



	