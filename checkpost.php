<?php

setlocale(LC_TIME, 'fr_FR.UTF8');
/* On vérifie ici que l'ensemble des input recois bien la forme qui est attendu
 * 
 * On vérifie en premier que le mail est bien sous forme de mail 
 */

if (isset($_POST['mail']) && filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
{
    $textMail = '';
    $checkMail = true;
}
else
{
    $textMail = 'ce n est pas une adresse mail';
    $checkMail = false;
}
//Vérification du format du prénom saisi
if (isset($_POST['firstname']) && preg_match('/((^[éèàëêa-z\']{2,10}[-][éèàëêa-z\']{2,10}$)|(^[éèàëêa-z\']{2,15}$))/i', $_POST['firstname']))
{
    $textFirstname = '';
    $checkFirstname = true;
}
else
{
    $textFirstname = 'Ce n\'est pas prénom, recommencez !';
    $checkFirstname = false;
}
//Vérification du format du pseudo saisi
if (isset($_POST['username']) && preg_match('/^[éèàëêa-z0-9]{2,20}$/i', $_POST['username']))
{
    $textUsername = '';
    $checkUsername = true;
}
else
{
    $textUsername = 'Ce n\'est pas prénom, recommencez !';
    $checkUsername = false;
}
if (isset($_POST['name']) && preg_match('/((^[éèàëêa-z\']{2,10}[-][éèàëêa-z\']{2,10}$)|(^[éèàëêa-z\']{2,15}$))/i', $_POST['name']))
{
    $textName = '';
    $checkName = true;
}
else
{
    $textName = 'Ce n\'est pas Nom, recommencez !';
    $checkName = false;
}
/* Vérification de la saisie pour hack
 * Meme critère que pour superHero 
 */
if (isset($_POST['passwordUser']) && isset($_POST['passwordCheck']) && $_POST['passwordCheck'] == $_POST['passwordUser'] && preg_match('/^(?!(<|>))(([\w\d]+\W+)+|(\W+[\w\d]+)+|([\w\d]+\W+[\w\d]+)+)$/', $_POST['passwordUser']) && strlen($_POST['passwordUser']) >5 && strlen($_POST['passwordUser'] < 14 ))
{
    $textPassword = '';
    $checkPassword = true;
}
elseif (isset($_POST['passwordUser']) && isset($_POST['passwordCheck']) && !preg_match('/^(?!(<|>))(([\w\d]+\W+)+|(\W+[\w\d]+)+|([\w\d]+\W+[\w\d]+)+)$/', $_POST['passwordUser']))
{
    $textPassword = 'Le  mot de passe n\'est pas conforme, recommencez !';
    $checkPassword = false;
}
elseif (isset($_POST['passwordUser']) && isset($_POST['passwordCheck']) && $_POST['passwordCheck'] != $_POST['passwordUser'])
{
    $textPassword = 'Les mots de passe saisis ne sont pas identique, recommencez !';
    $checkPassword = false;
}

if (isset($_POST['country']) && preg_match('/^(([a-zéàèëêöôâ\']{1,20})|(([a-zéàèëêöôâ\']{1,20}[\s-][\wéàèëêöôâ\']{1,25}){1,7}))$/i', $_POST['country']))
{
    $textCountry = '';
    $checkCountry = true;
    
    if ($_POST['country'] == 'France')
    {
        if (!empty($_POST['region']) && preg_match('/^(([a-zéàèëêöôâ\']{1,20})|(([a-zéàèëêöôâ\']{1,20}[\s-][\wéàèëêöôâ\']{1,25}){1,7}))$/i', $_POST['region']))
        {
            $textRegion = '';
            $checkRegion = true;
        }
        else
        {
            $textRegion = 'Le nom de région n\'est pas conforme, recommencez !';
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
    $textCountry = 'Le  nom de ville n\'est pas conforme, recommencez !';
    $checkCountry = false;
    $textRegion = '';
    $checkRegion = true;
}

if (isset($_POST['birthdate']))
{
    $birthdate = date('d-m-Y', strtotime($_POST['birthdate']));
    list($month, $day, $year) = explode('-', $birthdate);
    if (checkdate($day, $month, $year))
    {
        $textBirthday = '';
        $checkBirthday = true;
    }
    else
    {
        $textBirthday = 'La date n\'est pas conforme, recommencez !' . $day . '/' . $month . '/' . $year;
        $checkBirthday = false;
    }
}
else
{
    $textBirthday = '';
    $checkBirthday = false;
}
if(isset($_FILES['avatar'])){
    //on récupère le nom de la photo
    $infoPicture=$_FILES['avatar']['name'];
    //on vérifie que l'extension du nom de la photo correspond à un format photo
    if($infoPicture['extension'] == 'jpg'  | $infoPicture['extension'] == 'png' | $infoPicture['extension'] == 'jpeg'){
         $textPicture = '';
         $checkPicture = true;
    }else{
         $textPicture = 'l\'image doit être au format jpg, jpeg ou png';
         $checkPicture = false;
    }
}else{
         $textPicture = '';
         $checkPicture = true;
}
?>

