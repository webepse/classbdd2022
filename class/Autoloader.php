<?php 
class Autoloader{
    public static function register()
    {
        spl_autoload_register([__CLASS__,'autoload']);
        // prend ici un tableau en paramètre, le nom de la classe et le nom de la méthode. Pour récupérer dynamiquement le nom de la classe que l'on utilise on peut utiliser la const magique __CLASS__
    }

    public static function autoload($class_name): void
    {
        require "class/".$class_name.".php";
    }
 

}