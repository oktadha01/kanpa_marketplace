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
</style>
<main id="main">
    <section id="" class="pb-4 pt-5rem d-flex align-items-center">
        <div class="" data-aos="fade-up">
            <?php
            foreach ($detail_perum as $data) {
                $id_perum = $data->id_perum;
            ?>
                <div class="row mt-3 mb-3">
                    <center>
                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->logo; ?>" class="logo_perum" alt="">
                    </center>
                </div>

                <div class="testimonials-slider swiper">
                    <div class="swiper-wrapper">

                        <?php
                        $sql = "SELECT * FROM foto_header WHERE id_foto_perum = $id_perum";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                                if ($foto->kategori_foto == 'perumahan') { ?>
                                    <?php
                                    ?>
                                    <div class="swiper-slide">
                                        <?php
                                        foreach ($detail_marketing as $data) {
                                        ?>
                                            <a href="<?php echo $data->bitly; ?>">
                                                <center>
                                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->header_foto; ?>" class="img-fluid" alt="">
                                                </center>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                } else {
                                }
                                ?>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        $sql = "SELECT * FROM foto_header WHERE id_foto_perum = $id_perum";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                                if ($foto->kategori_foto == 'promo') { ?>
                                    <?php
                                    ?>
                                    <div class="swiper-slide" style="position: relative;">
                                        <a href="<?php echo $foto->text_wa; ?>">
                                            <center>
                                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->header_foto; ?>" class="img-fluid" alt="">
                                            </center>
                                        </a>
                                    </div>
                                <?php
                                } else {
                                }
                                ?>
                        <?php
                            }
                        }
                        ?>
                        <?php
                        $sql = "SELECT * FROM foto_header WHERE id_foto_perum = $id_perum";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $foto) {
                                if ($foto->kategori_foto == 'siteplan') { ?>
                                    <?php
                                    ?>
                                    <div class="swiper-slide" style="position: relative;">
                                        <a href="<?php echo $foto->url_siteplan; ?>">
                                            <center>
                                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->header_foto; ?>" class="img-fluid" alt="">
                                            </center>
                                        </a>
                                    </div>
                                <?php
                                } else {
                                }
                                ?>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php
            }
            ?>
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
                        <center>
                            <p class="text-center" style="font-family: serif;"><?php echo $data->deskripsi; ?></p>
                        </center>
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
    <section class="p-0 pt-2">
        <div class="" data-aos="fade-up">
            <div class="row p-2">
                <div class="tabs">
                    <ul class="tabs--list mb-3">
                        <?php
                        foreach ($detail_tipe as $data) {
                            $id_perum = $data->id_perum;
                            $nm_perum = $data->nm_perum;
                            $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_perum);
                            // echo $tittle;
                            $nm = preg_replace("![^a-z0-9]+!i", " ", $tittle);
                        ?>
                            <li>
                                <a href="javascript:;" id="type-<?php echo $data->luas_bangunan; ?>" class="type" data-nm-perum="<?php echo $data->nm_perum; ?>" data-luas-bangunan="<?php echo $data->luas_bangunan; ?>" data-luas-tanah="<?php echo $data->luas_tanah; ?>" data-url="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?>">Type <?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?></a>
                                <!-- <a href="javascript:;" title="TABS 1" data-content="tabs1" class="actived">TABS 1</a> -->
                            </li>
                        <?php
                        }
                        ?>
                        <li class="moving-tab moving-tab--interaction"></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="p-0 pt-2"> -->
    <div id="detail-tipe"></div>
    <!-- </section> -->
    <section class="row p-2 mr-0" data-aos="fade-up">
        <?php
        foreach ($detail_tipe as $data) {
            $id_tipe = $data->id_tipe;
            if ($data->vr == '') {
            } else {

        ?>
                <div class="col-12 mb-4 pr-0">

                    <section id="id-<?php echo $data->luas_bangunan; ?>" class="onfocus vr-perum" hidden>
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
    </section>

    <section id="" class="contact p-0 mt-5">
        <div class="" data-aos="fade-up">
            <div class="map">
                <?php
                foreach ($detail_perum as $data) {
                    echo $data->map;
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    foreach ($detail_marketing as $data) {
    ?>
        <div class="wafixed cards">
            <div class="card-user">
                <div class="content">

                    <div class="img"><img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>"></div>
                    <div class="details">
                        <span class="name font-serif">Contac Us Marketing</span>
                        <p class="font-serif"><?php echo $data->nm_perum; ?></p>
                    </div>
                </div>
                <a href="<?php echo $data->bitly; ?>" class="wa">
                    <i class="fa-brands fa-whatsapp" style="font-size: 33px;"></i>
                </a>
            </div>
        </div>
        <input type="text" id="id-marketing" value="<?php echo $data->id_marketing; ?>" hidden>

    <?php
    }
    ?>
    <?php
    foreach ($detail_cs as $data) {
    ?>
        <div id="cs" class="wafixed cards">
            <div class="card-user">
                <div class="content">
                    <div class="img"><img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>"></div>
                    <div class="details">
                        <span class="name font-serif">Contac Us Marketing</span>
                        <p class="font-serif"><?php echo $data->nm_marketing; ?></p>
                    </div>
                </div>
                <a href="<?php echo $data->bitly; ?>" class="wa">
                    <i class="fa-brands fa-whatsapp" style="font-size: 33px;"></i>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
    <input type="text" id="nm-perum" value="<?php echo preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3)); ?>" hidden>
    <input type="text" id="luas-bangunan" value="<?php echo $this->uri->segment(5); ?>" hidden>
    <input type="text" id="luas-tanah" value="<?php echo $this->uri->segment(6); ?>" hidden>
</main>
<!-- Google tag (gtag.js) -->