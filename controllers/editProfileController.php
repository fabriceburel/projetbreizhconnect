<?php

//on instancie les différentes class que nous avons besoin pour la vue editProfile

$country = new country();
$region = new region();
$countryList = $country->getListCountry();
$regionList = $region->getListRegion();
//regex pour le prénom, accepte les prénom simple d'une taille minimum de 2 caractères sans importances sur la cast et les prénoms composé de 2 caractère par partie 
$regexName = '/((^[éèàëîïêa-z\']{2,10}[-][éèàîïëêa-z\']{2,10}$)|(^[éèàîïëêa-z\']{2,15}$))/i';
$regexUsername = '/^[éèàëêîïa-z0-9]{2,20}$/i';
//regex pour le mot de passe accepte tout les caractères mais oblige d'avoir des lettres et soit un caractère spécial soit un nombre
$regexPassword = '/((W\d\w)|(\w\d\W)|(\d\w\W)|(\d\w\W)|(\d\w)|(\w\d)|(\w\W)|(\W\w))/i';
$regexLocalisation = '/^[0-9]{1,3}$/';
$edit = false;
$avatar = '';
$textNewPassword = 'test';
$textPassword = '';
$password = '';
$editPassword = '';
$oldPassword = '';
if (!isset($_POST['editProfile']))
{
    if (isset($_SESSION['id']))
    {
        $updateUsers = new users();
        $updateUsers->id = intval($_SESSION['id']);
        $textMail = '';
        $textFirstname = '';
        $textUsername = '';
        $textName = '';
        $textPassword = '';
        $textCountry = '';
        $textRegion = '';
        $textBirthday = '';
        $textPicture = '';
        $updateUser = $updateUsers->getProfileUserById();
        $updateUser->password = '';
        $updateUser->checkPassword = '';
        $updateUser->id = intval($_SESSION['id']);
        $avatar = $updateUser->avatar;
    }
}
else
{
    $updateUser = new users();
    if (isset($_SESSION['id']))
    {
        $updateUser->id = intval($_SESSION['id']);
        $user = $updateUser->getProfileUserById();
    }
    $edit = true;
    if (!empty($_POST['mail']))
    {
        $updateUser->mail = strip_tags($_POST['mail']);
        if (filter_var($updateUser->mail, FILTER_VALIDATE_EMAIL))
        {
            $checkMail = true;
            if ($updateUser->existMail())
            {
                $textMail = '';
            }
            elseif ($updateUser->mail == $user->mail)
            {
                $textMail = 'Votre adresse mail n\'a pas changé!';
            }
            else
            {
                $textMail = 'Cette adresse mail est deja utilisé pour un autre compte';
                $checkMail = false;
            }
        }
        else
        {
            $textMail = 'ce n est pas une adresse mail';
            $checkMail = false;
        }
    }
    else
    {
        $textMail = '';
        $checkMail = false;
    }
//On vérifie que le $_POST['firstname'] existe
    if (isset($_POST['firstname']))
    {
        //si il existe on l'hydrate dans l'objet users
        $updateUser->firstname = strip_tags($_POST['firstname']);
        $_SESSION['firstname'] = $updateUser->firstname;
        if (preg_match($regexName, $updateUser->firstname))
        {
            $textFirstname = '';
            $checkFirstname = true;
            $updateUser->firstname = strtolower($updateUser->firstname);
        }
        else
        {
            $textFirstname = 'Ce n\'est pas prénom, recommencez !';
            $checkFirstname = false;
        }
    }
    else
    {
        $textFirstname = '';
        $checkFirstname = false;
    }
//Vérification de l'existance du pseudo
    if (isset($_POST['username']))
    {
        //si il existe on l'hydrate dans l'objet users
        $updateUser->username = strip_tags($_POST['username']);
        //vérification du format du pseudo.
        if (preg_match($regexUsername, $updateUser->username))
        {
            $checkUsername = true;
            if ($updateUser->existUsername())
            {
                $textUsername = '';
                $checkUsername = true;
            }
            elseif ($updateUser->username == $user->username)
            {
                $textUsername = 'Votre pseudo n\'a pas été modifié';
                $checkUsername = true;
            }
            else
            {
                $textUsername = 'Ce pseudo est deja utilisé';
            }
        }
        else
        {
            $textUsername = 'Ce n\'est pas reconnu comme pseudo, recommencez !';
            $checkUsername = false;
        }
    }
    else
    {
        $textUsername = '';
        $checkUsername = false;
    }
//Vérification de l'existance du nom de famille
    if (isset($_POST['lastname']))
    {
        $updateUser->lastname = strtolower(strip_tags($_POST['lastname']));
        $_SESSION['lastname'] = $updateUser->lastname;
        if (preg_match($regexName, $updateUser->lastname))
        {
            $textName = '';
            $checkName = true;
            $updateUser->lastname = strtolower($updateUser->lastname);
        }
        else
        {
            $textName = 'Ce n\'est pas Nom, recommencez !';
            $checkName = false;
        }
    }
    else
    {
        $textName = '';
        $checkName = false;
    }
// Vérification de la saisie pour le mot de passe
    if (!empty($_POST['passwordUser']) && password_verify($_POST['passwordUser'], $user->password))
    {
        $checkPassword = true;
        $password = $_POST['passwordUser'];
        $oldPassword = $_POST['passwordUser'];
        if (isset($_POST['editPassword']))
        {
            $editPassword = 'checked';
            if (isset($_POST['newPasswordUser']) && isset($_POST['passwordCheck']))
            {
                $checkPassword = false;
                $updateUser->password = $_POST['newPasswordUser'];
                $updateUser->checkPassword = $_POST['passwordCheck'];
                //on vérifie que le mot de passe correspond à la regex définit et qu'il à une longueur compris entre 5 et 20 caractères
                if (preg_match($regexPassword, $updateUser->password) && strlen($updateUser->password) > 5 && strlen($updateUser->password) < 20)
                {
                    if ($_POST['passwordCheck'] != $updateUser->password)
                    {
                        $textNewPassword = 'Les mots de passe saisis ne sont pas identique, recommencez !';
                    }
                    else
                    {
                        $password = $updateUser->password;
                        $checkPassword = true;
                    }
                }
                elseif (!preg_match($regexPassword, $updateUser->password))
                {
                    $textNewPassword = 'Le mot de passe n\'est pas conforme, recommencez !';
                }
            }
            else
            {
                $textNewPassword = 'Veuillez saisir votre nouveau mot de passe';
            }
        }
    }
    else
    {
        $textPassword = 'veuillez saisir votre mot de passe actuel';
        $checkPassword = false;
    }
    if (isset($_POST['country']))
    {
        $updateUser->idCountry = intval(strip_tags($_POST['country']));
        if (preg_match($regexLocalisation, $updateUser->idCountry))
        {
            $textCountry = '';
            $checkCountry = true;
            if ($updateUser->idCountry == 74)
            {
                if (!empty($_POST['region']))
                {
                    $updateUser->idRegion = intval(strip_tags($_POST['region']));
                    if (preg_match($regexLocalisation, $updateUser->idRegion))
                    {
                        $textRegion = '';
                        $checkRegion = true;
                    }
                    else
                    {
                        $textRegion = 'Le nom de la région n\'est pas conforme, recommencez !';
                        $checkRegion = false;
                    }
                }
                else
                {
                    $textRegion = 'Sélectionner une région';
                    $checkRegion = false;
                }
            }
            else
            {
                $textRegion = '';
                $checkRegion = true;
            }
        }
        else
        {
            $textCountry = 'Le pays sélectionner n\'est pas valide';
            $checkCountry = false;
            $textRegion = '';
            $checkRegion = false;
        }
    }
    else
    {
        $textCountry = '';
        $checkCountry = false;
        $textRegion = '';
        $checkRegion = true;
    }
//on vérifie la date de naissance
    if (!empty($_POST['birthdate']))
    {
        //si elle existe, on l'hydrate dans l'objet $users puis on la met dans un format connu pour séparer jour mois et année afin de vérifier si c'est une date qui existe réellement
        $updateUser->birthdateFrench = strip_tags($_POST['birthdate']);
        list($day, $month, $year) = explode('/', $updateUser->birthdateFrench);
        $day = intval($day);
        $month = intval($month);
        $year = intval($year);
        //Concaténation de la date au format SQL dans l'objet users
        $updateUser->birthdate = $year . '-' . $month . '-' . $day;
        $_SESSION['birthdate'] = $updateUser->birthdate;
        if (checkdate($month, $day, $year))
        {
            $textBirthday = '';
            $checkBirthday = true;
        }
        else
        {
            $textBirthday = 'La date de naissance n\'est pas conforme, recommencez ! ' . $day . '/' . $month . '/' . $year;
            $checkBirthday = false;
        }
    }
    else
    {
        $textBirthday = '';
        $checkBirthday = false;
    }
//On vérifie que l'avatar existe
    if (!empty($_FILES['avatar']['name']))
    {
        //on récupère le nom de la photo
        $infoPicture = pathinfo($_FILES['avatar']['name']);
        $updateUser->avatar = $_FILES['avatar']['name'];
        //on formate le nom du fichier récupéré
        strtr($updateUser->avatar, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $updateUser->avatar = preg_replace('/([^.a-z0-9]+)/i', '-', $updateUser->avatar);
        //on vérifie que l'extension du nom de la photo correspond à un format photo
        if ($infoPicture['extension'] == 'jpg' | $infoPicture['extension'] == 'png' | $infoPicture['extension'] == 'jpeg')
        {
            $textPicture = '';
            $checkPicture = true;
        }
        else
        {
            $textPicture = 'l\'image doit être au format jpg, jpeg ou png';
            $checkPicture = false;
        }
    }
    else
    {
        //si il n'existe pas on redonnera l'ancien nom de fichier
        $updateUser->avatar = $user->avatar;
        $textPicture = '';
        $checkPicture = true;
    }
//si tout est bon, alors 
    if ($checkBirthday && $checkUsername && $checkCountry && $checkMail && $checkFirstname && $checkRegion && $checkName && $checkPassword && $checkPicture)
    {
        //Si tout est correctement rempli alors je chiffre le mot de passe de l'utilisateur à l'aide de la fonction password_hash qui génère automatique un salt
        $updateUser->password = $password;
        $updateUser->passwordHash = password_hash($updateUser->password, PASSWORD_DEFAULT);
        if (!$updateUser->updateUsers())
        {
            $insertSuccess = false;
            $texterror = 'Vos modifications n\'ont pas été prises en compte' ;
        }
        else
        {
            $insertSuccess = true;
            $texterror = 'Vos modifications ont été validées';
            $folderAvatar = 'media/' . $updateUser->id . '/profile/';
            //On va uploader l'avatar du nouveau utilisateur dans le fichier profile que nous venons de créer, la fonction renverra TRUE si l'action c'est bien réalisé
            if ($updateUser->avatar != $user->avatar)
            {
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $folderAvatar . $updateUser->avatar))
                {
                    $textPicture = 'Upload effectué avec succès !';
                    $checkPicture = true;
                }
                //Sinon la fonction renvoie FALSE
                else
                {
                    $textPicture = 'Echec de l\'upload !';
                    $checkPicture = false;
                }
            }
        }
    }
}    