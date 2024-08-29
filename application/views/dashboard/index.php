<main id="main">
    <section id="home" class=" container mt-4">
        <div class="text-center">
            <h1 class="tittle">Jual Beli Rumah & Properti</h1>
        </div>
        <div class="row p-2">
            <div class="col-lg-8 col-md-8 col-12 ">
                <div class="swiper pt-0">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>header-september-24-kanpa.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>header-september-24-KANPA-S.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>promo-utj-tamankautsar.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="https://www.jakartanotebook.com/images/banners/2024/07/Artboard_Copy_10.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 ">
                <div class="row mt-1">
                    <div class="col-6 p-2">
                        <div class="">
                            <img src="<?= base_url('assets/img/banner/'); ?>RUMAH-LAMA.jpg" class="border img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="">
                            <img src="<?= base_url('assets/img/banner/'); ?>RUMAH-BARU.jpg" class="border img-fluid" alt="">
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-4 p-2 col-header-4">
                        <div class="">
                            <img src="http://localhost/ecom_kanpa/upload/eb5ffb9e950aedc603c27473179afb86.jpg" class="border img-fluid" alt="">
                        </div>
                    </div> -->
                    <div class="col-12 p-2 col-header-12">
                        <img src="https://www.jakartanotebook.com/images/banners/2024/07/Artboard_Copy_10.jpg" class=" border img-fluid" alt="">
                        <div class="box3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="text-center">
                <h1 class="tittle title-cari-rumah">Cari Rumah Area Mana ?</h1>
            </div>
            <div class="col d-search-fil justify-content-center mt-4">
                <div class="search-bar">
                    <div class="search-input">
                        <input type="text" placeholder="Lokasi, Kata Kunci, Area, Proyek, Developer">
                    </div>
                    <div class="search-filter" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fas fa-filter" style="padding-right: 10px;"> </i> <span class="">Filter</span>
                    </div>
                </div>
                <button class="search-button">Cari</button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-blue text-light pt-1 pb-1 b-radius-top">
                        <h5 class="modal-title" id="exampleModalLongTitle">Filter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: none;border: none;">
                            <span aria-hidden="true" style="font-size: 2rem; color: white;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background:#ededed;">
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Transaksi</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-transaksi" class="form-control">
                                        <option value=""></option>
                                        <option value="transaksi 1">transaksi 1</option>
                                        <option value="transaksi 2">transaksi 2</option>
                                        <option value="transaksi 3">transaksi 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Tipe</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-tipe" class="form-control">
                                        <option value=""></option>
                                        <option value="tipe 1">tipe 1</option>
                                        <option value="tipe 2">tipe 2</option>
                                        <option value="tipe 3">tipe 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Sertifikat</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-sertifikat" class="form-control">
                                        <option value=""></option>
                                        <option value="sertifikat 1">sertifikat 1</option>
                                        <option value="sertifikat 2">sertifikat 2</option>
                                        <option value="sertifikat 3">sertifikat 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Provinsi</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-provinsi" class="form-control">
                                        <option value=""></option>
                                        <option value="provinsi 1">provinsi 1</option>
                                        <option value="provinsi 2">provinsi 2</option>
                                        <option value="provinsi 3">provinsi 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Kota</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-kota" class="form-control">
                                        <option value=""></option>
                                        <option value="kota 1">kota 1</option>
                                        <option value="kota 2">kota 2</option>
                                        <option value="kota 3">kota 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Lokasi</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-lokasi" class="form-control">
                                        <option value=""></option>
                                        <option value="lokasi 1">lokasi 1</option>
                                        <option value="lokasi 2">lokasi 2</option>
                                        <option value="lokasi 3">lokasi 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Kamar Tidur</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-km-tidur" class="form-control">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Kamar Mandi</label>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <select id="select-km-mandi" class="form-control">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Harga (Rp)</label>
                            </div>
                            <div class="col-8">
                                <div class="d-flex text-align-center">
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Min" style="font-style:italic">
                                    </div>
                                    <span class="small m-2">s/d</span>
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Max" style="font-style:italic">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Luas Tanah (m2)</label>
                            </div>
                            <div class="col-8">
                                <div class="d-flex text-align-center">
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Min" value="0">
                                    </div>
                                    <span class="small m-2">s/d</span>
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Max" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-align-center mt-1">
                            <div class="col-4">
                                <label for="">Luas Bangunan (m2)</label>
                            </div>
                            <div class="col-8">
                                <div class="d-flex text-align-center">
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Min" value="0">
                                    </div>
                                    <span class="small m-2">s/d</span>
                                    <div class="form-input">
                                        <input type="number" class="form-control" placeholder="Max" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer b-radius-bottom" style="background:#ededed;">
                        <button type="button" class="btn btn-close-m" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn-search-m">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <h1 class="tittle">Kategori Poperti</h1>
        </div>
        <div class="row mt-4 m-2">
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <ul class="d-flex ul-lans">
                    <li class="text-webkit-center mx-w-li">
                        <a href="<?= base_url('Dijual/rumah/'); ?>">
                            <div class="border-li bi i-home"></div>
                            <span class="font-weight-bold text-black f-sz-li-porperti">Rumah</span>
                        </a>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                        <a href="<?= base_url('Dijual/apartement/'); ?>">
                            <div class="border-li i-apartment"></div>
                            <span class="font-weight-bold text-black f-sz-li-porperti">Apartment</span>
                        </a>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                    <a href="<?= base_url('Dijual/perumahan/'); ?>">                        
                        <div class="border-li i-perumahan"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Perumahan</span>
                    </a>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                    <a href="<?= base_url('Dijual/kavling/'); ?>">                        
                        <div class="i-kavling border-li"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Kavling</span>
                    </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-12 p-0">
                <ul class="d-flex ul-lans">
                    <li class="text-webkit-center mx-w-li">
                        <div class="i-simulasi border-li"></div>
                        <span class="font-weight-bold f-sz-li-porperti">Simulasi KPR</span>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                        <div class="i-titip-jual border-li"></div>
                        <span class="font-weight-bold f-sz-li-porperti">Titip Jual</span>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                        <div class="i-agen border-li"></div>
                        <span class="font-weight-bold f-sz-li-porperti">Cari Agen</span>
                    </li>
                    <li class="text-webkit-center mx-w-li">
                        <div class="i-join-kanpa border-li"></div>
                        <span class="font-weight-bold f-sz-li-porperti">Join Kanpa</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="pt-3 pb-5">
        <div class="container">

            <div class="row">
                <h1 class="tittle">Pilih Kota</h1>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <div class="slider-wrapper slider-wrapper-city">
                        <ul class="image-list swiper-gap-city p-0">
                            <?= $get_kota; ?>
                            <!-- <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <li class="img-item">
                                    <div class="card border li-city">
                                        <img class="radius-img-city" src="<?= base_url('assets/img/city/'); ?>banjar.jpg" alt="">
                                        <div class="P-3 text-center m-li-box-city">
                                            <h6 class="font-weight-bold f-s-li-city mb-0">Kab.</h6>
                                            <h6 class="font-weight-bold f-s-li-city mb-0">Bajarmasin</h6>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?> -->
                            <li class="img-item">
                                <div class="card border li-city-none">
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sec-video m-0 bg-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 text-light text-align-center">
                    <div class="d-flex justify-content-between text-align-center">
                        <h1 class="font-weight-bold">Perumahan Viral</h1>
                        <span class="spn-vw-all">Lihat Semua</span>
                    </div>
                    <p class="p-desk-v">
                        Yuk Tonton video promosinya dan buruan hubungi Marketingnya sebelum Unitnya Habis.
                    </p>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="slider-wrapper slider-wrapper-reels">
                        <ul class="image-list p-0">
                            <?php for ($i = 1; $i <= 5; $i++) { ?>
                                <li class="img-item">
                                    <div class="reel__container">
                                        <div class="reel__content">
                                            <button class="btn-play" id="play-button">
                                                <i class="fa-solid fa-play"></i>
                                            </button>
                                            <video class="video" width="315" height="560">
                                                <source src="<?= base_url('upload/video/'); ?>baron-hardseling 2.mp4" type="video/mp4">
                                            </video>
                                            <span class="text-desk">Your browser does not support the video tag.</span>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                            <li class="img-item">
                                <div class="reel__container">
                                    <div class="reel__content">
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between text-align-center">
                    <h1 class="tittle">Terpopuler</h1>
                    <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                </div>

            </div>
            <div class="row mt-3">
                <div class="slider-wrapper slider-wrapper-populer">
                    <ul id="load-data-properti-populer" class="image-list swiper-liproperty row">
                        <!-- <?= $properti_populer; ?> -->
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <!-- <li class="img-item col-6 p-2 pb-3">
                                <div class="populer-container">
                                    <div class="populer-content">
                                        <img src="<?= base_url('upload'); ?>/test/ATH.jpg" class="img-produk-sw">
                                    </div>
                                    <div class="bg-light border p-2">
                                        <span class="title-new-proyek">PROYEK BARU</span>
                                        <span class="title-tayang">Tayang sejak 24 November 2024</span>
                                        <h3 class="title-price">Rp 700 Jt</h3>
                                        <h5 class=" title-properti font-weight-bold">Alton Town House</h5>
                                        <h6 class="font-weight-bold title-address"><i class="bi bi-geo-alt"></i> Sisemut, Ungaran Barat</h6>
                                        <ul class="d-flex ul-detail mt-3">
                                            <li><span class="font-weight-bold">LT</span> : 120 m2</li>
                                            <li><span class="font-weight-bold">LT</span> : 140 m2</li>
                                            <li><span class="font-weight-bold">KT</span> : 4</li>
                                            <li><span class="font-weight-bold">Km</span> : 2</li>
                                        </ul>
                                        <hr>
                                        <div class="d-flex kontakas">
                                            <img src="https://kanpa.co.id/upload/0a7970f0cf26d2603a626d489036cc64.png" class="img-marketing">
                                            <div class="d-block">
                                                <h5 class="font-weight-bold title-name m-0">Ziha Zizi</h5>
                                                <p class="small title-address m-0">Ungaran Barat</p>
                                            </div>
                                            <i class="bi bi-whatsapp i-wa-marketing"></i>
                                        </div>
                                    </div>
                                </div>
                            </li> -->
                        <?php } ?>
                        <li class="img-item">
                            <div class="populer-container">
                            </div>
                        </li>
                    </ul>
                    <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="next-slide slide-button material-symbols-rounded box-shadow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="row row-btn-vw-next text-center mt-4">
                <div class="col">
                    <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between text-align-center">
                    <h1 class="tittle">Baru Ditawarkan</h1>
                    <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="slider-wrapper slider-wrapper-populer">
                    <ul class="image-list swiper-liproperty row">
                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                            <li class="img-item col-6 p-2 pb-3">
                                <div class="populer-container">
                                    <div class="populer-content">
                                        <img src="<?= base_url('upload'); ?>/test/ATH.jpg" class="img-produk-sw">
                                    </div>
                                    <div class="bg-light border p-2">
                                        <span class="title-new-proyek">PROYEK BARU</span>
                                        <span class="title-tayang">Tayang sejak 24 November 2024</span>
                                        <h3 class="title-price">Rp 700 Jt</h3>
                                        <h5 class=" title-properti font-weight-bold">Alton Town House</h5>
                                        <h6 class="font-weight-bold title-address"><i class="bi bi-geo-alt"></i> Sisemut, Ungaran Barat</h6>
                                        <ul class="d-flex ul-detail mt-3">
                                            <li><span class="font-weight-bold">LT</span> : 120 m2</li>
                                            <li><span class="font-weight-bold">LT</span> : 140 m2</li>
                                            <li><span class="font-weight-bold">KT</span> : 4</li>
                                            <li><span class="font-weight-bold">Km</span> : 2</li>
                                        </ul>
                                        <hr>
                                        <div class="d-flex kontakas">
                                            <img src="https://kanpa.co.id/upload/0a7970f0cf26d2603a626d489036cc64.png" class="img-marketing">
                                            <div class="d-block">
                                                <h5 class="font-weight-bold title-name m-0">Ziha Zizi</h5>
                                                <p class="small title-address m-0">Ungaran Barat</p>
                                            </div>
                                            <i class="bi bi-whatsapp i-wa-marketing"></i>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="img-item">
                            <div class="populer-container">
                            </div>

                        </li>

                    </ul>
                    <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="next-slide slide-button material-symbols-rounded box-shadow">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="row row-btn-vw-next text-center mt-4">
                <div class="col">
                    <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                </div>
            </div>
        </div>
    </section>
</main>