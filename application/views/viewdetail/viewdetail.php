<style>
    /* .input-group {
        border-radius: 1rem;
        overflow: hidden;
    }

    .input-group-prepend .input-group-text,
    .form-control {
        border-radius: 0;
    } */
</style>
<main id="main" class="bg-gardient">

    <section id="home" class=" container mt-4">
        <?php foreach ($properti as $data) { ?>
            <h1 class="mb-0 font-weight-bold text-blue"><?= $data['judul_properti']; ?></h1>
            <p class="mb-0"><?= $data['alamat']; ?></p>
        <?php } ?>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="webkit-right">
                    <div class="border-price">
                        <span>Rp.</span><span class="font-weight-bold"><?= $data['harga'] . ' ' . $data['satuan']; ?></span>
                    </div>
                </div>
                <div class="swiper pt-0">
                    <div class="swiper-wrapper">
                        <?php
                        $gambar_array = explode(',', $data['gambar']);
                        foreach ($gambar_array as $gambar):
                        ?>
                            <div class="swiper-slide">
                                <img src="https://admin.kanpa.co.id/upload/gambar_properti/<?= trim($gambar); ?>" class="img-fluid" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
                <ul class="d-flex justify-content-between list-none p-0">
                    <li>

                        <h4 class="font-weight-bold text-blue">Type <?= $data['luas_tanah']; ?>/<?= $data['luas_bangunan']; ?></h4>
                    </li>
                    <li>
                        <ul class="d-flex ul-type mb-5">
                            <li class="li-d-type">
                                <span>LT : <?= $data['luas_tanah']; ?></span>
                            </li>
                            <li class="li-d-type">
                                <span>LB : <?= $data['luas_bangunan']; ?></span>
                            </li>
                            <li class="li-d-type">
                                <span>Lv : <?= $data['level']; ?></span>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="row mt-4">
                    <h3 class="font-weight-bold text-blue">Tentang</h3>
                    <p><?= $data['deskripsi']; ?></p>
                    <h3 class="font-weight-bold text-blue">Promo</h3>
                    <!-- <div class="row"> -->
                    <p>Dapatkan promo untuk 10 pembeli pertama</p>
                    <ul style="margin-left:1rem;">
                        <li>
                            AC 2 Unit Panasonic
                        </li>
                        <li>
                            Canopi Carport
                        </li>
                        <li>
                            Smart Door Lock
                        </li>
                        <li>
                            Water Purification Sytem Panasonic
                        </li>
                    </ul>
                    <!-- </div> -->
                    <!-- <div class="row"> -->
                    <p>PROMO KPR</p>
                    <ul style="margin-left:1rem;">
                        <li>
                            FREE PPN
                        </li>
                        <li>
                            FREE DP
                        </li>
                        <li>
                            FREE biaya surat (AJB,BPHTB,BBN)
                        </li>
                        <li>
                            FREE biaya KPR(Admin & Provinsi)
                        </li>
                        <li>
                            Promo Terbatas
                        </li>
                    </ul>
                    <!-- </div> -->
                </div>
                <div class="row mt-4">
                    <h3 class="font-weight-bold text-blue">Detail</h3>
                    <?php if ($data['jml_kamar'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-kamar-tidur i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['jml_kamar']; ?> <br> Kamar <br> Tidur</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['jml_kamar_mandi'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-kamar-mandi i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['jml_kamar_mandi']; ?> <br> Kamar <br> Mandi</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['carport'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-carport i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['carport']; ?> <br> Carport</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['ruang_tamu'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-ruang-tamu i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['ruang_tamu']; ?> <br> Ruang <br> Tamu</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['ruang_keluarga'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-ruang-keluarga i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['ruang_keluarga']; ?> <br> Ruang <br> Keluarga</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['taman'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-taman i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['taman']; ?> <br> Taman</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['ruang_makan'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-ruang-makan i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['ruang_makan']; ?> <br> Ruang <br> Makan</p>
                        </div>
                    <?php } ?>

                    <?php if ($data['balkon'] > '0') { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-balkon i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0"><?= $data['balkon']; ?> <br> Balkon</p>
                        </div>
                    <?php } ?>
                </div>
                <div class="row mt-4">
                    <h3 class="font-weight-bold text-blue">Fasilitas</h3>
                    <?php if ($data['masjid'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-masjid i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Masjid</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['taman_bermain'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-playground i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Taman<br>Bermain</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['jalan'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-jalan-8-meter i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Jalan <br> <? $data['jalan']; ?> Meter</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['area_ruko'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-area-ruko i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Area Ruko</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['kolam_renang'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-kolam-renang i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Kolam Renang</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['one_gate'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-one-gate-system i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">One Gate<br>System</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['security'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-security i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">Security</p>
                        </div>
                    <?php } ?>
                    <?php if ($data['cctv'] > 0) { ?>
                        <div class="col p-0 text-webkit-center">
                            <div class="i-cctv-24jam i-size"></div>
                            <p class="font-weight-bold f-sz-li-detail m-0">CCTV 24<br>Jam</p>
                        </div>
                    <?php } ?>
                </div>
                <div class="row mt-4 mb-5">
                    <h3 class="font-weight-bold text-blue">Lokasi</h3>
                    <div class="iframe-map">
                        <?= $data['lokasi']; ?>
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.2386530837366!2d110.34558210977904!3d-7.098314269561866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7089536b292197%3A0x1518e4320e64dc3d!2sPerumahan%20Alton%20Green%20House%20Siberi!5e0!3m2!1sid!2sid!4v1723015432941!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="row bg-sim-kpr">
                    <h3 class="font-weight-bold">Simulasi KPR</h3>
                    <label class="ps-4">Harga Poperti</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text i-g-text-l">Rp.</span>
                        </div>
                        <input type="text" id="hargaProperti" class="form-control" value="">
                    </div>
                    <label class="ps-4 ">Uang Muka (DP)</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text i-g-text-l">Rp.</span>
                        </div>
                        <input type="text" id="uangMuka" class="form-control" value="">
                    </div>
                    <label class="ps-4">Jumlah Pinjaman</label>
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text i-g-text-l">Rp.</span>
                        </div>
                        <input type="text" id="jumlahPinjaman" class="form-control" value="">
                    </div>
                    <div class="d-flex">
                        <div class="col-6">
                            <label class="ps-4">Jangka Waktu</label>
                            <div class="input-group mb-1">
                                <input type="text" id="jangkaWaktu" class="form-control" value="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text i-g-text-r">Tahun</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="ps-4">Suku Bunga</label>
                            <div class="input-group mb-1">
                                <input type="text" id="sukuBunga" class="form-control" value="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text i-g-text-r">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="b-amount text-center">
                            <h4>Jumlah Angsuran per Bulan</h4>
                            <h1 class="mb-0" id="hasil">Rp,-</h1>
                        </div>
                    </div>
                </div>
                <div class="row content-perum-po-la mb-5">
                    <h3 class="font-weight-bold text-blue">Poperti Lainnya</h3>
                    <?php for ($i = 1; $i <= 3; $i++) { ?>

                        <?= $properti_lainnya; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</main>