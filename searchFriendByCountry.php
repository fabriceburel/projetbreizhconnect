<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/relationship.php';
include_once 'models/country.php';
include_once 'models/region.php';
include_once 'controllers/headerController.php';
include_once 'controllers/searchFriendByCountryController.php';
include_once 'header.php';
?>
<h2 class="col xl6 center-align">Rechercher une personne par pays</h2>
<!-- h3 pas nécessaire tant que la fenetre modal n'est pas réactivée -->
<!-- <h3 class="col l12 center-align">Vérifier et modifier vos informations avant validation de l'inscription</h3> -->
<div class="row">
    <div class="col s12 offset-l2 l8 offset-xl3 xl6">
        <!-- Création du formulaire d'inscription-->
        <form class="searchUser" action="#" method="POST">
            <!-- Création de l'emplacement Pseudo -->
            <div class="input-field l4">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="username" class="white-text" id="username" value="<?= $FriendUsers->username; ?>">
                <label for="username">Pseudo de la personne (optionnel) : </label>
            </div>            
            <!-- création de la liste deroulante permettant de choisir son pays -->
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <i class="fa fa-globe prefix" aria-hidden="true"></i>
                        <select name="country"  class="white-text country" required>
                            <option>Sélectionner le pays</option>
                            <?php
                            foreach ($countryList as $country)
                            {
                                ?>
                                <option value="<?= $country->id ?>"<?= $FriendUsers->idCountry == $country->id ? 'selected' : '' ?>><?= $country->country ?></option>
                                <?php
                            }
                            ?> 
                        </select>   
                        <label class="localisation" for="country">Pays : <p class="textError"><?= $textCountry; ?></p></label>
                    </div>
                </div>
            </div>
            <div class="input-field region">
                <i class="fa fa-globe prefix" aria-hidden="true"></i>
                <select name="region" class="white-text">
                    <option>Sélectionnez la région</option>
                    <?php
                    foreach ($regionList as $region)
                    {
                        ?>
                        <option value="<?= $region->id ?>" <?= $FriendUsers->idRegion == $region->id ? 'selected' : ''; ?>><?= $region->region ?></option>
                        <?php
                    }
                    ?> 
                </select>
                <label class="localisation" for="region">Région : <p class="textError"><?= $textRegion; ?></p></label>
            </div>
            <!-- Ajout du bouton pour envoyer la requête -->
            <div class="input-field l4 center-align">  
                <button name="searchFriend" class="btn btn-large waves-effect waves-light grey darken-4">Valider<i class="material-icons right">send</i></button>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['searchFriend']))
{
    if (!empty($userList))
    {
        ?>
        <div class="row">
            <?php
            $country = '';
            $region = '';
            foreach ($userList AS $user)
            { //on vérifie en premier que l'utilisateur récupéré n'est pas l'utisateur connecté
                if (!($user->id == $relationship->idTransmitter))
                {
                    if ($country != $user->country | $region != $user->region)
                    {
                        $country = $user->country;
                        $region = $user->region;
                        ?>
                        <div class="grey row col offset-l4 l4 s12 localisation"><h3>Pays: <?= $country ?></h3>
                            <?php if ($region != '')
                            {
                                ?>
                                <h3>Region: <?= $region ?></h3> 
                        <?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="white row col offset-l4 l4 s12 profileUser">
                        <div class="col l2 s5">
                            <img class="avatarUser" src="<?= $user->avatar == '' ? 'media/profile/default/imagepardefaut.jpeg' : 'media/' . $user->id . '/profile/' . $user->avatar; ?>" width="100" height="120" alt="<?= $user->username ?>"/>
                            <p class="white-text status <?= $user->log == 0 ? 'grey' : 'green' ?>"><?= $user->log == 0 ? 'Déconnecté' : 'Connecté' ?></p>
                        </div>
                        <div class="row col offset-l3 l3 s5 username">
                            <h4><?= $user->username ?></h4>
                        </div>
                        <div class="row col offset-l2 l8 s7 buttonUser">
                            <a class="btn black col l3 s12" href="profilFriend.php?idFriend=<?= $user->id ?>">PROFIL</a>
                            <?php
                            /*
                             * On vérifie si l'utilisateur existe dans l'un des tableaux récupérer dans le controller
                             * Pour personnaliser le bouton en fonction des relations récupérer dans l'attribut id de l'objet user avec l'utilisateur connecté
                             */
                            if ($relationship->idTransmitter != 0)
                            {
                                if (in_array($user->id, $listFriendAskSend))
                                {
                                    ?>
                                    <input type="input" disabled class="btn white-text col offset-l1 l5 s12" value="En Attente">
                                    <?php
                                }
                                else if (in_array($user->id, $listFriend))
                                {
                                    ?>
                                    <input type="input" class="btn green col offset-l1 l5 s12"  value="AMI">
                                    <?php
                                }
                                else if (is_array($listBlockFriend) && in_array($user->id, $listBlockFriend))
                                {
                                    ?>
                                    <form method="POST" action="#" class="col offset-l1 l5 s12 addFriend"><input hidden value=<?= $user->id ?> name="friend"><input type="submit" name="releaseFriend" value="DEBLOQUER" class="btn red accent-4 col l12 s12"></form>
                                    <?php
                                }
                                else if (is_array($listFriendBlock) && in_array($user->id, $listFriendBlock))
                                {
                                }
                                else
                                {
                                    ?>
                                    <form method="POST" action="#" class="col offset-l1 l5 s12 addFriend"><input hidden value=<?= $user->id ?> name="friend"><input type="submit" name="addFriend" value="Ajouter" class="btn blue col l12 s12"></form>
                                        <?php
                                    }
                                }
                                ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
    else
    {
        ?>
        <h3>Aucun utilisateur trouvé</h3>
        <?php
    }
}
include 'footer.php';
?>