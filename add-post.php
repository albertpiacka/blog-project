<?php include_once('_partials/header.php') ?>

                <div class="form-container">
                    <!-- formular na spracovanie udajov -->
                    <form id="myForm" action="_inc/new-post.php" method="post">
                        <input name="title" type="text" placeholder="Title" id="title">
                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Type something"></textarea>
                        <input type="submit">
                    </form>

                    <!-- tahame udaje z databazy -->
                    <div class="posts">
                        <?php 
                            $query = $DB->query("SELECT * FROM posts");

                            $posts = $query->fetchAll();

                            foreach($posts as $post){
                            echo '<div class="post">';
                            echo     '<div class="title">';
                            echo        '<h3>'.$post['title'].'</h3>';
                            echo     '</div>';

                            echo     '<div class="text">';
                            echo        '<p>'.$post['text'].'</p>';
                            echo     '</div>';
                            echo '</div>';
                            }
                        ?>
                    </div>

                </div>

			</div>
		</div>

<?php include_once('_partials/footer.php') ?>	



	