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
<div class="row">
    <div class="col l8 red">
        <?php
        if ($newMessage->idReceiver != 0)
        {
            ?>        
            <div class="messenger blue" id="listMessage">
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
                            <h5 class="center-align"><strong><?= $date ?></strong></h5>
                            <?php
                        }
                        if ($message->id == $newMessage->idTransmitter)
                        {
                            ?>
                            <div class="green accent-3">
                                <p>Vous à <span class="hour"><?= $message->hour ?> :</span></p>
                                <?php
                            }
                            else
                            {
                                ?>
                                <div class="indigo lighten-1">
                                    <p><?= $message->username ?> <span class="hour"><?= $message->hour ?> :</span></p>
                                <?php } ?>
                                <p class="message" id="<?= $anchors ?>"><?= $message->content ?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="spaceWrite">
                    <form action="#" method="POST" id="sendMessage">
                        <input type="hidden" name="friendRelation" userId="<?= $newMessage->idTransmitter ?>" value="<?= $newMessage->idReceiver ?>">
                        <textarea name="newMessage" id="writeMessage"></textarea>
                        <input type="submit" value="Envoyer" id="newMessage">        
                    </form>    
                </div>
                <?php
            }
            else
            { ?>
                            <p>Sélectionner une personne pour commencer à échanger</p>
           <?php }
            ?>
        </div>
        <div class="col l4 white" id="listFriend">
            <?php
            foreach ($friendList AS $user)
            {
                ?>
                <div class="row">
                    <a href="tchat.php?friend=<?= $user->id ?>"><div class="col l12 friend" name="<?= $user->id ?>">
                            <p><?= $user->username ?> de : <span class="country"><?= $user->country ?></span></p>
                        </div></a>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
