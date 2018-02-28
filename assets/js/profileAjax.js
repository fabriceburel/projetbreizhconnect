$(document).ready(function () {
    $('#validDeleteProfile').click(function (e) {
        //on évite le rechargement de la page lorsqu'on va cliquer sur le bouton submit du formulaire d'envoi de message
        e.preventDefault();
        var profilId = $('#validDeleteProfile').attr('userId');
        //Appel de la fonction AJAX
        $.ajax({
            type: 'POST',
            url: '../controllers/viewProfileController.php',
            data: 'profilId=' + profilId,
            dataType: "text",
            success: function (data) {
                if (data == 'success') {
                    console.log('Utilisateur supprimé');
                    $('#viewProfile').replaceWith($('<p>La suppression de votre compte a bien été réalisé</p>'));
                } else if (data == 'fail') {
                    console.log('Votre compte n\'a pas pu être supprimé');
                } else {
                    console.log('reconnection');
                }
            },
            error: function () {
                console.log('echec');
                //  document.location.href="../index.php"; 
            }
        });
    });
    //pour l'édition du profil, permet de cacher ou afficher l'édition d'un nouveau mot de passe
    if ($('input#editPassword').is(':checked')) {
        console.log('visible');
        $('#editNewPassword').show();
    } else {
        $('#editNewPassword').hide();
        console.log('cacher');
    }
    $('input#editPassword').change(function () {
        if ($('input#editPassword').is(':checked')) {
            console.log('visible');
            $('#editNewPassword').show();
        } else {
            $('#editNewPassword').hide();
            console.log('cacher');
        }
    });
});