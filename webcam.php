<html>
    <head>
        <title>Media WebRTC Demo</title>        
        <style>#video,#otherPeer { width: 300px;}</style>
        <script type='text/javascript' src='https://cdn.firebase.com/v0/firebase.js'></script>
    </head>
    <body>
        <video id="video" autoplay></video>
        <video id="otherPeer" autoplay></video>
        <script>
            // get a reference to our FireBase database. You should create your own
            // and replace the URL.
            var dbRef = new Firebase("https://webrtcdemo.firebaseIO.com/");
            var roomRef = dbRef.child("rooms");

            // shims!
            var PeerConnection = window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
            var SessionDescription = window.mozRTCSessionDescription || window.RTCSessionDescription;
            var IceCandidate = window.mozRTCIceCandidate || window.RTCIceCandidate;
            navigator.getUserMedia = navigator.getUserMedia || navigator.mozGetUserMedia || navigator.webkitGetUserMedia;

            // Generation d'un numéro alétoire qui permettra d'identifier la connexion pour les 2 utilisateurs, Celui ci sera généré lors de la demande
            function idPeerConnexion() {
                return (Math.random() * 10000 + 10000 | 0).toString();
            }

            // a nice wrapper to send data to FireBase
            function send(room, key, data) {
                roomRef.child(room).child(key).set(data);
            }
            // wrapper function to receive data from FireBase
            function recv(room, type, cb) {
                roomRef.child(room).child(type).on("value", function (snapshot, key) {
                    var data = snapshot.val();
                    if (data) {
                        cb(data);
                    }
                });
            }
            // generic error handler
            function errorHandler(err) {
                console.error(err);
            }
            // determine what type of peer we are,
            // offerer or answerer.
            var ROOM = location.hash.substr(1);
            var type = "answerer";
            var otherType = "offerer";
            // no room number specified, so create one
            // which makes us the offerer
            if (!ROOM) {
                ROOM = id();
                type = "offerer";
                otherType = "answerer";
                //Création du lien à envoyer vers une autre personne
                document.write("<a href='#" + ROOM + "'>Send link to other peer</a>");
            }
            // Génération du numéro aléatoire qui identifiera la connexion
            var user1 = idPeerConnexion();
            /* 
             * Liste des serveur STUN et TURN pouvant être utiliser pour récupérer les adresses IP privé et le port utiliser par l'équipement de l'utilisateur, quand celui ci est situé derrière un pare-feu
             * Et qu'il y a une translation d'adresse NAT
             */            
            var server = {
                iceServers: [
                    {url: 'stun:stun01.sipphone.com'},
                    {url: 'stun:stun.ekiga.net'},
                    {url: 'stun:stun.fwdnet.net'},
                    {url: 'stun:stun.ideasip.com'},
                    {url: 'stun:stun.iptel.org'},
                    {url: 'stun:stun.rixtelecom.se'},
                    {url: 'stun:stun.schlund.de'},
                    {url: 'stun:stun.l.google.com:19302'},
                    {url: 'stun:stun1.l.google.com:19302'},
                    {url: 'stun:stun2.l.google.com:19302'},
                    {url: 'stun:stun3.l.google.com:19302'},
                    {url: 'stun:stun4.l.google.com:19302'},
                    {url: 'stun:stunserver.org'},
                    {url: 'stun:stun.softjoys.com'},
                    {url: 'stun:stun.voiparound.com'},
                    {url: 'stun:stun.voipbuster.com'},
                    {url: 'stun:stun.voipstunt.com'},
                    {url: 'stun:stun.voxgratia.org'},
                    {url: 'stun:stun.xten.com'},
                    {
                        url: 'turn:numb.viagenie.ca',
                        credential: 'muazkh',
                        username: 'webrtc@live.com'
                    },
                    {
                        url: 'turn:192.158.29.39:3478?transport=udp',
                        credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
                        username: '28224511:1379330808'
                    },
                    {
                        url: 'turn:192.158.29.39:3478?transport=tcp',
                        credential: 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
                        username: '28224511:1379330808'
                    }
                ]
            };
            var options = {
                optional: [
                    {DtlsSrtpKeyAgreement: true}
                ]
            }
            // Création de la connexion Point à point
            var pc = new PeerConnection(server, options);
            pc.onicecandidate = function (e) {
                // take the first candidate that isn't null
                if (!e.candidate) {
                    return;
                }
                pc.onicecandidate = null;
                // request the other peers ICE candidate
                recv(ROOM, "candidate:" + otherType, function (candidate) {
                    pc.addIceCandidate(new IceCandidate(JSON.parse(candidate)));
                });
                // send our ICE candidate
                send(ROOM, "candidate:" + type, JSON.stringify(e.candidate));
            };
            // grab the video elements from the document
            var video = document.getElementById("video");
            var video2 = document.getElementById("otherPeer");
            // get the user's media, in this case just video
            navigator.getUserMedia({video: true}, function (stream) {
                // set one of the video src to the stream
                video.src = URL.createObjectURL(stream);
                // add the stream to the PeerConnection
                pc.addStream(stream);
                // now we can connect to the other peer
                connect();
            }, errorHandler);
            // when we get the other peer's stream, add it to the second
            // video element.
            pc.onaddstream = function (e) {
                video2.src = URL.createObjectURL(e.stream);
            };
            // constraints on the offer SDP. Easier to set these
            // to true unless you don't want to receive either audio
            // or video.
            var constraints = {
                mandatory: {
                    OfferToReceiveAudio: true,
                    OfferToReceiveVideo: true
                }
            };
            // Debut de la connexion
            function connect() {
                if (type === "offerer") {
                    // Création du SDP, protocole de communication de description de paramètres d'initialisation d'une session de diffusion en flux
                    pc.createOffer(function (offer) {
                        pc.setLocalDescription(offer);

                        // Envoi du SDP à FireBase
                        send(ROOM, "offer", JSON.stringify(offer));
                        // Attente de la réponse SDP de FireBase
                        recv(ROOM, "answer", function (answer) {
                            pc.setRemoteDescription(
                                    new SessionDescription(JSON.parse(answer))
                                    );
                        });
                    }, errorHandler, constraints);

                } else {
                    // answerer needs to wait for an offer before
                    // génération de la réponse SDP
                    recv(ROOM, "offer", function (offer) {
                        pc.setRemoteDescription(
                                new SessionDescription(JSON.parse(offer))
                                );
                        // now we can generate our answer SDP
                        pc.createAnswer(function (answer) {
                            pc.setLocalDescription(answer);
                            // Envoie des informations à FireBase
                            send(ROOM, "answer", JSON.stringify(answer));
                        }, errorHandler, constraints);
                    });
                }
            }
        </script>
    </body>
</html>
