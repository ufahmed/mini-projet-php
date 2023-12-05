<?php
require_once("../model/config.php");
class Delete {
    private $delete;

    public function __construct($id){
        $this->delete = new Connexion();
        if($this->delete->deleteLivre($id)== TRUE){
            echo "<script type='text/javascript'>alert('Enregistrement supprimé avec succès!');document.location='../view/index.php'</script>";
        }else{
            echo "<script type='text/javascript'>alert('Erreur lors de la suppression de lenregistrement!');history.back()</script>";
        }
    }
}
new Delete($_GET['id']);
?>
