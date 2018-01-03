<?php
include 'header.php';
?>
<div class="container-fluid">
    <div class="row">
        <?php
        include 'checkpost.php';
        if ($checkBirthday && $checkTown && $checkCountry && $checkMail && $checkFirstname && $checkName && $checkPassword && !empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['birthday']) && !empty($_POST['country']) && !empty($_POST['password']) && !empty($_POST['checked']) && !empty($_POST['town']) && !empty($_POST['mail']))
        {
            //permet de sauvegarder les valeurs saisis par l'utilisateur lors du clique sur le bouton envoyer lorsque le formulaire est complet
            $_SESSION['name'] = htmlspecialchars($_POST['name']);
            $_SESSION['firstname'] = htmlspecialchars($_POST['firstname']);
            $_SESSION['birthday'] = htmlspecialchars($_POST['birthday']);
            $_SESSION['country'] = htmlspecialchars($_POST['country']);
            $_SESSION['town'] = htmlspecialchars($_POST['town']);
            $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
            $_SESSION['password'] = htmlspecialchars($_POST['password']);
            $_SESSION['checked'] = htmlspecialchars($_POST['checked']);
            $_SESSION['avatar'] = htmlspecialchars($_POST['avatar']);
            $dateBirthday = htmlspecialchars($_POST['birthday']);
        }
        else
        {
            //permet de sauvegarder les valeurs saisis par l'utilisateur lors du clique sur le bouton envoyer lorsque le formulaire n'est pas complet
            //Avant le clique sur le submit on initialise les variable de messages d'erreur à rien.
            if (isset($_POST['name']))
            {
                $_SESSION['name'] = htmlspecialchars($_POST['name']);
            }
            else
            {
                $textName = '';
            }
            if (isset($_POST['firstname']))
            {
                $_SESSION['firstname'] = htmlspecialchars($_POST['firstname']);
            }
            else
            {
                $textFirstname = '';
            }
            if (isset($_POST['birthday']))
            {
                $_SESSION['birthday'] = htmlspecialchars($_POST['birthday']);
            }
            if (isset($_POST['country']))
            {
                $_SESSION['country'] = htmlspecialchars($_POST['country']);
            }
             if (isset($_POST['region']))
            {
                $_SESSION['region'] = htmlspecialchars($_POST['region']);
            }
            if (isset($_POST['password']))
            {
                $_SESSION['password'] = htmlspecialchars($_POST['password']);
            }
            else
            {
                $textPostalCode = '';
            }
            if (isset($_POST['town']))
            {
                $_SESSION['town'] = htmlspecialchars($_POST['town']);
            }
            else
            {
                $textTown = '';
            }
            if (isset($_POST['mail']))
            {
                $_SESSION['mail'] = htmlspecialchars($_POST['mail']);
            }
            else
            {
                $textMail = '';
            }
            if (isset($_POST['checked']))
            {
                $_SESSION['checked'] = htmlspecialchars($_POST['checked']);
            }
            if (isset($_POST['password']))
            {
                $_SESSION['password'] = htmlspecialchars($_POST['password']);
            }
            else
            {
                $textDegree = '';
            }
            ?>
            <h2 class="col-lg-12 text-center">Inscription</h2>
                    <form action="inscription.php" method="post">
                        <!--  Création du formulaire d'inscription-->
                        <div class="row col-lg-offset-1">
                            <label for="name">Nom : </label><input type="text" name="name" placeholder="Entrez votre nom" id="lastName">  <!-- Création de l'emplacement du nom  -->
                        </div>
                        <div class="row col-lg-offset-1">
                            <label for="firstname">Prénom : </label><input type="text" name="firstname" placeholder="Entrez votre prénom" id="firstName"> <!-- Création de l'emplacement du prénom  -->
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-offset-1 col-lg-2">Date de naissance (exp:26/01/1952)</label>
                            <div class="input-group date col-lg-2 datepickerBirthday" id="datepickerBirthday">
                                <input class="form-control" type="text" placeholder="26/01/1952">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <!-- Création de l'emplacement du mail  -->
                        <div class="row col-lg-offset-1">
                            <label for="mail">Email : </label><input type="mail" name="mail" placeholder="Entrez votre adresse e-mail" id="mail">
                        </div>
                        <!-- création de la liste deroulante permettant de choisir son pays -->
                          <label class="col-lg-offset-1 col-lg-1">Pays : </label><select class="col-lg-offset-2"     name="country" required>
                            <?php
                            include 'tablecountrie.php';
                            foreach ($countryArray as $country)
                            {
                                ?>
                                <option class="col-lg-3" value="<?php echo $country ?>"<?php echo (isset($_SESSION['country']) && $_SESSION['country'] == $country) ? ' selected' : ''; ?>><?php echo $country ?></option>
                                <?php
                            }
                            ?> 
                        </select>
                                              <label class="col-lg-offset-1 col-lg-1">Région : </label><select class="col-lg-offset-2"     name="region">
                            <?php
                            foreach ($regions as $region)
                            {
                                ?>
                                <option class="col-lg-3" value="<?php echo $region ?>"<?php echo (isset($_SESSION['region']) && $_SESSION['region'] == $region) ? ' selected' : ''; ?>><?php echo $region ?></option>
                                <?php
                            }
                            ?> 
                        </select>
                        <!-- Création de l'emplacement du mdp  -->
                        <div class="row col-lg-offset-1">
                            <label for="password">Mot de passe : </label><input type="password" name="password" placeholder="Entrez votre mot de passe" id="firstPassword"> 
                        </div>
                        <!-- Création de l'emplacement de la vérification  -->
                        <div class="row col-lg-offset-1">
                            <label for="checked">Vérification du mot de passe : </label><input type="password" name="checked" placeholder="Entrez votre mot de passe" id="checkPassword"> 
                        </div>
                        <div class="row col-lg-offset-1">
                            <!-- Possibilité d'ajouter une photo de profil -->
                            <label for="pictures">Ajouter une photo : (facultatif)</label><input type="file" name="avatar" value="Parcourir" id="picture">
                        </div>
                        <!-- Ajout du bouton pour envoyer la requête -->
                        <div class="row text-center">
                            <button name="subscribe" onclick="inscribe();">S'inscrire au site!</button>
                            <button name="undo" aria-hidden="true">Annuler l'inscription</button>
                        </div>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    <?php
    include 'footer.php';
    ?>
