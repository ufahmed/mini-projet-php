<?php
require_once("../model/config.php");
class ListeController{

    private $liste;

    public function __construct(){
        $this->liste = new Connexion();
        $this->createTable();

    }

    private function createTable(){
        try{
            $rows = $this->liste->getLivre();
    
            if(!empty($rows)) {
                foreach ($rows as $value) {
                    echo "<tr>";
                    echo "<th>".$value['nom']."</th>";
                    echo "<td>".$value['auteur']."</td>";
                    echo "<td>".$value['quantite']."</td>";
                    echo "<td>".$value['prix']."</td>";
                    echo "<td>".$value['date']."</td>";
                    echo "<td>".($value['drapeau'] == "0" ? "Desactiver" : "Activer")."</td>";
                    echo "<td><a class='btn btn-warning' href='editer.php?id=".$value['nom']."'>Edit</a><a class='btn btn-danger' href='../controller/ControllerDelete.php?id=".$value['nom']."'>Delete</a></td>";
                    echo "</tr>";
                }
            } 
            else {
                echo "No data available"; 
            }  
    
        }catch(PDOException $c){
            echo $c->getMessage();
        }
    }
}

