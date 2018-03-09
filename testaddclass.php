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
            <div  class="row" id="heading">
                <!--En tete du site -->
                <div class="col offset-l3  l5"><h1>BZHConnect</h1></div>
                <div class="col offset-l1 l3 row" id="button-header">
                    <h2><a href="profile.php" class="col l12 waves-effect waves-light btn connexion">MON PROFIL</a></h2>
                    <form method="POST" action="index.php" class="col l12 waves-effect waves-light btn logOut">
                        <div class="text-center logOut">
                            <input type="submit" name="logOut"  value="DECONNEXION">
                        </div>
                    </form>
                </div>               
            </div>
            <div class="row">
                <nav>
                    <div class="nav-wrapper" id="navbar">
                        <a href="#" data-activates="navbarMobile" class="button-collapse"><i class="material-icons">menu MENU</i></a>
                        <ul class="left hide-on-med-and-down">
                            <li class="navbar "><a href="tchat.php" title="Communiquer avec ma communautée">Communiquer</a></li>
                            <li class="navbar"><a href="#photos" title="partager des photos avec un ou plusieurs amis">Echange de fichier</a></li>
                            <li class="navbar "><a href="searchFriendByCountry.php" title="Rechercher une personne">Rechercher un breton</a></li>
                            <li class="navbar "><a href="profile.php" title="profil utilisateur">Mon profil</a></li>
                            <li class="navbar currentPage"><a href="community.php" title="Ma communauté">Ma communauté</a></li>
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
        <div class="row">
            <form method="POST" action="#">
                <p class="col l2">letsar12</p>
                <input type="hidden" hidden value="98" name="idNewFriend">
                <input type="submit" name="accept" value="Accepter" class="btn col l2 green darken-4 waves-effect">
                <input type="submit" name="deny" value="Refuser" class="btn col l2 orange darken-4 waves-effect">
                <input type="submit" name="block" value="Bloquer" class="btn col l2 red accent-4 waves-effect">
            </form> 
        </div>
        <div class="row">
            <form method="POST" action="#">
                <p class="col l2">bellemaman</p>
                <input type="hidden" hidden value="47" name="idNewFriend">
                <input type="submit" name="accept" value="Accepter" class="btn col l2 green darken-4 waves-effect">
                <input type="submit" name="deny" value="Refuser" class="btn col l2 orange darken-4 waves-effect">
                <input type="submit" name="block" value="Bloquer" class="btn col l2 red accent-4 waves-effect">
            </form> 
        </div>

        <div class="row">
            <table class="striped col s4 M4 l4 friend centered">
                <thead>
                    <tr>
                        <th>pseudo</th>
                        <th>PAYS</th>
                        <th>REGION</th>
                        <th>PROFIL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>prete</td>
                        <td>France</td>
                        <td>Auvergne</td>
                        <td><a class="btn" href="profilFriend.php?idFriend=56">PROFIL</a></td>
                    </tr>
                    <tr>
                        <td>letsar1</td>
                        <td>Afghanistan</td>
                        <td></td>
                        <td><a class="btn" href="profilFriend.php?idFriend=87">PROFIL</a></td>
                    </tr>
                    <tr>
                        <td>crèmefraiche</td>
                        <td>France</td>
                        <td>Picardie</td>
                        <td><a class="btn" href="profilFriend.php?idFriend=51">PROFIL</a></td>
                    </tr>
                    <tr>
                        <td>letsar8</td>
                        <td>Allemagne</td>
                        <td></td>
                        <td><a class="btn" href="profilFriend.php?idFriend=93">PROFIL</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script type="text/javascript" src="assets/lib/jquery.min/index.js"></script>
        <script type="text/javascript" src="assets/lib/materialize/dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="assets/js/navbar.js"></script>
        <script type="text/javascript" src="assets/js/scriptDatepicker.js"></script>
        <script>
            $('.modal').modal();
            $(document).ready(function () {
                $('select').material_select();
                $(".button-collapse").sideNav();
                $('.modal').modal();
                //permet d'afficher la liste déroulante des régions lorsque le pays france est sélectionné dans la page inscription
                if ($('select.country').val() == 74) {
                    $('.region').show();
                } else {
                    $('.region').hide();
                }
                $('select.country').change(function () {
                    if ($('select.country').val() == 74) {
                        $('.region').show();
                    } else {
                        $('.region').hide();
                    }
                });
            });
        </script>
        <script type="text/javascript" src="assets/js/buttonConnectOff.js"></script>
        <script type="text/javascript" src="assets/js/tchatAjax.js"></script>
        <script type="text/javascript" src="assets/js/profileAjax.js"></script>
    </body>
</html>

