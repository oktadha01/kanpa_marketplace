<style>
    /* img view */
    #foto-main,
    #thumbnails img {
        /* box-shadow: 2px 2px 10px 5px #b8b8b8; */
        border-radius: 10px;
    }

    * {
        transition: all 0.5s ease;
    }

    #thumbnails {
        text-align: center;
    }

    #thumbnails img {
        width: 100px;
        height: auto;
        margin: 10px;
        cursor: pointer;
    }

    .preview-denah {
        width: 50%;
    }

    @media only screen and (max-width: 480px) {
        #thumbnails img {
            width: 50px;
            height: 50px;
        }
    }

    #thumbnails img:hover {
        transform: scale(1.05);
    }

    /* #foto-main {
        width: 50%;
        height: 400px;
        object-fit: cover;
        display: block;
        margin: 20px auto;
    } */
    .denah-mobile {
        display: none;
    }

    @media only screen and (max-width: 480px) {
        .denah-mobile {
            display: block;
        }

        #foto-main {
            width: 100%;
        }

        .preview-denah {
            width: 100%;
        }

        .denah-dekstop {
            display: none;
        }
    }

    .hidden {
        opacity: 0;
    }

    /* body {
        display: flex;
        max-width: 100vw;
        padding: 0px 59px;
        height: 100vh;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    } */

    #scroling {
        width: 100%;
    }

    .outer-wrapper {
        max-width: 100vw;
        overflow-x: scroll;
        position: relative;
        scrollbar-color: #d5ac68 #f1db9d;
        scrollbar-width: thin;
        -ms-overflow-style: none;
    }

    .pseduo-track {
        background-color: #212529;
        height: 2px;
        width: 100%;
        position: relative;
        top: -3px;
        z-index: -10;
    }

    /* @media (any-hover: none) {
        .pseduo-track {
            display: none;
        }
    } */
    .pseduo-track {
        display: none;
    }

    @media only screen and (max-width: 480px) {
        /* .pseduo-track {
            display: block;
        } */
    }

    .outer-wrapper::-webkit-scrollbar {
        height: 5px;
    }

    /* .outer-wrapper::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 0px rgba(0, 0, 0, 0);
    } */

    .outer-wrapper::-webkit-scrollbar-thumb {
        height: 5px;
        background-color: #05488a;
    }

    .outer-wrapper::-webkit-scrollbar-thumb:hover {
        background-color: #05488a;
    }

    .outer-wrapper::-webkit-scrollbar:vertical {
        display: none;
    }

    .inner-wrapper {
        display: flex;
        padding-bottom: 10px;
        justify-content: space-between;
    }

    .pseudo-item {
        margin-right: 5px;
        flex-shrink: 0;
    }

    /* .pseudo-item:nth-of-type(2n) {
        background-color: lightgray;
    } */

    .bg-detail-hrg {
        background: #8080800d;
        padding: 8px;
        border-radius: 5px;
    }
</style>


<section class="p-0 pt-2">
    <div class="bg-detail-hrg container" data-aos="fade-left">
        <!-- <hr> -->
        <?php
        foreach ($data_detail_tipe as $data) {
        ?>
            <div class="row">
                <div class="col-4">
                    <a class="btn-hrg-dash" href="" style="font-family: serif;font-weight: bold;">Rp <?php echo $data->hrg; ?> <sub><?php echo $data->satuan_hrg; ?></sub></a>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 col-md-4 col-12" style="font-family: serif;font-weight: bold;">
                    <p> *Luas Bangunan : <?php echo $data->luas_bangunan; ?>m <sup>2</sup> </p>
                </div>
                <div class="col-lg-4 col-md-4 col-12" style="font-family: serif;font-weight: bold;">
                    <p> *Luas Tanah : <?php echo $data->luas_tanah; ?>m <sup>2</sup> </p>

                </div>
                <div class="col-lg-4 col-md-4 col-12" style="font-family: serif;font-weight: bold;">
                    <p> *<?php echo $data->lantai; ?> Lantai</p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<section class="p-0 pt-2">
    <div class="" data-aos="fade-up">
        <!-- <hr> -->
        <div class="row denah-dekstop">
            <?php
            foreach ($data_detail_tipe as $data) {
                $id_tipe = $data->id_tipe;
                if ($data->denah_lt2 == '') {
            ?>
                    <div class="col">

                        <center>
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt1; ?>" class="img-fluid preview-denah" data-aos="zoom-in" data-aos-delay="200" style="width: 30%;">
                        </center>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-6">
                        <center>
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt1; ?>" data-aos="zoom-in" data-aos-delay="200" class="img-fluid preview-denah" id="">
                        </center>
                    </div>
                    <div class="col-6">
                        <center>
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt2; ?>" data-aos="zoom-in" data-aos-delay="300" class="img-fluid preview-denah" id="">
                        </center>
                    </div>
                <?php
                }
                ?>
            <?php
            }
            ?>

        </div>
        <div class="row denah-mobile">

            <center class="">

                <?php
                foreach ($data_detail_tipe as $data) {
                    $id_tipe = $data->id_tipe;
                ?>
                    <img src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt1; ?>" class="img-fluid preview-denah" id="foto-main" data-aos="zoom-in" data-aos-delay="200">
                <?php
                }
                ?>
            </center>
            <div id="thumbnails">
                <?php
                foreach ($data_detail_tipe as $data) {
                    $id_tipe = $data->id_tipe;
                ?>
                    <?php
                    if ($data->denah_lt2 == '') {
                    } else {
                    ?>
                        <div class="row">
                            <div class="col-6">
                                <img class="denah" src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt1; ?>" data-aos="zoom-in" data-aos-delay="200" style="height: auto;width: 35%;">
                                <h6>Denah LT 1</h6>
                            </div>
                            <div class="col-6">
                                <img class="denah" src="<?php echo base_url('upload'); ?>/<?php echo $data->denah_lt2; ?>" data-aos="zoom-in" data-aos-delay="300" style="height: auto;width: 35%;">
                                <h6>Denah LT 2</h6>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="p-0 pt-2">
    <div id="scroling" class="container p-0" data-aos="fade-up">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                <?php
                foreach ($data_detail_tipe as $data) {
                ?>
                    <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="200">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-taman.png" class="size-ikon-dash img-fluid" alt="">
                        <h6><?php echo $data->taman; ?></h6>
                    </div>
                    <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="300">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-carport.png" class="size-ikon-dash img-fluid" alt="">
                        <h6><?php echo $data->carport; ?></h6>
                    </div>
                    <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="400">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-ru-tamu.png" class="size-ikon-dash img-fluid" alt="">
                        <h6><?php echo $data->r_tamu; ?></h6>
                    </div>
                    <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="500">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-ka-tidur.png" class="size-ikon-dash img-fluid" alt="">
                        <h6><?php echo $data->k_tidur; ?></h6>
                    </div>
                    <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="600">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-ka-mandi.png" class="size-ikon-dash img-fluid" alt="">
                        <h6><?php echo $data->k_mandi; ?></h6>
                    </div>
                    <?php
                    if ($data->dapur == '0') {
                    } else {
                    ?>
                        <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="700">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-dapur.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->dapur; ?></h6>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($data->r_keluarga == '0') {
                    } else {
                    ?>
                        <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="800">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-ru-keluarga.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->r_keluarga; ?></h6>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($data->r_makan == '0') {
                    } else {
                    ?>
                        <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="900">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-ru-makan.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->r_makan; ?></h6>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    if ($data->balkon == '0') {
                    } else {
                    ?>
                        <div class="figure pseudo-item" data-aos="zoom-in" data-aos-delay="1000">
                            <img src="<?php echo base_url('assets'); ?>/img/ikon-detail/ikon-balkon.png" class="size-ikon-dash img-fluid" alt="">
                            <h6><?php echo $data->balkon; ?></h6>
                        </div>
                    <?php
                    }
                    ?>

                <?php
                }
                ?>
            </div>
        </div>
        <div class="pseduo-track"></div>
    </div>
</section>



<script>
    var thumbnails = document.getElementById("thumbnails")
    var imgs = thumbnails.getElementsByTagName("img")
    var main = document.getElementById("foto-main")
    var counter = 0;

    for (let i = 0; i < imgs.length; i++) {
        let img = imgs[i]


        img.addEventListener("click", function() {
            main.src = this.src
        })
    }
    $('.denah').click(function(e) {
        $('.preview-denah').attr({
            src: $(this).attr('src')
        });
    });
</script>