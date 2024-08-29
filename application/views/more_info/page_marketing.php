<style>
    body {
        background: #111e48;
    }

    .poster {
        position: relative;
        /* text-align: center; */
        color: white;
    }

    .bottom-left {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }

    .top-left {
        position: absolute;
        top: 117px;
        left: 83px;
        font-size: 30px;
    }

    .text-bold {
        font-size: 46px;
        font-weight: bold;
    }

    .border-text-bio {
        background: #f0f8ff96;
        border-radius: 20px;
        padding: 0px 11px;
        font-size: 20px;
        width: fit-content;
        margin-top: 2rem;
        margin-bottom: 12px;


    }

    .border-bg-hallo {
        background: #111e48;
        border-radius: 25px;
        padding: 0px 13px;
        margin-right: 5px;
        font-size: 20px;
    }

    .font-monospace {
        font-family: monospace;
    }

    .font-cursive {
        font-family: cursive;
    }

    .ml {
        margin-left: 27px;
    }

    .text-klik-wa {
        font-size: 21px;
        font-weight: bold;
        font-family: inherit;
    }

    .border-btn-wa {
        display: inline-flex;
        color: aliceblue;
        background: #35a010;
        max-width: fit-content;
        height: 75px;
        border-radius: 2rem;
        border-bottom-left-radius: 2rem;
        border-top-left-radius: 3rem;
        border-bottom-style: outset;
    }

    .size-icon-wa {
        font-size: 5rem;
    }

    .text-klik-disini {
        font-size: 10px;
        font-weight: bold;
    }

    .text-via-wa {
        font-size: 15px;
    }

    .text-wa {
        margin-left: 2px;
        text-align-last: center;
        padding: 11px 9px;
    }

    .font-size-12px {
        font-size: 31px;
        /* font-weight: bold; */
        font-family: 'Poppins';
    }

    .ul-list {
        width: 32rem;
        left: 29%;
        position: relative;
    }

    li {
        font-family: 'Poppins';
    }

    .border-orange {
        background: #f45b26;
        width: fit-content;
        padding: 9px 12px;
        border-radius: 16px;
    }

    .border-more-photos {
        border: 1px solid;
        padding: 3px 11px;
        border-radius: 10px;
        cursor: pointer;
    }

    .overflow-grid {
        overflow: auto;
        max-height: 51rem;
    }

    @media screen and (min-width: 320px) and (orientation : portrait) {
        .top-left {
            position: absolute;
            top: 24px;
            left: 7px;
            font-size: 12px;
        }

        .text-bold {
            font-size: 16px;
            font-weight: bold;
        }

        .border-text-bio {
            background: #f0f8ff96;
            border-radius: 20px;
            padding: 0px 11px;
            font-size: 7px;
            width: fit-content;
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .border-bg-hallo {
            background: #111e48;
            border-radius: 25px;
            padding: 0px 13px;
            margin-right: 5px;
            font-size: 7px;
        }

        .ml {
            margin-left: 0px;
        }

        h5 {
            font-size: 9px;
            margin-bottom: 1px
        }

        .mt-5 {
            margin-top: 0 !important;
        }

        .text-klik-wa {
            font-size: 10px;
            font-weight: bold;
            font-family: inherit;
        }

        .border-btn-wa {
            display: inline-flex;
            color: aliceblue;
            background: #35a010;
            max-width: fit-content;
            height: 32px;
            border-radius: 3rem;
            border-bottom-left-radius: 3rem;
            border-top-left-radius: 3rem;
            border-bottom-style: outset;
        }

        .size-icon-wa {
            font-size: 2rem;
        }

        .text-klik-disini {
            font-size: 7px;
            font-weight: bold;
        }

        .text-via-wa {
            font-size: 7px;
        }

        .text-wa {
            margin-left: 0px;
            text-align-last: center;
            padding: 2px 11px;

        }

        .font-size-12px {
            font-size: 12px;
            font-weight: bold;
        }

        .ul-list {
            width: 17rem;
            left: 20%;
            position: relative;
            font-size: 8px;
        }

        .border-orange {
            background: #f45b26;
            width: fit-content;
            padding: 9px 12px;
            border-radius: 16px;
            font-size: 9px;
        }

        .font-size-xx-small {
            font-size: xx-small;
        }

        .overflow-grid {
            overflow: auto;
            max-height: 17rem;
        }
    }

    @media only screen and (max-width: 1024px) and (orientation : landscape) {
        .top-left {
            position: absolute;
            top: 66px;
            left: 35px;
            font-size: 20px;
        }

        .text-bold {
            font-size: 31px;
            font-weight: bold;
        }

        .border-text-bio {
            background: #f0f8ff96;
            border-radius: 20px;
            padding: 0px 11px;
            font-size: 15px;
            width: fit-content;
            margin-top: 27px;
            margin-bottom: 12px;
        }

        .border-bg-hallo {
            background: #111e48;
            border-radius: 25px;
            padding: 0px 13px;
            margin-right: 5px;
            font-size: 15px;
        }

        .ml {
            margin-left: 20px;
        }

        h5 {
            font-size: 1rem;
            margin-bottom: 1px
        }

        .mt-5 {
            margin-top: 1rem !important;
        }

        .font-size-12px {
            font-size: 21px;
            font-weight: bold;
        }

        .ul-list {
            width: 26rem;
            left: 25%;
            position: relative;
            font-size: 13px;
        }

        .font-size-xx-small {
            font-size: medium;
        }

        .overflow-grid {
            overflow: auto;
            max-height: 24rem;
        }
    }
</style>
<?php
foreach ($data_detail_cs as $data) :
    $id_marketing = $data->id_marketing;
?>
    <section id="" class="p-0" style="margin-top: 4rem;">
        <div class="poster">
            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_header; ?>" alt="" class="img-fluid">
            <!-- <img src="<?php echo base_url('upload'); ?>/restuuu.jpg " alt="" class="img-fluid"> -->
            <div class="top-left">
                <span class="font-cursive">Wujudkan Rumah Impian Anda Menjadi kenyataan</span>
                <br>
                <span class="text-bold">Selamat Datang</span>
                <br>
                <span class="text-bold">DI PT KANZU PERMAI ABADI</span>
                <br>
                <div class="ml">

                    <div class="border-text-bio ">
                        <span class="border-bg-hallo font-monospace">Hallo..</span><span class="font-monospace" style="color: #ffffffc2;">Perkenalkan Nama Saya </span><span class="font-monospace" style="font-weight: bold; text-transform: uppercase;"> <?php echo $data->nm_marketing; ?></span>
                    </div>
                    <h5 class="font-monospace">Saya sebagai</h5>
                    <!-- <br> -->
                    <h5 class="font-monospace">Sales Marketing yang siap membantu </h5>
                    <!-- <br> -->
                    <h5 class="font-monospace"> untuk memberikan informasi perumahan </h5>
                    <!-- <br> -->
                    <h5 class="font-monospace"> yang sedang anda butuhkan.</h5>
                    <div class="mt-5">
                        <span class="text-klik-wa">Silahkan Klik WA saya disini.</span>
                    </div>
                    <div class="mt-2">
                        <a href="<?php echo $data->bitly; ?>">
                            <!-- <button> -->
                            <span class="border-btn-wa">
                                <i class="fa-brands fa-whatsapp fa-beat-fade mr-3 size-icon-wa"></i>
                                <span class="text-wa">
                                    <p class="mb-0 text-klik-wa">KLIK DI SINI</p>
                                    <p class="mb-0 text-via-wa">menghubungi kami via whatsapp</p>
                                </span>
                            </span>
                            <!-- </button> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-4" style="background: #111e48;height: auto;">
            <div class="container">
                <div class="row overflow-grid" style="margin: 0px 2px;">
                    <?php
                    foreach ($data_foto_st as $foto) {
                    ?>
                        <?php
                        if ($foto->id_marketing_st == $id_marketing) {
                        ?>
                            <div class="col-6 p-3">
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_st; ?>" class="img-grid-news img-fluid">
                            </div>
                        <?php
                        } else {
                        ?>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                    <?php
                    foreach ($data_foto_st as $foto) {
                    ?>
                        <?php
                        if ($foto->id_marketing_st == $id_marketing) {
                        ?>
                        <?php
                        } else {
                        ?>
                            <div class="col-6 p-3">
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_st; ?>" class="img-grid-news img-fluid">
                            </div>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </div>
                <div class="row text-light mt-3">
                    <center style="line-height: initial;">
                        <span class="font-size-12px">MENGAPA MEMILIH PT KANPA</span>
                        <br>
                        <span class="font-size-12px">(KANZU PERMAI ABADI) ?</span>
                    </center>
                    <ul class="ul-list mt-3">
                        <li>Memberikan pelayanan maksimal kepada pelanggan&nbsp;</li>
                        <li>Memberikan Kawasan yang ramah lingkungan</li>
                        <li>Performa kualitas bangunan yang baik</li>
                        <li>Dengan harga cicilan rumah yang terjangkau</li>
                        <li>Bangunan modern dan berkualitas tinggi</li>
                        <li>Legalitas dan perizinan aman dan sesuai peraturan</li>
                        <li>Fasilitas lengkap untuk menunjang kebutuhan hidup</li>
                        <li>Dukungan KPR dan banyak perbankan</li>
                        <li>Pengembangan di lingkungan asri dan
                            hijau, dengan udara yang mendukung kesehatan dan kenyamanan hidup</li>
                    </ul>
                </div>
                <div class="row">
                    <center>
                        <div class="border-orange text-light">
                            <span>PERCAYAKAN RUMAH IMPIAN ANDA KEPADA</span>
                            <br>
                            <span>PT KANZU PERMAI ABADI</span>
                        </div>
                    </center>
                </div>
                <div class="row mt-3">
                    <center>
                        <span class="text-light font-size-xx-small" style="font-family: 'Poppins';">Hubungi saya <span style="text-transform: uppercase;"><?php echo $data->nm_marketing; ?></span></span>
                    </center>
                </div>
                <div class="row mt-2">
                    <center>
                        <a href="<?php echo $data->bitly; ?>" class="">
                            <!-- <button> -->
                            <span class="border-btn-wa">
                                <i class="fa-brands fa-whatsapp fa-beat-fade mr-3 size-icon-wa"></i>
                                <span class="text-wa">
                                    <p class="mb-0 text-klik-wa">KLIK DI SINI</p>
                                    <p class="mb-0 text-via-wa">menghubungi kami via whatsapp</p>
                                </span>
                            </span>
                            <!-- </button> -->
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>
<?php
endforeach;
?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YN9QR6KJ0J"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-YN9QR6KJ0J');
</script>