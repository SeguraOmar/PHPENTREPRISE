<?php 
session_start();
require_once "../models/enterprise.php";
require_once "../config/config.php";


if (isset($_SESSION['enterprise'])) {

    $enterprise_id = $_SESSION['enterprise']['enterprise_id'];

if (isset($_GET['valide'])) {
   $json =  json_decode(Entreprise::UserInformation($_GET['valide']),true);
    
    
    if ($json['enterprise_id'] == $enterprise_id) {
        Entreprise::validate($_GET['valide']);
    }
} 

 if (isset($_GET['novalide'])) {
   $json = json_decode(Entreprise::UserInformation($_GET['novalide']),true);
    
   if ($json['enterprise_id'] == $enterprise_id) {
        Entreprise::unvalidate($_GET['novalide']);
    }
    
}
}
?>