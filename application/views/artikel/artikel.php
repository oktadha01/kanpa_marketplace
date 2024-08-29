<style>
.btn-hrg-dash {
    font-size: smaller;
}

.text-nm-perum {
    font-size: medium;
}

.text-publishing,
.font-text-port {
    font-size: x-small;
    color: #a7a5a5;
}

.conten-berita-left {
    display: block;
}

.btn-tipe {
    font-size: 11px;
}

@media (max-width: 992px) {

    .conten-berita-left {
        display: none;
    }

    .text-nm-perum {
        font-size: 11px;
    }

    .btn-hrg-dash {
        font-size: x-small;
    }
}

/* pagination stile */
@-webkit-keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

@keyframes placeHolderShimmer {
    0% {
        background-position: -468px 0;
    }

    100% {
        background-position: 468px 0;
    }
}

.content-placeholder {
    display: inline-block;
    -webkit-animation-duration: 400ms;
    animation-duration: 900ms;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-name: placeHolderShimmer;
    animation-name: placeHolderShimmer;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    background: #f6f7f8;
    background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
    background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
    -webkit-background-size: 800px 104px;
    background-size: 800px 104px;
    height: inherit;
    position: relative;
}
</style>
<section class="pt-5 mt-3" id="berita">
    <div class="section-header">

        <span><span class="font-auto size-50px">A</span><span class="font-auto size-30px">rtikel</span></span>
    </div>
    <div class="container">

        <div class=" row">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-3 col-4">
                        <?php
                  $no = 3;
                  foreach ($data_berita_left as $data) {
                     $judul_berita = $data->judul_berita;
                     $tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);
                  ?>
                        <a class="text-dark add-view-news"
                            href="<?php echo base_url('Artikel'); ?>/page/<?php echo $tittle_news; ?>"
                            data-id-berita="<?php echo $data->id_berita; ?>">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>"
                                class="img-fluid border-radius img-berita" alt="red sample">
                            <h6 class="text-publishing"><?php echo $data->tgl_berita; ?></h6>
                            <h6 class="tittle-news resp-tittle"><?php echo $data->judul_berita; ?></h6>
                            <h6 class="font-text-port"><?php echo $data->view_berita; ?> views</h6>
                        </a>
                        <?php
                  }
                  ?>
                    </div>
                    <div class="col-lg-9 col-8">
                        <?php
                  $no = 3;
                  foreach ($data_berita_center as $data) {
                     $judul_berita = $data->judul_berita;
                     $tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);
                  ?>
                        <a class="text-dark add-view-news"
                            href="<?php echo base_url('Artikel'); ?>/page/<?php echo $tittle_news; ?>"
                            data-id-berita="<?php echo $data->id_berita; ?>">
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>"
                                class="img-fluid border-radius img-berita"
                                data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                            <h3 style="font-family: auto;"><?php echo $data->judul_berita; ?></h3>
                        </a>
                        <?php
                  }
                  ?>
                    </div>
                </div>
                <hr>
                <!--Berita artikel infinity scrool-->
                <div id="load_data" class="row">
                    <!-- data pagination -->
                    <br />
                    <br />
                    <!-- akhir data pagination -->
                </div>
                <div id="load_data_message"></div>
                <div class="text-center mt-3">
                    <button id="read-more-art" class="btn btn-xs btn-outline-info"> <i
                            class="bi bi-box-arrow-in-down"></i>
                        Read More</button>
                </div>
                <!-- end berita -->
                <hr>
                <!-- tampil tag -->
                <span id="tag">
                    <span style="font-weight: bold;font-family: 'Poppins';"> TAG :</span>
                    <ul>
                        <?php
                        foreach ($data_tag as $data) :
                            $tag_berita = $data->tag_berita;
                            $tag = preg_replace("![^a-z0-9]+!i", "-", $tag_berita);
                        ?>
                        <li class="btn-tag tag" style="display: inline-block;">
                            <a href="<?php echo base_url('Artikel'); ?>/tag/<?php echo $tag; ?>">
                                <?php echo $data->tag_berita; ?>
                            </a>
                        </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </span>
                <!-- akhir tag -->
            </div>
            <div class="col-lg-3 col-12">
                <div class="row gy-1">
                    <?php
               foreach ($data_perum as $data) :
                  $id_perum = $data->id_perum;
                  $nm_perum = $data->nm_perum;
                  $tittle = preg_replace("![^a-z0-9]+!i", "-", $nm_perum);
                  // echo $tittle;
                  $nm = preg_replace("![^a-z0-9]+!i", " ", $tittle);
               ?>
                    <div class="col-lg-12 col-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item" style="background: #d3d3d317;border-radius: 6px;">
                            <?php
                        $sql = "SELECT foto_tipe, id_tipe, promo, luas_bangunan, luas_tanah FROM foto, tipe WHERE foto.id_foto_tipe=tipe.id_tipe AND tipe.id_tipe_perum = $id_perum AND foto.label_foto='display' ORDER BY  RAND() limit 1";
                        $query = $this->db->query($sql);
                        if ($query->num_rows() > 0) {
                           foreach ($query->result() as $foto) :
                        ?>
                            <a
                                href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>">
                                <div class="img border-r-0px" style="position: relative;">
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>"
                                        class=" size-img-dash img-fluid" alt="">

                                    <div class="bottom-right promo"><?php echo $foto->promo; ?></div>
                                </div>
                            </a>
                            <?php
                           endforeach;
                        }
                        ?>
                            <div class="m-2">
                                <span class="mb-0 font-text-port">Mulai</span>
                                <?php
                           $total_view = 0;
                           foreach ($data_tipe as $tipe) {
                           ?>
                                <?php
                              if ($data->id_perum == $tipe->id_tipe_perum) {
                                 $hasil = $tipe->view_tipe;
                                 $total_view += $hasil;
                              ?>

                                <?php
                              }
                           }
                           ?>
                                <span class="mb-0 font-text-port float-right"><?php echo $total_view; ?> views</span>
                                <br>
                                <?php
                           $sql = "SELECT hrg, satuan_hrg, id_tipe, luas_bangunan, luas_tanah  FROM tipe WHERE id_tipe_perum = $id_perum ORDER BY hrg ASC limit 1";
                           $query = $this->db->query($sql);
                           if ($query->num_rows() > 0) {
                              foreach ($query->result() as $data_hrg) {
                           ?>
                                <a class="btn-hrg-dash"
                                    href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data_hrg->luas_bangunan; ?>/<?php echo $data_hrg->luas_tanah; ?>">Rp
                                    <?php echo $data_hrg->hrg; ?> <sub><?php echo $data_hrg->satuan_hrg; ?></sub></a>
                                <?php
                              }
                           }
                           ?>
                                <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>"
                                    style="color:black;">
                                    <h6 class="text-nm-perum mb-0"><?php echo $data->nm_perum; ?> - Tipe mulai</h6>
                                </a>
                                <?php
                           foreach ($data_tipe as $tipe) {
                           ?>
                                <?php
                              if ($data->id_perum == $tipe->id_tipe_perum) {
                              ?>
                                <a
                                    href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?>">
                                    <button type="button" id=""
                                        class="btn-tipe btn btn-sm mb-2 btn-outline-info"><?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?></button>
                                </a>
                                <?php
                              }
                           }
                           ?>
                                <br>
                                <span class="mb-0 font-text-port"> <?php echo $data->alamat; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php
               endforeach
               ?>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <center>
                            <a href="<?php echo base_url('Produk'); ?>#produk">
                                <button type="button" id="" class="btn btn-sm btn-outline-info"
                                    style="font-size: 18px;">
                                    <i class="fa-brands fa-product-hunt"></i> Lihat Produk Lainnya >>
                                </button>
                            </a>
                        </center>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>