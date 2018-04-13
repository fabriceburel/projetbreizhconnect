<?php
$friendusers = new users();
if (!empty($_GET['idFriend']))
{
    $friendusers->id = $_GET['idFriend'];
    $frienduser = $friendusers->getProfileUserById();
    if ($frienduser->avatar == '')
    {
        $pathPicture = 'media/profile/default/imagepardefaut.jpeg';
    }
    else
    {
        $pathPicture = 'media/' . $frienduser->id . '/profile/' . $frienduser->avatar;
    }
}else{
header('Location:index.php');
}