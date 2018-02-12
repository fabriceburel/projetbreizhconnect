<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include 'controllers/headerController.php';
include_once 'controllers/buttonConnectOffController.php';
include_once 'header.php';
if ($checklogin)
{    
    ?>
    <p> Connexion réussie !!</p>
    <p>Bienvenue <?= $_SESSION['username']; ?>
        <?php
    }
    else
    {
        ?>
    <div class="container">
        <h2 class="col l12 center-align">Connexion</h2>
        <p class="textError"><?= $textError; ?></p>
        <div class="row">
            <div class="col offset-l2 l8 s12 center-block">
                <!-- Création du formulaire d'inscription-->
                <form action="connexion.php" method="POST">            
                    <!-- Création de l'emplacement Pseudo -->
                    <div class="input-field l4">
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="username" class="grey darken-4 white-text" id="username" value="<?= $users->username; ?>">
                        <label for="username">Entrez votre pseudo : </label>
                    </div>
                    <!-- Création de l'emplacement du mdp -->
                    <div class="input-field l4">
                        <i class="material-icons prefix">vpn_key</i>
                        <input type="password" name="password" class="grey darken-4 white-text" id="password" value="<?= $users->password ?>">
                        <label for="password">Mot de passe : </label>
                    </div>        
                    <!-- Ajout du bouton pour envoyer la requête -->
                    <div class="input-field l4 center-align">  
                        <button name="subscribe" onclick="inscribe();" class="btn btn-large waves-effect waves-light grey darken-4" id="submitConnexion">Me connecter <i class="material-icons right">send</i></button>
                    </div>
                    <!-- Ajout du bouton pour annuler l'inscritpion -->
                    <div class="input-field l4 center-align">
                        <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4"><a href="index.php">Annuler ma connexion</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}
include 'footer.php';
?>