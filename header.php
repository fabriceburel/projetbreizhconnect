<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/country.php';
include_once 'models/region.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!-- meta pour l'adaptabilité pour des mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="assets/lib/materialize/dist/css/materialize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Projet</title>
    </head>
    <body>
        <header>
            <?php
            if (empty($_SESSION['username']))
            {
                include 'buttonConnectOff.php';
            }
            else
            {
                include 'buttonConnectOn.php';
            }
            ?>
            <nav>
                <div class="nav-wrapper" id="navbar">
                    <a href="index.php" class="brand-logo right">BZHConnect</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="#communaute" title="redirection vers la présentation">Communiquer</a></li>
                        <li><a href="#Partagerecran" title="Je peux partager mon écran pour me faire aider">Partager mon écran</a></li>
                        <li><a href="#photos" title="partager des photos avec un ou plusieurs amis">Enchange de fichier</a></li>
                        <li><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="#communaute" title="redirection vers la présentation">Communiquer</a></li>
                        <li><a href="#Partagerecran" title="Je peux partager mon écran pour me faire aider">Partager mon écran</a></li>
                        <li><a href="#photos" title="partager des photos avec un ou plusieurs amis">Enchange de fichier</a></li>
                        <li><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                    </ul>
                </div>
            </nav>
        </header>