<style>
    @-webkit-keyframes movingTab {
        0% {
            transform: translateX(0%);
        }

        50% {
            transform: translateX(-10%);
        }

        100% {
            transform: translateX(0%);
        }
    }

    @keyframes movingTab {
        0% {
            transform: translateX(0%);
        }

        50% {
            transform: translateX(-10%);
        }

        100% {
            transform: translateX(0%);
        }
    }

    a {
        text-decoration: none;
    }

    /* main {
        margin: 50px;
    } */

    ul {
        margin: 0;
        padding: 0;
    }

    /* .tabs {
        width: 850px;
        margin: auto;
    } */

    .tabs .tabs--list {
        display: block;
        margin: auto;
        position: relative;
        background-color: #e9e9e9;
        border-radius: 8px;
    }

    .tabs .tabs--list li {
        display: inline-block;
        vertical-align: middle;
        width: 25%;
        position: relative;
        z-index: 2;
    }

    .tabs .tabs--list li a {
        display: block;
        padding: 8px 6px;
        font-size: 15px;
        line-height: 26px;
        color: #636363;
        transition: color ease 0.7s, box-shadow 0.5s;
        text-align: center;
    }

    .tabs .tabs--list li a.actived {
        color: #ffffff;
    }

    .tabs .tabs--list li a.actived:hover {
        box-shadow: none;
    }

    .tabs .tabs--list li a:hover {
        box-shadow: 0 24px 18px -15px rgba(0, 0, 0, 0.09);
    }

    .tabs .tabs--list li.moving-tab {
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        height: 110%;
        top: -5%;
        background-color: #3c5794;
        /* box-shadow: 0 24px 18px -15px rgba(117, 60, 148, 0.45); */
        transition: left 0.7s, box-shadow 0.5s;
        z-index: 1;
        border-radius: 8px;
    }

    .tabs .tabs--list li.moving-tab:hover {
        box-shadow: 0 24px 18px -15px rgba(117, 60, 148, 0.65);
    }

    .tabs .tabs--list li.moving-tab--interaction {
        animation: movingTab 0.4s forwards;
        transition: left 0.4s cubic-bezier(0.29, 1.42, 0.79, 1);
    }

    .tabs .tabs--content {
        text-align: left;
        /* padding: 35px 25px; */
    }

    .tabs .tabs--content li {
        display: none;
    }

    .tabs .tabs--content li.actived {
        display: block;
    }


    .ginner-container-cus {
        height: 55rem !important;
        max-width: 100% !important;
    }

    .gslide-external {
        max-height: max-content;
    }

    .pr-0 {
        padding-right: 0;
    }

    .mr-0 {
        margin-right: 0;
    }

    .wafixed {
        position: fixed;
        margin-left: 1rem;
        bottom: 0px;
        z-index: 999;
    }

    .cards .card-user {
        background: #ffffff;
        width: -webkit-fill-available;
        display: inline-flex;
        align-items: center;
        padding: 0px 5px;
        /* opacity: 0; */
        /* pointer-events: none; */
        position: relative;
        justify-content: space-between;
        border-radius: 100px 45px 45px 100px;
        /* animation: animate 15s linear infinite; */
        /* animation-delay: calc(3s * var(--delay)); */
        margin: 19px 7px;
        box-shadow: 0px 0px 5px rgb(0 0 0 / 20%);

    }



    .card-user .content {
        display: flex;
        align-items: center;
        margin-right: 6px;
    }

    .cards .card-user .img {
        height: 59px;
        width: 59px;
        position: absolute;
        left: -5px;
        background: #fff;
        border-radius: 50%;
        padding: 5px;
        box-shadow: 0px 0px 5px rgb(0 0 0 / 20%);
    }

    .card-user .img img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .card-user .details {
        margin: 1px 59px;
    }

    @media (max-width: 425px) {
        .card-user .details {
            margin: 12px 47px 0px 88px !important;
        }
    }

    @media (max-width: 768px) {
        .card-user .details {
            margin: 1px 59px !important;
        }
    }


    .details span {
        font-weight: bold;
        font-size: 15px;
    }

    .card-user a {
        text-decoration: none;
        padding: 2px 5px;
        border-radius: 9px;
        color: #fff;
        background: linear-gradient(to bottom, #92ff86 0%, #44edd4 100%);
        /* transition: all 0.3s ease; */
    }

    .card-user a:hover {
        transform: scale(0.94);
    }

    .font-marketing {
        z-index: 999;
        position: relative;
        display: block;
        top: 15rem;
    }

    .font-serif {
        font-family: serif;
        font-size: 1rem;
        margin-bottom: 0;
    }

    @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap");

    * {
        font-family: "Quicksand", sans-serif;
    }

    .fade {
        animation: fade 0.3s ease;
    }

    @keyframes fade {
        from {
            opacity: 0;
        }
    }

    .gallery {
        position: relative;
        display: none;
        padding: 2rem 0;
        background: #0c0b0c;
        backdrop-filter: blur(5px);
        width: 100%;
        height: 100vh;
    }

    .gallery img {
        width: 80%;
        height: 80%;
        display: block;
        margin: auto;
        transition: 0.3s ease;
        object-fit: contain;
    }

    .gallery .gallery__controls {
        width: fit-content;
        margin: auto;
        display: flex;
        margin-top: 15px;
        gap: 1.3rem;
    }

    .gallery .gallery__controls .controls__btn__close {
        position: absolute;
        top: 15px;
        transition: 0.3s linear;
        display: flex;
        justify-content: center;
        align-items: center;
        background: transparent;
        border-radius: 50%;
        padding: 0.3rem 0.954rem;
        border-color: transparent;
        right: 15px;
    }

    .gallery .gallery__controls .controls__btn__close:hover {
        border-color: #ffff;
    }

    .gallery .gallery__controls .controls__btn__close svg {
        width: 24px;
    }

    .gallery .gallery__controls .control__btn {
        transition: 0.3s linear;
        border: solid 1px transparent;
        border-radius: 50%;
        padding: 0.5rem 1rem 0.5rem 0.9rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background: transparent;
    }

    .gallery .gallery__controls .control__btn:hover {
        border-color: #ffff;
    }

    .gallery .gallery__controls .control__btn svg {
        pointer-events: none;
        width: 30px;
    }

    .gallery__container {
        width: 80%;
        max-width: 1500px;
        margin: auto;
    }

    .gallery__container h1 {
        text-align: center;
        font-size: 2rem;
        font-weight: 500;
    }

    .gallery__container .gallery__container__imgs {
        gap: 15px;
        padding: 2.2rem 1rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .gallery__container .gallery__container__imgs img {
        width: 180px;
        height: 210px;
        object-fit: cover;
        flex: 1;
        transition: 0.3s ease;
        border-radius: 15px;
        cursor: pointer;
    }

    .size-logo-voucher {
        width: 20%;
    }

    @media (max-width: 768px) {
        .size-logo-voucher {
            width: 45%;
        }
    }
</style>
<main id="main">
    <section id="" class="pb-4 pt-5rem d-flex align-items-center">
        <div class="" data-aos="fade-up">
            <?php
            foreach ($data_detail_tipe as $data) {
                $id_perum = $data->id_perum;
                $id_tipe = $data->id_tipe;
            ?>
                <div class="row mt-3 mb-3">
                    <center>
                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->logo; ?>" class="logo_perum" alt="">
                    </center>
                </div>
            <?php
            }
            ?>
            <div class="testimonials-slider swiper">
                <div class="swiper-wrapper">

                    <?php
                    $sql = "SELECT * FROM foto, tipe WHERE foto.id_foto_tipe=tipe.id_tipe AND tipe.id_tipe = $id_tipe AND foto.label_foto in ('display', 'interior') ORDER BY  RAND()";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $foto) {
                    ?>
                            <div class="swiper-slide" style="position: relative;">
                                <center>

                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>" class="img-fluid" alt="">
                                    <?php
                                    if ($foto->label_foto == 'display') { ?>
                                        <div class="label-foto-slide">Eksterior <?php echo $data->nm_perum; ?> Tipe <?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?></div>

                                    <?php
                                    } else {
                                    ?>
                                        <div class="label-foto-slide">Interior <?php echo $data->nm_perum; ?> Tipe <?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?></div>
                                    <?php
                                    }
                                    ?>
                                </center>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="p-0">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col">

                    <h1 class="text-center tittle-detail">Keterangan Detail</h1>
                    <?php
                    foreach ($detail_perum as $data) {
                    ?>
                        <p class="text-center" style="font-family: serif;"><?php echo $data->deskripsi; ?></p>
                    <?php
                    }
                    ?>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <section class="p-0">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-6">
                            <h4 class="tittle-detail">Alamat :</h4>
                            <?php
                            foreach ($detail_perum as $data) {
                            ?>
                                <p class="" style="font-family: serif;"><?php echo $data->alamat; ?></p>
                            <?php
                            }
                            ?>

                            <hr>
                        </div>
                        <div class="col-lg-12 col-6">
                            <h4 class="tittle-detail">Sertifikat :</h4>
                            <p class="" style="font-family: serif;">Hak Milik</p>
                            <hr>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="tittle-detail">Fasilitas :</h4>
                    <div class="row">

                        <?php
                        foreach ($detail_fasilitas as $data) {
                        ?>
                            <div class="col-6" style="font-family: serif;">

                                <?php echo $data->nm_fasilitas; ?>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <hr>
                </div>
                <div class="col-lg-5">
                    <h4 class="tittle-detail">Lokasi Terdekat :</h4>
                    <div class="row">

                        <?php
                        foreach ($detail_lokasi_terdekat as $data) {
                        ?>
                            <div class="col-6">

                                <p class="" style="font-family: serif;"><?php echo $data->jarak_lokasi_terdekat; ?> Menit Ke <?php echo $data->nm_lokasi_terdekat; ?></p>
                            </div>

                        <?php
                        }
                        ?>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="p-0 pt-2"> -->
    <div id="detail-tipe"></div>
    <!-- </section> -->
    <section id="voucher" class="p-0 m-2">
        <hr>
        <center>
            <h1 class="text-center tittle-detail">PROMO KHUSUS ANGGOTA KPRI CARUBAN</h1>
        </center>
        <img data-gallery-img src='<?php echo base_url('upload'); ?>/voucher/promo_hrg_caruban.png' class=" img-fluid">
        <hr>
        <div class="" data-aos="fade-up  ">
            <div class="row">
                <?php
                foreach ($data_detail_voucher as $data) { ?>

                    <div class="col-lg-3 col-12">
                        <img data-gallery-img src='<?php echo base_url('upload'); ?>/voucher/<?php echo $data->foto_voucher; ?>' class=" img-fluid">
                        <a href="<?php echo $data->wa_voucher; ?><?php echo $data->nm_voucher; ?>">
                            <button type="button" id="btn-cencel-voucher" class="col-12 btn btn-sm btn-success mt-2" style="background-color: #35c180;border-color: #11d77b; position: relative;bottom: 22px;"><i class="fa-brands fa-whatsapp"></i> Hubungi kami</button>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <section id="" class="contact p-0 mt-5">
        <div class="" data-aos="fade-up">
            <div class="map">
                <?php
                foreach ($detail_perum as $data) {
                    echo $data->map;
                ?>
                    <a href="<?php echo $data->url_map; ?>">
                        <button type="button" id="r" class="col-12 btn btn-sm btn-success mt-2" style="background-color: #35c180;border-color: #11d77b;"><i class="fa-solid fa-location-dot"></i> Kunjungi kami</button>
                    </a>
                <?php } ?>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0907201097357!2d110.39826681509645!3d-7.115485094861684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7089a95628a559%3A0x2f5966fe8e2eb5eb!2sPT%20Kanpa%20(%20Kanzu%20Permai%20Abadi%20)!5e0!3m2!1sid!2sid!4v1672375026580!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </section>
    <section class="row p-2 mr-0" data-aos="fade-up">
        <?php
        foreach ($detail_tipe as $data) {
            $id_tipe = $data->id_tipe;
            if ($data->vr == '') {
            } else {

        ?>
                <div class="col-12 mb-4 pr-0">

                    <section id="id-<?php echo $data->luas_bangunan; ?>" class="onfocus vr-perum">
                        <div class="container">

                            <div class="section-header pb-0">
                                <h1 class="tittle-detail">Vr 360<sup>0</sup> </h1>
                            </div>

                        </div>
                        <div class="container-fluid p-0 ">
                            <div class="row g-0">
                                <?php
                                $sql = "SELECT foto_tipe FROM foto WHERE foto.id_foto_tipe = $id_tipe AND foto.label_foto='display' ORDER BY  RAND()";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $foto) {
                                ?>
                                        <div class="col-12 video-play position-relative img-fluid" style="background: linear-gradient(rgba(var(--color-black-rgb), 0.4), rgba(var(--color-black-rgb), 0.7)), url(<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>) center center no-repeat;     background-size: cover;">
                                    <?php
                                    }
                                }
                                    ?>
                                    <a href="<?php echo base_url('vr'); ?>/<?php echo $data->vr; ?>/index.html" class="glightbox play-btn"></a>
                                        </div>
                                        <!-- <a href="https://vr.kanpa.co.id/<?php echo $data->vr; ?>" class="glightbox play-btn"></a> -->
                            </div>
                        </div>
                    </section>
                </div>
        <?php
            }
        }
        ?>
        <?php
        foreach ($detail_perum as $data) {
            if ($data->video == '') {
            } else {

        ?>
                <div class="col-12 pr-0">
                    <section id="" class="onfocus " data-aos="fade-up">
                        <div class="container">
                            <div class="section-header pb-0">
                                <h1 class="tittle-detail">Video Perumahan <?php echo $data->nm_perum; ?></h1>
                            </div>
                        </div>
                        <div class="container-fluid p-0 ">
                            <div class="row g-0">
                                <div class="col-12 video-play position-relative img-fluid" style="background: linear-gradient(rgba(var(--color-black-rgb), 0.4), rgba(var(--color-black-rgb), 0.7)), url(<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>) center center no-repeat;     background-size: cover;">
                                    <a href="<?php echo $data->video; ?>" class="glightbox play-btn"></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        <?php
            }
        }
        ?>
    </section>
    <div id="cs" class="wafixed cards">
        <a href="#voucher" class="wa">
            <img src="<?php echo base_url('upload'); ?>/voucher/logovouchermadiun.png" class=" img-fluid size-logo-voucher">
        </a>
    </div>

    <input type="text" id="nm-perum" value="<?php echo preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3)); ?>" hidden>
    <input type="text" id="luas-bangunan" value="<?php echo $this->uri->segment(5); ?>" hidden>
    <input type="text" id="luas-tanah" value="<?php echo $this->uri->segment(6); ?>" hidden>
</main>