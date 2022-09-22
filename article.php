<?php
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
        $post = $db->prepare("SELECT title,content,DATE_FORMAT(creation_date,'%d/%m/%Y') AS mydate FROM posts WHERE id=?",[$id],'Article',true);
    ?>

    <?php var_dump($post) ?>

</body>
</html>