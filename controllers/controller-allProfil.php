<?php

session_start();

require_once "../models/enterprise.php";
require_once "../config/config.php";

if (isset($_SESSION['enterprise'])) {


    
    
       
    $users = json_decode(Entreprise::getAllUsers($_SESSION['enterprise']['enterprise_id']), true);
    // Entreprise::unvalidate($user_id);
    // Entreprise::validate($user_id);
    // var_dump($users);


} else {
    header("Location: controller-signin.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['valide'])) {
        Entreprise::validate($_POST['valide']);
    }
}










include_once "../views/view-allProfil.php";
