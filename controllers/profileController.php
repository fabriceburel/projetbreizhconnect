<?php
$users = new users();
if(!empty($_SESSION['id'])){
    $users->id = $_SESSION['id'];
    $user = $users->getProfileUserById();
}else{
    header('Location:index.php');
}


