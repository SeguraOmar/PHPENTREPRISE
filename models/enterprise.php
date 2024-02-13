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


    public static function checkEntrepriseExist($enterprise_email): bool
    {

        try {

            // Création de l'objet PDO pour la connexion à la base de données
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            // Paramétrage des erreurs PDO pour les afficher en cas de problème
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_email` = :enterprise_email";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_email', $enterprise_email, PDO::PARAM_STR);

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

    public static function getInfos($enterprise_email): array
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM `enterprise` WHERE `enterprise_email` = :enterprise_email";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_email', $enterprise_email, PDO::PARAM_STR);

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

    public static function countUsers(int $enterprise_id)
    {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL
            $query = $connexion->prepare("SELECT COUNT(user_id) AS user_count FROM userprofil WHERE enterprise_id = :enterprise_id");
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le résultat
            return $result['user_count'];
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données ou erreur d'insertion : " . $e->getMessage());
        }
    }
    public static function countActifsUsers(int $enterprise_id)
    {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL
            $query = $connexion->prepare("SELECT COUNT(DISTINCT userprofil.user_id) AS user_count FROM userprofil INNER JOIN ride ON userprofil.user_id = ride.user_id WHERE userprofil.enterprise_id = :enterprise_id");
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le résultat
            return $result['user_count'];
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données ou erreur d'insertion : " . $e->getMessage());
        }
    }

    public static function countTotalTrajets(int $enterprise_id)
    {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparation de la requête SQL
            $query = $connexion->prepare("SELECT COUNT(ride_id) AS ride_count
                FROM ride INNER JOIN userprofil ON userprofil.user_id = ride.user_id WHERE enterprise_id = :enterprise_id");
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_INT);

            // Exécution de la requête
            $query->execute();

            // Récupération du résultat
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Retourner le résultat
            return $result['ride_count'];
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données ou erreur d'insertion : " . $e->getMessage());
        }
    }

    public static function lastFiveUsers(int $enterprise_id)
    {
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);

            // stockage de ma requete dans une variable
            $sql = "SELECT * FROM userprofil WHERE enterprise_id = :enterprise_id ORDER BY user_id DESC LIMIT 5";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_INT);


            // on execute la requête
            $query->execute();

            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchALL(PDO::FETCH_ASSOC);

            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    public static function lastFiveTrajets(int $enterprise_id){
        try {
            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DB_NAME, DB_USER, DB_PASS);
    
            // stockage de ma requete dans une variable
            $sql = "SELECT ride_distance ,ride_date, transport_id 
        FROM ride 
        INNER JOIN userprofil ON userprofil.user_id = ride.user_id WHERE enterprise_id = :enterprise_id";
    
            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);
    
            // on relie les paramètres à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':enterprise_id', $enterprise_id, PDO::PARAM_INT);
    
    
            // on execute la requête
            $query->execute();
    
            // on récupère le résultat de la requête dans une variable
            $result = $query->fetchALL(PDO::FETCH_ASSOC);
    
            // on retourne le résultat
            return $result;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
}

//     public static function deleteAccount(int $Entreprise_ID)
//     {
//         try {
//             $connexion = new PDO("mysql:host=localhost;dbname=" . DBNAME, USERPSEUDO, USERPASSWORD);
//             $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//             // Préparation de la requête SQL
//             $requete = $connexion->prepare("DELETE FROM entreprise WHERE Entreprise_ID = :Entreprise_ID");
//             $requete->bindValue(':Entreprise_ID', $Entreprise_ID, PDO::PARAM_INT);

//             // Exécution de la requête
//             $requete->execute();

//         } catch (PDOException $e) {
//             die("Erreur de connexion à la base de données ou erreur d'insertion : " . $e->getMessage());
//         }
//     }



// }



