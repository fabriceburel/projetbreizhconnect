<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/relationship.php';
include_once 'models/country.php';
include_once 'models/region.php';
include_once 'models/log.php';
include 'controllers/headerController.php';
include 'controllers/communityController.php';
include 'header.php';
?>
<div class="container">
    <?php
    //On liste les demandes d'ajout dans notre communauté qui sont en attentes d'une réponse de notre part
    if (!empty($waitFriendList))
    {
        ?>
        <div class="row">
            <h3 id="waitAddFriend" class="col offset-s1">Vos demandes d'amis en attente</h3>
        </div>
        <?php
        foreach ($waitFriendList AS $waitFriend)
        {
            ?>
            <div class="row">
                <form method="POST" action="#">
                    <p class="col s4 m4 offset-l5 l2"><?= $waitFriend->username ?></p>
                    <div class="row col s8 m5 l12">
                        <input type="hidden" hidden value="<?= $waitFriend->id ?>" name="idNewFriend">
                        <input type="submit" name="accept" value="Accepter" class="btn col s12 l3 green darken-4 waves-effect">
                        <input type="submit" name="deny" value="Refuser" class="btn col s12 offset-l1 l3 orange darken-4 waves-effect">
                        <input type="submit" name="block" value="Bloquer" class="btn col s12 offset-l1 l3 red accent-4 waves-effect">
                    </div>
                </form>
            </div>
            <?php
        }
    }
    else
    {
        ?>
        <p>Pas de demande d'ajout en attente</p>
    <?php } ?>
</div>
<?php
if (!empty($friendList))
{
    ?>
    <div class="row">
        <?php
        $country = '';
        $region = '';
        //on affiche la liste de personne appartenant à notre communauté
        foreach ($friendList AS $FriendUser)
        {
            if ($country != $FriendUser->country | $region != $FriendUser->region)
            {
                $country = $FriendUser->country;
                $region = $FriendUser->region;
                ?>
                <div class="grey row col offset-l3 l5 offset-m1 m10 s12 localisation z-depth-2"><h3>Pays : <?= $country ?></h3>
                    <?php
                    if ($region != '')
                    {
                        ?>
                        <h3>Region: <?= $region ?></h3> 
                    <?php } ?>
                </div>
                <?php
            }
            ?>
            <div class="white row col offset-l3 l5 offset-m1 m10 s12 profileUser z-depth-3">
                <div class="col m3 l2 s5">
                    <img class="avatarUser" src="<?= $FriendUser->avatar == '' ? 'media/profile/default/imagepardefaut.jpeg' : 'media/' . $FriendUser->id . '/profile/' . $FriendUser->avatar; ?>" width="100" height="120" alt="<?= $FriendUser->username ?>"/>
                    <p class="white-text status <?= $FriendUser->log == 0 ? 'grey' : 'green' ?>"><?= $FriendUser->log == 0 ? 'Déconnecté' : 'Connecté' ?></p>
                </div>
                <div class="row col offset-l3 l3 offset-m2 m6 username">
                    <h4><?= $FriendUser->username ?></h4>
                </div>
                <div class="row col offset-l1 l9 m9 s7 buttonUser">
                    <a class="btn black col l4 m6 s12" href="profilFriend.php?idFriend=<?= $FriendUser->id ?>">PROFIL</a>
                    <form method="POST" action="#" class="">
                        <button type="submit" name="delete" value="<?= $FriendUser->id ?>" class="btn red accent-4 col l4 m6 s12">Supprimer</button>
                    </form>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}
else
{
    ?>
    <p>Vous n'avez pas encore ajouter ou accepter des amis</p>
    <p>Allez sur l'onglet rechercher un breton ou <a href="searchFriendByCountry.php">cliquez-ici</a>
        <?php
    }
    include 'footer.php';
    ?>

