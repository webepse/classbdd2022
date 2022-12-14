<?php
    namespace App;
    require "class/Autoloader.php";
    Autoloader::register();

    $db = new Database('blog');

    $menu = [
        "home"=>"home.php",
        "article"=>"article.php",
        'add'=>"add.php"
    ];

    if(isset($_GET['action'])){
        if(array_key_exists($_GET['action'],$menu))
        {
            if($_GET['action']=="article")
            {
                if(isset($_GET['id']) AND !empty($_GET['id']))
                {
                    $id=htmlspecialchars($_GET['id']);
                    $view = $menu['article'];
                }else{
                    header("LOCATION:404.php");
                }
            }else{
                $view = $menu[$_GET['action']];
            }

        }elseif($_GET['action']=="addpost"){
            if(isset($_POST['title']) && !empty($_POST['title']))
            {
                if(isset($_POST['content']) && !empty($_POST['content']))
                {
                    $title= htmlspecialchars($_POST['title']);
                    $content = htmlspecialchars($_POST['content']);
                    $db->addPost($title,$content);
                    $view = $menu['home'];
                }else{
                    header("LOCATION:index.php?action=add&err=2");
                }
            }else{
                header("LOCATION:index.php?action=add&err=1");
            }


        }else{
            header("LOCATION:404.php");
        }
    }else{
        $view = $menu['home'];
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
        require "pages/$view";
    ?>
</body>
</html>