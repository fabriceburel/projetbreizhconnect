<?php 
include_once 'controllers/buttonLogOnController.php'; 
?>
<div  class="row" id="heading">
    <!--En tete du site -->
    <div class="col s12 offset-l3 l5"><h1>BZHConnect</h1></div>
    <div class="col s12 offset-l1 l3 row" id="button-header">
        <h2><a href="profile.php" class="col s6 l12 waves-effect waves-light btn connexion">PROFIL</a></h2>
        <form method="POST" action="index.php" class="col s6 l12 waves-effect waves-light btn logOut text-center">
            <h2 class="center-align valign-wrapper  logOut">
                <input type="submit" name="logOut"  value="DECONNEXION">
            </h2>
        </form>
    </div>               
</div>
