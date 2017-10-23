<?php
  include 'header.php';
 ?>
<div class="container">
  <div class="row">
    <form method="post" action="inscription.php"  enctype="multipart/form-data">
      <div class="col-lg-6 row">
        <h2 class="col-lg-12 text-center">connexion</h2>
     <!-- Création du formulaire de connexion-->
         <div class="row">
           <p class="text-center">Identifiant <label for="identity"><input type="text" name="name" placeholder="Entrez votre nom"></label></p>  <!-- saisi de l'identifiant  -->
         </div>
         <div class="row">
           <p class="text-center">Mot de passe: <label for="password"><input type="password" name="password" placeholder="Entrez votre mot de passe"></label></p> <!-- saisi du mot de passe  -->
         </div>
         <div class="row text-center">
          <label for="test"><input type="submit" name="submit" value="Se connecter au site"></label>
        </div>
       </div>
     </form>
     <div class="col-lg-6 row">
      <form method="post" action="inscription.php"  enctype="multipart/form-data">
        <h2 class="col-lg-12 text-center">Inscription</h2>
        <p class="col-lg-12">Si c'est ta première visite, inscris-toi facilement en remplissant tes données ci-dessous</p>
     <!-- Création du formulaire d'inscription-->
         <div class="row">
           <p class="text-center">Nom : <label for="name"><input type="text" name="name" placeholder="Entrez votre nom"></label></p>  <!-- Création de l'emplacement du nom  -->
         </div>
         <div class="row">
           <p class="text-center">Prénom : <label for="surname"><input type="text" name="surname" placeholder="Entrez votre prénom"></label></p> <!-- Création de l'emplacement du prénom  -->
         </div>
         <div class="row">
           <p class="text-center">Identifiant : <label for="id"><input type="text" name="id" placeholder="Entrez votre nom d'utilisateur"></label></p><!-- Création de l'emplacement du nom d'utilisateur  -->
         </div>
         <div class="row">
           <p class="text-center">Email : <label for="mail"><input type="text" name="mail" placeholder="Entrez votre adresse e-mail"></label></p><!-- Création de l'emplacement du mail  -->
         </div>
         <div class="row">
           <p class="text-center">Mot de passe: <label for="password"><input type="password" name="password" placeholder="Entrez votre mot de passe"></label></p> <!-- Création de l'emplacement du mdp  -->
         </div>
         <div class="row">
           <p class="text-center">Vérification du mot de passe :<label for="checked"><input type="password" name="checked" placeholder="Entrez votre mot de passe"></label></p> <!-- Création de l'emplacement de la vérification  -->
         </div>
         <div class="row">
           <!-- Possibilité d'ajouter une photo de profil -->
           <p class="text-center">Ajouter une photo : <label for="pictures"><input type="file" name="avatar" value="Parcourir" id="pic"></label></p>
         </div>
         <!-- Ajout du bouton pour envoyer la requête -->
         <div class="row text-center">
          <label for="submit"><input type="submit" name="submit" value="S'inscrire au site!"></label>
        </div>
      </form>
    </div>
  </div>
</div>
 <?php
 //vérification de la connexion
 if(isset($_POST['test']))
 {
   if(!empty($_POST['identity']) && (!empty($_POST['password']))){
     echo 'les champs ne sont pas remplis correctement, veuillez vérifier saisir votre identifiant et mot de passe';
   }
   else{
     echo 'vous êtes connecté(e)';
   }
 }
  // vérification de l'inscription lors du clique sur le bouton 'submit'
 if(isset($_POST['submit']))
 {

   // vérification des emplacements si ils sont bien rempli

   if(!empty($_POST['name']) && (!empty($_POST['surname'])) && (!empty($_POST['id'])) && (!empty($_POST['mail'])) && (!empty($_POST['password'])) && (!empty($_POST['checked'])))
    {
      if($_POST['password'] == $_POST['checked']) //vérification que le mot de passe est identique
       {
           echo 'L\'inscription est bien validé!'; //valide l'inscription
       }
      else
       {
           echo 'Les mots de passes sont différents! Recommencez.';
       }
    }
    else
    {
     echo  'Les champs ne sont pas remplis.';
    }
 }
   include 'footer.php';
  ?>
