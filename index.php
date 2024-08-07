<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feliz Cumpleaños Deysi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto:wght@300;400&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #ffe6f2, #fff0f5);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        .envelope {
            background: #f0e9e9;
            width: 90vw;
            max-width: 700px;
            height: 90vh;
            max-height: 500px;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .envelope::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                linear-gradient(45deg, transparent 49.5%, #e5e0e0 49.5%, #e5e0e0 50.5%, transparent 50.5%) 0 0/20px 20px,
                linear-gradient(-45deg, transparent 49.5%, #e5e0e0 49.5%, #e5e0e0 50.5%, transparent 50.5%) 0 0/20px 20px;
            pointer-events: none;
        }

        .flap {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: #d3cece;
            transition: all 0.5s ease;
            transform-origin: top;
            z-index: 3;
            clip-path: polygon(50% 50%, 0 0, 100% 0);
        }

        .envelope.open .flap {
            height: 100%;
            transform: rotateX(180deg);
        }

        .letter {
            background: white;
            width: 90%;
            height: 90%;
            position: absolute;
            top: 5%;
            left: 5%;
            padding: 20px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.5s ease;
            z-index: 1;
            opacity: 0;
            transform: translateY(20px);
        }

        .envelope.open .letter {
            opacity: 1;
            transform: translateY(0);
        }

        h1 {
            font-family: 'Dancing Script', cursive;
            color: #ff1493;
            font-size: 3em;
            margin-bottom: 0.5em;
            animation: colorChange 5s infinite alternate;
        }

        .heart {
            font-size: 4em;
            color: #ff1493;
            animation: beat 0.5s infinite alternate;
            display: inline-block;
        }

        .message {
            font-size: 1.2em;
            color: #ff69b4;
            margin-top: 20px;
        }

        .falling {
            position: fixed;
            z-index: -1;
            top: -50px;
            animation: fall linear infinite;
        }

        @keyframes colorChange {
            0% { color: #ff1493; }
            50% { color: #ff69b4; }
            100% { color: #ff1493; }
        }

        @keyframes beat {
            to { transform: scale(1.1); }
        }

        @keyframes fall {
            to { transform: translateY(100vh); }
        }

        .button {
            background-color: #ff1493;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1em;
        }

        .button:hover {
            background-color: #ff69b4;
        }

        .video-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .video-content {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 90%;
            height: 90%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .video-content video {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        @media (max-width: 600px) {
            .video-content {
                width: 100%;
                height: 100%;
            }

            .envelope {
                width: 95vw;
                height: 80vh;
            }

            h1 {
                font-size: 2em;
            }

            .heart {
                font-size: 3em;
            }

            .message {
                font-size: 1em;
            }

            .button {
                font-size: 0.9em;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
    <div class="envelope" onclick="toggleEnvelope()">
        <div class="flap"></div>
        <div class="letter">
            <h1>¡Feliz Cumpleaños Deysi!</h1>
            <div class="heart">❤️</div>
            <p class="message">Eres el amor de mi vida. ¡Que tengas un día tan dulce como tú!</p>
            <button class="button" onclick="showVideo(event)">Ver video especial</button>
        </div>
    </div>

    <div class="video-container" id="videoContainer">
        <div class="video-content">
            <h2>Video Especial</h2>
            <video src="video.mp4" controls></video>
            <button class="button" onclick="closeVideo()">Cerrar</button>
        </div>
    </div>

    <script>
        function createFallingObject(emoji) {
            const object = document.createElement('div');
            object.classList.add('falling');
            object.style.left = Math.random() * 100 + 'vw';
            object.style.fontSize = Math.random() * 20 + 20 + 'px';
            object.style.animationDuration = Math.random() * 5 + 5 + 's';
            object.innerText = emoji;
            object.style.top = Math.random() * 50 + 'vh';
            document.body.appendChild(object);

            setTimeout(() => {
                object.remove();
            }, 10000);
        }

        function createRandomObject() {
            const objects = ['🍋', '🌸', '🎈', '🎁', '✨'];
            const randomObject = objects[Math.floor(Math.random() * objects.length)];
            createFallingObject(randomObject);
        }

        setInterval(createRandomObject, 300);

        function toggleEnvelope() {
            document.querySelector('.envelope').classList.toggle('open');
        }

        function showVideo(event) {
            event.stopPropagation();
            document.getElementById('videoContainer').style.display = 'flex';
        }

        function closeVideo() {
            document.getElementById('videoContainer').style.display = 'none';
        }
    </script>
</body>
</html>
