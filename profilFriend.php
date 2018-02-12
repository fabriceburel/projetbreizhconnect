<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'controllers/headerController.php';
include_once 'controllers/profileController.php';
include_once 'header.php';
?>
<div class="container  indigo lighten-3">
    <h2  class="center-align">Profil de <?= $user->firstname. ' ' . $user->lastname ?></h2>
    <div class="row">
        <div class="col offset-l2" profile">
             <img class="center-block" src="media/<?= $user->id ?>/profile/<?= $user->avatar ?>" width="100" height="120" alt="ma photo de profil">
            <h3>Nom : <span><?= $user->lastname ?></span></h3>
            <h3>Prénom : <span><?= $user->firstname ?></span></h3>
            <h3>Pseudo : <span><?= $user->username ?></span></h3>
            <h3>Pays : <span><?= $user->country ?></span></h3>
            <?php
            if ($user->region != NULL)
            {
                ?>
                <h3>region : <span><?= $user->region; ?></span></h3>
            <?php } ?>
            <h3>Date de naissance : <span><?= $user->birthdate ?></span></h3>        
        </div>
    </div>    
</div>
<?php include 'footer.php'; ?><?php