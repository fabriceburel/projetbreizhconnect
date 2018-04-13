<?php
//include 'controllers/headerController.php';
$users = new users();
$users->id = intval($_SESSION['id']);
$log = new log();
$log->idUser = $users->id;
$log->lastAction = date('Y-m-d H:i:s');
$log->updateAction();
if (isset($_POST['logOut']))
{
    session_destroy();
    $log->connect = 0;
    if ($log->updateLog())
    {
        $checklogin = true;
        header('Location:index.php');
        echo 'deconnexion effectué';
    }
    else
    {
        $textError = 'Erreur serveur lors de la déconnexion, veuillez contacter l\'administrateur du site';
    }
    header('Location:index.php');
}


