<script>
    $(document).ready(function() {
        function enterFullscreen() {
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            }
        }
        // User interaction: touch or click to trigger fullscreen
        document.addEventListener('click', enterFullscreen);
        document.addEventListener('touchstart', enterFullscreen);
    });

    let swiper;
    let start = 0; // Initialize start index
    const limit = 2; // Number of items to load per request
    let isFirstLoad = true; // Flag for initial load
    let hasMoreData = true; // Flag to check if there's more data to load
    let loadingMoreData = false; // Prevent multiple concurrent requests
    function get_url() {
        var activeIndex = swiper.activeIndex;
        var activeSlideText = $('.swiper-slide').eq(activeIndex).find('.nm-properti').text().trim().replace(/[^a-z0-9]+/gi, "-");

        if (activeSlideText) {
            console.log("Active Slide Text: " + activeSlideText);

            var currentUrl = window.location.href;

            // Remove trailing slashes
            currentUrl = currentUrl.replace(/\/+$/, '');

            // Split URL into segments
            var urlSegments = currentUrl.split('/');

            // Find the index of 'review'
            var reviewIndex = urlSegments.indexOf('review');

            if (reviewIndex !== -1) {
                // Handle cases where 'review' is the last segment or followed by a slash
                if (reviewIndex + 1 === urlSegments.length || urlSegments[reviewIndex + 1] === '') {
                    urlSegments[reviewIndex + 1] = activeSlideText;
                } else {
                    urlSegments[reviewIndex + 1] = '' + activeSlideText;
                }

                // Rebuild the new URL
                var baseUrl = urlSegments.slice(0, reviewIndex + 1).join('/');
                var newUrl = baseUrl + '/' + urlSegments.slice(reviewIndex + 1).join('/');

                console.log("New URL: " + newUrl);

                // Update the URL without reloading the page
                history.pushState(null, null, newUrl);
            } else {
                console.log("Review segment not found in the URL.");
            }
        } else {
            console.log("No text found for the active slide.");
        }
    }


    function initializeSwiper() {
        swiper = new Swiper('.swiper-container-re-vi', {
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
            speed: 600, // Adjust speed for smoother transitions
            on: {
                slideChange: function() {
                    checkIfLastSlide(); // Check if the last slide is reached on slide change
                    playActiveSlideVideo(); // Play the video in the active slide
                    // get_url();
                }
            }
        });
    }

    function loadVideos(start, limit, isFirstLoad) {
        if (loadingMoreData) return; // Prevent multiple requests

        loadingMoreData = true; // Set the flag to indicate data is loading
        $.ajax({
            url: "<?php echo base_url('Video/get_videos'); ?>",
            type: "POST",
            data: {
                start: start,
                limit: limit,
                video_start: isFirstLoad ? '<?= $this->uri->segment(3); ?>' : undefined
            },
            success: function(data) {
                if (data.trim() === '') {
                    hasMoreData = false;
                    document.getElementById('nextBtn-re-vi').disabled = true; // Disable "Next" button if no more data
                } else {
                    $('#load-data-video').append(data); // Append new data to the swiper-wrapper
                    swiper.update(); // Update Swiper to reflect new slides
                    handleVideoControls(); // Reapply video controls
                    playActiveSlideVideo(); // Ensure the active slide's video is played
                }

                // Update the flag after the first load
                if (isFirstLoad) {
                    isFirstLoad = false;
                }
                loadingMoreData = false; // Reset the loading flag
            },
            error: function(xhr, status, error) {
                console.error("Error loading data:", status, error);
                alert("Data Gagal Diupload");
                loadingMoreData = false; // Reset the loading flag
            }
        });
    }

    function checkIfLastSlide() {

        if (swiper.isEnd && hasMoreData) {
            start += limit; // Update start index for the next set of data
            loadVideos(start, limit, false); // Load the next set of videos
        }
    }

    function playActiveSlideVideo() {

        const videos = document.querySelectorAll('.video');
        videos.forEach(video => video.pause()); // Pause all videos

        // Find the active slide's video and play it
        const activeSlide = swiper.slides[swiper.activeIndex];
        const activeVideo = activeSlide.querySelector('.video');
        if (activeVideo) {
            activeVideo.play(); // Play video in the active slide
            get_url();
        }
    }

    function handleVideoControls() {
        $('.playPauseBtn').each(function() {
            const playPauseBtn = $(this);
            const video = playPauseBtn.closest('.swiper-slide').find('.video'); // Ensure it targets the correct slide

            playPauseBtn.off('click').on('click', function() {
                if (video.length > 0) {
                    if (video[0].paused) {
                        video[0].play();
                        playPauseBtn.html('<i class="fas fa-pause"></i>');
                    } else {
                        video[0].pause();
                        playPauseBtn.html('<i class="fas fa-play"></i>');
                    }
                } else {
                    console.warn("No video found in the slide.");
                }
            });

            video.off('click').on('click', function() {
                playPauseBtn.click();
            });
        });

        $('.muteBtn').each(function() {
            const muteBtn = $(this);
            const video = muteBtn.closest('.swiper-slide').find('.video'); // Ensure it targets the correct slide

            muteBtn.off('click').on('click', function() {
                if (video.length > 0) {
                    if (video[0].muted) {
                        video[0].muted = false;
                        muteBtn.html('<i class="fas fa-volume-up"></i>');
                    } else {
                        video[0].muted = true;
                        muteBtn.html('<i class="fas fa-volume-mute"></i>');
                    }
                } else {
                    console.warn("No video found in the slide.");
                }
            });
        });

        $('.seekBar').each(function() {
            const seekBar = $(this);
            const video = seekBar.closest('.swiper-slide').find('.video'); // Ensure it targets the correct slide

            if (video.length > 0) {
                video.off('timeupdate').on('timeupdate', function() {
                    const value = (100 / video[0].duration) * video[0].currentTime;
                    seekBar.val(value);
                });

                seekBar.off('input').on('input', function() {
                    const value = seekBar.val();
                    video[0].currentTime = (value / 100) * video[0].duration;
                });
            } else {
                console.warn("No video found in the slide.");
            }
        });
    }

    function setupNavigation() {
        const prevBtn = document.getElementById('prevBtn-re-vi');
        const nextBtn = document.getElementById('nextBtn-re-vi');

        prevBtn.addEventListener('click', () => {
            swiper.slidePrev();
        });

        nextBtn.addEventListener('click', () => {
            if (hasMoreData) {
                start += limit; // Update start index for the next set of data
                loadVideos(start, limit, false); // Load the next set of videos
            }
            swiper.slideNext(); // Navigate to the next slide
        });

        swiper.on('slideChange', () => {
            prevBtn.disabled = swiper.isBeginning;
            nextBtn.disabled = !hasMoreData && swiper.isEnd; // Disable "Next" button only on the last slide if no more data
        });

        prevBtn.disabled = swiper.isBeginning;
        nextBtn.disabled = !hasMoreData;
    }

    function initialize() {
        initializeSwiper(); // Initialize Swiper
        loadVideos(start, limit, isFirstLoad); // Initial data load
        setupNavigation(); // Setup navigation buttons

    }

    initialize();
</script>