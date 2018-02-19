<?php include_once 'controllers/buttonLogOnController.php'; ?>
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
