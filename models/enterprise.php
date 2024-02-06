<?php

require_once "../config/config.php";

class Entreprise
{

    public static function createEntreprise(string $enterprise_name, string $enterprise_email, string $enterprise_siret, string $enterprise_adress, string $enterprise_password, string $enterprise_zipcode, string $enterprise_city)
    {

        try {

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête SQL d'insertion des données dans la table enterprise
            $sql = "INSERT INTO `enterprise`(`enterprise_name`, `enterprise_email`, `enterprise_siret`, `enterprise_adress`, `enterprise_password`, `enterprise_zipcode`, `enterprise_city`)  VALUES (:enterprise_name, :enterprise_email, :enterprise_siret, :enterprise_adress, :enterprise_password, :enterprise_zipcode, :enterprise_city)";

            // Préparation de la requête SQL
            $query = $db->prepare($sql);

            // Liaison des valeurs avec les paramètres de la requête
            $query->bindValue(':enterprise_name', htmlspecialchars($enterprise_name), PDO::PARAM_STR);
            $query->bindValue(':enterprise_email', htmlspecialchars($enterprise_email), PDO::PARAM_STR);
            $query->bindValue(':enterprise_siret', htmlspecialchars($enterprise_siret), PDO::PARAM_STR);
            $query->bindValue(':enterprise_adress', htmlspecialchars($enterprise_adress), PDO::PARAM_STR);
            $query->bindValue(':enterprise_password', password_hash($enterprise_password, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $query->bindValue(':enterprise_zipcode', $enterprise_zipcode, PDO::PARAM_STR);
            $query->bindValue(':enterprise_city', htmlspecialchars($enterprise_city), PDO::PARAM_STR);

            // Exécution de la requête SQL
            $query->execute();
        } catch (PDOException $e) {
            // En cas d'erreur, affichage du message d'erreur et arrêt du script
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }


    public static function checkEntrepriseExist($enterprise_name): bool
    {

        try {

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_name` = :enterprise_name";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_name', $enterprise_name, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on vérifie si le résultat est vide car si c'est le cas, cela veut dire que le pseudo n'existe pas
            if (empty($result)) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }

    public static function getInfos($enterprise_name): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_name` = :enterprise_name";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_name', $enterprise_name, PDO::PARAM_STR);

            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}
