<?php

require_once "modele/AssociationManager.php";

class AssoController {

    private $assoManager;

    public function __construct() {
        $this->assoManager = new AssoManager;
        $this->assoManager->loadAssos();
    }

    public function displayAssos() {
        $assos = $this->assoManager->getAssos();
        require_once "view/association.view.php";
    }

    public function newAssoForm() {
        require_once "view/association.view.php";
    }

    public function newAssoValidation() {
        $this->assoManager->newAssoDB($_POST['id_vehicule'], $_POST['id_conducteur']);
        header("'Location:" . URL . "assos");
    }

    public function editAssoForm($id) {
        $asso = $this->assoManager->getAssoById($id);
        require_once "view/edit.association.view.php";
    }

    public function editAssoValidation() {
        $this->assoManager->editAssoDB($_POST['id_vehicule'], $_POST['id_conducteur']);
        header("Location:". URL . "assos");
    }

    public function deleteAsso($id) {
        $asso = $this->assoManager->deleteAssoDB($id);
        header("Location:". URL . "assos");
    }
}