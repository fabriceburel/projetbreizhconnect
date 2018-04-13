$(document).ready(function () {
    var screenHeight = $(window).height();
    var heightMessenger = 0;
    var widthInputMessenger = 0;
    if (screenHeight > 600) {
        heightMessenger = screenHeight - $('#header').height() - 2;
        $('#messenger').css('max-height', heightMessenger + 'px');
        heightMessenger -= $('.spaceWrite').height();
        $('#listMessage').css('height', heightMessenger + 'px');
        heightMessenger += 102;
        $('#listFriend').css('height', heightMessenger + 'px');
        widthInputMessenger = $('#sendMessage').width();
        $('#writeMessage').css('width', widthInputMessenger + 'px');
        $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
    } else {
        heightMessenger = screenHeight - 2;
        $('#messenger').css('max-height', heightMessenger + 'px');
        heightMessenger -= $('.spaceWrite').height();
        $('#listMessage').css('height', heightMessenger + 'px');
        widthInputMessenger = $('#sendMessage').width();
        $('#writeMessage').css('width', widthInputMessenger + 'px');
        $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
    }
});
$('#newMessage').click(function (e) {
    //on évite le rechargement de la page lorsqu'on va cliquer sur le bouton submit du formulaire d'envoi de message
    e.preventDefault();
    //on récupère les différentes valeurs qui nous intèresse, id de l'utilisateur, id du récepteur et contenu du message
    var idReceiver = $('#sendMessage input[name=friendRelation]').val();
    var idTransmitter = $('#sendMessage input[name=friendRelation]').attr('userId');
    var newMessage = encodeURI($('#sendMessage input[name=newMessage]').val());
    //Appel de la fonction AJAX
    $.ajax({
        type: 'POST',
        url: '../controllers/tchatController.php',
        data: 'idTransmitter=' + idTransmitter + '&idReceiver=' + idReceiver + '&newMessage=' + newMessage + '&ajaxSendMessage=ajaxSendMessage',
        //le retour sera récupérer dans un fichier json
        dataType: "json",
        //si on récupère un fichier alors on va insérer les lignes dans notre messagerie instantannée
        success: function (messages) {
            var anchors = 0;
            var date = '';
            //permet de vider la zone de texte à chaque clique
            $('#listMessage').empty();
            //$.each permet de parcourir un tableau
            $.each(messages, function (index, value) {
                anchors++;
                var checkDate = value.date;
                if (checkDate == value.today)
                {
                    checkDate = 'Ajourd\'hui';
                }
                if (checkDate != date | date == '')
                {
                    date = checkDate;
                    $('#listMessage').append($('<h5 class="center-align col s12"><strong>' + date + '</strong></h5>'));
                }
                if (value.id == idTransmitter) {
                    $('#listMessage').append($('<div class="col offset-s2 s9 cyan lighten-3 row"  id="' + value.idMessage + '"></div>'));
                    $('#' + value.idMessage).append($('<p  class="userHour">' + value.hour + ' - Vous : <span class="message" id="' + anchors + '">' + value.content + '</span></p>'));
                } else {
                    $('#listMessage').append($('<div class="col s9 yellow lighten-1 row" id="' + value.idMessage + '">'));
                    $('#' + value.idMessage).append($('<p  class="userHour">' + value.hour + ' - ' + value.username + ' : <span class="message" id="' + anchors + '">' + value.content + '</span></p>'));
                }
            });
            //permet d'avoir la scrollbar en bas
            $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
            //permet de vider la zone de texte
            $('#writeMessage').val('');
        }
    });
});
//permet de descendre le scrollBar au niveau du dernier message
$('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
setInterval(function () {
    var idReceiver = $('#sendMessage input[name=friendRelation]').val();
    var idTransmitter = $('#sendMessage input[name=friendRelation]').attr('userId');
    //Appel de la fonction AJAX
    $.ajax({
        type: 'POST',
        url: '../controllers/tchatController.php',
        data: 'idTransmitter=' + idTransmitter + '&idReceiver=' + idReceiver + '&ajaxActualise=ajaxActualise',
        dataType: "json",
        success: function (messages) {
            var anchors = 0;
            var date = '';
            //permet de vider la zone de texte à chaque clique
            $('#listMessage').empty();
            //$.each permet de parcourir un tableau
            $.each(messages, function (index, value) {
                anchors++;
                var checkDate = value.date;
                if (checkDate == value.today)
                {
                    checkDate = 'Ajourd\'hui';
                }
                if (checkDate != date | date == '')
                {
                    date = checkDate;
                    $('#listMessage').append($('<h5 class="center-align col s12"><strong>' + date + '</strong></h5>'));
                }
                if (value.id == idTransmitter) {
                    $('#listMessage').append($('<div class="col offset-s2 s9 cyan lighten-3 row"  id="' + value.idMessage + '"></div>'));
                    $('#' + value.idMessage).append($('<p  class="userHour">' + value.hour + ' - Vous : <span class="message" id="' + anchors + '">' + value.content + '</span></p>'));
                } else {
                    $('#listMessage').append($('<div class="col s9 yellow lighten-1 row" id="' + value.idMessage + '">'));
                    if (value.content == 'Demande de vidéo en cours') {
                        $('#' + value.idMessage).append($('<p  class="userHour">' + value.hour + ' - ' + value.username + ' : <a href="webcam.php?' + idReceiver + '_' + idTransmitter + '" title="appel visio"  id="' + anchors + '">Répondre à un appel visio</a></p>'));
                    } else {
                        $('#' + value.idMessage).append($('<p  class="userHour">' + value.hour + ' - ' + value.username + ' : <span class="message" id="' + anchors + '">' + value.content + '</span></p>'));
                    }
                }
                $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
            });
        },
        error: function (messages) {
            $('#listMessage').empty();
            $('#listMessage').append($('<p>Vous ne pouvez pas échanger avec cette personne</p>'));
        }
    });
    //appel tout les 4 secondes
}, 4000);

//Permet lorsqu'on clique sur la camera d'activer notre webcam et d'envoyer la demande à l'autre utilisateur
$('#camera').click(function () {
//on récupère les différentes valeurs qui nous intèresse, id de l'utilisateur, id du récepteur et contenu du message
    var idReceiver = $('#sendMessage input[name=friendRelation]').val();
    var idTransmitter = $('#sendMessage input[name=friendRelation]').attr('userId');
    var newMessage = 'Demande de vidéo en cours';
    console.log(newMessage);
    //Appel de la fonction AJAX
    $.ajax({
        type: 'POST',
        url: '../controllers/tchatController.php',
        data: 'idTransmitter=' + idTransmitter + '&idReceiver=' + idReceiver + '&newMessage=' + newMessage + '&ajaxAskVideo=ajaxAskVideo',
        //le retour sera récupérer dans un fichier json
        dataType: "json",
        //si on récupère un fichier alors on va insérer les lignes dans notre messagerie instantannée
        success: function (messages) {
            console.log('testmodalvidéo');
            $('#modalVideo').empty();
            $('#modalVideo').append('<iframe  src="webcam.php" id="iframeVideo" userIds="' + idTransmitter + '_' + idReceiver + '" width="1000" height="500"></iframe>');
        }
    });
});