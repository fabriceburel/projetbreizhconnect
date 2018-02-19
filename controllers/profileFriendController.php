<?php
$friendusers = new users();
if(!empty($_GET['idFriend'])){
    $friendusers->id = $_GET['idFriend'];
    $frienduser = $friendusers->getProfileUserById();
}else{
    header('Location:index.php');
}