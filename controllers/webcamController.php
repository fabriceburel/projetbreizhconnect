<?php
session_start();
$newMessage = new message();
if (!empty($_SESSION['id']) && !empty($_SESSION['friend']))
{
    $newMessage->idTransmitter = intval($_SESSION['id']);
    $newMessage->idReveiver = intval($_SESSION['friend']);    
}
else
{
    echo 'Connection Impossible!';
}
