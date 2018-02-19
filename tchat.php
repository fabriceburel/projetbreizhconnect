<?php
include_once 'models/dataBase.php';
include_once 'header.php';
?>
<link rel="stylesheet" href="assets/css/styleTchat.css">
<div class="row ">
    <div class="col l8 red">
        <div class="message blue">
        </div>
        <div class="spaceWrite">
            <form action="#" method="POST">
                <input type="hidden" name="friendRelation" value="57">
                <textarea name="newMessage" required></textarea>
                <input type="submit" value="Envoyer">        
            </form>    
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
