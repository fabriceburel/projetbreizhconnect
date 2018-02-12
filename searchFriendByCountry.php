<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/country.php';
include_once 'models/region.php';
include 'controllers/headerController.php';
include 'controllers/searchFriendByCountryController.php';
include 'header.php';
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
                <input type="text" name="username" class="grey darken-4 white-text" id="username" value="<?= $users->username; ?>">
                <label for="username">Choisissez un pseudo : <!-- <p class="textError"><?= $textUsername; ?></p> --> </label>
            </div>            
            <!-- création de la liste deroulante permettant de choisir son pays -->
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <i class="fa fa-globe prefix" aria-hidden="true"></i>
                        <select name="country"  class="grey darken-4 white-text" required>
                            <option>Sélectionner votre pays</option>
                            <?php
                            foreach ($countryList as $country)
                            {
                                ?>
                                <option value="<?= $country->id ?>"><?= $country->country ?></option>
                                <?php
                            }
                            ?> 
                        </select>
                        <label class="localisation" for="country">Séléctionnez votre pays : <p class="textError"><?= $textCountry; ?></p></label>
                    </div>
                </div>
            </div>
            <div class="input-field region">
                <i class="fa fa-globe prefix" aria-hidden="true"></i>
                <select name="region" class="grey darken-4 white-text">
                    <option>Sélectionnez votre région</option>
                    <?php
                    foreach ($regionList as $region)
                    {
                        ?>
                        <option value="<?= $region->id ?>"><?= $region->region ?></option>
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
<table>
    <thead>
        <tr>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>PAYS</th>
            <th>REGION</th>
            <th>PROFIL</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($userList AS $user)
        {
            ?>
            <tr>
                <td><?= $user->lastname ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->country ?></td>
                <td><?= $user->region ?></td>
                <td><a class="btn" href="profilFriend.php?idFriend=<?= $user->id ?>">VOIR SON PROFIL</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
include 'footer.php';
?>