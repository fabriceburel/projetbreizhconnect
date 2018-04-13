<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/log.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <!-- meta pour l'adaptabilité pour des mobiles -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="assets/lib/materialize/dist/css/materialize.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/searchStyle.css">
        <title>Projet</title>
    </head>
    <body>
        <header id="header">
            <?php
            if (empty($_SESSION['id']))
            {
                include 'buttonLogOff.php';
            }
            else
            {
                include 'buttonLogOn.php';
            }
            ?>
            <nav>
                <div class="nav-wrapper" id="navbar">
                    <a href="#" data-activates="navbarMobile" class="button-collapse"><i class="material-icons">menu MENU</i></a>
                    <?php
                    if (!empty($_SESSION['id']) && $currentPage == 'tchat')
                    {
                        ?>
                        <div class="show-on-large ">
                            <a href="#" data-activates="userFriendList" class="button-collapse">Choisir une personne</a>
                            <ul class="side-nav right" id="userFriendList">
                                <?php
                                foreach ($friendList AS $user)
                                {
                                    ?>
                                <li><a href="tchat.php?friend=<?= $user->id ?>">
                                        <div class="col s12 friend" name="<?= $user->id ?>">
                                            <p><?= $user->username ?>  <span class="country"> de : <?= $user->country ?> </span><span min-width="5" min-height="5" class="status <?= $user->log == 0 ? 'grey' : 'green' ?>">0</span></p>
                                            
                                        </div></a></li>

                                <?php } ?>
                                        <li><a href="#" title="fermer le menu">Fermer</a></li>
                            </ul>
                        </div>
                    <?php } ?>
                    <ul class="left hide-on-med-and-down">
                        <li class="navbar <?= $currentPage == 'tchat' ? 'currentPage' : ''; ?>"><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                        <li class="navbar <?= $currentPage == 'fileExchange' ? 'currentPage' : ''; ?>"><a href="fileExchange.php" title="Echanger des fichiers">Echange de fichiers</a></li>
                        <li class="navbar <?= $currentPage == 'search' ? 'currentPage' : ''; ?>"><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li class="navbar <?= $currentPage == 'profile' ? 'currentPage' : ''; ?>"><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                        <li class="navbar <?= $currentPage == 'community' ? 'currentPage' : ''; ?>"><a href="community.php" title="Ma communauté">Ma communauté</a></li>
                    </ul>
                    <ul class="side-nav navbar" id="navbarMobile">
                        <li><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                        <li><a href="#photos" title="partager des photos avec un ou plusieurs amis">Echange de fichier</a></li>
                        <li><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                        <li><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                        <li><a href="profile.php" title="Ma communauté">Ma communauté</a></li>
                        <li><a href="#" title="Fermer le menu">Fermer</a></li>
                    </ul>
                </div>
            </nav>
        </header>