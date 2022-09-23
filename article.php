<?php
namespace App;
    require "class/Autoloader.php";
    Autoloader::register();

    $db = new Database('blog');

    if(isset($_GET['id']))
    {
        $id=htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:index.php");
    }
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



</body>
</html>