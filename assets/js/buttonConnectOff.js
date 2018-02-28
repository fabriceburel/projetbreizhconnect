$(document).ready(function () {
    $('#submitConnexion').click(function () {
        //Appel de la méthode Ajax pour le post pour la fenetre modal de connexion
        $.post(
                // Appel du controller de buttonConnectOffController
                'controllers/buttonConnectOffController.php',
                {
                // Récupération des valeurs des inputs que l'on fait passer au controller : buttonConnectOffController.php
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                );
    });
});


