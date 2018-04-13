<?php

$friends = new users();
$currentPage = 'fileExchange';
$textFriend = '';
$textFile = '';
$checkFile = false;
$checkFriend = false;
if (!empty($_SESSION['id']))
{
    $friends->id = intval($_SESSION['id']);
    $newFiles = new files();
    $listFiles = new files();
    $newFiles->idTransmitter = $friends->id;
    $listFiles->idReceiver =  $newFiles->idTransmitter;
    $friendList = $friends->getListMyFriend();
    $files = $listFiles->getListFiles();
    if (isset($_POST['submit']))
    {
        if (!empty($_POST['friend']) && intval($_POST['friend']))
        {
            $newFiles->idReceiver = intval($_POST['friend']);
            $checkFriend = true;
        }
        else
        {
            $textFriend = 'Sélectionnez une personne';
        }
        if (!empty($_FILES['file']['name']))
        {
            $infoFile = pathinfo($_FILES['file']['name']);
            $newFiles->filesName = $_FILES['file']['name'];
            //on formate le nom du fichier récupéré
            strtr($newFiles->filesName, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $newFiles->filesName = preg_replace('/([^.a-z0-9]+)/i', '-', $newFiles->filesName);
            //On vérifie le format du fichier
            if ($infoFile['extension'] == 'jpg' | $infoFile['extension'] == 'png' | $infoFile['extension'] == 'jpeg' | $infoFile['extension'] == 'pdf')
            {
                if ($_FILES['file']['size'] > 20971520)
                {
                    $textFile = 'Taille du fichier trop importante!';
                }
                else
                {
                    $checkFile = true;
                }
            }
            else
            {
                $textFile = 'Format de fichier non accepté';
            }
        }
        else
        {
            $textFile = 'Sélectionnez un fichier';
        }
    }
    if ($checkFile && $checkFriend)
    {
        $folderFiles = 'media/' . $newFiles->idTransmitter . '/files/';
        if (move_uploaded_file($_FILES['file']['tmp_name'], $folderFiles . $newFiles->filesName))
        {
            if ($newFiles->newFiles())
            {
                $textFileTransmission = 'Upload effectué avec succès !';
            }
            else
            {
                $textFileTransmission = 'Echec lors de l\'enregistrement dans la base de donnée!';
            }
        }
        else
        {
            $textFileTransmission = 'Echec lors de l\'enregistrement de votre fichier!';
        }
    }
}else{
    header('Location:index.php');
}

