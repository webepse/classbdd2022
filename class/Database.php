<?php 
namespace App;
use PDO;
class Database{
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;

    private $bdd; 

    public function __construct(string $db_name, string $db_user='root', string $db_pass='', $db_host='localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;       
    }

    private function getBDD()
    {
        if($this->bdd === NULL){
            try{
                $bdd = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name.';charset=utf8',$this->db_user,$this->db_pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $this->bdd = $bdd;
            }catch(\Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        return $this->bdd;
    }

    public function query($statement,$className)
    {
        $req = $this->getBDD()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS,$className);
        $req->closeCursor();
        return $datas;
    }

    public function prepare(string $statement,array $values,string $className, bool $one=false)
    {
        $req = $this->getBDD()->prepare($statement);
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_CLASS,$className);
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        $req->closeCursor();
        return $datas;

    }



}