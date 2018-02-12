<?php
$users = new users();
if(!empty($_GET['idFriend'])){
    $users->id = $_GET['idFriend'];
    $user = $users->getProfileUserById();
}else{
    header('Location:index.php');
}