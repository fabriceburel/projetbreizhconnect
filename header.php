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
            <div class="row">
                <nav>
                    <div class="nav-wrapper" id="navbar">
                        <a href="#" data-activates="navbarMobile" class="button-collapse"><i class="material-icons">menu MENU</i></a>
                        <?php
                        if (!empty($_SESSION['id']) && $currentPage == 'tchat')
                        {
                            ?>
                            <div class="hide-on-med-and-up">
                                <a href="#" data-activates="userFriendList" class="button-collapse">Choisir une personne</a>
                                <ul class="side-nav right" id="userFriendList">
                                    <?php
                                    foreach ($friendList AS $user)
                                    {
                                        ?>
                                        <a href="tchat.php?friend=<?= $user->id ?>">
                                            <div class="col s12 friend" name="<?= $user->id ?>">
                                                <p><?= $user->username ?> de : <span class="country"><?= $user->country ?></span></p>
                                            </div></a>

                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <ul class="left hide-on-med-and-down">
                            <li class="navbar <?= $currentPage == 'tchat' ? 'currentPage' : ''; ?>"><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                            <li class="navbar"><a href="#photos" title="partager des photos avec un ou plusieurs amis">Echange de fichier</a></li>
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
                        </ul>
                    </div>
                </nav>
            </div>
        </header>