<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        .background-nav {
            background-image: url('../assets/img/montage.jpg');
            /* Remplacez chemin_vers_votre_image.jpg par le chemin réel de votre image */
            background-size: cover;
            /* Couvre toute la barre de nav sans perdre les proportions */
            background-position: center;
            /* Centre l'image dans la barre de navigation */
        }

        .side-nav {
            width: 16rem;
        }

        #user-list-container {
            display: flex;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }

        .user-card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .user-card {
            text-align: center;
            margin: 0 5px;
        }

        .user-pseudo {
            font-size: 1.2em;
            font-weight: bold;
        }

        .user-photo {
            width: 8em;
            height: 14em;
            object-fit: cover;
            border-radius: 12px;
            margin-top: 10px;
        }
    </style>
</head>


<body>

    <nav>
        <div class="nav-wrapper background-nav">
            <!-- barre du haut  -->
            <ul class="right">
                <li><a href="../controllers/controller-deconnect.php"><button class="btn">Se déconnecter</button></a></li>
            </ul>
        </div>
    </nav>
    <!-- barre de navigation laterale gauche  -->
    <div class="row black ">
        <div class="col s12 m4 l2">
            <ul id="slide-out" class="sidenav sidenav-fixed grey darken-3 side-nav">
                <li class="white-text center-align"> Coordonnée de l'entreprise : </li>
                <li class="white-text"> Nom : <?= $_SESSION['enterprise']['enterprise_name'] ?></li>
                <li class="white-text">Email : <?= $_SESSION['enterprise']['enterprise_email'] ?></li>
                <li class="white-text">Siret : <?= $_SESSION['enterprise']['enterprise_siret'] ?></li>
                <li class="white-text">Adresse : <?= $_SESSION['enterprise']['enterprise_adress'] ?></li>
                <li class="white-text">code postal : <?= $_SESSION['enterprise']['enterprise_zipcode'] ?></li>
                <li class="white-text">Ville : <?= $_SESSION['enterprise']['enterprise_city'] ?></li>
            </ul>
        </div>


        <div class="col center-align offset-l2"> <!-- Contenu principal -->
            <h4 class='white-text'>Bienvenue sur votre tableau de bord</h4>

            <!-- Carte 1 -->
            <div class="row">
                <div class="col s4 ">
                    <div class="card blue darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Total des utilisateurs</span>
                            <p>nombre d'ulitisateur : <?= Entreprise::countUsers($_SESSION['enterprise']['enterprise_id']) ?></p>
                        </div>
                    </div>
                </div>

                <!-- Carte 2 -->
                <div class="col s4 ">
                    <div class="card deep-purple darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Total des utilisateurs actif</span>
                            <p>Utilisateurs actifs : <?= Entreprise::countActifsUsers($_SESSION['enterprise']['enterprise_id']) ?></p>
                        </div>
                    </div>
                </div>
                <!-- Carte 3 -->
                <div class="col s4 ">
                    <div class="card purple darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Total des trajets</span>
                            <p>Total des trajets crées : <?= Entreprise::countTotalTrajets($_SESSION['enterprise']['enterprise_id']) ?></p>
                        </div>
                    </div>
                </div>
                <!-- 
                carte 4  -->

                <div id="user-list-container" class="col s12">
                    <div class="card teal darken-1">
                        <div class="card-content white-text">
                            <span class="card-title">Les 5 derniers utilisateurs avec comme infos : </span>
                            <div class="user-card-container">
                                <?php foreach (Entreprise::lastFiveUsers($_SESSION['enterprise']['enterprise_id']) as $user) : ?>
                                    <div class="user-card">
                                        <p class="user-pseudo"><?= $user['user_pseudo'] ?></p>
                                        <img class="user-photo" src="http://BDDPHP.test/assets/image/<?= $user['user_photo']; ?>" alt="Photo de profil">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col s6 ">
                    <div class="card brown">
                        <div class="card-content white-text">
                            <span class="card-title">Stats Hebdo (a venir)</span>
                            <p>A venir...</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 ">
                    <div class="card light-blue darken-4">
                        <div class="card-content white-text">
                            <span class="card-title">5 derniers trajets</span>
                            <?php foreach (Entreprise::lastFiveTrajets($_SESSION['enterprise']['enterprise_id']) as $trajet) : ?>
                                <h2>Informations</h2>
                                <p><?= $trajet['ride_date'] ?></p>
                                <p><?= $trajet['ride_distance'] ?>km</p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>