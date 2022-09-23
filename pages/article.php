<?php
namespace App;
?>
    <?php 
        $post = $db->prepare("SELECT title,content,DATE_FORMAT(creation_date,'%d/%m/%Y') AS mydate FROM posts WHERE id=?",[$id],Article::class,true);
    ?>

    <h2><?= $post->title; ?></h2>
    <h4><?= $post->mydate; ?></h4>
    <?= nl2br($post->content); ?>

    <div><a href="index.php">Retour</a></div>

    <h2>Les commentaires</h2>
   
    <?php foreach($db->prepare("SELECT * FROM comments WHERE post_id=?",[$id],Comment::class,false) as $com) : ?>
        <div>
            <h3><?= $com->author ?></h3>    
            <h4><?= $com->comment_date ?></h4>
            <div><?= nl2br($com->comment) ?></div>
        </div>

    
    <?php endforeach; ?>