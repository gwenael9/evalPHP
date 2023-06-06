<?php

require_once "modele/Driver.php";
require_once "modele/Manager.php";

class DriverManager extends Manager { 
 
    private $drivers;

    public function addDriver($driver) {
        $this->drivers[] = $driver;
    }

    public function getDrivers() {
        return $this->drivers;
    }

    public function loadDrivers() {
        $req = $this->getBdd()->prepare("SELECT * FROM conducteur");
        $req->execute();
        $myDrivers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myDrivers as $driver) {
            $d = new Driver($driver['id_conducteur'], $driver['prenom'], $driver['nom']);
            $this->addDriver($d);
        }
    }


    // Ajouter un driver
    public function newDriverDB($prenom, $nom) {
        $req = "INSERT INTO conducteur (prenom, nom) VALUES (:prenom, :nom)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":prenom", $prenom, PDO::PARAM_STR);       
        $statement->bindValue(":nom", $nom, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $driver = new Driver($this->getBdd()->lastInsertId(), $prenom, $nom);
            $this->addDriver($driver);
        }

    }

    // Modifier un driver 

    public function getDriverById($id) {
        foreach ($this->drivers as $driver) {
            if($driver->getId() == $id) {
                return $driver;
            }
        }
    }

    public function editDriverDB($id, $prenom, $nom) {
        $req = "UPDATE conducteur SET prenom = :prenom, nom = :nom WHERE id_conducteur = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT); 
        $statement->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $statement->bindValue(":nom", $nom, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) { 
            $this->getDriverById($id)->setPrenom($prenom);
            $this->getDriverById($id)->setNom($nom); 
        }
    }    

    // Supprimer un driver

    public function deleteDriverDB($id) {
        $req = "DELETE FROM conducteur WHERE id_conducteur = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $driver = $this->getDriverById($id);
            unset($driver);
        }
    }
}