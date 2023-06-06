<?php

require_once "modele/Vehicule.php";
require_once "modele/Manager.php";

class VehiculeManager extends Manager {
 
    private $vehicules;

    public function addVehicule($vehicule) {
        $this->vehicules[] = $vehicule;
    }

    public function getVehicules() {
        return $this->vehicules;
    }

    public function loadVehicules() {
        $req = $this->getBdd()->prepare("SELECT * FROM vehicule");
        $req->execute();
        $myVehicules = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myVehicules as $vehicule) {
            $c = new Vehicule($vehicule['id_vehicule'], $vehicule['marque'], $vehicule['modele'], $vehicule['couleur'], $vehicule['immatriculation']);
            $this->addVehicule($c);
        }
    }

        // Ajouter un vehicule
        public function newVehiculeDB($marque, $modele, $couleur, $immatriculation) {
            $req = "INSERT INTO vehicule (marque, modele, couleur, immatriculation) VALUES (:marque, :modele, :couleur, :immatriculation)";
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":marque", $marque, PDO::PARAM_STR);
            $statement->bindValue(":modele", $modele, PDO::PARAM_STR);
            $statement->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $statement->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);
            $result = $statement->execute();
            $statement->closeCursor();
    
            if($result) {
                $vehicule = new Vehicule($this->getBdd()->lastInsertId(), $marque, $modele, $couleur, $immatriculation);
                $this->addVehicule($vehicule);
            }
    
        }
    
        // Modifier un vehicule 
    
        public function getVehiculeById($id) {
            foreach ($this->vehicules as $vehicule) {
                if($vehicule->getId() == $id) {
                    return $vehicule;
                }
            }
        }
    
        public function editVehiculeDB($id, $marque, $modele, $couleur, $immatriculation) {
            $req = "UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation WHERE id = :id";
            $statement = $this->getBdd()->prepare($req);
            $statement->bindValue(":id", $id, PDO::PARAM_INT);
            $statement->bindValue(":marque", $marque, PDO::PARAM_STR);
            $statement->bindValue(":modele", $modele, PDO::PARAM_STR);
            $statement->bindValue(":couleur", $couleur, PDO::PARAM_STR);
            $statement->bindValue(":immatriculation", $immatriculation, PDO::PARAM_STR);
            $result = $statement->execute();
            $statement->closeCursor();
    
            if($result) {
                $this->getVehiculeById($id)->setMarque($marque);
                $this->getVehiculeById($id)->setModele($modele);
                $this->getVehiculeById($id)->setCouleur($couleur);
                $this->getVehiculeById($id)->setImmatriculation($immatriculation);
            }
        }    
}