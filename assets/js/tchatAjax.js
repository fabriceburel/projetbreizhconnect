$('#newMessage').click(function (e) {
    //on évite le rechargement de la page lorsqu'on va cliquer sur le bouton submit du formulaire d'envoi de message
    e.preventDefault();
    var idReceiver = $('#sendMessage input[name=friendRelation]').val();
    var idTransmitter = $('#sendMessage input[name=friendRelation]').attr('userId');
    var newMessage = encodeURI($('#sendMessage textarea[name=newMessage]').val());
    //Appel de la fonction AJAX
    $.ajax({
        type: 'POST',
        url: '../controllers/tchatController.php',
        data: 'idTransmitter=' + idTransmitter + '&idReceiver=' + idReceiver + '&newMessage=' + newMessage + '&ajaxSendMessage=ajaxSendMessage',
        dataType: "json",
        success: function (messages) {
            var anchors = 0;
            //permet de vider la zone de texte à chaque clique
            $('#listMessage').empty();
            $.each(messages, function (index, value) {
                anchors++;
                if (value.id == idTransmitter) {
                    $('#listMessage').append($('<p>Vous <span class="hour">' + value.date + ' ' + value.hour + '</span> :</p>'));
                } else {
                    $('#listMessage').append($('<p>' + value.username + ' <span class="hour">' + value.date + ' ' + value.hour + '</span></p>'));
                }
                $('#listMessage').append($('<p class="message" id=' + anchors + '>' + value.content + '</p>'));
            });
            $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
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
            //permet de vider la zone de texte à chaque clique
            $('#listMessage').empty();
            $.each(messages, function (index, value) {
                anchors++;
                if (value.id == idTransmitter) {
                    $('#listMessage').append($('<p>Vous <span class="hour">' + value.date + ' ' + value.hour + '</span> :</p>'));
                } else {
                    $('#listMessage').append($('<p>' + value.username + ' <span class="hour">' + value.date + ' ' + value.hour + '</span></p>'));
                }
                $('#listMessage').append($('<p class="message" id=' + anchors + '>' + value.content + '</p>'));
            });
            $('#listMessage').scrollTop($('#listMessage')[0].scrollHeight);
        },
        error: function (messages) {
            $('#listMessage').empty();
            $('#listMessage').append($('<p>Erreur Serveur</p>'));
        }
    });
}, 4000);


function getMessages(messages) {

}