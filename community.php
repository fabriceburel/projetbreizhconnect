<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/relationship.php';
include_once 'models/country.php';
include_once 'models/region.php';
include 'controllers/headerController.php';
include 'controllers/communityController.php';
if ($FriendUsers->id != 0)
{
    include 'header.php';
    ?>
    <div class="container">
        <?php
        if (!empty($waitFriendList))
        {
            ?>
            <div class="row">
                <h3 id="waitAddFriend">Vos demandes d'amis en attente</h3>
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
            <table class="striped col s4 M4 l4 friend centered">
                <thead>
                    <tr>
                        <th>pseudo</th>
                        <th>PAYS</th>
                        <th>REGION</th>
                        <th>PROFIL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($friendList AS $user)
                    {
                        ?>
                        <tr>
                            <td><?= $user->username ?></td>
                            <td><?= $user->country ?></td>
                            <td><?= $user->region ?></td>
                            <td><a class="btn" href="profilFriend.php?idFriend=<?= $user->id ?>">PROFIL</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
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
    }
    else
    {
        header('Location: index.php');
    }
    ?>

