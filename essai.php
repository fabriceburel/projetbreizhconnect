<html>
<head>
	<title>Media WebRTC Demo</title>
	<script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>

	<style>#video,#otherPeer { width: 300px;}</style>
</head>
<body>
<!-- affichage des video, la notre et celle de notre pair. -->
<video id="video" autoplay height="20px" width="20px"></video>
<video id="otherPeer" autoplay "400px" width="200px"></video>

<script>
//gestion de la base de donné par sur le firebaseio
var dbRef = new Firebase("https://breizhconnection-35.firebaseio.com");
var roomRef = dbRef.child("rooms");

// création d'alias
var PeerConnection = window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
var SessionDescription = window.mozRTCSessionDescription || window.RTCSessionDescription;
var IceCandidate = window.mozRTCIceCandidate || window.RTCIceCandidate;
navigator.getUserMedia = navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia;

// generation d'un chiffre d'identification unique-ish
function id () {
	return (Math.random() * 10000 + 10000 | 0).toString();
}

// un wrapper sympa pour envoyer des données à FireBase
function send (room, key, data) {
	roomRef.child(room).child(key).set(data);
}

// fonction wrapper pour recevoir des données de FireBase
function recv (room, type, cb) {
	roomRef.child(room).child(type).on("value", function (snapshot, key) {
		var data = snapshot.val();
		if (data) { cb(data); }
	});
}

// gestionnaire d'erreur générique
function errorHandler (err) {
	console.error(err);
}

// déterminer quel type d'homologue nous sommes,
// offreur ou répondeur.
var ROOM = location.hash.substr(1);
var type = "answerer";
var otherType = "offerer";

// pas de numéro de chambre spécifié, alors créez un
// ce qui fait de nous l'offreur
if (!ROOM) {
	ROOM = id();
	type = "offerer";
	otherType = "answerer";

	document.write("<a href='#"+ROOM+"'>copier le lien pour l'envoyer à la personne avec qui vous souhaitez converser</a>");
}

// générer un numéro de chambre unique-ish
var ME = id();

// options pour le PeerConnection détermination des serveurs stun et turn à privilégié
var server = {
	iceServers: [
		{url: "stun:23.21.150.121"},
		{url: "stun:stun.l.google.com:19302"},
		//{url: "turn:numb.viagenie.ca", credential: "webrtcdemo", username: "louis%40mozilla.com"}
	]
};

var options = {
	optional: [
		{DtlsSrtpKeyAgreement: true}
	]
}

// création du PeerConnection
var pc = new PeerConnection(server, options);
pc.onicecandidate = function (e) {
	// prendre le premier candidat qui n'est pas null
	if (!e.candidate) { return; }
	pc.onicecandidate = null;

	// demander à l'autre candidat de l'ICE
	recv(ROOM, "candidate:" + otherType, function (candidate) {
		pc.addIceCandidate(new IceCandidate(JSON.parse(candidate)));
	});
	// envoyer notre candidat ICE
	send(ROOM, "candidate:"+type, JSON.stringify(e.candidate));
};
// attraper les éléments vidéo du document
var video = document.getElementById("video");
var video2 = document.getElementById("otherPeer");

// obtenir les médias de l'utilisateur, dans ce cas juste la vidéo
navigator.getUserMedia({video: true}, function (stream) {
	// définissez l'une des vidéos src dans le flux
	video.src = URL.createObjectURL(stream);

	// ajouter le stream à la PeerConnection
	pc.addStream(stream);

	// maintenant nous pouvons nous connecter à l'autre pair
	connect();
}, errorHandler);

// lorsque nous obtenons le stream de l'autre peer, l'ajouter à la seconde
// élément vidéo.
pc.onaddstream = function (e) {
	video2.src = URL.createObjectURL(e.stream);
};

// contraintes sur l'offre SDP. Plus facile à régler
// à vrai sauf si vous ne souhaitez pas recevoir de contenu audio
// ou vidéo
var constraints = {
	mandatory: {
        OfferToReceiveAudio: true,
        OfferToReceiveVideo: true
    }
};

// Démmarrage de la connexion
function connect () {
	if (type === "offerer") {
		// create the offer SDP
		pc.createOffer(function (offer) {
			pc.setLocalDescription(offer);

			// envoyer l'offre SDP à FireBase
			send(ROOM, "offer", JSON.stringify(offer));

			// attendre une réponse SDP de FireBase
			recv(ROOM, "answer", function (answer) {
				pc.setRemoteDescription(
					new SessionDescription(JSON.parse(answer))
				);
			});
		}, errorHandler, constraints);

	} else {
		// le répondeur doit attendre une offre avant
    // Génération de la réponse SDP
		recv(ROOM, "offer", function (offer) {
			pc.setRemoteDescription(
				new SessionDescription(JSON.parse(offer))
			);

			// maintenant nous pouvons générer notre réponse SDP
			pc.createAnswer(function (answer) {
				pc.setLocalDescription(answer);

				// envoyez-le à FireBase
				send(ROOM, "answer", JSON.stringify(answer));
			}, errorHandler, constraints);
		});
	}
}
</script>

</body>
</html>
