<!-- Notre index.php va nous servir de routeur afin de parcourir nos pages -->

<?php 

// constance URL --> va nous donner un chemin dynamique absolue(toute les étapes pour aller d'un point A à un point B)
define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

// on a besoin du driverController
require_once "controller/DriverController.php";
require_once "controller/VehiculeController.php";
require_once 'controller/AssoController.php';
$driverController = new DriverController;
$vehiculeController = new VehiculeController;
$assoController = new AssoController;

if(empty($_GET['page'])) {
    require_once "view/home.view.php";
}
else {
    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);

    switch($url[0]) {
        case 'accueil' : require_once "view/home.view.php";
        break;
        case 'drivers' :
            if(empty($url[1])) {
                $driverController->displayDrivers();
            }
            else if ($url[1] === "add") {
                $driverController->newDriverForm();
            }
            else if ($url[1] === "dvalid") {
                $driverController->newDriverValidation();
            }
            else if ($url[1] === "edit") {
                $driverController->editDriverForm($url[2]);
            }
            else if ($url[1] === "editvalid") {
                $driverController->editDriverValidation();
            }
            else if ($url[1] === "delete") {
                $driverController->deleteDriver($url[2]);
            }
        break;
        case 'vehicules' :
            if(empty($url[1])) {
                $vehiculeController->displayVehicules();
            }
            else if ($url[1] === "add") {
                $vehiculeController->newVehiculeForm();
            }
            else if ($url[1] === "dvalid") {
                $vehiculeController->newVehiculeValidation();
            }
            else if ($url[1] === "edit") {
                $vehiculeController->editVehiculeForm($url[2]);
            }
            else if ($url[1] === "editvalid") {
                $vehiculeController->editVehiculeValidation();
            }
            else if ($url[1] === "delete") {
                $vehiculeController->deleteVehicule($url[2]);
            }
        break;        
        case 'assos' :
            if(empty($url[1])) {
                $assoController->displayAssos();
            }
            else if ($url[1] === "add") {
                $assoController->newAssoForm();
            }
            else if ($url[1] === "avalid") {
                $assoController->newAssoValidation();
            }
            else if ($url[1] === "edit") {
                $assoController->editAssoForm($url[2]);
            }
            else if ($url[1] === "editvalid") {
                $assoController->editAssoValidation();
            }
            else if ($url[1] === "delete") {
                $assoController->deleteAsso($url[2]);
            }
        break;
    }
}
