<script>
    var swiper = new Swiper('.swiper', {
        loop: true,
        watchSlidesProgress: true,
        autoplay: {
            delay: 3000
        },
        pagination: {
            el: '.swiper-pagination',
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        on: {
            slideChangeTransitionEnd: function(s) {
                var i = s.progress;
                var params = s.params;
                // console.log("progress" + i);
                if (i >= 1) {
                    swiper.destroy(false, false);
                    params.autoplay = false;
                    swiper = new Swiper('.swiper', params);
                }
            }
        }
    });

    const initSlider = () => {
        const sliderWrappers = document.querySelectorAll(".slider-wrapper");

        sliderWrappers.forEach(wrapper => {
            const imageList = wrapper.querySelector(".image-list");
            const prevButton = wrapper.querySelector(".prev-slide");
            const nextButton = wrapper.querySelector(".next-slide");
            const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

            prevButton.addEventListener("click", () => {
                imageList.scrollBy({
                    left: -imageList.clientWidth,
                    behavior: "smooth"
                });
            });

            nextButton.addEventListener("click", () => {
                imageList.scrollBy({
                    left: imageList.clientWidth,
                    behavior: "smooth"
                });
            });

            const handleSlideButtons = () => {
                prevButton.style.display = imageList.scrollLeft <= 0 ? "none" : "block";
                nextButton.style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "block";
            };

            imageList.addEventListener("scroll", () => {
                handleSlideButtons();
            });

            // Initial button state
            handleSlideButtons();
        });
    };

    // Initialize the slider after DOM content is fully loaded
    document.addEventListener("DOMContentLoaded", initSlider);

    window.addEventListener("resize", initSlider);
    window.addEventListener("load", initSlider);

    // document.getElementById('play-button').addEventListener('click', function() {
    $('.btn-play').click(function() {
        var button = $(this);
        var video = button.siblings('video')[0];

        // Pause all other videos
        $('.video').each(function() {
            var currentVideo = this;
            if (currentVideo !== video) {
                currentVideo.pause();
                $(currentVideo).siblings('.btn-play').html('<i class="fa-solid fa-play"></i>');
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
<script>
    $(document).ready(function() {
        let start = 0; // Starting index
        let limit = window.innerWidth <= 768 ? 4 : 5; // Set initial limit based on screen size mobile 4 dekstop 5
        let lastLoadedStart = 0;

        // Initial load of data
        load_data_properti(start, limit);

        // Event listener for the "Lihat Selanjutnya" button
        $('.row-btn-vw-next').on('click', function(e) {
            e.preventDefault(); // Prevent default link behavior
            lastLoadedStart = start; // Store the last loaded start index
            start += limit; // Update start index
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
                    if (start === lastLoadedStart) {
                        $('#load-data-properti-populer').html(data); // Load initial data
                    } else {
                        $('#load-data-properti-populer').append(data); // Append new data
                    }
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
    });
</script>