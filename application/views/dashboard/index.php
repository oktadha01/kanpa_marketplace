<main id="main">
    <section id="home" class=" container mt-4">
        <div class="text-center">
            <h1 class="tittle">Jual Beli Rumah & Properti</h1>
        </div>
        <div class="row p-2">
            <div class="col-lg-8 col-md-8 col-12 ">
                <div class="swiper pt-0">
                    <div id="banner-full" class="swiper-wrapper">
                        <!-- <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>header-september-24-kanpa.jpg" class="img-fluid" alt="">
                        </div> -->
                        <!-- <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>header-september-24-KANPA-S.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="<?= base_url('assets/img/banner/'); ?>promo-utj-tamankautsar.jpg" class="img-fluid" alt="">
                        </div> -->
                        <!-- <div class="swiper-slide">
                            <img src="https://www.jakartanotebook.com/images/banners/2024/07/Artboard_Copy_10.jpg" class="img-fluid" alt="">
                        </div> -->
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 ">
                <div id="banner-split" class="row mt-1">
                    <!-- <div class="col-6 p-2">
                        <div class="">
                            <img src="<?= base_url('assets/img/banner/'); ?>RUMAH-LAMA.jpg" class="border img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="">
                            <img src="<?= base_url('assets/img/banner/'); ?>RUMAH-BARU.jpg" class="border img-fluid" alt="">
                        </div>
                    </div> -->
                </div>
                <div id="banner-singel" class="row">
                    <!-- <div class="col-12 p-2 col-header-12">
                        <img src="https://www.jakartanotebook.com/images/banners/2024/07/Artboard_Copy_10.jpg" class=" border img-fluid" alt="">
                        <div class="box3"></div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- <div class="row mt-2">
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
        </div> -->
        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        </div> -->
    </section>
    <section class="container">
        <div class="row">
            <h1 class="tittle">Kategori Poperti</h1>
        </div>
        <div class="mt-4 m-2">
            <ul class="ul-lans">
                <li class="text-webkit-center mx-w-li mb-4">
                    <a href="<?= base_url('Properti/jualsewa/rumah/'); ?>">
                        <div class="border-li bi i-home"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Rumah</span>
                    </a>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <a href="<?= base_url('Properti/dijual/perumahan/'); ?>#dijual">
                        <div class="border-li i-perumahan"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Perumahan</span>
                    </a>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <a href="<?= base_url('Properti/jualsewa/ruko/'); ?>">
                        <div class="border-li i-ruko"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Ruko</span>
                    </a>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <a href="<?= base_url('Properti/dijual/kavling/'); ?>#dijual">
                        <div class="i-kavling border-li"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Kavling</span>
                    </a>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <a href="<?= base_url('Simulasi_KPR'); ?>">
                        <div class="i-simulasi border-li"></div>
                        <span class="font-weight-bold text-black f-sz-li-porperti">Simulasi KPR</span>
                    </a>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <div class="i-titip-jual border-li"></div>
                    <span class="font-weight-bold f-sz-li-porperti">Titip Jual</span>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <div class="i-join-kanpa border-li"></div>
                    <span class="font-weight-bold f-sz-li-porperti">Join Kanpa</span>
                </li>
                <li class="text-webkit-center mx-w-li mb-4">
                    <div class="i-faq border-li"></div>
                    <span class="font-weight-bold f-sz-li-porperti">Faq</span>
                </li>
            </ul>
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
                        <a href="<?= base_url('Video/review/'); ?>">
                            <span class="spn-vw-all">Lihat Semua</span>
                        </a>
                    </div>
                    <p class="p-desk-v">
                        Yuk Tonton video promosinya dan buruan hubungi Marketingnya sebelum Unitnya Habis.
                    </p>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
                    <div class="slider-wrapper slider-wrapper-reels">
                        <ul id="load-data-video-populer" class="image-list p-0">
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
        <div class="container flex-grow-1 container-p-y">
            <h1 class="tittle text-center">Kami Tersedia di</h1>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <?php if (isset($error_message) && !empty($error_message)) : ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <?= htmlspecialchars($error_message); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="nav-align-top mb-4">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <div class="demo-inline-spacing">
                                <?php foreach ($map_prov as $index => $data) : ?>
                                    <button type="button"
                                        class="btn btn-sm map-btn shadow-lg <?php echo $index === 0 ? 'active' : ''; ?>" role="tab"
                                        data-bs-toggle="tab" data-id="<?= htmlspecialchars($data['id']); ?>"
                                        data-id_prov="<?= htmlspecialchars($data['id_prov']); ?>"
                                        data-bs-target="#map-<?= htmlspecialchars($data['id']); ?>"
                                        aria-controls="map-<?= htmlspecialchars($data['id']); ?>"
                                        aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                        <span class="tf-icons bx bx-map-pin"></span>&nbsp;
                                        <?= htmlspecialchars($data['nama_provinsi']); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </ul>
                        <?php foreach ($map_prov as $index => $data) : ?>
                            <div class="tab-pane fade <?php echo $index === 0 ? 'show active' : ''; ?>"
                                id="map-<?= htmlspecialchars($data['id']); ?>" role="tabpanel">
                                <div class="error-message-container"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>