<style>
    .btn-hrg-dash {
        font-size: smaller;
    }

    .text-nm-perum {
        font-size: xx-large;
    }

    .text-publishing,
    .font-text-port {
        font-size: x-small;
        color: #a7a5a5;
    }

    .conten-berita-left {
        display: block;
    }

    @media (max-width: 992px) {

        .conten-berita-left {
            display: none;
        }
    }
</style>
<section class="pt-5 mt-3" id="">
    <div class="section-header">

        <span><span class="font-auto size-50px">N</span><span class="font-auto size-30px">ews</span></span>
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
                            <a class="text-dark add-view-news" href="<?php echo base_url('News'); ?>/page/<?php echo $tittle_news; ?>" data-id-berita="<?php echo $data->id_berita; ?>">
                                <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid border-radius img-berita" alt="red sample">
                                <h6 class="text-publishing"><?php echo $data->tgl_berita; ?></h6>
                                <h6 class="tittle-news resp-tittle"><?php echo $data->judul_berita; ?></h6>
                                <h6 class="font-text-port"><?php echo $data->view_berita; ?> views</h6>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-9 col-9">
                        <?php
                        $no = 3;
                        foreach ($data_berita_detail as $data) {
                        ?>
                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid border-radius img-berita" data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                            <h3 style="font-family: auto;"><?php echo $data->judul_berita; ?></h3>
                            <p class="text-konten-news"><?php echo $data->desk_berita; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                    $no = 3;
                    foreach ($data_berita_right as $data) {
                        $judul_berita = $data->judul_berita;
                        $tittle_news = preg_replace("![^a-z0-9]+!i", "-", $judul_berita);
                    ?>
                        <div class="col-lg-6 col-12 " data-aos="zoom-in" data-aos-delay="<?php echo $no++; ?>00">
                            <div class="border-radius">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-4">
                                        <div class="form-group">
                                            <a class="text-dark add-view-news" href="<?php echo base_url('News'); ?>/page/<?php echo $tittle_news; ?>" data-id-berita="<?php echo $data->id_berita; ?>">
                                                <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid p-1 border-radius img-berita" data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-8">
                                        <a class="text-dark add-view-news" href="<?php echo base_url('News'); ?>/page/<?php echo $tittle_news; ?>" data-id-berita="<?php echo $data->id_berita; ?>">
                                            <h6 class="text-publishing"><?php echo $data->tgl_berita; ?></h6>
                                            <h6 class="tittle-news"><?php echo $data->judul_berita; ?></h6>
                                            <h6 class="font-text-port"><?php echo $data->view_berita; ?> views</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
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
                                        <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>">
                                            <div class="img border-r-0px" style="position: relative;">
                                                <img src="<?php echo base_url('upload'); ?>/<?php echo $foto->foto_tipe; ?>" class=" size-img-dash img-fluid" alt="">

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
                                            <a class="btn-hrg-dash" href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $data_hrg->luas_bangunan; ?>/<?php echo $data_hrg->luas_tanah; ?>">Rp <?php echo $data_hrg->hrg; ?> <sub><?php echo $data_hrg->satuan_hrg; ?></sub></a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $foto->luas_bangunan; ?>/<?php echo $foto->luas_tanah; ?>" style="color:black;">
                                        <h6 class="text-nm-perum mb-0"><?php echo $data->nm_perum; ?> - Tipe mulai</h6>
                                    </a>
                                    <?php
                                    foreach ($data_tipe as $tipe) {
                                    ?>
                                        <?php
                                        if ($data->id_perum == $tipe->id_tipe_perum) {
                                        ?>
                                            <a href="<?php echo base_url('detail'); ?>/perum/<?php echo $tittle; ?>/tipe/<?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?>">
                                                <button type="button" id="" class="btn btn-sm mb-2 btn-outline-info" style="font-size: small;"><?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah; ?></button>
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
                                <button type="button" id="" class="btn btn-sm btn-outline-info" style="font-size: 18px;">
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



<!-- <section class="pt-5 mt-3" id="berita">
   <div class="section-header">

      <span><span class="font-auto size-50px">N</span><span class="font-auto size-30px">ews</span></span>
   </div>
   <div class="row">
      <?php
        $no = 3;
        foreach ($data_berita as $data) {
        ?>
         <div class="col-lg-6 col-12 " data-aos="zoom-in" data-aos-delay="<?php echo $no++; ?>00">
            <div class="container-fluid">
               <div class="border-radius">
                  <div class="row">
                     <div class="col-lg-3 col-md-3 col-12">
                        <div class="form-group">
                           <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_berita; ?>" class="img-fluid p-1 border-radius img-berita" data-id-berita="<?php echo $data->id_berita; ?>" alt="red sample">
                        </div>
                     </div>
                     <div class="col-lg-9 col-md-9 col-12 p-3">
                        <h6 class="text-publishing"><?php echo $data->tgl_berita; ?></h6>
                        <h3 id="tittle-berita<?php echo $data->id_berita; ?>" data-id-berita="<?php echo $data->id_berita; ?>" class="tittle-news tittle<?php echo $data->id_berita; ?>"><?php echo $data->judul_berita; ?></h3>
                        <div id="konten-berita<?php echo $data->id_berita; ?>" class="mt-1 p-1 konten<?php echo $data->id_berita; ?> konten" hidden>
                           <p class="text-konten-news"><?php echo $data->desk_berita; ?></p>
                        </div>
                        <h6 class="font-text-port"><?php echo $data->view_berita; ?> views</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <?php
        }
        ?>
   </div>
</section> -->