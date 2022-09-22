<?php
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
    <?php 
        $req = $db->query("SELECT * FROM posts");

        var_dump($req);
        var_dump($req[0]->title);

    ?>
</body>
</html>