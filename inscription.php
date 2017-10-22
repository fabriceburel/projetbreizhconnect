<?php
  include 'header.php';
 ?>
<div class="container">
  <form method="post" action="inscription.php"  enctype="multipart/form-data">
    <h2 class="row text-center">Inscription</h2>
 <!-- Création du formulaire d'inscription-->
     <div class="row">
       <p class="text-center">Nom : <label for="name"><input type="text" name="name" placeholder="Entrez votre nom"></label></p>  <!-- Création de l'emplacement du nom  -->
     </div>
     <div class="row">
       <p class="text-center">Prénom : <label for="surname"><input type="text" name="surname" placeholder="Entrez votre prénom"></label></p> <!-- Création de l'emplacement du prénom  -->
     </div>
     <div class="row">
       <p class="text-center">Nom de patissier : <label for="id"><input type="text" name="id" placeholder="Entrez votre nom d'utilisateur"></label></p><!-- Création de l'emplacement du nom d'utilisateur  -->
     </div>
     <div class="row">
       <p class="text-center">Email : <label for="mail"><input type="text" name="mail" placeholder="Entrez votre adresse e-mail"></label></p><!-- Création de l'emplacement du mail  -->
     </div>
     <div class="row">
       <p class="text-center">Recette secrète : <label for="password"><input type="password" name="password" placeholder="Entrez votre mot de passe"></label></p> <!-- Création de l'emplacement du mdp  -->
     </div>

       <p class="text-center">Vérification de la recette secrète :<label for="checked"><input type="password" name="checked" placeholder="Entrez votre mot de passe"></label></p> <!-- Création de l'emplacement de la vérification  -->
     </div>
     <div class="row">
       <!-- Possibilité d'ajouter une photo de profil -->
       <p class="text-center">Ajouter une photo : <label for="pictures"><input type="file" name="avatar" value="Parcourir" id="pic"></label></p>
     </div>
     <!-- Ajout du bouton pour envoyer la requête -->
     <div class="row text-center">
      <label for="submit"><input type="submit" name="submit" value="S'inscrire au site!" id="but"></label>
    </div>
  </form>
</div>
 <?php
 // vérification de l'utilisation du bouton 'submit'
 if(isset($_POST['submit']))
 {
   // vérification des emplacements si ils sont bien rempli
   if(!empty($_POST['name']) && (!empty($_POST['surname'])) && (!empty($_POST['id'])) && (!empty($_POST['mail'])) && (!empty($_POST['password'])) && (!empty($_POST['checked'])))
    {
      if($_POST['password'] == $_POST['checked'])
       {
           echo 'L\'inscription est bien validé!';
       }
      else
       {
           echo 'Les mots de passes sont différents! Recommencer.';
       }
    }
    else
    {
     echo  'Les champs ne sont pas remplis.';
    }
 }

   include 'footer.php';
  ?>
