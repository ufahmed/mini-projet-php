<?php
require_once("config.php");

class Registre extends Connexion {

    private $nom;
    private $auteur;
    private $quantite;
    private $prix;
    private $drapeau;
    private $date;


    public function setNom($string){
        $this->nom = $string;
    }
    public function setAuteur($string){
        $this->auteur = $string;
    }
    public function setQuantite($string){
        $this->quantite = $string;
    }
    public function setPrix($string){
        $this->prix = $string;
    }
    public function setDrapeau($string){
        $this->drapeau = $string;
    }
    public function setDate($string){
        $this->data = $string;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getAuteur(){
        return $this->auteur;
    }
    public function getQuantite(){
        return $this->quantite;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getDrapeau(){
        return $this->drapeau;
    }
    public function getDate(){
        return $this->date;
    }


    public function inclu(){
        return $this->setLivre($this->getNom(),$this->getAuteur(),$this->getQuantite(),$this->getPrix(),$this->getDate());
    }
}
?>
