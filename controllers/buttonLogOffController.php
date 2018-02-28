<?php
$users = new users();
$textError = '';
$checklogin = false;
//vérification de la connexion
if (isset($_POST['username']) && isset($_POST['password']))
{
    $users->username = trim($_POST['username']);
    $user = $users->getLoginByUsername();
    //si il existe on l'hydrate dans l'objet users  
    if (is_object($user))
    {
        $checkPass = password_verify($_POST['password'], $user->password);
        if ($users->username != NULL && password_verify($_POST['password'], $user->password))
        {
            $_SESSION['username'] = $users->username;
            $_SESSION['id'] = $user->id;
            $users->id = $user->id;
            $users->log = 1;
            if ($users->updateLog())
            {
                $checklogin = true;
                header('Location:index.php');
            }else{
                $textError = 'Erreur serveur lors de la connexion, veuillez contacter l\'administrateur du site';
            }
        }
        else
        {
            $textError = 'Les identifiants, pseudo ou mot de passe, ne sont pas correctes';
        }
    }
    else
    {
        $textError = 'Les identifiants, pseudo ou mot de passe, ne sont pas correctes';
    }
}
