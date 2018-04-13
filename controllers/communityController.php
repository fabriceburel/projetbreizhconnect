<?php

$currentPage = 'community';
$FriendUsers = new users();
if (isset($_SESSION['id']))
{
    $FriendUsers->id = intval($_SESSION['id']);
    $relationship = new relationship();
    $relationship->idTransmitter = intval($_SESSION['id']);
    //lorsque l'utilisateur à décider d'accepter une demande d'ajout, on exécute la méthode acceptFriend en passant la relation à 1
    if (isset($_POST['accept']))
    {
        if (!is_nan($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            $relationship->acceptRelation = 1;
            if ($relationship->acceptFriend())
            {
                $textInformation = 'ajout dans la communauté effectué';
            }
            else
            {
                $textInformation = 'Une erreur c\'est produit, rechargé la page';
            }
        }
    }
    //lorsque l'utilisateur à décider de bloquer une demande d'ajout, on exécute la méthode blockFriend en passant la relation à 1
    if (isset($_POST['block']))
    {
        if (!is_nan($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            $relationship->acceptRelation = 1;
            if ($relationship->blockFriend())
            {
                $textInformation = 'Cet utilisateur ne vous dérangera plus pour le débloquer retrouvez le dans la section recherche';
            }
            else
            {
                $textInformation = 'Une erreur c\'est produit, rechargé la page';
            }
        }
    }
    //lorsque l'utilisateur à décider de refuser une demande d'ajout, on exécute la méthode denyFriend
    if (isset($_POST['deny']))
    {
        if (!is_nan($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            if ($relationship->denyFriend())
            {
                $textInformation = 'Vous avez refusé l\'accès à votre communauté pour cet utilisateur';
            }
            else
            {
                $textInformation = 'Une erreur c\'est produit, rechargé la page';
            }
        }
    }
    //lorsque l'utilisateur à décider de supprimer un utilisateur de la liste de sa communauté, on exécute la méthode deleteFriend
    if (isset($_POST['delete']))
    {
        if (!is_nan($_POST['delete']))
        {
            $relationship->idReceiver = $_POST['delete'];
            if ($relationship->deleteFriend())
            {
                $textInformation = 'Suppression de l\'utilisateur de votre communauté';
            }
            else
            {
                $textInformation = 'Une erreur c\'est produit, rechargé la page';
            }
        }
    }
    $waitFriendList = $FriendUsers->waitingAdd();
    $friendList = $FriendUsers->getListMyFriend();
}
else
{
    header('Location:index.php');
}




