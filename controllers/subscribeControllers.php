<?php

$users = new users();
$country = new country();
$countryList = $country->getListCountry();
$region = new region();
$regionList = $region->getListRegion();
//regex pour le prénom, accepte les prénom simple d'une taille minimum de 2 caractères sans importances sur la cast et les prénoms composé de 2 caractère par partie 
$regexName = '/((^[éèàëîïêa-z\']{2,10}[-][éèàîïëêa-z\']{2,10}$)|(^[éèàîïëêa-z\']{2,15}$))/i';
$regexUsername = '/^[éèàëêîïa-z0-9]{2,20}$/i';
$regexPassword = '/^(?!(<|>))(([\w\d]+\W+)+|(\W+[\w\d]+)+|([\w\d]+\W+[\w\d]+)+)$/';
$regexLocalisation = '/^[0-9]{1,3}$/';
if (!empty($_POST['mail']))
{
    $users->mail = strip_tags($_POST['mail']);
    if (filter_var($users->mail, FILTER_VALIDATE_EMAIL))
    {
        if ($users->existMail())
        {
            $textMail = '';
            $checkMail = true;
        }
        else
        {
            $textMail = 'Cette adresse mail existe déja!';
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
    $users->firstname = strip_tags($_POST['firstname']);
    $_SESSION['firstname'] = $users->firstname;
    if (preg_match($regexName, $users->firstname))
    {
        $textFirstname = '';
        $checkFirstname = true;
        $users->firstname = strtolower($users->firstname);
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
    $users->username = strip_tags($_POST['username']);
    //vérification du format du pseudo.
    if (preg_match($regexUsername, $users->username))
    {
        if ($users->existUsername())
        {
            $textUsername = '';
            $checkUsername = true;
        }
        else
        {
            $textUsername = 'Ce pseudo est déja utilisé. Veuillez le modifier!';
            $checkUsername = false;
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
//Vérification de l'existance du prénom
if (isset($_POST['lastname']))
{
    $users->lastname = strtolower(strip_tags($_POST['lastname']));
    $_SESSION['lastname'] = $users->lastname;
    if (preg_match($regexName, $users->lastname))
    {
        $textName = '';
        $checkName = true;
        $users->lastname = strtolower($users->lastname);
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
if (isset($_POST['passwordUser']) && isset($_POST['passwordCheck']))
{
    $users->password = $_POST['passwordUser'];
    $password = $users->password;
    $users->checkPassword = $_POST['passwordCheck'];
    if (preg_match($regexPassword, $users->password) && strlen($users->password) > 5 && strlen($users->password < 20))
    {
        $textPassword = '';
        $checkPassword = true;
    }
    elseif (!preg_match($regexPassword, $users->password))
    {
        $textPassword = 'Le  mot de passe n\'est pas conforme, recommencez !';
        $checkPassword = false;
    }
    elseif ($_POST['passwordCheck'] != $users->password)
    {
        $textPassword = 'Les mots de passe saisis ne sont pas identique, recommencez !';
        $checkPassword = false;
    }
}
else
{
    $textPassword = '';
    $checkPassword = false;
}
if (isset($_POST['country']))
{
    $users->country = intval(strip_tags($_POST['country']));
    if (preg_match($regexLocalisation, $users->country))
    {
        $textCountry = '';
        $checkCountry = true;
        if ($users->country == 74)
        {
            if (!empty($_POST['region']))
            {
                $users->region = intval(strip_tags($_POST['region']));
                if (preg_match($regexLocalisation, $users->region))
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
if (isset($_POST['birthdate']))
{
    //si elle existe, on l'hydrate dans l'objet $users puis on la met dans un format connu pour séparer jour mois et année afin de vérifier si c'est une date qui existe réellement
    $users->birthdateFrench = strip_tags($_POST['birthdate']);
    list($day, $month, $year) = explode('/', $users->birthdateFrench);
    $day = intval($day);
    $month = intval($month);
    $year = intval($year);
    //Concaténation de la date au format SQL dans l'objet users
    $users->birthdate = $year . '-' . $month . '-' . $day;
    $_SESSION['birthdate'] = $users->birthdate;
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
    $users->avatar = $_FILES['avatar']['name'];
    //on formate le nom du fichier récupéré
    strtr($users->avatar, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $users->avatar = preg_replace('/([^.a-z0-9]+)/i', '-', $users->avatar);
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
    //si il n'existe pas on attribuera une image par défaut à l'avatar
    $textPicture = '';
    $checkPicture = true;
}
//si tout est bon, alors 
if ($checkBirthday && $checkUsername && $checkCountry && $checkMail && $checkFirstname && $checkRegion && $checkName && $checkPassword && $checkPicture)
{
    //Si tout est correctement rempli alors je chiffre le mot de passe de l'utilisateur à l'aide de la fonction password_hash qui génère automatique un salt
    $users->passwordHash = password_hash($users->password, PASSWORD_DEFAULT);
    if (!$users->addUsers())
    {
        $insertSuccess = false;
        $texterror = 'L\'inscription n a pas fonctionné';
    }
    else
    {
        $insertSuccess = true;
        $texterror = 'l\'envoi a bien fonctionné';
        //une fois l'insertion réussi on va créer les dossier de stockage des fichiers de ce nouveau utilisateur
        $userId = $users->getUserIdbyUsername();
        if ($userId != 0)
        {
            $_SESSION['id'] = $userId;
            $folderAvatar = 'media/' . $userId . '/profile/';
            $folderFiles = 'media/' . $userId . '/files/';
            //Ici on crée le dossier comprenant le numéro de l'ID du nouvel utilisateur et le dossier de profile de manière récursive
            if (mkdir($folderAvatar, 0777, true))
            {
                //Ici on crée uniquement le dossier de files
                if (!mkdir($folderFiles, 0777, false))
                {
                    die('Votre inscription est validé mais un echec lors de la création de vos dossier de stockage a eu lieu, merci de contacter l\'administrateur du site pour résoudre se problème');
                }
                //On va uploader l'avatar du nouveau utilisateur dans le fichier profile que nous venons de créer, la fonction renverra TRUE si l'action c'est bien réalisé
                if ($users->avatar != '')
                {
                    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $folderAvatar . $users->avatar))
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
            else
            {
                die('Votre inscription est validé mais un echec lors de la création de vos dossier de stockage a eu lieu, merci de contacter l\'administrateur du site pour résoudre se problème');
            }
        }
    }
}