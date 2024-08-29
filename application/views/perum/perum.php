<main id="main" class="pt-5rem">
    <div class="m-3 mt-4">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-8">
                                <label for="nm-perum">Nama Perumahan</label>
                                <div class="form-group">
                                    <input type="text" id="nm-perum" class="form-control" name="nm_perum" placeholder="Nama Perumahan ..." autocomplete="off" required="true">
                                </div>
                            </div>
                            <div class="col-lg-6 col-4">
                                <label for="kode-perum">Kode</label>
                                <div class="form-group">
                                    <input type="text" id="kode-perum" class="form-control" placeholder="Kode Perumahan ..." autocomplete="off" required="true">
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="alamat">Alamat</label>
                        <div class="form-group">
                            <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat Perumahan ..." autocomplete="off" required value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="video">Video</label>
                        <div class="form-group">
                            <textarea type="text" id="video" class="form-control" name="video" rows="2" placeholder="URL KEY Video  ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="url-map">URL Google Maps</label>
                        <div class="form-group">
                            <textarea type="text" id="url-map" class="form-control" name="url_map" rows="2" placeholder="URL GOOGLE Map  ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="map">KEY Google Maps</label>
                        <div class="form-group">
                            <textarea id="map" class="form-control" name="map" rows="2" placeholder="URL KEY Map  ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label for="deskripsi">Deskripsi</label>
                        <div class="form-group">
                            <textarea type="text" id="deskripsi" class="form-control" name="deskripsi" rows="2" placeholder="Deskripsi ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="meta-deskripsi">Meta Deskripsi</label>
                        <div class="form-group">
                            <textarea type="text" id="meta-deskripsi" class="form-control" name="deskripsi" rows="2" placeholder="Meta Deskripsi ..." autocomplete="off" required value=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="pilih-foto-logo">Gambar logo</label>
                            <div class="input-group">
                                <input type="file" id="file-foto-logo" name="logo" class="file-logo" value="" hidden>
                                <input type="text" class="form-control" disabled placeholder="Upload Gambar" id="nm-foto-logo">
                                <div class="input-group-append">
                                    <button type="button" id="" class="pilih-logo browse btn btn-dark">Pilih Gambar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 pt-4">
                <div class="form-group">
                    <img src="" id="preview-foto-logo" class=" img-thumbnail img-fluid">
                    <input type="text" id="logo-lama" hidden>
                </div>
                <div id="ceklis-ubah-logo" class="form-group" hidden>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="ceklis-ubah-foto-logo" value="">
                        <label for="ceklis-ubah-foto-logo" class="custom-control-label">Cheklis untuk mengubah foto</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <a id="herf-batal" href="#main" hidden>
                    <button type="button" class="btn-batal-perum btn btn-sm btn-outline-danger"><i class="fa-regular fa-pen-to-square"></i> Batal</button>
                </a>
            </div>
            <div class="col-6">
                <a id="herf-simpan" href="#main">
                    <button type="button" class="btn-simpan-perum btn btn-sm float-right btn-outline-success" value="simpan"><i class="fa-regular fa-pen-to-square"></i> Simpan data perum</button>
                </a>
            </div>
        </div>
        <hr>
        <div id="data-perum"></div>
    </div>
</main>