<?php

/*
 * Permet la suppression du profil utilisateur
 * Avant la suppression je m'assure de l'id de l'utilisateur pour éviter les tentatives malveillantes
 */
if (isset($_POST['profilId']))
{
    include_once '../models/dataBase.php';
    include_once '../models/user.php';
    include_once '../controllers/headerController.php';
    $users = new users();
    if (!empty($_SESSION['id']) && $_SESSION['id'] == $_POST['profilId'])
    {
        $users->id = $_SESSION['id'];
        if ($users->deleteUser())
        {
            $returnAjax = 'success';
            $folderUser = '../media/' . $users->id;
            exec(sprintf("rm -r %s", escapeshellarg($folderUser)));
            session_destroy();
        }
        else
        {
            $returnAjax = 'fail';
        }
    }
    else
    {
        $textError = 'connectez-vous à votre compte!';
        $returnAjax = 'disconnect';
    }
    echo $returnAjax;
}
else
{
    $users = new users();
    if (!empty($_SESSION['id']))
    {
        $users->id = $_SESSION['id'];
        $user = $users->getProfileUserById();
        if ($user->avatar == '')
        {
            $pathPicture = 'media/profile/default/imagepardefaut.jpeg';
        }
        else
        {
            $pathPicture = 'media/' . $user->id . '/profile/' . $user->avatar;
        }
    }
}


