<?php

class Connexion{

    protected $pdo;

    public function __construct(){
        $this->connex();
    }

    private function connex(){
        $this->pdo = new PDO('mysql:host=localhost;dbname=bibliotheque','root','');
    }

    public function setLivre($nom, $auteur, $quantite, $prix, $date){   
        $stmt = $this->pdo->prepare("INSERT INTO livre (nom, auteur, quantite, prix, date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nom);
        $stmt->bindParam(2, $auteur);
        $stmt->bindParam(3, $quantite);
        $stmt->bindParam(4, $prix);
        $stmt->bindParam(5, $date);
        
        if ($stmt->execute()) {
            return true;
        }else {
            return false;
        }
    }
    
    public function getLivre(){
        $stmt = $this->pdo->query("SELECT * FROM livre");
        $array = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $array[] = $row;
        }
        return $array;


    }

    public function deleteLivre($id){
        if($this->pdo->query("DELETE FROM livre WHERE nom = '".$id."';")== TRUE){
            return true;
        }
        else{
            return false;
        }

    }
    public function rechercheLivre($id){
        $stmt = $this->pdo->prepare("SELECT * FROM livre WHERE nom=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateLivre($nom,$auteur,$quantite,$prix,$drapeau,$date,$id){
        $stmt = $this->pdo->prepare("UPDATE livre SET nom = :nom, auteur=:auteur, quantite=:quantite, prix=:prix, drapeau=:drapeau, date=:date WHERE nom=:id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':prix', $prix); 
        $stmt->bindParam(':drapeau', $drapeau); 
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            return true;
        } 
        else {
            return false;
        }
    }
}
?>
