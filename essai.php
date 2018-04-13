<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/relationship.php';
include_once 'models/message.php';
include_once 'controllers/headerController.php';
include_once 'controllers/tchatController.php';
include_once 'header.php';
?>
<link rel="stylesheet" href="assets/css/styleTchat.css">
<div class="row" id="messengerFriend">    
    <div class="col s12 m8 l8 white" id="messenger">
        <iframe  src="webcam.php" width="500" height="500"></iframe>
        <?php
        if ($newMessage->idReceiver != 0)
        {
            ?>        
            <div class="messenger" id="listMessage">
                <?php
                //on vérifie qu'on appel pas la méthode ajax
                if (!$ajax)
                {
                    $anchors = 0;
                    $date = NULL;
                    foreach ($readMessages as $message)
                    {
                        $anchors++;
                        $checkDate = $message->date;
                        if ($checkDate == $message->today)
                        {
                            $checkDate = 'Ajourd\'hui';
                        }
                        if ($checkDate != $date | $date == NULL)
                        {
                            $date = $checkDate;
                            ?>
                            <h5 class="col s12 center-align"><strong><?= $date ?></strong></h5>
                            <?php
                        }
                        if ($message->id == $newMessage->idTransmitter)
                        {
                            ?>
                            <div class="col offset-s2 s9 cyan lighten-3 row">
                                <p class="userHour"><?= $message->hour ?> - Vous : <span class="message" id="<?= $anchors ?>"> <?= $message->content ?></span></p>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="col s9 yellow lighten-1 row">
                                    <p class="userHour"><?= $message->hour ?> - <?= $message->username ?> : <span class="message" id="<?= $anchors ?>"><?= $message->content ?></span></p>
                                <?php } ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="spaceWrite">
                    <form action="#" method="POST" id="sendMessage">
                        <input type="hidden" name="friendRelation" userId="<?= $newMessage->idTransmitter ?>" value="<?= $newMessage->idReceiver ?>">
                        <input type="texte" name="newMessage" id="writeMessage">
                        <input type="submit" value="Envoyer" class="btn black" id="newMessage">        
                    </form>    
                </div>
                <?php
            }
            else
            {
                ?>
                <p>Sélectionner une personne pour commencer à échanger</p>
            <?php }
            ?>
        </div>
        <div class="col s4 m4 l4 white hide-on-small-only" id="listFriend">
            <?php
            foreach ($friendList AS $user)
            {
                ?>
                <div class="white row col s12 profileUser">
                    <div class="col s5 m2 l2">
                        <img class="avatarUser" src="<?= $user->avatar == '' ? 'media/profile/default/imagepardefaut.jpeg' : 'media/' . $user->id . '/profile/' . $user->avatar; ?>" width="100" height="100" alt="<?= $user->username ?>"/>
                        <p class="white-text status <?= $user->log == 0 ? 'grey' : 'green' ?>"><?= $user->log == 0 ? 'Déconnecté' : 'Connecté' ?></p>
                    </div>
                    <div class="row col offset-l3 l3 s5 username">
                        <h4><?= $user->username ?> de : <span class="country"><?= $user->country ?></span></h4>
                    </div>
                    <div class="row col offset-l2 l8 s7 buttonUser">
                        <a class="btn black col l3 s12" href="profilFriend.php?idFriend=<?= $user->id ?>">PROFIL</a>
                        <a class="btn col offset-m2 green" href="#?friend=<?= $user->id ?>">Echanger</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
