<?php
include 'header.php';
?>
<div class="container">
    <div class="row center-align">
        <h2>Formulaire d'inscription</h2>
    </div>
    <div class="row">
        <div class="col m6 s12">
            <form action="test.php">
                <div class="input-field">
                    <input type="text" name="firstname" id="firstName">
                    <label for="firstname">Prénom</label>
                </div>


            </form>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>


<!-- création de l'emplacement date de naissance avec un datepicker (voir scriptDatepicker.js pour les paramètres -->
<div class="row">
    <div class="offset-l5 l4 date datepickerBirthday">
        <span class="input-group-addon"> <label for="birthday">Date de naissance (exp:26/01/1952) : </label></span>
        <input  id="datepickerBirthday" class="datepicker" type="text" class=" form-control input-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
    </div>
</div>