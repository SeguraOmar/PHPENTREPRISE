<?php

session_start();

require_once '../config/config.php';
require_once "../models/enterprise.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Tableau d'erreurs (stockage des erreurs)
        $errors = [];

        // Validation du champ pseudo
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'Veuillez saisir votre pseudo';
        }

        // Validation du champ mot de passe
        if (empty($_POST['password'])) {
            $errors['password'] = 'Veuillez saisir votre mot de passe';
        }

        // Si les champs sont valides, commence les tests
        if (empty($errors)) {
            // Vérification de l'existence du pseudo avec la méthode checkPseudoExists de la classe Utilisateur
            if (!Entreprise::checkEntrepriseExist($_POST['enterprise_name'])) {
                $errors['enterprise_name'] = 'Utilisateur inconnu';
            } else {
                // Récupération des informations de l'utilisateur via la méthode getInfos()
                $EntrepriseInfos = Entreprise::getInfos($_POST['enterprise_name']);

                // Utilisation de password_verify pour valider le mot de passe
                if (password_verify($_POST['enterprise_password'], $EntrepriseInfos['enterprise_password'])) {
                    $_SESSION["user"] = $EntrepriseInfos;
                    unset($_SESSION["user"]["enterprise_password"]);
                    // Si la validation du mot de passe est réussie, redirection vers controller-home.php
                    header('Location: controller-home.php');
                } else {
                    // Sinon, ajout d'une erreur de connexion au tableau d'erreurs
                    $errors['connexion'] = 'Mauvais mot de passe';
                }
            }
        }
    }
}

?>

<?php 

include_once "../views/view-signin.php"

?>