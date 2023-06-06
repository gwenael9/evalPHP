<?php

require_once "modele/DriverManager.php";

class DriverController {

    private $driverManager;

    public function __construct() {
        $this->driverManager = new DriverManager;
        $this->driverManager->loadDrivers();
    }

    public function displayDrivers() {
        $drivers = $this->driverManager->getDrivers();
        require_once "view/conducteur.view.php";
    }

    public function newDriverForm() {
        require_once "view/conducteur.view.php";
    }

    public function newDriverValidation() {
        $this->driverManager->newDriverDB($_POST['prenom'], $_POST['nom']);
        header("Location:". URL . "drivers");
    }

    public function editDriverForm($id) {
        $driver = $this->driverManager->getDriverById($id);
        require_once "view/edit.driver.view.php";
    }

    public function editDriverValidation() {
        $this->driverManager->editDriverDB($_POST['id_conducteur'], $_POST['prenom'], $_POST['nom']);
        header("Location:". URL . "drivers");
    }

    public function deleteDriver($id) {
        $driver = $this->driverManager->deleteDriverDB($id);
        header("Location:". URL . "drivers");
    }
}