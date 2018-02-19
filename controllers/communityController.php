<?php

$FriendUsers = new users();
if (isset($_SESSION['id']))
{
    $FriendUsers->id = $_SESSION['id'];
    $relationship = new relationship();
    $relationship->idTransmitter = $_SESSION['id'];
    //lorsque l'utilisateur à décider d'accepter une demande d'ajout, on exécute la méthode acceptFriend en passant la relation à 1
    if (isset($_POST['accept']))
    {
        if (intval($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            $relationship->acceptRelation = 1;
            $relationship->acceptFriend();
        }
    }
    //lorsque l'utilisateur à décider de bloquer une demande d'ajout, on exécute la méthode blockFriend en passant la relation à 1
    if (isset($_POST['block']))
    {
        if (intval($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            $relationship->acceptRelation = 1;
            $relationship->blockFriend();
        }
    }
    //lorsque l'utilisateur à décider de refuser une demande d'ajout, on exécute la méthode denyFriend
    if (isset($_POST['deny']))
    {
        if (intval($_POST['idNewFriend']))
        {
            $relationship->idReceiver = $_POST['idNewFriend'];
            $relationship->denyFriend();
        }
    }
    $waitFriendList = $FriendUsers->waitingAdd();
    $friendList = $FriendUsers->getListMyFriend();
}
else
{
    $FriendUsers->id = 0;
}




