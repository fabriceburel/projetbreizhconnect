<!DOCTYPE html>
<html>  <!-- xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR" lang="fr-FR" -->
	<head>
		<meta charset="UTF-8" />
		<meta name="description" content="Test caméra " />
		<meta name="keywords" content="HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" />
		<meta name="viewport" content="initial-scale=6.0,width=device-width" />
		<title>Accès caméra en HTML5</title>
		<style type="text/css">
			input { font-size:x-large; }
		</style>
	</head>

	<body>
		<hr class="n2"/>

		<h2 id="demo">Démonstration</h2>
		<p><video id="video" autoplay="autoplay" controls></video></p> <!--permet de diffuser la vidéo saisi par la webcam -->
		<p><video id="test" ontimeupdate="update(this)"></p>
		<p><input type="button" id="buttonSnap" value="Prendre une photo" disabled="disabled" onclick="snapshot()" /></p> <!--bouton prise de photo -->
		<p>
			<input type="button" id="buttonStart" value="Démarrer" disabled="disabled" onclick="start()" /> <!--démarre la webcam après que celle ci ai été arrété -->
			<input type="button" id="buttonStop" value="Arrêter" disabled="disabled" onclick="stop()" /> <!--démarre la webcam après que celle ci ai été démarré -->
		</p>
		<p><canvas id="webcamdisplay" controls></canvas></p> <!--affichage de la video saisi par la webcam en temps réel avec la fonction -->

		<hr />

		<script type="text/javascript">//<![CDATA[
			"use strict";
			var video = document.getElementById('video');
			var canvas = document.getElementById('webcamdisplay');
			var videoStream = null;
			var preLog = document.getElementById('preLog');
			//défini l'affichage des message
			function log(text)
			{
				if (preLog) preLog.textContent += ('\n' + text);
				else alert(text);
			}
			// capture dela video
			function snapshot()
			{
				canvas.width = video.videoWidth; //defini la largeur du canvas identique a celui de la video
				canvas.height = video.videoHeight; //defini la hauteur du canvas identique a celui de la video
				canvas.getContext('2d').drawImage(video, 0, 0);
			}

			// affichage du message d erreur lorsque l utilisateur à refusé l accès à la webcam
			function noStream()
			{
				log('L’accès à la caméra a été refusé !');
			}
			// coupure de la webcam lors du clique sur arreter la webcam
			function stop()
			{
				var myButton = document.getElementById('buttonStop');
				if (myButton) myButton.disabled = true;
				// activation du boutton prise de photo losque la video est activé
				myButton = document.getElementById('buttonSnap');
				if (myButton) myButton.disabled = true;
				if (videoStream)
				{
					if (videoStream.stop) videoStream.stop();
					else if (videoStream.msStop) videoStream.msStop();
					videoStream.onended = null;
					videoStream = null;
				}
				if (video)
				{
					video.onerror = null;
					video.pause();
					if (video.mozSrcObject)
					video.mozSrcObject = null;
					video.src = "";
				}
				myButton = document.getElementById('buttonStart');
				if (myButton) myButton.disabled = false;
			}

			function gotStream(stream)
			{
				var myButton = document.getElementById('buttonStart');
				if (myButton) myButton.disabled = true;
				videoStream = stream;
				// log('Flux vidéo reçu.'); <!--permet d indiquer si la fonction d affichage de la video a fonctionné -->
				video.onerror = function ()
				{
					log('video.onerror');
					if (video) stop();
				};
				stream.onended = noStream;
				if (window.webkitURL) video.src = window.webkitURL.createObjectURL(stream);
				else if (video.mozSrcObject !== undefined)
				{//FF18a
					video.mozSrcObject = stream;
					video.play();
				}
				else if (navigator.mozGetUserMedia)
				{//FF16a, 17a
					video.src = stream;
					video.play();
				}
				else if (window.URL) video.src = window.URL.createObjectURL(stream);
				else video.src = stream;
				myButton = document.getElementById('buttonSnap');
				if (myButton) myButton.disabled = false;
				myButton = document.getElementById('buttonStop');
				if (myButton) myButton.disabled = false;
			}
			function start()
			{
				// vérification de la compatibilité des navigateurs
				if ((typeof window === 'undefined') || (typeof navigator === 'undefined')) log('Cette page requiert un navigateur Web avec les objets window.* et navigator.* !');
				// vérifie que les fonction video et canvas ne contienne pas d'erreur
				else if (!(video && canvas )) log('Erreur de contexte HTML !');
				else
				{
					log('Demande d’accès au flux vidéo…');
					if (navigator.getUserMedia) navigator.getUserMedia({video:true,audio:true}, gotStream, noStream);
					else if (navigator.oGetUserMedia) navigator.oGetUserMedia({video:true,audio:true}, gotStream, noStream);
					else if (navigator.mozGetUserMedia) navigator.mozGetUserMedia({video:true,audio:true}, gotStream, noStream);
					else if (navigator.webkitGetUserMedia) navigator.webkitGetUserMedia({video:true,audio:true}, gotStream, noStream);
					else if (navigator.msGetUserMedia) navigator.msGetUserMedia({video:true, audio:true}, gotStream, noStream);
					else log('getUserMedia() n’est pas disponible depuis votre navigateur !');
				}
			}
			start();
    </script>
  </body>
</html>
