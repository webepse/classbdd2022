<?php
namespace App;
    require "class/Autoloader.php";
    Autoloader::register();

    $db = new Database('blog');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach($db->query("SELECT * FROM posts",Article::class) as $post) : ?>
        <div class="post">
            <div class="date"><?= $post->creation_date ?></div>
            <a href='<?= $post->getURL() ?>'><?= $post->title ?></a>
            <div class="content">
                <?= nl2br($post->getExtrait()) ?>
            </div>
        </div>

    <?php endforeach; ?>
</body>
</html>