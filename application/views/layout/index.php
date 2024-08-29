<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="google-site-verification" content="Da0TUaYScK7AIiQsOyTgtDTpMIBgIFtz3Gb7zkltBB4" /> -->
    <meta name="google-site-verification" content="7i4MFwx9o5niYM8_5w-uzOuKetBLUFMogGH7c0YpjHY" />
    <meta name="msvalidate.01" content="B36B1215CB3BC26AA0E6851087FF5E2F" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="theme-color" content="#1a44b2"> <!-- Chrome Android -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"> <!-- Safari iOS -->
    <meta name="msapplication-navbutton-color" content="#1a44b2"> <!-- Microsoft Edge -->

    <?php
    $this->load->helper('domain_helper'); // Load the helper
    $company_info = get_company_info($this->db); // Call the helper function

    if ($company_info !== null) {
        $domain = $company_info['domain'];
        $id_company = $company_info['id_company'];
        $nm_company = $company_info['nm_company'];
        $logo_company = $company_info['logo_company'];
    } else {
    }
    ?>

    <!-- Meta untuk SEO -->
    <meta content="index, follow" name="robots">
    <meta content="website" property="og:type">

    <?php if (isset($_description)) { ?>
        <meta content="<?php echo $_description; ?>" name="description">
        <meta content="<?php echo $_description; ?>" name="twitter:description">
    <?php } else { ?>
        <meta name="description" content="Cari Rumah di Semarang di Bawah Rp 200 Jt. Rumah minimalis terjangkau, termurah di semarang Bisa KPR Harga paling murah Lokasi strategis Proses mudah & cepat, perumahan subsidi griya kanzu kleco kaliabu, perumahan subsidi klecorejo kaliabu, rumah subsidi madiun, perumahan subsidi madiun, rumah subsidi klecorejo kaliabu">
        <meta content="Rumah Dijual di Semarang | Harga Terbaru 2024" name="twitter:title" class="">
        <meta content="Rumah Dijual di Semarang. Banyak pilihan ✔ Rentang harga beragam ✔ Desain menarik ✔ Pencarian mudah ✔" name="twitter:description">
    <?php } ?>

    <!-- <meta content="Rumah dijual di Semarang. Banyak pilihan ✔ Rentang harga beragam ✔ Desain menarik ✔ Pencarian mudah ✔" name="description"> -->
    <meta content="@<?= str_replace('.co.id', '', $domain); ?>" name="twitter:site">
    <meta content="@<?= str_replace('.co.id', '', $domain); ?>" name="twitter:creator">
    <meta content="<?= str_replace('.co.id', '', $domain); ?>" property="og:site_name">
    <?php if (isset($_url)) { ?>
        <meta content="<?= $_url; ?>" property="og:url">
    <?php } else { ?>
        <meta content="<?= base_url(); ?>" property="og:url">
    <?php } ?>

    <?php if (isset($_metafoto)) { ?>
        <meta property="og:image" content="<?php echo base_url('upload'); ?>/<?php echo $_metafoto; ?>">
    <?php } else {
    }
    ?>
    <?php if (isset($_keyword)) { ?>
        <meta name="keywords" content="<?= $_keyword; ?>">
    <?php } else { ?>
        <meta name="keywords" content="PT <?= str_replace('.co.id', '', $domain); ?>,PT Kanzu, PT Kanzu Permai Abadi, Kanzu Permai Abadi, <?= str_replace('.co.id', '', $domain); ?>,di jual rumah,rumah murah,perumahan murah,di jual rumah murah,perumahan di semarang, perumahan di kota semarang, perumahan di kab. semarang, perumahan di kabupaten semarang, perumahan di ungaran,perumahan di kab.kendal,perumahan di kabupaten kendal,perumahan di kendal,perumahan di bawen,perumahan di sukoharjo,perumahan di klaten,perumahan di madiun,perumahan di kota madiun,perumahan di caruban,perumahan murah di semarang, perumahan murah di kota semarang, perumahan murah di kab. semarang, perumahan murah di kabupaten semarang, perumahan murah di ungaran, perumahan murah di kab.kendal,perumahan murah di kabupaten kendal,perumahan murah di kendal,perumahan murah di bawen,perumahan murah di sukoharjo,perumahan murah di klaten,perumahan murah di madiun,perumahan murah di kota madiun,perumahan murah di caruban,perumahan murah subsidi, rumah murah di semarang, rumah murah di kota semarang, rumah murah di kab. semarang, rumah murah di kabupaten semarang, rumah murah di ungaran, rumah murah di kab.kendal,rumah murah di kabupaten kendal,rumah murah di kendal,rumah murah di bawen,rumah murah di sukoharjo,rumah murah di klaten,rumah murah di madiun,rumah murah di kota madiun,rumah murah di caruban,rumah murah subsidi, rumah murah komersil, jual rumah murah di semarang, jual rumah murah di kota semarang, jual rumah murah di kab. semarang, jual rumah murah di kabupaten semarang, jual rumah murah di ungaran, jual rumah murah di kab.kendal,jual rumah murah di kabupaten kendal,jual rumah murah di kendal,jual rumah murah di bawen,jual rumah murah di sukoharjo,jual rumah murah di klaten,jual rumah murah di madiun,jual rumah murah di kota madiun,jual rumah murah di caruban,jual rumah murah subsidi, jual rumah murah komersil, di jual rumah murah di semarang, di jual rumah murah di kota semarang, di jual rumah murah di kab. semarang, di jual rumah murah di kabupaten semarang, di jual rumah murah di ungaran, di jual rumah murah di kab.kendal,di jual rumah murah di kabupaten kendal,di jual rumah murah di kendal,di jual rumah murah di bawen,di jual rumah murah di sukoharjo,di jual rumah murah di klaten,di jual rumah murah di madiun,di jual rumah murah di kota madiun,di jual rumah murah di caruban,di jual rumah murah subsidi, di jual rumah murah komersil, perumahan subsidi di sukoharjo,rumah subsidi di sukoharjo,jual rumah subsidi di sukoharjo,di jual rumah subsidi di sukoharjo,perumahan subsidi di klaten,rumah subsidi di klaten,jual rumah subsidi di klaten,di jual rumah subsidi di klaten,perumahan subsidi di caruban,rumah subsidi di caruban,jual rumah subsidi di caruban,di jual rumah subsidi di caruban">
    <?php
    }
    ?>


    <?php if (isset($_title)) { ?>
        <meta content="<?= $_title; ?>" name="twitter:title" class="">
        <title><?= $_title; ?></title>
    <?php } else { ?>
        <title>Rumah Murah di Semarang di Bawah Rp 200 Jt Terlengkap | <?= $domain; ?></title>
    <?php } ?>

    <style>
        .opacity-body {
            margin-top: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 999;
            background: #0000008c;
        }
    </style>
    <!-- Favicons -->
    <link href="<?php echo base_url('assets'); ?>/img/<?= $logo_company; ?>-round.png" rel="icon">

    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Chathura" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Daterangepicker -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?php echo base_url('assets'); ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="<?php echo base_url('assets'); ?>/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="<?php echo base_url('assets'); ?>/css/variables.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('assets'); ?>/css/main.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets'); ?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url('assets'); ?>/css/kanpa.css" rel="stylesheet">

</head>

<body>
    <!-- <div itemprop="image" itemscope="itemscope" itemtype="http://schema.org/ImageObject">
        <meta content="url_gambar" itemprop='url"/>
     </div> -->
    <?php $this->load->view('layout/alert/_alert') ?>
    <?php
    if (isset($_view_login) && !empty($_view_login)) {
        $this->load->view($_view_login);
    } else {

    ?>
        <?php
        include_once 'navbar.php';
        ?>
        <main id="page" class="ml-page">

            <?php
            if (isset($_view) && !empty($_view)) {
                $this->load->view($_view);
                // echo $_view;
                if ($_view == 'produk/produk' or $_view == 'detail/detail' or $_view == 'estimasi_hrg/estimasi_hrg') {

                    // include_once 'best_seller/bs.php';
                    // include_once 'footer.php';
                } else if ($_view == 'dashboard/index' or $_view == 'more_info/more_info') {
                    // include_once 'footer.php';
                } else if ($_view == 'voucher/detail') {
                }
            }
            ?>
            <!-- <button class="js-push-btn" style="display: none;">
                Subscribe Push Messaging
            </button> -->
            <?php
            include_once 'footer.php';
            ?>

        </main>
    <?php
    }
    ?>
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <?php if ($this->session->userdata("privilage") == 'Admin') { ?>
        <button class="btn-pushnotif btn btn-success text-white" data-toggle="modal" data-target="#push-notifikasi"><i class="bi bi-send"></i> Push send notification </button>
        <!-- <div id="preloader"></div> -->
        <!-- Modal -->
        <div class="modal fade" id="push-notifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Push Notification Info</h5>
                        <button type="button" class="close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group mt-2">
                                    <label for="title-notif">Title</label>
                                    <input type="text" id="title-notif" class="form-control" required value="">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="info-notif">Info</label>
                                    <input type="text" id="info-notif" class="form-control" required value="">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="url-notif">URL Link</label>
                                    <input type="text" id="url-notif" class="form-control" required value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btn-send-notif" class="btn btn-primary">Send <i class="bi bi-send"></i></button>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8JB3TCJ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>

    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script> -->
    <!-- Daterangepicker -->
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdn.bootcss.com/html2pdf.js/0.9.1/html2pdf.bundle.js"></script>
    <!-- canva -->

    <script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/daterangepicker.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/select2-4.0.6-rc.1/dist/js/i18n/id.js"></script>

    <script src="<?php echo base_url('assets'); ?>/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- <script src="<?php echo base_url('assets'); ?>/vendor/php-email-form/validate.js"></script> -->
    <!-- Template Main JS File -->
    <script src="<?php echo base_url('assets'); ?>/js/main.js"></script>
    <!-- <script src="<?php echo base_url('assets'); ?>/vendor/pushnotif/pushnotif.js"></script> -->
    <script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script>
        var url_ = '<?php base_url(); ?>';
        $('.btn-pushnotif').click(function() {
            $('#url-notif').val('<?= base_url(); ?>');
        });
        $('#btn-send-notif').click(function() {
            let formData = new FormData();
            formData.append('title-notif', $('#title-notif').val());
            formData.append('info-notif', $('#info-notif').val());
            formData.append('url-notif', $('#url-notif').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Pushnotif/send_notifications'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.title);
                    alert('Notification sent successfully')
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        })
    </script>
    <!-- <script>
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;

        // Windows Phone must come first because its UA also contains "Android"
        if (/windows phone/i.test(userAgent)) {
            console.log("Windows Phone");
            $('.device').text("Windows Phone");
        }

        if (/android/i.test(userAgent)) {
            console.log("Android");
            $('.device').text("Android");
        }

        // iOS detection from: http://stackoverflow.com/a/9039885/177710
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            console.log("iOS");
            $('.device').text("iOS");
        }

        console.log("unknown");
        $('.device').text("unknown");
    </script> -->
    <script>

    </script>
    <?php
    if (isset($_script) && !empty($_script)) {
        $this->load->view($_script);
    } ?>
    <?php if (!$this->session->userdata('is_login')) : ?>
        <script>
            // alert('ya');
            $('#page').removeClass('ml-page');
        </script>
    <?php endif ?>

    <script>
        $(document).ready(function() {
            var newURL = location.href.split("#")[0];
            window.history.pushState('object', document.title, newURL);
            $('.play-btn').click(function(e) {
                $('.ginner-container').addClass('ginner-container-cus')
            });
        });

        $(document).on("click", ".pilih-logo", function() {
            var file = $(this).parents().find(".file-logo");
            file.trigger("click");
            // alert('ya')
        });
        $(document).on("click", ".pilih-denah-lt2", function() {
            var file = $(this).parents().find(".denah-lt2");
            file.trigger("click");
        });
        $(document).on("click", ".pilih-denah-lt1", function() {
            var file = $(this).parents().find(".denah-lt1");
            file.trigger("click");
        });
        $(document).on("click", ".pilih-foto-tipe", function() {
            var file = $(this).parents().find(".foto-tipe");
            file.trigger("click");
        });
        $(document).on("click", ".pilih-foto-voucher", function() {
            var file = $(this).parents().find(".foto-voucher");
            file.trigger("click");
        });
        $(document).on("click", "#upload-ktp", function() {
            // alert('ya');
            var file = $(this).parents().find(".data-file-ktp");
            file.trigger("click");
        });
        $(document).on("click", ".pilih-berita", function() {
            var file = $(this).parents().find(".file-berita");
            file.trigger("click");
            // alert('ya')
        });
        $(document).on("click", ".pilih-berita-other", function() {
            $('#id-data-berita').val($(this).data('id-data-berita'));
            var file = $(this).parents().find(".file-berita-other");
            file.trigger("click");
            // alert('ya')
        });
        $(document).on("click", ".pilih-foto-meta-berita", function() {
            $('#meta-foto').val($(this).data('meta-foto'));
            var file = $(this).parents().find(".file-berita-meta");
            file.trigger("click");
            // alert('ya')
        });
        $(document).on("click", "#btn-add-foto", function() {
            var file = $(this).parents().find(".file-header-perum");
            file.trigger("click");
            // alert('ya')
        });
        $(document).on("click", ".pilih-foto-btn", function() {
            // $('#nm-foto-btn').val($(this).data('foto-btn'));
            var file = $(this).parents().find(".foto-btn");
            file.trigger("click");
            // alert('ya')
        });

        function footerToggle(footerBtn) {
            $(footerBtn).toggleClass("btnActive");
            $(footerBtn).next().toggleClass("active");
        }

        $(".sidebar").hover(function() {
            // alert('ya');
            openNav();
        }, function() {
            closeNav();
        });

        function openNav() {
            document.getElementById("page").style.marginLeft = "226px";
        }

        function closeNav() {
            document.getElementById("page").style.marginLeft = "74px";
        }
        $(function() {
            var url = window.location.href;

            // passes on every "a" tag
            $("#navbar a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest(".sidebar__nav__link").addClass("sidebar-active");
                }
            });
            // this will get the full URL at the address bar
        });
        $(function() {
            var url = window.location.href;

            // passes on every "a" tag
            $("#tag a").each(function() {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest(".btn-tag").addClass("tag-active");
                }
            });
            // this will get the full URL at the address bar
        });
        // var prevScrollpos = window.pageYOffset;
        // window.onscroll = function() {
        //     var currentScrollPos = window.pageYOffset;
        //     if (prevScrollpos > currentScrollPos) {
        //         document.getElementById("header").style.top = "0";
        //     } else {
        //         document.getElementById("header").style.top = "-50px";
        //     }
        //     prevScrollpos = currentScrollPos;
        // }
    </script>

</body>

</html>