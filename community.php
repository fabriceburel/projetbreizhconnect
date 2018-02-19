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
    <div>
        <?php
        if (!empty($waitFriendList))
        {
            foreach ($waitFriendList AS $waitFriend)
            {
                ?>
                <div class="row">
                    <form method="POST" action="#">
                        <p class="col l2"><?= $waitFriend->username ?></p>
                        <input type="hidden" hidden value="<?= $waitFriend->id ?>" name="idNewFriend">
                        <input type="submit" name="accept" value="Accepter" class="btn col l2 green darken-4 waves-effect">
                        <input type="submit" name="deny" value="Refuser" class="btn col l2 orange darken-4 waves-effect">
                        <input type="submit" name="block" value="Bloquer" class="btn col l2 red accent-4 waves-effect">
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

