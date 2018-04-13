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
    <div class="col s12 m12 l7 white" id="messenger">
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
                    //on parcours les messages 1 par 1
                    foreach ($readMessages as $message)
                    {
                        $anchors++;
                        $checkDate = $message->date;
                        //on vérifie de quel jour date les messages
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
                        //on vérifie de qui provient le message (de l’utilisateur ou de son interlocuteur afin de les différencier
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
                            <!-- zone de texte pour l’écriture des messages à envoyer à l’interlocuteur -->
                <div class="spaceWrite">
                    <form action="#" method="POST" id="sendMessage">
                        <input type="hidden" name="friendRelation" userId="<?= $newMessage->idTransmitter ?>" value="<?= $newMessage->idReceiver ?>">
                        <input type="texte" name="newMessage" id="writeMessage">
                        <input type="submit" value="Envoyer" class="btn black" id="newMessage">
                        <a class="btn-floating waves-effect waves-light modal-trigger" title="commencer un échange video" id="camera" href="#modalVideo"><i class="material-icons">videocam</i></a>
                        <div id="modalVideo" class="modal">
                            
                        </div>
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
        <div class="col l5 white hide-on-small-only hide-on-med-only" id="listFriend">
            <?php
            //liste des personnes avec qui on peut communiquer
            foreach ($friendList AS $user)
            {
                ?>
                <div class="white row col m12 profileUser">
                    <div class="col l2">
                        <img class="avatarUser" src="<?= $user->avatar == '' ? 'media/profile/default/imagepardefaut.jpeg' : 'media/' . $user->id . '/profile/' . $user->avatar; ?>" width="100" height="100" alt="<?= $user->username ?>"/>
                        <p class="white-text status <?= $user->log == 0 ? 'grey' : 'green' ?>"><?= $user->log == 0 ? 'Déconnecté' : 'Connecté' ?></p>
                    </div>
                    <div class="row col offset-l1 l9 username">
                        <h4><?= $user->username ?> de : <span class="country"><?= $user->country ?></span></h4>
                    </div>
                    <div class="row col offset-l1 l9 buttonUser">
                        <a class="btn black col m6" href="profilFriend.php?idFriend=<?= $user->id ?>">PROFIL</a>
                        <a class="btn col m6 green" href="tchat.php?friend=<?= $user->id ?>">Echanger</a>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
