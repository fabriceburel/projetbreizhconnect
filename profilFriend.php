<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'controllers/headerController.php';
include_once 'controllers/profileFriendController.php';
include_once 'header.php';
?>
<div class="container grey lighten-2 z-depth-5" id="viewProfile">
    <?php
    if (is_bool($frienduser))
    {
        ?>
        <p>Aucun utilisateur trouvé</p>
        <?php
    }
    else
    {
        ?>
        <h2 class = "center-align">Profil de <?= $frienduser->firstname . ' ' . $frienduser->lastname ?></h2>
        <div class="row">
            <div class="col offset-l4 profile">
                 <img class="center-block" src="<?= $pathPicture ?>" width="100" height="120" alt="ma photo de profil">
                <h3>Nom : <span><?= $frienduser->lastname ?></span></h3>
                <h3>Prénom : <span><?= $frienduser->firstname ?></span></h3>
                <h3>Pseudo : <span><?= $frienduser->username ?></span></h3>
                <h3>Pays : <span><?= $frienduser->country ?></span></h3>
                <h3>Age : <span><?= $frienduser->age ?> ans</span></h3>
                <?php
                if ($frienduser->region != NULL)
                {
                    ?>
                    <h3>region : <span><?= $frienduser->region; ?></span></h3>
                    <?php
                }
                ?>
                <h3>Date de naissance : <span><?= $frienduser->birthdateFrench ?></span></h3>       
            </div>
        <?php } ?>
    </div>    
</div>
<?php include 'footer.php'; ?><?php
