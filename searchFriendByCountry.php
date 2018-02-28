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
        <form action="#" method="POST">
            <!-- Création de l'emplacement Pseudo -->
            <div class="input-field l4">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="username" class="grey darken-4 white-text" id="username" value="<?= $FriendUsers->username; ?>">
                <label for="username">Pseudo de la personne (optionnel) : </label>
            </div>            
            <!-- création de la liste deroulante permettant de choisir son pays -->
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <i class="fa fa-globe prefix" aria-hidden="true"></i>
                        <select name="country"  class="grey darken-4 white-text country" required>
                            <option>Sélectionner le pays</option>
                            <?php
                            foreach ($countryList as $country)
                            {
                                ?>
                                <option value="<?= $country->id ?>" <?= $FriendUsers->idCountry == $country->id ? 'selected' : ''; ?>><?= $country->country ?></option>
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
                <select name="region" class="grey darken-4 white-text">
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
            <table class="striped col s4 M4 l4 friend centered">
                <thead>
                    <tr>
                        <th>pseudo</th>
                        <th>PAYS</th>
                        <th>REGION</th>
                        <th>PROFIL</th>
                        <?php
                        if ($relationship->idTransmitter != 0)
                        {
                            ?>
                            <th>Ajouter en ami</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($userList AS $user)
                    {
                        //on vérifie en premier que l'utilisateur récupéré n'est pas l'utisateur connecté
                        if (!($user->id == $relationship->idTransmitter))
                        {
                            ?>
                            <tr>
                                <td><?= $user->username ?></td>
                                <td><?= $user->country ?></td>
                                <td><?= $user->region ?></td>
                                <td><a class="btn" href="profilFriend.php?idFriend=<?= $user->id ?>">PROFIL</a></td>
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
                                        <td class="center"><input type="input" value="En Attente" class="btn grey col l9"></td>
                                        <?php
                                    }
                                    else if (in_array($user->id, $listFriend))
                                    {
                                        ?>
                                        <td class="center"><input type="input" value="AMI" class="btn green col l9"></td>
                                        <?php
                                    }
                                    else if (is_array($listBlockFriend) && in_array($user->id, $listBlockFriend))
                                    {
                                        ?>
                                        <td><form method="POST" action="#" class="col l1 releaseFriend"><input hidden value=<?= $user->id ?> name="friend"><input type="submit" name="releaseFriend" value="DEBLOQUER" class="btn red accent-4"></form></td>
                                        <?php
                                    }
                                    else if (is_array($listFriendBlock) && in_array($user->id, $listFriendBlock))
                                    {
                                        ?>
                                        <td></td>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <td><form method="POST" action="#" class="col l1 addFriend"><input hidden value=<?= $user->id ?> name="friend"><input type="submit" name="addFriend" value="Ajouter" class="btn"></form></td>
                                                <?php
                                            }
                                        }
                                        ?>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }
    else
    {
        ?>
        <p>Aucun utilisateur trouvé</p>
        <?php
    }
}
include 'footer.php';
?>