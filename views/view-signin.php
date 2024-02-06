<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
</head>

<body>
    <h2>connexion</h2>

    <form action="controller-signin.php" method="POST" novalidate>


        <label for="Email">Email :
            <?php
            // Vérifie si le pseudo a été soumis et s'il est vide
            if (isset($_POST['enterprise_email']) && empty($_POST["enterprise_email"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user_pseudo ?? ''); ?>">
        </span><br><br>

        <!-- Champ Mot de passe -->
        <label for="password">Mot de passe:
            <?php
            // Vérifie si le pseudo a été soumis et s'il est vide
            if (isset($_POST['pseudo']) && empty($_POST["password"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="password" id="password" name="password" value="">
        </span><br><br>

        <!-- Affichage des erreurs de connexion -->
        <p><?= $errors["connexion"] ?? "" ?></p>

        <!-- Bouton de soumission -->
        <input type="submit" value="Se connecter">
        <a href="../controllers/controller-signup.php"><button type="button">S'inscrire</button></a>


    </form>
</body>

</html>