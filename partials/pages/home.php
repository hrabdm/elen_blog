<?php require($_SERVER['DOCUMENT_ROOT'] . '/partials/pages/hello.php'); ?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Articles</h2>
                <p>A small river named Duden flows by their place and supplies it with the necessary
                    regelialia. It is a paradisematic country.</p>
            </div>
        </div>
        <div class="row">

            <?php
            require($_SERVER['DOCUMENT_ROOT'] . '/partials/posts/post.php');

            ?>

        </div>
    </div>
</section>