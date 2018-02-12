<?php include_once 'controllers/buttonConnectOffController.php'; ?>
<div  class="row" id="heading">
    <!--En tete du site -->
    <div class="col offset-l3  l5"><h1>BZHConnect</h1></div>
    <div class="col offset-l1 l3 row" id="button-header">
        <h2><a href="#modalConnexion" data-toggle="modal" class="col l12 waves-effect waves-light btn modal-trigger connexion">CONNEXION</a></h2>
        <!-- Modal Structure -->
        <div id="modalConnexion" class="modal">
            <div class="modal-content">
                <h4>CONNEXION</h4>
            </div>
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
                    <button name="subscribe" class="btn btn-large waves-effect waves-light grey darken-4" id="submitConnexion">Me connecter<i class="material-icons right">send</i></button>
                </div>
                <!-- Ajout du bouton pour annuler l'inscritpion -->
                <div class="input-field l4 center-align">
                    <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4"><a href="index.php">Annuler ma connexion</a></button>
                </div>
            </form>
        </div>
        <h2><a href="subscribe.php" class="col l12 waves-effect waves-light btn inscription">INSCRIPTION</a></h2>

    </div>
</div>

