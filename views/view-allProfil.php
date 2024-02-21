<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/css/userlist.css">
    <style>
        body {
            background-color: #f0f0f0;
            /* Couleur de fond de la page */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* 100% de la hauteur de la vue */
            margin: 0;
        }

        /* Ajout de styles CSS personnalisés */
        .card-image img {
            height: 200px;
            /* Hauteur fixe pour les images des cartes */
            object-fit: cover;
            /* Assure que l'image remplit entièrement le conteneur */
        }

        .card {
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <?php foreach ($users as $user) : ?>
                <div class="col s12 m6 l4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://BDDPHP.test/assets/image/<?= $user['user_photo']; ?>" alt="Photo de profil">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?= $user['user_pseudo'] ?><i class="material-icons right">more_vert</i></span>
                            <div class="switch">
                                <label>
                                    Off
                                    <input id="switch" name="swicth" type="checkbox" data-user-id='<?= $user["user_id"] ?>' <?= $user['user_validate'] == 1 ? "checked" : "" ?>>

                                    <span class="lever"></span>
                                    On
                                </label>
                            </div>
                        </div>

                        <form action=""></form>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $user['user_pseudo'] ?><i class="material-icons right">close</i></span>
                            <p><strong>Prénom:</strong> <?= $user['user_firstname'] ?></p>
                            <p><strong>Nom:</strong> <?= $user['user_name'] ?></p>
                            <p><strong>Email:</strong> <?= $user['user_email'] ?></p>
                            <!-- Ajoutez d'autres informations sur l'utilisateur si nécessaire -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('click', e => {
            if (e.target.type == 'checkbox') {
                if (e.target.checked == false) {
                    console.log('novalide')
                    fetch(`../controllers/controller-ajax.php?novalide=${e.target.dataset.userId}`)
                } else {
                    console.log('valide')
                    fetch(`../controllers/controller-ajax.php?valide=${e.target.dataset.userId}`)
                }

            }
        })
    </script>
</body>

</html>