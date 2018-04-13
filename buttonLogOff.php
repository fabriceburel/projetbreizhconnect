<?php 
include_once 'controllers/buttonLogOffController.php'; 
?>
<div  class="row" id="heading">
    <!--En tete du site -->
    <div class="col s12 offset-l3 l5"><h1>BZHConnect</h1></div>
    <div class="col s12 offset-l1 l3 row" id="button-header">
        <h2><a href="#modalConnexion" data-toggle="modal" class="col s6 l12 waves-effect waves-light btn modal-trigger connexion">CONNEXION</a></h2>
        <!-- Modal Structure -->
        <div id="modalConnexion" class="modal">
            <div class="modal-content center-align">
                <h3>CONNEXION</h3>
            </div>
            <form action="connexion.php" id="modalConnexion" method="POST"  class="col s12 l12 center-align">            
                <!-- Création de l'emplacement Pseudo -->
                <div class="col s12 offset-m2 m8">
                    <div class="input-field modalConnexion">
                        <i class="material-icons prefix hide-on-small-only">account_circle</i>
                        <input type="text" name="username" class="grey darken-4 white-text" id="username" value="<?= $users->username; ?>">
                        <label for="username">Entrez votre pseudo : </label>
                    </div>
                </div>
                <!-- Création de l'emplacement du mdp -->
                <div class="col s12 offset-m2 m8">
                    <div class="input-field modalConnexion">
                        <i class="material-icons prefix hide-on-small-only">vpn_key</i>
                        <input type="password" name="password" class="grey darken-4 white-text" id="password" value="<?= $users->password ?>">
                        <label for="password">Mot de passe : </label>
                    </div>
                </div>
                <!-- Ajout du bouton pour envoyer la requête -->
                <div class="col s10 offset-m2 m8">
                    <div class="input-field center-align">  
                        <button name="subscribe" class="btn btn-large waves-effect waves-light grey darken-4" id="submitConnexion">Connecter<i class="material-icons right hide-on-small-only">send</i></button>
                    </div>
                </div>
                <!-- Ajout du bouton pour annuler l'inscritpion -->
                <div class="col s10 offset-m2 m8">
                    <div class="input-field center-block">
                        <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4"><a class="white-text" href="index.php">Annuler</a></button>
                    </div>
                </div>
            </form>
        </div>
        <h2><a href="subscribe.php" class="col s6 l12 waves-effect waves-light btn inscription valign-wrapper">INSCRIPTION</a></h2>
    </div>
</div>

