<?php 
    namespace App;
?>
<?php foreach($db->query("SELECT * FROM posts",Article::class) as $post) : ?>
        <div class="post">
            <div class="date"><?= $post->creation_date ?></div>
            <a href='<?= $post->getURL() ?>'><?= $post->title ?></a>
            <div class="content">
                <?= nl2br($post->getExtrait()) ?>
            </div>
        </div>
<?php endforeach; ?>