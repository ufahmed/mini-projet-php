<?php
require_once("../model/config.php");

class EditController {

    private $editer;
    private $nom;
    private $auteur;
    private $quantite;
    private $prix;
    private $date;
    private $drapeau;

    public function __construct($id){
        $this->editer = new Connexion();
        $this-> créerformulaire($id);
    }
    private function créerformulaire($id){
        try{
            $row = $this->editer->rechercheLivre($id);
            $this->nom=$row['nom'];
            $this->auteur=$row['"auteur'];
            $this->quantite=$row['quantite'];
            $this->prix=$row['prix'];
            $this->date=$row['date'];
            $this->drapeau=$row['drapeau'];
        }catch(PDOException $f){
            echo $f->getMessage();
        }


    }
    public function modifierFormulaire($nom,$auteur,$quantite,$prix,$date,$drapeau,$id){
            if($this->editer->updateLivre($nom,$auteur,$quantite,$prix,$drapeau,$date,$id) == TRUE){
                echo "<script>alert(' Inscription ajoutée avec succès!');document.location='../view/index.php'</script>";
            }
            else{
                echo "<script>alert(' Erreur lors de lécriture de lenregistrement !');history.back()</script>";
            }
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
    public function getDate(){
        return $this->date;
    }
    public function getDrapeau(){
        return $this->drapeau;
    }


}
$id = filter_input(INPUT_GET, 'id');
$editer = new EditController($id);
if(isset($_POST['submit'])){
    $editer->modifierFormulaire($_POST['nom'],$_POST['auteur'],$_POST['quantite'],$_POST['prix'],$_POST['date'],$_POST['drapeau'],$_POST['id']);
}
?>
