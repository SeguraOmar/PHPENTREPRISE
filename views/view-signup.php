<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>

    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <h2>Inscription</h2>

    <form action="controller-signup.php" method="POST" novalidate>
        <label for="enterprise_name">Nom de l'entreprise :</label><br>
        <input type="text" id="enterprise_name" name="enterprise_name" value="<?= isset($_POST['enterprise_name']) ? htmlspecialchars($_POST['enterprise_name']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_name'])) {
                echo $errors['enterprise_name'];
            } ?>
        </span><br><br>

        <label for="enterprise_siret">SIRET : </label><br>
        <input type="text" id="enterprise_siret" name="enterprise_siret" value="<?= isset($_POST['enterprise_siret']) ? htmlspecialchars($_POST['enterprise_siret']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_siret'])) {
                echo $errors['enterprise_siret'];
            } ?>
        </span><br><br>

        <label for="enterprise_adress">Adresse:</label><br>
        <input type="text" id="enterprise_adress" name="enterprise_adress" value="<?= isset($_POST['enterprise_adress']) ? htmlspecialchars($_POST['enterprise_adress']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_adress'])) {
                echo $errors['enterprise_adress'];
            } ?>
        </span><br><br>
        
        <label for="enterprise_city">Ville :</label><br>
        <input type="text" id="enterprise_city" name="enterprise_city" value="<?= isset($_POST['enterprise_city']) ? htmlspecialchars($_POST['enterprise_city']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_city'])) {
                echo $errors['enterprise_city'];
            } ?>
        </span><br><br>

        <label for="enterprise_zipcode">Code postal :</label><br>
        <input type="number" id="enterprise_zipcode" name="enterprise_zipcode" value="<?= isset($_POST['enterprise_zipcode']) ? htmlspecialchars($_POST['enterprise_zipcode']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_zipcode'])) {
                echo $errors['enterprise_zipcode'];
            } ?>
        </span><br><br>


        <label for="enterprise_email">E-mail :</label><br>
        <input type="enterprise_email" id="enterprise_email" name="enterprise_email" value="<?= isset($_POST['enterprise_email']) ? htmlspecialchars($_POST['enterprise_email']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_email'])) {
                echo $errors['enterprise_email'];
            } ?>
        </span><br><br>


        <label for="enterprise_password">Mot de passe:</label><br>
        <input type="password" id="enterprise_password" name="enterprise_password" value="<?= isset($_POST['passsword']) ? htmlspecialchars($_POST['enterprise_password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_password'])) {
                echo $errors['enterprise_password'];
            } ?>
        </span><br><br>

        <label for="confirm_password">Confirmer le mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['confirm_password'])) {
                echo $errors['confirm_password'];
            } ?>
        </span><br><br>

        <label for="CGU"></label><br>
        <input type="checkbox" id="CGU" name="CGU" <?= isset($_POST['CGU']) ? "checked"  : '' ?>> Veuillez accepter les CGU
        <span class="error">
            <?php if (isset($errors['CGU'])) {
                echo $errors['CGU'];
            } ?>
        </span><br><br>


        <input type="submit" value="S'enregistrer">
        <a href="../controllers/controller-signin.php"><button type="button">Se connecter</button></a>
    </form>

    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>



</body>

</html>