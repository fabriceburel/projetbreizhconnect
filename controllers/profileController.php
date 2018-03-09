<?php
$currentPage='profile';
if(empty($_SESSION['id'])){
    header('Location:index.php');
}

