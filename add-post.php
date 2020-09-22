<?php include_once('_partials/header.php') ?>

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

		</div>

<?php include_once('_partials/footer.php') ?>	



	