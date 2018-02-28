<?php
include_once 'models/dataBase.php';
include_once 'models/user.php';
include_once 'models/country.php';
include_once 'models/region.php';
include_once 'controllers/headerController.php';
include_once 'controllers/profileController.php';
include_once 'header.php';
if(isset($_POST['edit']) | isset($_POST['editProfile'])){
    include_once 'editProfile.php';
}elseif($users->id != 0){
    include_once 'viewProfile.php';
}
?>

<?php include 'footer.php'; ?>