<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/lib/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/lib/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Projet</title>
    </head>
    <body>
        <header>
            <div id="heading">
                <div class="container-fluid">
                    <!--En tete du site -->
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-6"><h1>BZHConnect</h1></div>
                        <div class="col-lg-3 row button-header">
                            <a data-target="#modalConnexion" data-toggle="modal" class="col-lg-12 btn btn-connexion connexion"><h2>CONNEXION</h2></a>
                            <div id="modalConnexion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
                                <div  class="modal-dialog">
                                    <div  class="modal-content">
                                        <div  class="modal-header">
                                            <h2 class="col-lg-12 text-center">Connexion</h2>
                                        </div>
                                        <!-- fenetre modal pour la connexion -->
                                        <div  class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <form method="post">
                                                        <div id="connexion">
                                                            <!-- Création du formulaire de connexion-->
                                                            <div class="row text-center">
                                                                <label for="ident">Identifiant : </label><input type="text" name="identification" id="ident"/>  <!-- saisi de l'identifiant  -->
                                                            </div>
                                                            <div class="row text-center">
                                                                <label for="password">Confirmez : </label><input type="password" name="password"  id="password"/>  <!-- saisi du mot de passe  -->
                                                            </div>
                                                            <div class="row text-center">
                                                                <button type="button" name="button" onclick="connectOn();">Se connecter au site</button>
                                                                <button type="button"  data-dismiss="modal" aria-hidden="true">Annuler la connexion</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--fenetre modale pour l'inscription -->
                            <a href="#modalSubscribe" data-toggle="modal" class="col-lg-12 btn btn-inscription inscription"><h2>INSCRIPTION</h2></a>
                            <div id="modalSubscribe" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MyModalLabel" aria-hidden="true">
                                <div  class="modal-dialog">
                                    <div  class="modal-content">
                                        <div  class="modal-header">
                                            <h2 class="col-lg-12 text-center">Inscription</h2>
                                        </div>
                                        <div  class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <form action="inscription.php" method="post">
                                                        <!--  Création du formulaire d'inscription-->
                                                        <div class="row col-lg-offset-1">
                                                            <label for="name">Nom : </label><input type="text" name="name" placeholder="Entrez votre nom" id="lastName">  <!-- Création de l'emplacement du nom  -->
                                                        </div>
                                                        <div class="row col-lg-offset-1">
                                                            <label for="firstname">Prénom : </label><input type="text" name="firstname" placeholder="Entrez votre prénom" id="firstName"> <!-- Création de l'emplacement du prénom  -->
                                                        </div>
                                                  <div class="form-group row">
                                                            <label class="control-label col-lg-offset-1 col-lg-4">Date de naissance (exp:26/01/1952)</label>
                                                            <div class="input-group date col-lg-5 datepickerBirthday" id="datepickerBirthday">
                                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                                <input class="form-control" type="text" placeholder="26/01/1952">                                                                
                                                            </div>
                                                        </div>
                                                        <!-- Création de l'emplacement du mail  -->
                                                        <div class="row col-lg-offset-1">
                                                            <label for="mail">Email : </label><input type="mail" name="mail" placeholder="Entrez votre adresse e-mail" id="mail">
                                                        </div>
                                                        <!-- Création de l'emplacement du mdp  -->
                                                        <div class="row col-lg-offset-1">
                                                            <label for="password">Mot de passe : </label><input type="password" name="password" placeholder="Entrez votre mot de passe" id="firstPassword"> 
                                                        </div>
                                                        <!-- Création de l'emplacement de la vérification  -->
                                                        <div class="row col-lg-offset-1">
                                                            <label for="checked">Vérification du mot de passe : </label><input type="password" name="checked" placeholder="Entrez votre mot de passe" id="checkPassword"> 
                                                        </div>
                                                        <div class="row col-lg-offset-1">
                                                            <!-- Possibilité d'ajouter une photo de profil -->
                                                            <label for="pictures">Ajouter une photo : (facultatif)</label><input type="file" name="avatar" value="Parcourir" id="picture">
                                                        </div>
                                                        <!-- Ajout du bouton pour envoyer la requête -->
                                                        <div class="row text-center">
                                                            <button name="subscribe" onclick="inscribe();">S'inscrire au site!</button>
                                                            <button data-dismiss="modal" aria-hidden="true">Annuler l'inscription</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav" class="container">
                <nav  class="navbar navbar-inverse">
                    <div class="navbar-header visible-xs">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span id="menu" class="sr-only">Menu</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Menu</a>
                    </div>
                    <div id="navbar" class="collapse navbar-collapse container-fluid">
                        <ul id="chapitre" class="nav navbar-nav row">
                            <li class="active col-lg-3"><a class="page" href="#communaute" title="redirection vers la présentation">Communiquer</a></li>
                            <li class="active col-lg-3"><a class="page" href="#Partagerecran" title="Je peux partager mon écran pour me faire aider">Partager mon écran</a></li>
                            <li class="active col-lg-3"><a class="page" href="#photos" title="partager des photos avec un ou plusieurs amis">Enchange de fichier</a></li>
                            <li class="active col-lg-3"><a class="page" href="#Rechercher" title="Rechercher une personne">Rechercher un breton</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </nav>
            </div>
        </header>
