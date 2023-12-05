<?php
require_once("../model/inscriptionLivre.php");
class RegistreController{

    private $registre;

    public function __construct(){
        $this->registre = new Registre();
        $this->inclure();
    }

    private function inclure(){
        try{
        $this->registre->setNom($_POST['nom']);
        $this->registre->setAuteur($_POST['auteur']);
        $this->registre->setQuantite($_POST['quantite']);
        $this->registre->setPrix($_POST['prix']);
        $this->registre->setDate(date('Y-m-d',strtotime($_POST['date'])));
        $result = $this->registre->inclu();
        if($result >= 1){
            echo "<script type='text/javascript'>alert('Inscription ajoutée avec succès !');document.location='../view/registre.php'</script>";
        }else{
            echo "<script type='text/javascript'>alert('Erreur d écriture de l enregistrement !, vérifiez que le livre n est pas dupliqué');history.back()</script>";
        }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
}
new RegistreController();
