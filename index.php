<?php
include 'controllers/headerController.php';
include 'header.php';
if (isset($_SESSION['username']))
{
    ?>
    <p>bienvenue <?= $_SESSION['username']; ?></p>
    <?php
}
else
{
    ?>
    <p><a href="connexion.php" title="connexion">Connectez-vous</a> ou <a href="subscribe.php" title="inscription">inscrivez-vous</a></p> 
<?php
}
include 'footer.php';
?>