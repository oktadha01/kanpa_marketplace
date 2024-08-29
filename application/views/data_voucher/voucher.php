<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div class="row">

            <div class="col-lg-8 col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <label for="select-perum">Perumahan</label>
                        <div class="form-group">
                            <select id="select-perum" class="js-states form-control col-12">
                                <option value=""></option>
                                <?php
                                foreach ($select_data_perum as $data) {
                                ?>
                                    <option value="<?php echo $data->id_perum; ?>"><?php echo $data->nm_perum; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <label for="select-tipe">Tipe</label>
                        <div class="form-group">
                            <select id="select-tipe" class="js-states form-control col-12">

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="nm-voucher">Voucher</label>
                        <div class="form-group">
                            <input type="text" id="nm-voucher" class="form-control" placeholder="Voucher ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <label for="wa-voucher">Whatsapp</label>
                        <div class="form-group">
                            <input type="text" id="wa-voucher" class="form-control" placeholder="Link Whatsapp ..." autocomplete="off" required="true">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="form-group">
                    <label for="file-foto-voucher">Foto</label>
                    <div class="input-group">
                        <input type="text" id="foto-voucher-lama" class="" value="" hidden>
                        <input type="file" id="file-foto-voucher" class="foto-voucher" value="" hidden>
                        <input type="text" class="form-control pilih-foto-voucher " readonly placeholder="Upload Gambar" id="nm-foto-voucher">
                        <div class="input-group-append">
                            <button type="button" id="btn-pilih-foto-voucher" class="pilih-foto-voucher browse btn btn-dark">Pilih Foto</button>
                            <button type="button" id="btn-delete-foto-voucher" class="browse btn btn-danger" hidden>Hapus Foto</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <img id="preview-foto-voucher" src="" class="img-thumbnail" style="max-height: 20rem;">
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" id="btn-cencel-voucher" class=" btn btn-sm btn-outline-danger"><i class="fa-solid fa-xmark"></i> Batal</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn-save-voucher" class=" btn btn-sm btn-outline-success float-right" value="save"><i class="fa-solid fa-cloud-arrow-up"></i> Simpan voucher</button>
            </div>
        </div>
        <!-- <hr> -->
        <div id="data-voucher" class="row mt-3">
        </div>
    </div>
</main>