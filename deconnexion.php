<?php
include 'controllers/headerController.php';
include 'header.php';
if (isset($_SESSION['username']))
{
    session_destroy();
    echo 'test';
}
header('Location:index.php');

