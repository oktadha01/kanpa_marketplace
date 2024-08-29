<!DOCTYPE html>
<html>
<head>
    <title>Custom Video Controls</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Add some basic styles for your custom controls */
        .videoContainer {
            position: relative;
            width: 600px;
            margin: auto;
        }

        .customControls {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .playPauseBtn, .muteBtn {
            margin: 0 10px;
            padding: 5px 10px;
            cursor: pointer;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
        }

        .seekBar {
            width: 70%;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="videoContainer">
        <video class="video" width="600" autoplay muted loop=1>
            <source src="upload/video/baron-hardseling 2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="customControls">
            <button class="playPauseBtn"><i class="fas fa-pause"></i></button>
            <button class="muteBtn"><i class="fas fa-volume-mute"></i></button>
            <input type="range" class="seekBar" value="0" min="0" max="100">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const video = document.querySelector('.video');
            const playPauseBtn = document.querySelector('.playPauseBtn');
            const muteBtn = document.querySelector('.muteBtn');
            const seekBar = document.querySelector('.seekBar');

            // Autoplay functionality
            video.play();

            // Play/Pause functionality
            playPauseBtn.addEventListener('click', function() {
                if (video.paused) {
                    video.play();
                    playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
                } else {
                    video.pause();
                    playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
                }
            });

            // Trigger play/pause button click when video is clicked
            video.addEventListener('click', function() {
                playPauseBtn.click();
            });

            // Mute/Unmute functionality
            muteBtn.addEventListener('click', function() {
                if (video.muted) {
                    video.muted = false;
                    muteBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
                } else {
                    video.muted = true;
                    muteBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
                }
            });

            // Seek bar functionality
            video.addEventListener('timeupdate', function() {
                var value = (100 / video.duration) * video.currentTime;
                seekBar.value = value;
            });

            seekBar.addEventListener('input', function() {
                var time = video.duration * (seekBar.value / 100);
                video.currentTime = time;
            });
        });
    </script>
</body>
</html>
