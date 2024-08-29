<style>
    .border-add-foto {
        border: black double;
        padding: 6px;
        cursor: pointer;
    }

    .action {
        border: 4px solid #19e809;
        border-radius: 19px;
    }

    .btn-ceklis-foto-h {
        position: absolute;
        top: 8px;
        right: 16px;
        font-size: 12px;
        background: #fdfdfdd4;
        padding: 0px 0px 0px 5px;
        border-radius: 50px;
        height: 36px;
        width: 36px;
        color: #0ee127;
        font-size: 26px;
        cursor: pointer;
    }

    .btn-delete-foto-header,
    .btn-delete-foto-outher-header {
        position: absolute;
        top: 8px;
        left: 11px;
        font-size: 12px;
        background: #fdfdfd99;
        padding: 0px 0px 0px 6px;
        border-radius: 50px;
        height: 36px;
        width: 36px;
        color: #fc1d1d;
        font-size: 26px;
    }

    .btn-edit-foto-header {
        position: absolute;
        top: 8px;
        left: 11px;
        font-size: 12px;
        background: #fdfdfd99;
        padding: 0px 0px 0px 6px;
        border-radius: 50px;
        height: 36px;
        width: 36px;
        color: #FFEB3B;
        font-size: 24px;
    }

    .border-size-foto-header {
        height: auto;
        width: 24rem;
        margin-top: 8px;
        border-radius: 6px;
    }
</style>
<main id="main" class="pt-5rem">
    <div class="faq">
        <div class="" data-aos="fade-up">
            <div class="accordion accordion-flush" id="faqlist">
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" id="btn-set-foto-outher-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2" style="background: #566dea;color: aliceblue;">
                            <i class="fa-solid fa-gears fa-beat  question-icon"></i>
                            Setting Foto outher header
                        </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body pb-2">
                            <!-- <img id="btn-change-foto-header" class="img-fluid border-size-foto-header load-set-foto-header"> -->
                            <input type="file" id="" class="file-set-foto-outher-header" value="" hidden>
                            <center id="btn-add-outher-header" class="border-add-foto mt-3">
                                <i class="fa-regular fa-images fa-bounce"></i>
                                <br>
                                <span>add outher header</span>
                            </center>
                            <div class="data-outher-header" style="position: relative;display: flex;list-style: none;"></div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" id="btn-set-foto-header" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1" style="background: #566dea;color: aliceblue;">
                            <i class="fa-solid fa-gears fa-beat  question-icon"></i>
                            Setting Foto header Subsidi
                        </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                        <div class="accordion-body">
                            <img id="btn-change-foto-header" class="img-fluid border-size-foto-header load-set-foto-header">
                            <input type="file" id="file-set-foto-header" class="set-foto-header" value="" hidden>

                        </div>
                    </div>
                </div><!-- # Faq item-->
                <?php
                foreach ($data_perum as $data) :
                ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-id-perum="<?php echo $data->id_perum; ?>" data-bs-target="#faq-content-<?php echo $data->id_perum; ?>">
                                <i class="bi bi-question-circle question-icon" style="color: chartreuse;"></i>
                                <?php echo $data->nm_perum; ?>
                            </button>
                        </h3>
                        <div id="faq-content-<?php echo $data->id_perum; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="accordion-body">
                                    <section id="features" class="features">
                                        <div class="container" data-aos="fade-up">
                                            <div id="form-input-foto-header-<?php echo $data->id_perum; ?>" class="form-input-foto-header"></div>
                                            <ul id="data-foto-header-<?php echo $data->id_perum; ?>" class="data-foto-header nav nav-tabs row gy-4 d-flex mb-2">
                                            </ul>
                                            <ul class="nav nav-tabs row gy-4 d-flex">
                                                <?php
                                                foreach ($data_tipe as $tipe_data) {
                                                    if ($tipe_data->id_tipe_perum == $data->id_perum) {
                                                        $no = 1;
                                                ?>
                                                        <li class="nav-item col">
                                                            <a class="nav-link data-tipe" data-id-foto-tipe="<?php echo $tipe_data->id_tipe; ?>" data-bs-toggle="tab" data-bs-target="#tab-<?php echo $tipe_data->id_tipe; ?>">
                                                                <i class="bi bi-house color-cyan"></i>
                                                                <h4>Tipe.<?php echo $tipe_data->luas_bangunan; ?>/<?php echo $tipe_data->luas_tanah; ?></h4>
                                                            </a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>

                                            </ul>
                                            <div class="tab-content">
                                                <?php
                                                foreach ($data_tipe as $tipe_data) {
                                                    if ($tipe_data->id_tipe_perum == $data->id_perum) {
                                                        $no = 1;
                                                ?>
                                                        <div class="tab-pane" id="tab-<?php echo $tipe_data->id_tipe; ?>">
                                                            <div class="row gy-4">
                                                                <div id="data<?php echo $tipe_data->id_tipe; ?>" class="data"></div>
                                                            </div>
                                                        </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </section><!-- End Features Section -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Foto</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" id="" class="form-control attr-id-edit" autocomplete="off" required value="">
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer"> -->
                <hr>
                <div class="row" style="margin: 0px 0px 3px 0px;">
                    <div class="col-3">
                        <button type="button" class="btn-sm btn-outline-secondary" data-dismiss="modal" style="background: transparent;">Close</button>
                    </div>
                    <div class="col-9">
                        <div class="float-right">
                            <button type="button" class="btn btn-sm btn-outline-danger btn-modal-delete-foto" data-dismiss="modal">Delete Foto</button>
                            <button type="button" id="" class="btn-simpan-edit-foto-header btn btn-sm btn-outline-primary" value="" data-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="file" id="file-foto-header-perum" class="file-header-perum" value="" hidden>
            <input type="text" class="form-control" placeholder="Upload Foto" id="nm-foto-header-perum" hidden>
            <div class="input-group-append" hidden>
                <button type="button" id="" class="pilih-header-perum browse btn btn-dark">Pilih Foto</button>
            </div>
        </div>
    </div>
    <input type="text" id="id-foto" hidden>
    <input type="text" id="id-foto-tipe" hidden>
    <input type="text" id="label-foto" hidden>
    <input type="text" id="ubah-foto" hidden>
    <input type="text" id="id-perum" hidden>
</main>