<?php include_once 'controllers/viewProfileController.php'; ?>
<div class="container  indigo lighten-3" id="viewProfile">
    <h2  class="center-align">Mon Profil</h2>
    <div class="row">
        <div class="col offset-l2" id="profile">
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
            <h3>Date de naissance : <span><?= $user->birthdateFrench ?></span></h3>  
            <form action="#" method="POST">
                <button class="btn white black-text" title="Modifier" name="edit" id="editProfile" userId="<?= $users->id ?>">Modifier mon profil <i class="material-icons">edit</i></button>
                <button data-target="deleteProfile" type="submit" class="btn black modal-trigger" name="delete" title="supprimer">Supprimer mon profil <i class="material-icons">delete_forever</i></button>
                <!-- Fenêtre modale pour la suppression du profil de l'utilisateur -->
                <div id="deleteProfile" class="modal">
                    <div class="modal-content">
                        <h4>Suppression de votre profil</h4>
                        <p>La suppression de votre profil est définitif.</p>
                        <p>Toute vos informations et vos contact seront perdus.</p>
                        <p>Veuillez confirmer l'annulation ou cliquer sur annuler pour reprendre votre navigation</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red" id="validDeleteProfile" userId="<?= $users->id ?>">Suppression</a>
                        <a href="#" class="modal-action modal-close waves-effect waves-green btn black">Annuler</a>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
