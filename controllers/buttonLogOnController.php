<?php
//include 'controllers/headerController.php';
$users = new users();
$users->id = $_SESSION['id'];
if (isset($_POST['logOut']))
{
    session_destroy();
    $users->log = 0;
    if ($users->updateLog())
    {
        $checklogin = true;
        header('Location:index.php');
        echo 'deconnexion effectué';
    }
    else
    {
        $textError = 'Erreur serveur lors de la connexion, veuillez contacter l\'administrateur du site';
    }
    header('Location:index.php');
}


