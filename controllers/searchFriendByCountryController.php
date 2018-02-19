<?php

//On instancie la class users
$FriendUsers = new users();
//On instancie la class relationship
$relationship = new relationship();
//On instancie la class country
$country = new country();
//On appel la méthode getListCountry
$countryList = $country->getListCountry();
//On instancie la class region
$region = new region();
//On appel la méthode getListRegion
$regionList = $region->getListRegion();
$textCountry = '';
$textRegion = '';
//On vérifie qu'une recherche à bien été effectuée
if (isset($_POST['searchFriend']))
{
    //On récupère la valeur du POST username
    $FriendUsers->username = htmlspecialchars($_POST['username']);
    /*
     * On vérifie que le $ POST country est bien un on nombre pour ensuite le stocker dans l'attribut country de la class users
     * On vérifira ensuite que le champs selectionné correspond à la france (valeur 74)
     * Si c'est le cas on Vérifira si une région à été sélectionné
     * Et par la suite on appelera la méthode getListFriendByCountry de la class users
     */
    if (intval($_POST['country']) != 0)
    {
        $FriendUsers->country = intval($_POST['country']);
        if ($FriendUsers->country == 74)
        {
            if (intval($_POST['region']) != 0)
            {
                $FriendUsers->region = intval($_POST['region']);
            }
            else
            {
                $textRegion = 'Vous pouvez préciser votre recherche en sélectionnant une région';
                $FriendUsers->region = 100;
            }
        }
        else
        {
            $FriendUsers->region = NULL;
        }
        $userList = $FriendUsers->getListFriendByCountry();
    }
    else
    {
        $textCountry = 'Sélectionner un pays';
    }
}
/*
 * Si l'utilisateur est connecté on appelera la méthode listFriendAskSend de la class users afin de récupérer les personnes que celui ci a demandé en ami 
 * On appel également la méthode listFriend de la class users pour récupérer la liste d'amis de l'utilisateur
 * On appel aussi la méthode listBlockFriend de la class users pour récuprer la liste des personnes qui on été bloqué l'utilisateur
 * On appel aussi la méthode .... de la class users pour récuprer la liste des personnes qui on bloqué l'utilisateur
 */
if (!empty($_SESSION['id']))
{
    $relationship->idTransmitter = $_SESSION['id'];
    $listFriendAskSend = $relationship->listFriendAskSend();
    $listFriend = $relationship->listFriend();
    $listBlockFriend = $relationship->listBlockFriend();
    $listFriendBlock = $relationship->listFriendBlock();
}
/*
 * Si l'utilisateur clique à cliquer sur le bouton Ajouter
 * On récupère l'id de cet personne et on appel ensuite la méthode addFriend de la class relationship
 */
if (isset($_POST['addFriend']))
{
    if (!empty($_POST['friend']))
    {
        $relationship->idReceiver = $_POST['friend'];
        $relationship->addFriend();
    }
}
if (isset($_POST['releaseFriend']))
{
    if (!empty($_POST['friend']))
    {
        $relationship->idReceiver = $_POST['friend'];
        $relationship->releaseFriend();
    }
}

