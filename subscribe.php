<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/country.php';
include_once 'models/region.php';
include 'controllers/headerController.php';
include_once 'controllers/subscribeControllers.php';
include_once 'header.php';
?>
<div class="row">
  <?php
  if ($checkBirthday && $checkUsername && $checkCountry && $checkMail && $checkFirstname && $checkRegion && $checkName && $checkPassword && $checkPicture && $insertSuccess)
  {
    echo $textError;
  }
  else
  {
    ?>
    <div class="container">
      <h2 class="col l12 center-align">Inscription</h2>
      <!-- h3 pas nécessaire tant que la fenetre modal n'est pas réactivée -->
      <!-- <h3 class="col l12 center-align">Vérifier et modifier vos informations avant validation de l'inscription</h3> -->
      <div class="row">
        <div class="col offset-l2 l8 s12 center-block">
          <!-- Création du formulaire d'inscription-->
          <form action="#" method="POST" enctype="multipart/form-data">            
            <!-- Création de l'emplacement du nom -->
            <div class="input-field l4">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" name="lastname" class="grey darken-4 white-text" id="lastname" required value="<?= $NewUsers->lastname; ?>">
              <label for="lastname">Nom : <p class="textError"><?= $textName; ?></p></label>
            </div>
            <!-- Création de l'emplacement du prénom -->
            <div class="input-field l4">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" name="firstname" class="grey darken-4 white-text" id="firstname" required value="<?= $NewUsers->firstname; ?>">
              <label for="firstname">Prénom : <p class="textError"><?= $textFirstname; ?></p></label>
            </div>
            <!-- Création de l'emplacement Pseudo -->
            <div class="input-field l4">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" name="username" class="grey darken-4 white-text" id="username" required value="<?= $NewUsers->username; ?>">
              <label for="username">Choisissez un pseudo : <p class="textError"><?= $textUsername; ?></p></label>
            </div>
            <!-- Création de l'emplacement Date de naissance -->
            <div class="input-field l4">
              <i class="material-icons prefix">perm_contact_calendar</i>
              <input type="text" name="birthdate" class="datepicker grey darken-4 white-text" id="birthdate" required value="<?= $NewUsers->birthdateFrench; ?>">
              <label for="birthdate">Votre Date de naissance: <p class="textError"><?= $textBirthday; ?></p></label>
            </div>
            <!-- Création de l'emplacement du mail -->
            <div class="input-field l4">
              <i class="material-icons prefix">contact_mail</i>
              <input type="email" name="mail" class="grey darken-4 white-text" id="mail" required value="<?= $NewUsers->mail; ?>">
              <label for="email">Votre Email : <p class="textError"><?= $textMail; ?></p></label>
            </div>
            <!-- création de la liste deroulante permettant de choisir son pays -->
            <div class="input-field l4">
              <i class="fa fa-globe prefix" aria-hidden="true"></i>
              <select name="country"  class="grey darken-4 white-text country" required>
                <option>Sélectionner votre pays</option>
                <?php
                foreach ($countryList as $country)
                {
                  ?>
                  <option value="<?= $country->id ?>"<?= $NewUsers->idCountry == $country->id ? ' selected' : ''; ?>><?= $country->country ?></option>
                  <?php
                }
                ?> 
              </select>
              <label class="localisation" for="country">Séléctionnez votre pays : <p class="textError"><?= $textCountry; ?></p></label>
            </div>          
            <div class="input-field l4 region">
              <i class="fa fa-globe prefix" aria-hidden="true"></i>
              <select name="region" class="grey darken-4 white-text">
                <option>Sélectionnez votre région</option>
                <?php
                foreach ($regionList as $region)
                {
                  ?>
                  <option value="<?= $region->id ?>"<?= $NewUsers->idRegion == $region->id ? ' selected' : ''; ?>><?= $region->region ?></option>
                  <?php
                }
                ?> 
              </select>
              <label class="localisation" for="region">Région : <p class="textError"><?= $textRegion; ?></p></label>
            </div>
            <!-- Création de l'emplacement du mdp -->
            <div class="input-field l4">
              <i class="material-icons prefix">vpn_key</i>
              <input type="password" name="passwordUser" class="grey darken-4 white-text" id="passwordUser" required value="<?= $NewUsers->password ?>">
              <label for="passwordUser">Mot de passe avec caractère spéciaux et chiffres : <p class="textError"><?= $textPassword; ?></p></label>
            </div>
            <!-- Création de l'emplacement de la vérification -->
            <div class="input-field l4">
              <i class="material-icons prefix">vpn_key</i>              
              <input type="password" name="passwordCheck" class="grey darken-4 white-text" id="passwordCheck" required value="<?= $NewUsers->checkPassword ?>">
              <label for="passwordCheck">Répétez votre mot de passe : </label>
            </div>            
            <!-- Possibilité d'ajouter une photo de profil -->
            <div class="file-field input-field">              
              <div class="btn grey darken-4 white-text">                
                <span>Votre Photo <i class="material-icons right">cloud_upload</i></span>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" name="avatar">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
                <img src="assets/img/apercuimage.jpg" alt="apercu image">
                <p class="textError"><?= $textPicture; ?></p>
              </div>
            </div>
            <!-- Ajout du bouton pour envoyer la requête -->
            <div class="input-field l4 center-align">  
              <button name="subscribe" class="btn btn-large waves-effect waves-light grey darken-4">Valider votre insciption <i class="material-icons right">send</i></button>
            </div>
            <!-- Ajout du bouton pour annuler l'inscritpion -->
            <div class="input-field l4 center-align">
              <button name="undo" aria-hidden="true" class="btn waves-effect waves-dark grey darken-4">Annuler l'inscription</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
  <?php
  include 'footer.php';
  ?>
