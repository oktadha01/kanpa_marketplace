<script>
    // $('#main-page').hide();
    var segment_city = '<?= $this->uri->segment(3); ?>';
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
                console.log("progress" + i);
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


    $(document).ready(function() {
        let dataLoaded = false;

        // Define section ID mapping globally
        const sectionIdMapping = {
            'rumah': 'rumah',
            'perumahan': 'perumahan',
            'apartement': 'apartement',
            'kavling': 'kavling',
            'pilih-city': 'pilih-city'
        };

        function scrollToSection(segment) {
            if (segment) {
                const targetSectionId = sectionIdMapping[segment];

                if (targetSectionId) {
                    const targetElement = document.getElementById(targetSectionId);

                    if (targetElement) {
                        const isMobile = window.innerWidth <= 768;
                        let mobileOffset = 130;
                        let desktopOffset = 60;

                        if (segment_city !== '') {
                            mobileOffset = 180;
                        }

                        const customOffset = isMobile ? mobileOffset : desktopOffset;

                        setTimeout(() => {
                            const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                            const offsetPosition = elementPosition - customOffset;

                            window.scrollTo({
                                top: offsetPosition,
                                behavior: 'smooth'
                            });
                        }, 300); // Delay to allow for rendering
                    }
                }
            }
        }

        function activateMenuItem(segment) {
            const targetId = sectionIdMapping[segment];
            listItems.forEach(item => {
                const itemTarget = item.getAttribute('data-target');
                const icon = item.querySelector('.menu-li-properi');
                if (itemTarget === targetId && icon) {
                    icon.classList.add('active');
                    // if(targetId == 'pilih-city'){
                        
                    // }else{
                        change_url(targetId);
                    //     console.log(targetId);
                    // }
                } else if (icon) {
                    icon.classList.remove('active');
                }
            });
        }

        function load_data_kota() {
            let formData = new FormData();
            formData.append('filter-kota', '<?= $this->uri->segment(3); ?>');
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Dijual/get_kota'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#load-data-kota-bottom').html(data);
                    load_data_properti(segment_city);
                    button_city();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }

        function load_data_properti(segment_city) {
            $.ajax({
                url: "<?php echo base_url('Dijual/get_properti/'); ?>" + segment_city,
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    $('#load-data-rumah').html(response.rumah);
                    $('#load-data-perumahan').html(response.perumahan);
                    $('#load-data-apartement').html(response.apartement);
                    $('#load-data-kavling').html(response.kavling);
                    dataLoaded = true;
                    // Trigger scroll and activate menu item after data is loaded
                    const currentPath = window.location.pathname.split('/');
                    const segment = currentPath[3];
                    if (dataLoaded && segment) {
                        $('#main-page').removeAttr('hidden', true);
                        scrollToSection(segment);
                        activateMenuItem(segment);
                    }
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }

        // Call the initial data loading function
        load_data_kota();

        // Set up scroll event listener to activate menu items based on scroll position
        const listItems = document.querySelectorAll('.li-menu-properti');
        const sections = document.querySelectorAll('section');

        window.addEventListener('scroll', () => {
            if (dataLoaded) {
                sections.forEach(section => {
                    const rect = section.getBoundingClientRect();
                    const targetId = section.getAttribute('id');
                    if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                        activateMenuItem(targetId);
                    }
                });
            }
        });

        listItems.forEach(item => {
            item.addEventListener('click', function() {
                if (dataLoaded) {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        const isMobile = window.innerWidth <= 768;
                        let mobileOffset = 130;
                        let desktopOffset = 60;

                        if (segment_city !== '') {
                            mobileOffset = 180;
                        }

                        const customOffset = isMobile ? mobileOffset : desktopOffset;

                        const elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
                        const offsetPosition = elementPosition - customOffset;

                        window.scrollTo({
                            top: offsetPosition,
                            behavior: 'smooth'
                        });
                        // if (targetId !== 'pilih-city') {
                        //     change_url(targetId);
                        // }

                    }
                }
            });
        });

        function change_url(targetId) {
            var currentUrl = window.location.href;
            var urlSegments = currentUrl.split('/');
            var segmentToReplace = urlSegments[5];
            var newSegment = targetId;
            var newUrl = currentUrl.replace('/' + segmentToReplace + '/', '/' + newSegment + '/');
            history.pushState(null, null, newUrl);
            document.title = "Dijual " + targetId;
        }

        function add_city_url(city) {
            var currentUrl = window.location.href;
            var url = new URL(currentUrl);

            // Update the pathname to include the city directly in the URL path
            url.pathname = url.pathname.replace(/\/$/, '') + '/' + city; // Ensure no trailing slash before appending city

            // Push the updated URL without reloading the page
            history.pushState(null, null, url.toString());

            // Optionally update the document title
            document.title = "Dijual " + city;
        }


        function button_city() {
            $('.li-city').on('click', function() {
                segment_city = $(this).data('city');

                load_data_properti(segment_city);
                const currentPath = window.location.pathname.split('/');
                const segment = currentPath[3];
                const targetElement = $('#' + segment);
                const city = segment_city;
                console.log(segment);
                console.log(segment_city);
                add_city_url(city);
                if (targetElement.length) {
                    // Determine if the device is mobile or desktop based on window width
                    const isMobile = $(window).width() <= 768;
                    const customOffset = isMobile ? 160 : 100;

                    // Calculate the exact scroll position
                    const elementPosition = targetElement.offset().top;
                    const offsetPosition = elementPosition - customOffset;

                    // Scroll to the calculated position with smooth behavior
                    $('html, body').animate({
                        scrollTop: offsetPosition
                    }, 100); // 600ms duration for smooth scroll
                }
            });
        }
    });
</script>