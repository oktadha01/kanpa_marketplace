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

<title>Perumahan Terbaik 2024 | Rumah Idaman, Hunian Modern, dan Properti Investasi</title>
<meta name="description" content="Cari perumahan terbaru 2024 dengan lokasi strategis, harga terjangkau, dan desain modern. Temukan rumah idaman atau properti investasi Anda sekarang di kota-kota besar Indonesia. Mulai dari perumahan minimalis hingga cluster mewah. Perumahan Komersil dan subsidi" />
<meta name="keywords" content="perumahan terbaru 2024, rumah idaman, properti investasi, hunian modern, perumahan minimalis, cluster mewah, rumah murah, perumahan di Jakarta, rumah di kota besar, rumah siap huni" />
<meta name="robots" content="index, follow" />
<meta name="author" content="Nama Anda atau Perusahaan Anda" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta charset="UTF-8" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:title" content="Perumahan Terbaik 2024 | Rumah Idaman dan Hunian Modern" />
<meta property="og:description" content="Jelajahi perumahan terbaru 2024 dengan desain modern dan harga terjangkau. Temukan rumah idaman Anda di kota besar Indonesia." />
<meta property="og:image" content="https://www.example.com/path/to/image.jpg" />
<meta property="og:url" content="https://www.example.com" />
<meta property="og:site_name" content="Perumahan Idaman 2024" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Perumahan Terbaik 2024 | Rumah Idaman dan Hunian Modern" />
<meta name="twitter:description" content="Temukan rumah idaman Anda di perumahan modern 2024. Strategis, terjangkau, dan siap huni." />
<meta name="twitter:image" content="https://www.example.com/path/to/image.jpg" />
<meta name="twitter:site" content="@yourusername" />

<!-- Canonical Link -->
<link rel="canonical" href="https://www.example.com/current-page-url" />