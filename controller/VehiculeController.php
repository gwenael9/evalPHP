<?php

require_once "modele/VehiculeManager.php";

class VehiculeController {

    private $vehiculeManager; 

    public function __construct() {
        $this->vehiculeManager = new VehiculeManager;
        $this->vehiculeManager->loadVehicules();
    }

    public function displayVehicules() {
        $vehicules = $this->vehiculeManager->getVehicules();
        require_once "view/vehicule.view.php";
    }

    public function newVehiculeForm() {
        require_once "view/vehicule.view.php";
    }

    public function newVehiculeValidation() {
        $this->vehiculeManager->newVehiculeDB($_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
        header("Location:". URL . "vehicules");
    }

    public function editVehiculeForm($id) {
        $vehicule = $this->vehiculeManager->getVehiculeById($id);
        require_once "view/edit.vehicule.view.php";
    }

    // quand on valide notre modification
    public function editVehiculeValidation() {
        $this->vehiculeManager->editVehiculeDB($_POST['id_conducteur'], $_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
        header("Location:". URL . "vehicules");
    }
}