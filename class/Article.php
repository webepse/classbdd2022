<?php 
namespace App;
class Article{

    /**
     * permet de retourner l'url de l'article
     *
     * @return string
     */
    public function getURL(): string
    {
        return 'article.php?id='.$this->id;
    }

    /**
     * Permet d'obtenir un bref résumé de mon texte
     *
     * @return string
     */
    public function getExtrait(): string
    {
        $texte = strip_tags($this->content);
        if(preg_match('#(\w+\W+){20}\w+#s',$texte,$out))
        {
            $html = "<div>".$out[0]."...<a href='".$this->getURL()."'>Voir la suite</a></div>";
        }else{
            $html = "<div>".$texte."</div>";
        }

        return $html;

    }


}


?>