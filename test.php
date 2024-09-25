<script>
    document.addEventListener('DOMContentLoaded', function() {
        let start = 0; // Initialize start index
        const limit = 2; // Number of items to load per request

        loadVideos(start, limit);

        function loadVideos(start, limit) {
            $.ajax({
                url: "<?php echo base_url('Video/get_videos'); ?>",
                type: "POST",
                data: {
                    video_start: 'Alton Twon House',
                    start: start,
                    limit: limit
                },
                success: function(data) {
                    $('#load-data-video').append(data); // Append data to the container

                    // Now initialize Swiper and video controls if needed
                    initializeSwiperAndVideoControls();
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", status, error);
                    alert("Data Gagal Diupload");
                }
            });
        }

        function initializeSwiperAndVideoControls() {
            const swiper = new Swiper('.swiper-container-re-vi', {
                direction: 'vertical',
                slidesPerView: 1,
                spaceBetween: 0,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true,
                },
                freeMode: false,
                mousewheel: true,
                allowTouchMove: true,
                touchRatio: 0.9,
                threshold: 10,
                longSwipesRatio: 0.3,
                longSwipesMs: 300,
            });

            const playPauseBtns = document.querySelectorAll('.playPauseBtn');
            const muteBtns = document.querySelectorAll('.muteBtn');
            const seekBars = document.querySelectorAll('.seekBar');
            const videos = document.querySelectorAll('.video');

            function handleVideoControls() {
                videos.forEach((video, index) => {
                    const playPauseBtn = playPauseBtns[index];
                    const muteBtn = muteBtns[index];
                    const seekBar = seekBars[index];

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
            }

            handleVideoControls();

            function playActiveSlideVideo(swiper) {
                videos.forEach(video => video.pause()); // Pause all videos
                const activeVideo = swiper.slides[swiper.activeIndex].querySelector('.video');
                if (activeVideo) {
                    activeVideo.play(); // Play video in active slide
                }
            }

            swiper.on('slideChange', function() {
                playActiveSlideVideo(swiper);
            });

            // Initialize with the first slide
            playActiveSlideVideo(swiper);

            // Custom navigation buttons
            const prevBtn = document.getElementById('prevBtn-re-vi');
            const nextBtn = document.getElementById('nextBtn-re-vi');

            prevBtn.addEventListener('click', () => {
                swiper.slidePrev();
            });

            nextBtn.addEventListener('click', () => {
                swiper.slideNext();

            });

            // Optionally, handle the disabled state of buttons
            swiper.on('slideChange', () => {
                prevBtn.disabled = swiper.isBeginning;
                nextBtn.disabled = swiper.isEnd;
            });

            // Initial state of buttons
            prevBtn.disabled = swiper.isBeginning;
            nextBtn.disabled = swiper.isEnd;

            // Debounce function to limit the rate of scroll event handling
            function debounce(func, wait) {
                let timeout;
                return function(...args) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(this, args), wait);
                };
            }

            // Handle scroll events with debounce
            const handleScroll = debounce(function(event) {
                if (event.deltaY > 0) {
                    // Scrolling down
                    swiper.slideNext();
                } else {
                    // Scrolling up
                    swiper.slidePrev();
                }
            }, 3000); // Adjust the debounce delay as needed

            document.addEventListener('wheel', handleScroll);
        }

        // Event listener for the 'Next' button
        document.getElementById('nextBtn-re-vi').addEventListener('click', () => {
            start += limit; // Update start index
            loadVideos(start, limit); // Load next set of videos
        });
    });
</script>

