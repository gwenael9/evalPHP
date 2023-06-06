<?php

require_once "modele/Association.php";
require_once "modele/Manager.php";

class AssoManager extends Manager {

    private $assos;

    public function addAsso($asso) {
        $this->assos[] = $asso;
    }

    public function getAssos() {
        return $this->$assos;
    }

    public function loadAssos() {
        $req = $this->getBdd()->prepare("SELECT * FROM association_vehicule_conducteur");
        $req->execute();
        $myAssos = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myAssos as $asso) {
            $a = new Association($asso['id_association'], $asso['id_vehicule'], $asso['id_conducteur']);
            $this->addAsso($a);
        }
    }

    public function newAssoDB($id_vehicule, $id_conducteur) {
        $req = "INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur) VALUES (:id_vehicule, id_conducteur)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);       
        $statement->bindValue(":id_conducteur", $id_conducteur, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $asso = new Association($this->getBdd()->lastInsertId(), $id_vehicule, $id_conducteur);
            $this->addAsso($asso);
        }
    }

    public function getAssoById($id) {
        foreach ($this->assos as $asso) {
            if($asso->getId() == $id) {
                return $asso;
            }
        }
    }

    public function editAssoDB($id, $id_vehicule, $id_conducteur) {
        $req = "UPDATE association_vehicule_conducteur SET id_vehicule = :id_vehicule, id_conducteur = :id_conducteur WHERE id_association = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT); 
        $statement->bindValue(":id_vehicule", $id_vehicule, PDO::PARAM_INT);
        $statement->bindValue(":id_conducteur", $id_conducteur, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) { 
            $this->getAssoById($id)->setId_vehicule($id_vehicule);
            $this->getAssoById($id)->setId_conducteur($id_conducteur); 
        }
    }    

    public function deleteAssoDB($id) {
        $req = "DELETE FROM  association_vehicule_conducteur WHERE id_association = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $asso = $this->getAssoById($id);
            unset($asso);
        }
    }
} 