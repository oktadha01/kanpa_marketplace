<style>
    .bg-sertifikat {
        background-image: url('<?php echo base_url('assets'); ?>/img/sertifikat-01.jpg');
        height: 100%;

        background-repeat: no-repeat;
        background-size: cover;
    }

    .page {
        width: 210mm;
        min-height: 255mm;
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
        height: 255mm;
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
            height: 255mm;
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
            overflow: hidden;
        }
    }

    .qr-code {
        max-width: 135px;
        float: right;
    }

    .font-family {
        font-family: auto;
    }
</style>
<?php
foreach ($data_surat as $data) :
    $perumahan = $data->perumahan;

?>
    <div id="element-to-print" class="book">
        <div class="page bg-sertifikat">
            <div class="subpage pl-2 pr-2">
                <center>
                    <span style="font-family: fantasy;font-size: xx-large;">PT. KANZU PERMAIN ABADI.</span>
                    <br>
                    <?php
                    $sql = "SELECT kode_perum FROM perum WHERE nm_perum='$perumahan'";
                    $query = $this->db->query($sql);
                    if ($query->num_rows() > 0) {
                        foreach ($query->result() as $perum) {
                    ?>
                            <span style="font-family: -webkit-body;font-size: small;">NO :/<?php echo $perum->kode_perum; ?>/PROMO/00<?php echo $data->id_user_promo; ?>/2023</span>
                    <?php
                        }
                    }
                    ?>
                </center>
                <hr class="mt-0" style="height: 2px;">
                <center>
                    <span style="font-size: x-large;font-family: auto;font-weight: bold;">Selamat anda mendapatkan promo <?php echo $data->promo; ?> perumahan <?php echo $data->perumahan; ?></span>
                </center>
                <div class="container mt-5">
                    <div class="row " style="margin:auto;">
                        <div class="col-3">
                            <span class="font-family">Perumahan</span>
                            <br>
                            <span class="font-family">NIK</span>
                            <br>
                            <span class="font-family">Nama</span>
                            <br>
                            <span class="font-family">Tempat/Tgl/Lahir</span>
                            <br>
                            <span class="font-family">Alamat</span>
                        </div>
                        <div class="col-9">
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->perumahan; ?></span>
                            <br>
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->nik; ?></span>
                            <br>
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->nama; ?></span>
                            <br>
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->tempat_lahir; ?>,<?php echo $data->tgl_lahir; ?></span>
                            <br>
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->alamat; ?></span>
                        </div>
                    </div>
                    <div class="row mb-5" style="margin:auto;">
                        <div class="col-3">
                            <span class="font-family">Kontak</span>
                        </div>
                        <div class="col-9">
                            <span class="font-family" style="text-transform: uppercase;">: <?php echo $data->kontak; ?></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo base_url('upload'); ?>/data_ktp/<?php echo $data->foto_ktp; ?>" class="img-thumbnail img-fluid" style="max-width: 13rem;max-height: 9rem;">
                    </div>
                    <div class="col-6">
                        <img src="" class="qr-code img-thumbnail img-responsive">
                    </div>
                </div>
                <hr>

                <div class="row" style="float: right;">
                    <div class="col" style="margin-right: 21px;">
                        <center>
                            <span>MARKETING</span>
                            <br>
                            <br>
                            <br>
                            <br>
                            <span style="text-decoration: underline wavy;"><?php echo $data->nm_marketing; ?></span>
                        </center>
                    </div>
                </div>
            </div>
            <input type="text" id="url-qr-code" value="<?php echo base_url('surat/promo'); ?>/<?php echo $data->nik; ?>" hidden>
        </div>
    </div>
    <button class="btn btn-primary" class="html2PdfConverter" onclick="createPDF()">html to PDF </button>
    <!-- <div class="toast" id="toast"></div> -->
    <input type="text" id="nm-user" value="<?php echo $data->nama; ?>" style="text-transform: uppercase;" hidden>
    <input type="text" name="result-convert" id="result-convert" readonly hidden>

    <input type="text" name="url-image" id="url-image" placeholder="URL image" hidden>
<?php
endforeach;
?>