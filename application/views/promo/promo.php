<style>
    .bg-sertifikat {
        background-image: url('<?php echo base_url('assets'); ?>/img/sertifikat-01.jpg');
        height: 100%;

        background-repeat: no-repeat;
        background-size: cover;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 0mm auto;
        /* border: 1px #D3D3D3 solid; */
        border-radius: 5px;
        /* background: white; */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm 4px;
        /* border: 5px red solid; */
        height: 257mm;
        /* outline: 2cm #FFEAEA solid; */
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

    .qr-code {
        max-width: 200px;
        float: right;
    }

    .uppercase {

        text-transform: uppercase;
    }
</style>
<main id="main" class="">
    <div class="m-2">
        <div class="card">
            <div class="card-header">
                <h3 style="font-family: fantasy;"><i class="fa-solid fa-percent"></i> AMBIL PROMO</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="perum">PERUMAHAN</label>
                        <div class="form-group">
                            <select id="perum" class="form-control">
                                <option disabled selected>Pilih Perumahan</option>
                                <?php
                                foreach ($data_perum as $data) {
                                ?>
                                    <option><?php echo $data->nm_perum; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nm-promo">PROMO</label>
                        <div class="form-group">
                            <input type="text" id="promo" class="form-control uppercase" name="nm_perum" placeholder="PROMO ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nik">NIK</label>
                        <div class="form-group">
                            <input type="number" id="nik" class="form-control" placeholder="NIK ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="nama">NAMA</label>
                        <div class="form-group">
                            <input type="text" id="nama" class="form-control uppercase" placeholder="NAMA LENGKAP ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="tempat-lahir">TEMPAT LAHIR</label>
                        <div class="form-group">
                            <input type="text" id="tempat-lahir" class="form-control uppercase" placeholder="TEMPAT LAHIR ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <div class="form-group">
                            <label class="desk" for="tgl-lahir">TANGGAL LAHIR</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="tgl-lahir" placeholder="TANGGAL LAHIR ...">
                                <span class="input-group-text" style="padding: 11px;">
                                    <i class="fa-regular fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="alamat">ALAMAT</label>
                        <div class="form-group">
                            <textarea type="text" id="alamat" class="form-control uppercase" placeholder="ALAMAT LENGKAP ..." rows="5" autocomplete="off" required="true"> </textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 mt-2">
                        <label class="desk" for="">FOTO KTP</label>
                        <div id="upload-ktp" class="form-group" style="min-height: 135px;max-width: fit-content;text-align: -webkit-center;place-self: center;border: 1px;border-color: black;border-style: dashed;cursor: pointer;">
                            <div class="icon-foto">
                                <i class="fa-solid fa-camera" style="height: 3rem;padding: 26px 80px;"></i>
                                <center>
                                    <span style="padding: 0px 44px;">Upload Foto KTP</span>
                                </center>
                            </div>
                            <img src="" id="preview-foto-ktp" class="img-thumbnail img-fluid" hidden style="max-width: 13rem;max-height: 9rem;">
                        </div>
                        <input type="file" id="file-ktp" class="data-file-ktp" value="" hidden>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <label class="desk" for="kontak">KONTAK</label>
                        <div class="form-group">
                            <input type="number" id="kontak" class="form-control uppercase" placeholder="KONTAK ..." autocomplete="off" required="true">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <label class="desk" for="nm-marketing">MARKETING</label>
                        <div class="form-group">
                            <input type="text" id="nm-marketing" class="form-control uppercase" placeholder="AN. MARKETING ..." autocomplete="off" required="true">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <a id="simpan-data-promo" href="#">
                            <button type="button" class="btn btn-sm btn-outline-success float-right"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>