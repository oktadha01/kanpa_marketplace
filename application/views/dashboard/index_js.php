<script>
    $(document).ready(function() {
        let start = 0; // Starting index
        let limit = window.innerWidth <= 768 ? 4 : 5; // Set initial limit based on screen size mobile 4 dekstop 5
        let device = window.innerWidth <= 768 ? 'mobile' : 'dekstop'; // Set initial limit based on screen size mobile  dekstop 5
        // let device = 'mobile'; // Set initial limit based on screen size mobile 4 dekstop 5
        let lastLoadedStart = 0;

        // Initial load of data
        load_data_banner_properti(device);
        load_data_properti(start, limit);
        load_data_video_properti(start, limit);
        // Event listener for the "Lihat Selanjutnya" button
        $('.row-btn-vw-next, .next-slide').on('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            lastLoadedStart = start; // Store the last loaded start index
            start = start + limit; // Update start index
            load_data_properti(start, limit); // Load more data
        });

        // Function to load data, with an option to append new items
        function load_data_properti(start, limit) {
            $.ajax({
                url: "<?php echo base_url('Dashboard/properti_populer'); ?>",
                type: "POST",
                data: {
                    start: start,
                    limit: limit
                },
                success: function(data) {
                    if (data == 'No more data available') {

                    } else {
                        if (start === lastLoadedStart) {
                            $('#load-data-properti-populer').html(data); // Load initial data
                        } else {
                            $('#load-data-properti-populer').append(data); // Append new data
                            console.log('load')
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", status, error);
                    alert("Data Gagal Diupload");
                }
            });
        }

        function load_data_video_properti(start, limit) {
            $.ajax({
                url: "<?php echo base_url('Dashboard/get_videos'); ?>",
                type: "POST",
                data: {
                    start: start,
                    limit: limit
                },
                success: function(data) {
                    if (start === lastLoadedStart) {
                        $('#load-data-video-populer').html(data); // Load initial data
                    } else {
                        $('#load-data-video-populer').append(data); // Append new data
                    }
                    play_videos();
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", status, error);
                    alert("Data Gagal Diupload");
                }
            });
        }

        // Optional: Add a window resize event listener if you need to adjust the limit dynamically
        $(window).resize(function() {
            limit = window.innerWidth <= 768 ? 2 : 1;
        });

        // alert(device);
        function load_data_banner_properti(device) {

            $.ajax({
                url: "<?php echo base_url('Dashboard/get_banner'); ?>",
                method: "POST",
                data: {
                    device: device
                },
                dataType: "json",
                success: function(response) {
                    // alert(response.device);
                    // Populate the banner sections with the response data
                    $('#banner-full').html(response.banner_full);
                    $('#banner-singel').html(response.banner_singel);
                    $('#banner-split').html(response.banner_split);
                    if (swiper && typeof swiper.update === 'function') {
                        swiper.update();
                    } else {
                        console.error('Swiper instance not found or not initialized.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading data:", status, error);
                    alert("Data Gagal Diupload");
                }
            });
        }

        // Function to load map colors
        function loadMapColors(id_prov) {
            setTimeout(function() {
                var map = $('.cls-2');
                var data = new FormData();
                var param = [];

                for (var i = 0; i < map.length; i++) {
                    if (map[i].id) {
                        param[i] = map[i].id;
                        data.append('id[]', map[i].id);
                    }
                }
                $.ajax({
                    url: "<?php echo base_url('Maps/allColor'); ?>",
                    data: data,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        for (var i = 0; i < data.results.length; i++) {
                            var path = data.results[i];
                            var element = $(`#${path.code}`);
                            element.css('fill', path.color);
                        }
                    }
                });
            }, 2000);
        }

        $('.map-btn').on('click', function() {
            $('.map-btn').removeClass('active');
            $('.tab-pane').removeClass('show active').html('');

            $(this).addClass('active');

            var mapId = $(this).data('id');
            var id_prov = $(this).data('id_prov');

            var targetTab = $(`#map-${mapId}`);
            targetTab.addClass('show active');

            $.ajax({
                url: '<?php echo base_url('Maps/get_map'); ?>',
                type: 'POST',
                data: {
                    id: mapId,
                    id_prov: id_prov
                },
                success: function(response) {
                    var data;
                    try {
                        data = JSON.parse(response);
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                        return;
                    }

                    if (data.error) {
                        targetTab.html(`
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        ${data.error}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
                    } else {
                        var svgMap = data.svg_map;
                        targetTab.html(svgMap);
                        loadMapColors(id_prov);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan:', error);
                    targetTab.html(`
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Terjadi kesalahan saat mengambil data.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `);
                }
            });
        });

        $('.map-btn.active').trigger('click');

    });


    // function initSwiperAndSlider() {
    // Initialize Swiper with slides per view
    var swiper = new Swiper('.swiper', {
        loop: true, // Enable looping
        watchSlidesProgress: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false, // Continue autoplay after interaction
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true, // Make pagination bullets clickable
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
            draggable: true, // Make scrollbar draggable
        },
        slidesPerView: 1, // Show 1 slide per view
        spaceBetween: 10, // Space between slides
        loopAdditionalSlides: 5, // Increase this to match the number of slides per view
        centeredSlides: true, // Center the active slide
        speed: 500, // Control the transition speed
    });

    // Ensure Swiper is updated when new slides are loaded dynamically
    function updateSwiper() {
        setTimeout(function() {
            swiper.update(); // Recalculate Swiper after new slides are added
        }, 100); // Small delay to ensure DOM is ready
    }

    // Example function to load new data and update swiper
    function loadNewSlides() {
        // Simulate loading new slides dynamically
        $('#swiper-container').append('<div class="swiper-slide">New Slide</div>');
        updateSwiper(); // Call update after appending new slides
    }

    // Initialize manual scroll per 4 images
    const initManualSlider = () => {
        const sliderWrappers = document.querySelectorAll(".slider-wrapper");
        sliderWrappers.forEach(wrapper => {
            const imageList = wrapper.querySelector(".image-list");
            const prevButton = wrapper.querySelector(".prev-slide");
            const nextButton = wrapper.querySelector(".next-slide");
            const imageItems = imageList.querySelectorAll('.img-item');

            if (!imageItems.length) {
                console.error("No image items found in the list.");
                return;
            }

            const getVisibleItems = () => {
                const imageWidth = imageItems[0].clientWidth;
                return imageWidth > 0 ? Math.floor(imageList.clientWidth / imageWidth) : 4;
            };

            const updateSlideWidth = () => {
                const visibleItems = getVisibleItems();
                return imageList.clientWidth / visibleItems;
            };

            let slideWidth = updateSlideWidth();

            window.addEventListener('resize', () => {
                slideWidth = updateSlideWidth();
            });

            prevButton.addEventListener("click", () => {
                imageList.scrollBy({
                    left: -slideWidth * 4,
                    behavior: "smooth",
                });
            });

            nextButton.addEventListener("click", () => {
                imageList.scrollBy({
                    left: slideWidth * 4,
                    behavior: "smooth",
                });
            });

            const handleSlideButtons = () => {
                const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;
                prevButton.style.display = imageList.scrollLeft <= 0 ? "none" : "block";
                nextButton.style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
            };

            imageList.addEventListener("scroll", handleSlideButtons);
            nextButton.style.display = "block";
        });
    };

    document.addEventListener("DOMContentLoaded", initManualSlider);
    window.addEventListener("resize", initManualSlider);
    window.addEventListener("load", initManualSlider);
    // }

    // Call the function to initialize Swiper and manual slider
    // initSwiperAndSlider();



    // document.getElementById('play-button').addEventListener('click', function() {
    function play_videos() {

        $('.btn-play').click(function() {
            var button = $(this);
            var video = button.siblings('a').find('video')[0]; // Adjusting to find the video inside the anchor tag

            // Pause all other videos
            $('.video').each(function() {
                var currentVideo = this;
                if (currentVideo !== video) {
                    currentVideo.pause();
                    $(currentVideo).closest('.reel__content').find('.btn-play').html('<i class="fa-solid fa-play"></i>');
                }
            });

            // Play or pause the selected video
            if (video.paused) {
                video.play();
                button.html('<i class="fa-solid fa-pause"></i>');
            } else {
                video.pause();
                button.html('<i class="fa-solid fa-play"></i>');
            }
        });

    }
    $("#select-transaksi").select2({
        placeholder: "Pilih transaksi",
        allowClear: true
    });
    $("#select-tipe").select2({
        placeholder: "Pilih tipe",
        allowClear: true
    });
    $("#select-sertifikat").select2({
        placeholder: "Pilih sertifikat",
        allowClear: true
    });
    $("#select-provinsi").select2({
        placeholder: "Pilih provinsi",
        allowClear: true
    });
    $("#select-kota").select2({
        placeholder: "Pilih kota",
        allowClear: true
    });
    $("#select-lokasi").select2({
        placeholder: "Pilih lokasi",
        allowClear: true
    });
    $("#select-km-tidur").select2({
        placeholder: "Jumlah Kamar Tidur",
        allowClear: true
    });
    $("#select-km-mandi").select2({
        placeholder: "Jumlah Kamar Mandi",
        allowClear: true
    });
</script>