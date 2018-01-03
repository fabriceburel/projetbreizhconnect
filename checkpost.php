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
if (isset($_POST['firstname']) && preg_match('/((^[éèàëêa-z\']{2,10}[-][éèàëêa-z\']{2,10}$)|(^[éèàëêa-z\']{2,10}$))/i', $_POST['firstname']))
{
    $textFirstname = '';
    $checkFirstname = true;
}
else
{
    $textFirstname = 'Ce n\'est pas prénom, recommencez !';
    $checkFirstname = false;
}
if (isset($_POST['name']) && preg_match('/((^[éèàëêa-z\']{2,10}[-][éèàëêa-z\']{2,10}$)|(^[éèàëêa-z\']{2,10}$))/i', $_POST['name']))
{
    $textName = '';
    $checkName = true;
}
else
{
    $textName = 'Ce n\'est pas Nom, recommencez !';
    $checkName = false;
}
if (isset($_POST['poleEmploi']) && preg_match('/[A-Z0-9]{8}$/', $_POST['poleEmploi']))
{
    $textPoleEmploi = '';
    $checkPoleEmploi = true;
}
else
{
    $textPoleEmploi = 'Ce n\'est pas un numéro Pole emploi, recommencez !';
    $checkPoleEmploi = false;
}
/* vérification de la saisie correct d'un texte pour superhero \r pour autoriser les retours chariots
 * \w pour autorisé tout les caractère alphanumérique, \s pour autoriser les espaces
 * On autorise également les accents les points et les virgules
 * et entre 30 et 200 caractères
 * avec /i on ne se préocuppe pas de la cast.
 */
if (isset($_POST['superHero']) && preg_match('/^[\wéàèëêöùôâ\']{1,15}([\s-\r]{0,3}[\wéàèëêöôùâ.,\']{1,25}){1,100}$/i', $_POST['superHero']))
{
    $textSuperHero = '';
    $checkSuperHero = true;
}
else
{
    $textSuperHero = 'Le  texte n\'est pas conforme, recommencez !';
    $checkSuperHero = false;
}
/* Vérification de hack
 * Meme critère que superHero
 */
if (isset($_POST['hack']) && preg_match('/^[\wéàèëêöùôâ\']{1,15}([\s-\r]{0,3}[\wéàèëêöôùâ.,\']{1,25}){1,100}$/i', $_POST['hack']))
{
    $textHack = '';
    $checkHack = true;
}
else
{
    $textHack = 'Le  texte n\'est pas conforme, recommencez !';
    $checkHack = false;
}
/* Vérification de la saisie pour hack
 * Meme critère que pour superHero 
 */
if (isset($_POST['experience']) && preg_match('/^[\wéàèëêöùôâ\']{1,15}([\s-\r]{0,3}[\wéàèëêöôùâ.,\']{1,25}){1,100}$/i', $_POST['experience']))
{
    $textExperience = '';
    $checkExperience = true;
}
else
{
    $textExperience = 'Le  texte experience n\'est pas conforme, recommencez !';
    $checkExperience = false;
}
if (isset($_POST['degree']) && preg_match('/^(SANS)$|^(BAC)$|^(BAC\+2)$|^(BAC\+3)$|^(Supérieur)$/', $_POST['degree']))
{
    $textDegree = '';
    $checkDegree = true;
}
else
{
    $textDegree = 'Le  texte diplome n\'est pas conforme, recommencez !';
    $checkDegree = false;
}
if (isset($_POST['street']) && preg_match('/^[0-9]{0,4}([\s-]{0,1}([\wéàèëêöôâ\']){1,10}){1,5}$/i', $_POST['street']))
{
    $textStreet = '';
    $checkStreet = true;
}
else
{
    $textStreet = 'Le nom de rue n\'est pas conforme, recommencez !';
    $checkStreet = false;
}
if (isset($_POST['postalCode']) && preg_match('/^[\d]{5}$/', $_POST['postalCode']))
{
    $textPostalCode = '';
    $checkPostalCode = true;
}
else
{
    $textPostalCode = 'Le  texte code n\'est pas conforme, recommencez !';
    $checkPostalCode = false;
}
if (isset($_POST['town']) && preg_match('/^(([a-zéàèëêöôâ\']{1,20})|(([a-zéàèëêöôâ\']{1,20}[\s-][\wéàèëêöôâ\']{1,25}){1,7}))$/i', $_POST['town']))
{
    $textTown = '';
    $checkTown = true;
}
else
{
    $textTown = 'Le  nom de ville n\'est pas conforme, recommencez !';
    $checkTown = false;
}
if (isset($_POST['badge']) && preg_match('/^[\d]{1,4}$/', $_POST['badge']) && $_POST['badge'] >= 0)
{
    $textBadge = '';
    $checkBadge = true;
}
else
{
    $textBadge = 'Le nombre de bagde n\'est pas conforme, recommencez !';
    $checkBadge = false;
}
if (isset($_POST['birthday']))
{
    $birthday = date('d-m-Y', strtotime($_POST['birthday']));
    list($month, $day, $year) = explode('-', $birthday);
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
?>

