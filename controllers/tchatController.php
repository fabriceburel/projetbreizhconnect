<?php
$currentPage='tchat';
//on instancie la class message
//$newMessage = new message();
//On instancie la class relationship
//on vérifie qu'on passe par ajax
$today = date('d/m/Y');
$ajax = false;
if (isset($_POST['ajaxSendMessage']))
{
    $ajax = true;
    include_once '../models/dataBase.php';
    include_once '../models/relationship.php';
    include_once '../models/message.php';
    include_once '../controllers/headerController.php';
    $newMessage = new message();
    //on vérifie que le champs texte n'est pas vide et que la valeur de friendRelation est bien un chiffre
    if (!empty($_POST['idReceiver']) && intval($_POST['idReceiver']) && !empty($_POST['idTransmitter']) && intval($_POST['idTransmitter']) && !empty($_POST['newMessage']))
    {
        $newMessage->content = htmlspecialchars($_POST['newMessage']);
        $newMessage->idReceiver = intval($_POST['idReceiver']);
        $newMessage->idTransmitter = intval($_POST['idTransmitter']);
        //On récupère les messages dans un format json
        echo json_encode($newMessage->newMessage());
    }else{
        echo 'erreur';
    }
}
else if (isset($_POST['ajaxActualise']))
{
    $ajax = true;
    include_once '../models/dataBase.php';
    include_once '../models/relationship.php';
    include_once '../models/message.php';
    include_once '../controllers/headerController.php';
    $newMessage = new message();
    if (!empty($_POST['idReceiver']) && intval($_POST['idReceiver']) && !empty($_POST['idTransmitter']) && intval($_POST['idTransmitter']))
    {
        $newMessage->idReceiver = intval($_POST['idReceiver']);
        $newMessage->idTransmitter = intval($_POST['idTransmitter']);
        //On récupère les messages dans un format json
        echo json_encode($newMessage->readMessage());
    }else{
        echo false;
    }
}
else
{
    $FriendUsers = new users();
    $newMessage = new message();
    if (!empty($_SESSION['id']) && intval($_SESSION['id']))
    {
        $FriendUsers->id = intval($_SESSION['id']);
        $newMessage->idTransmitter = intval($_SESSION['id']);
        if (!empty($_GET['friend']) && intval($_GET['friend']))
        {
            $newMessage->idReceiver = intval($_GET['friend']);
        }
        else
        {
            $ajax = true;
            $newMessage->idReceiver = 0;
        }
        $friendList = $FriendUsers->getListMyFriend();
        $readMessages = $newMessage->readMessage();
    }
    else
    {
        header('Location: index.php');
    }
}




