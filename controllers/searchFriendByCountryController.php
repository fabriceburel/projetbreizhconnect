<?php

$users = new users();
$country = new country();
$countryList = $country->getListCountry();
$region = new region();
$regionList = $region->getListRegion();
$textCountry = '';
$textRegion = '';
$users->country = NULL;
if (isset($_POST['searchFriend']))
{
    $users->username = htmlspecialchars($_POST['username']);
    if (intval($_POST['country']) != 0)
    {
        $users->country = intval($_POST['country']);
        if ($users->country == 74)
        {
            if (is_int($_POST['region']))
            {
                $users->country = $_POST['region'];
                $userList = $users->getListFriendByCountry();
            }
            else
            {
                $textRegion = 'Sélectionner une région';
            }
        }
        else
        {
            $userList = $users->getListFriendByCountry();
        }
    }
    else
    {
        $textCountry = 'Sélectionner un pays';
    }
}

