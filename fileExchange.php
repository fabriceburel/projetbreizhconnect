<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/log.php';
include_once 'models/files.php';
include 'controllers/headerController.php';
include_once 'controllers/fileExchangeControllers.php';
include_once 'header.php';
?>
<div class="container">
    <!-- h3 pas nécessaire tant que la fenetre modal n'est pas réactivée -->
    <!-- <h3 class="col l12 center-align">Vérifier et modifier vos informations avant validation de l'inscription</h3> -->
    <div class="row">
        <div class="col s12 m10 offset-l2 l8  center-block">
            <!-- Création du formulaire d'inscription-->
            <form action="#" method="POST" enctype="multipart/form-data" class="fileExchange row">
                <h2 class="col s12 l12 center-align">Partage de fichier</h2>
                <div class="col offset-l2 s12 l8">
                    <div class="input-field">
                        <i class="fa fa-globe prefix" aria-hidden="true"></i>
                        <select name="friend"  class="white-text friend" required>
                            <option>Sélectionnez une personne</option>
                            <?php
                            foreach ($friendList as $friend)
                            {
                                ?>
                                <option value="<?= $friend->id ?>"<?= $newFiles->idReceiver == $friend->id ? ' selected' : ''; ?>><?= $friend->username ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <label for="friend">Séléctionnez une personne : <p class="textError"><?= $textFriend ?></p></label>
                    </div>
                </div>
                <div class="col offset-l2 s12 l8">
                    <div class="file-field input-field row">
                        <h6 class="col offset-l1 s12 l8">Sélectionnez un fichier (max: 20Mo)</h6>
                        <p class="col offset-l1 s12 l8">format: JPG, PNG, PDF</p>
                        <p class="col offset-l1 s12 l8 textError"><?= $textFile ?></p>
                        <div class="btn grey darken-4 white-text col s12 l6">
                            <span>Votre fichier <i class="material-icons right">cloud_upload</i></span>
                            <input type="hidden" name="MAX_FILE_SIZE" value="20971520" />
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper col s12 l6">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="col offset-l2 s12 l8">
                    <div class="input-field center-align">
                        <button name="submit" class="btn btn-large waves-effect waves-light grey darken-4">Envoyer les fichiers<i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>
        </div>
        <?php
        if ($checkFile && $checkFriend)
        {
            ?>
            <p><?= $textFileTransmission ?></p>
            <?php
        }
        ?>
    </div>
    <div class="row">
        <h2 class="col s12 l12 center-align">Liste des fichiers envoyés par votre communauté</h2>
        <ul id="listFiles">
            <?php
            foreach ($files as $file)
            {
                ?>
            <li class="col offset-s1 s10 l6">Fichier <?= $file->filesname ?> envoyer par <?= $file->username ?><a href="media/<?= $file->idTransmitter ?>/files/<?= $file->filesname ?>" download title="Télécharger <?= $file->filesname ?>"> Télécharger<i class="material-icons">save</i></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php
include 'footer.php';
?>
