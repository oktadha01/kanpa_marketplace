<div id="form-input-tipe" hidden>
    <label class="desk" for="">Add & Edit Lokasi Terdekat</label>
    <hr>
    <div class="row" style="--bs-gutter-x: 0.5rem;">
        <div class="custom-control custom-checkbox">
            <input class="custom-control-input ceklis-kategori-tipe" type="checkbox" id="ceklis-komersil" value="komersil">
            <label for="ceklis-komersil" class="custom-control-label">Komersil</label>
            <input class="custom-control-input ceklis-kategori-tipe" type="checkbox" id="ceklis-subsidi" value="subsidi">
            <label for="ceklis-subsidi" class="custom-control-label">Subsidi</label>
            <input type="text" id="kategori-tipe" value="" hidden>
        </div>
    </div>
    <hr>
    <div class="row" style="--bs-gutter-x: 0.5rem;">
        <div class="col-lg-2 col-md-4 col-12">
            <label for="lantai-rumah">Lantai</label>
            <div class="form-group">
                <input type="number" id="lantai" class="form-control" placeholder="lantai ..." autocomplete="off" required value="">
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <label for="luas-t">Luas Tanah</label>
            <div class="form-group">
                <input type="number" id="luas-tanah" class="form-control" placeholder="Luas Tanah ..." autocomplete="off" required value="">
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <label for="luas-p">Luas Bangunan</label>
            <div class="form-group">
                <input type="number" id="luas-bangunan" class="form-control" placeholder="Luas Bangunan ..." autocomplete="off" required value="">
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <label for="harga">Harga</label>
            <div class="form-group">
                <input type="text" id="hrg" class="form-control" placeholder="Harga ..." autocomplete="off" required value="">
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <label for="harga">Satuan harga</label>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input ceklis-satuan" type="checkbox" id="ceklis-satuan-jt" value="jt">
                <label for="ceklis-satuan-jt" class="custom-control-label">Jt</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input ceklis-satuan" type="checkbox" id="ceklis-satuan-m" value="M">
                <label for="ceklis-satuan-m" class="custom-control-label">M</label>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-12">
            <label for="">Promo</label>
            <div class="input-group mb-3">
                <input type="text" id="promo" class="form-control" placeholder="Promo ...">
            </div>
        </div>
    </div>
    <div class="row" style="--bs-gutter-x: 0.5rem;">
        <div class="col-lg-3 col-md-3 col-6">
            <label for="balkon">Balkon</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/balkon.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="balkon" class="form-control" placeholder="Balkon...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="taman">Taman</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/taman.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="taman" class="form-control" placeholder="Taman...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="carport">Carport</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/carport.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="carport" class="form-control" placeholder="Carportr...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="ru-tamu">R.Tamu</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ru-tamu.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="r-tamu" class="form-control" placeholder="R-Tamu...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="ru-keluarga">R.Keluarga</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-tidur.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="r-keluarga" class="form-control" placeholder="Ru_Keluarga...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="ka-tidur">K.Tidur</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-tidur.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="k-tidur" class="form-control" placeholder="K-Tidur...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="ka-mandi">K.Mandi</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ka-mandi.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="k-mandi" class="form-control" placeholder="K-Mandi...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="ru-makan">R.Makan</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/ru-makan.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="r-makan" class="form-control" placeholder="Ru-Makan...">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-6">
            <label for="dapur">Dapur</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text p-1">
                        <img src="<?php echo base_url('assets'); ?>/img/ikon-display/dapur.png" alt="PT KANPA Logo" style="height: 30px;">
                    </span>
                </div>
                <input type="number" id="dapur" class="form-control" placeholder="Dapur...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <label for="">URL VR 360</label>
            <div class="input-group mb-3">
                <textarea type="text" id="vr" name="url_vr" class="form-control" placeholder="URL VR 360 ..."></textarea>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <!-- <div class="col-lg-6 col-md-6 col-4">
        <button type="button" id="btn-cencel" class="btn btn-sm btn-outline-danger" hidden><i class="fa-solid fa-xmark"></i> Batal</button>
    </div> -->
    <div class="col">
        <button type="button" id="btn-add" class="btn btn-sm float-right btn-outline-info"><i class="fa-regular fa-pen-to-square"></i> Tambah Tipe Perumahan</button>
        <button type="button" id="btn-save" class="btn btn-sm float-right btn-outline-success" value="" hidden><i class=" fa-regular fa-pen-to-square"></i> Simpan Tipe Perumahan </button>
    </div>
</div>
<div id="form-upload-denah" hidden>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div id="denah-lt1" class="form-group">
                <label for="file-denah-lt1">Denah Lantai 1</label>
                <div class="input-group">
                    <input type="text" id="denah-lt1-lama" class="denah-lt1" value="" hidden>
                    <input type="file" id="file-denah-lt1" class="denah-lt1" value="" hidden>
                    <input type="text" class="form-control pilih-denah-lt1 " readonly placeholder="Upload Gambar" id="nm-denah-lt1">
                    <div class="input-group-append">
                        <button type="button" id="btn-pilih-denah-lt1" class="pilih-denah-lt1 browse btn btn-dark">Pilih Denah</button>
                        <button type="button" id="btn-delete-denah-lt1" class="delete-denah-lt1 browse btn btn-danger" data-denah="lt1">Hapus Denah</button>
                    </div>
                </div>
                <img id="preview-denah-lt1" src="" class="img-thumbnail" style="max-height: 20rem;">
                <button type="button" id="" class="btn-save-denah-lt1 col-12 btn btn-sm btn-outline-success" data-save-denah="lt1"><i class="fa-solid fa-cloud-arrow-up"></i> Simpan denah Lt1</button>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div id="denah-lt2" class="form-group">
                <label for="file-denah-lt2">Denah Lantai 2</label>
                <div class="input-group">
                    <input type="text" id="denah-lt2-lama" class="denah-lt2" value="" hidden>
                    <input type="file" id="file-denah-lt2" class="denah-lt2" value="" hidden>
                    <input type="text" class="form-control pilih-denah-lt2 " readonly placeholder="Upload Gambar" id="nm-denah-lt2">
                    <div class="input-group-append">
                        <button type="button" id="btn-pilih-denah-lt2" class="pilih-denah-lt2 browse btn btn-dark">Pilih Denah</button>
                        <button type="button" id="btn-delete-denah-lt2" class="delete-denah-lt2 browse btn btn-danger" data-denah="lt2">Hapus Denah</button>
                    </div>
                </div>
                <img id="preview-denah-lt2" src="" class="img-thumbnail" style="max-height: 20rem;">
                <button type="button" id="" class="btn-save-denah-lt2 col-12 btn btn-sm btn-outline-success" data-save-denah="lt2"><i class="fa-solid fa-cloud-arrow-up"></i> Simpan denah Lt2</button>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-6 col-md-6 col-4">
        <button type="button" id="btn-cencel" class="btn btn-sm btn-outline-danger" hidden><i class="fa-solid fa-xmark"></i> Batal</button>
    </div>
</div>

<hr>
<table class="table">
    <thead class="table__thead">
        <tr>
            <th class="table__th">TIPE PERUMAHAN</th>
            <th class="table__th">KATEGORI</th>
            <th class="table__th">LANTAI</th>
        </tr>
    </thead>
    <tbody class="table__tbody">
        <?php
        foreach ($data_tipe as $data) :
        ?>
            <tr class="table-row table-row--chris">
                <td class="table-row__td">
                    <p class="mb-0">Tipe <?php echo $data->luas_bangunan; ?>/<?php echo $data->luas_tanah; ?></p>
                </td>
                <td class="table-row__td">
                    <p class="mb-0"><?php echo $data->kategori_tipe; ?></p>
                </td>
                <td class="table-row__td">
                    <p class="mb-0"><?php echo $data->lantai; ?>. Lantai</p>
                </td>
                <td class="table-row__td">
                    <?php
                    if ($data->lantai == '2') {
                    ?>
                        <?php
                        if ($data->denah_lt1 == '' or $data->denah_lt2 == '') {
                        ?>
                            <a href="#" id="upload-denah<?php echo $data->id_tipe; ?>" class="btn-upload-denah" data-id-tipe="<?php echo $data->id_tipe; ?>" data-lantai="<?php echo $data->lantai; ?>" data-denah-lt1="<?php echo $data->denah_lt1; ?>" data-denah-lt2="<?php echo $data->denah_lt2; ?>">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Upload Denah
                            </a>
                        <?php
                        } else {
                        }
                    } else if ($data->lantai == '1') {
                        if ($data->denah_lt1 == '') {
                        ?>
                            <a href="#" id="upload-denah<?php echo $data->id_tipe; ?>" class="btn-upload-denah" data-id-tipe="<?php echo $data->id_tipe; ?>" data-lantai="<?php echo $data->lantai; ?>" data-denah-lt1="<?php echo $data->denah_lt1; ?>">
                                <i class="fa-solid fa-cloud-arrow-up"></i> Upload Denah
                            </a>
                    <?php
                        } else {
                        }
                    }
                    ?>
                </td>
                <td class="row-td-action">
                    <a href="#" class="btn-edit" data-id-tipe="<?php echo $data->id_tipe; ?>" data-kategori-tipe="<?php echo $data->kategori_tipe; ?>" data-lantai="<?php echo $data->lantai; ?>" data-luas-tanah="<?php echo $data->luas_tanah; ?>" data-luas-bangunan="<?php echo $data->luas_bangunan; ?>" data-hrg="<?php echo $data->hrg; ?>" data-satuan-hrg="<?php echo $data->satuan_hrg; ?>" data-promo="<?php echo $data->promo; ?>" data-balkon="<?php echo $data->balkon; ?>" data-taman="<?php echo $data->taman; ?>" data-carport="<?php echo $data->carport; ?>" data-r-tamu="<?php echo $data->r_tamu; ?>" data-r-keluarga="<?php echo $data->r_keluarga; ?>" data-k-tidur="<?php echo $data->k_tidur; ?>" data-k-mandi="<?php echo $data->k_mandi; ?>" data-r-makan="<?php echo $data->r_makan; ?>" data-dapur="<?php echo $data->dapur; ?>" data-denah-lt1="<?php echo $data->denah_lt1; ?>" data-denah-lt2="<?php echo $data->denah_lt2; ?>" data-vr="<?php echo $data->vr; ?>">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" class="btn-delete" data-id-tipe="<?php echo $data->id_tipe; ?>" data-denah-lt1="<?php echo $data->denah_lt1; ?>" data-denah-lt2="<?php echo $data->denah_lt2; ?>">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </td>
            </tr>
            <script>
            </script>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<script>
    $('.btn-save-denah-lt1, .btn-save-denah-lt2').hide();
    $('#form-input-tipe, #form-upload-denah').removeAttr('hidden', true).hide();
    $('#btn-add').click(function(e) {
        $('#form-input-tipe').show();
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);
        $('#btn-save').val('save');
    });
    $('#lantai').on('input', function() {
        if ($('#lantai').val() == '1') {
            $('#denah-lt2').hide();
        } else if ($('#lantai').val() == '2') {
            $('#denah-lt2').show();

        } else {
            $('#denah-lt2').show();

        }
    });
    $('.ceklis-kategori-tipe').click(function(e) {
        $('.ceklis-kategori-tipe').not(this).prop('checked', false);
        if ($(this).is(":checked")) {
            $('#kategori-tipe').val($(this).val());
        } else {
            $('#kategori-tipe').val('');

        }
    });
    $('.ceklis-satuan').click(function(e) {
        $('.ceklis-satuan').not(this).prop('checked', false);
        if ($(this).is(":checked")) {
            $('#satuan-hrg').val($(this).val())
        } else {

        }
    });
    $('.btn-upload-denah').click(function(e) {
        $('#form-upload-denah').show();
        $('#id-tipe').val($(this).data('id-tipe'))
        $('#form-input-tipe').hide();
        $('#btn-add, #btn-save').attr('hidden', true);
        $('#btn-cencel').removeAttr('hidden', true);
        // LT1
        if ($(this).data('lantai') == '1') {
            $('#val-denahlt2').val('1');
            if ($(this).data('denah-lt1') == '') {
                $("#nm-denah-lt1").val('');
                $('#val-denahlt1').val('');
                $('#preview-denah-lt1').attr({
                    src: ''
                });
            } else {
                $("#nm-denah-lt1").val($(this).data('denah-lt1'));
                $('#val-denahlt1').val('1');
                $('#preview-denah-lt1').attr({
                    src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt1')
                });
            }
            $('#denah-lt2').hide();
            // LT2
        } else if ($(this).data('lantai') == '2') {
            if ($(this).data('denah-lt1') == '') {
                $("#nm-denah-lt1").val('');
                $('#val-denahlt1').val('');
                $('#preview-denah-lt1').attr({
                    src: ''
                });
            } else {
                $("#nm-denah-lt1").val($(this).data('denah-lt1'));
                $('#val-denahlt1').val('1');
                $('#preview-denah-lt1').attr({
                    src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt1')
                });
            }
            if ($(this).data('denah-lt2') == '') {
                $("#nm-denah-lt2").val('');
                $('#val-denahlt2').val('');
                $('#preview-denah-lt2').attr({
                    src: ''
                });
            } else {
                $("#nm-denah-lt2").val($(this).data('denah-lt2'));
                $('#val-denahlt2').val('1');
                $('#preview-denah-lt2').attr({
                    src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt2')
                });
            }
            $('#denah-lt2').show();
        }
        action_input_denah();
    });

    $('#file-denah-lt1').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-denah-lt1").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-denah-lt1").src = e.target.result;
            $('.btn-save-denah-lt1').show();
            if ($('#nm-denah-lt1').val() == '') {
                $('#val-denahlt1').val('');

            } else {
                $('#val-denahlt1').val('1');
            }

        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#file-denah-lt2').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-denah-lt2").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-denah-lt2").src = e.target.result;
            $('.btn-save-denah-lt2').show();
            if ($('#nm-denah-lt1').val() == '') {
                $('#val-denahlt2').val('');

            } else {
                $('#val-denahlt2').val('1');
            }
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#btn-cencel').click(function(e) {
        $('#form-input-tipe,#form-upload-denah').hide();
        $('#btn-save').val('save');
        $('#id-tipe, #id-tipe-perum').val('');
        $('#btn-save, #btn-cencel').attr('hidden', true);
        $('#btn-add').removeAttr('hidden', true);
    });
    $('.btn-save-denah-lt1, .btn-save-denah-lt2').click(function(e) {
        if ($(this).data('save-denah') == 'lt1') {
            $('#val-denahlt1').val('1');
            $('.btn-save-denah-lt1').hide();
        } else {
            $('#val-denahlt2').val('1');
            $('.btn-save-denah-lt2').hide();
        }
        const denah_lt1 = $('#file-denah-lt1').prop('files')[0];
        const denah_lt2 = $('#file-denah-lt2').prop('files')[0];
        let formData = new FormData();
        formData.append('id-tipe', $('#id-tipe').val());
        formData.append('denah-lt1', denah_lt1);
        formData.append('denah-lt2', denah_lt2);
        formData.append('action', $(this).data('save-denah'));
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Tipe/add_denah_tipe'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                alert(data);
                if (!$('#val-denahlt1').val() == $('#val-denahlt2').val()) {

                } else {
                    load_tipe()

                }
            },
            error: function(msg) {
                // alert("Data Gagal Diupload");
            }
        });
    });
    $('#btn-save').click(function(e) {
        let formData = new FormData();
        formData.append('id-tipe', $('#id-tipe').val());
        formData.append('id-tipe-perum', $('#id-tipe-perum').val());
        formData.append('kategori-tipe', $('#kategori-tipe').val());
        formData.append('lantai', $('#lantai').val());
        formData.append('luas-tanah', $('#luas-tanah').val());
        formData.append('luas-bangunan', $('#luas-bangunan').val());
        formData.append('hrg', $('#hrg').val());
        formData.append('satuan-hrg', $('#satuan-hrg').val());
        formData.append('promo', $('#promo').val());
        formData.append('balkon', $('#balkon').val());
        formData.append('taman', $('#taman').val());
        formData.append('carport', $('#carport').val());
        formData.append('r-tamu', $('#r-tamu').val());
        formData.append('r-keluarga', $('#r-keluarga').val());
        formData.append('k-tidur', $('#k-tidur').val());
        formData.append('k-mandi', $('#k-mandi').val());
        formData.append('r-makan', $('#r-makan').val());
        formData.append('dapur', $('#dapur').val());
        formData.append('vr', $('#vr').val());
        if ($('#btn-save').val() == 'save') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Tipe/add_data_tipe'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_tipe();
                },
                error: function(msg) {
                    alert(msg);
                    // alert("Data Gagal Diupload");
                }
            });
        } else if ($('#btn-save').val() == 'edit') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Tipe/edit_data_tipe'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_tipe()
                    alert('berhasil')
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });

    $('.btn-edit').click(function(e) {
        $('.btn-save-denah-lt1, .btn-save-denah-lt2').hide();
        $('#form-input-tipe, #form-upload-denah').show();
        $('#btn-save').val('edit');
        $('#id-tipe').val($(this).data('id-tipe'));
        $('#nm-tipe').val($(this).data('nm-tipe')).removeAttr('readonly', true);
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);

        $('#id-tipe').val($(this).data('id-tipe'));
        $('#kategori-tipe').val($(this).data('kategori-tipe'));
        $('#lantai').val($(this).data('lantai'));
        $('#luas-tanah').val($(this).data('luas-tanah'));
        $('#luas-bangunan').val($(this).data('luas-bangunan'));
        $('#hrg').val($(this).data('hrg'));
        $('#satuan-hrg').val($(this).data('satuan-hrg'));
        $('#promo').val($(this).data('promo'));
        $('#balkon').val($(this).data('balkon'));
        $('#taman').val($(this).data('taman'));
        $('#carport').val($(this).data('carport'));
        $('#r-tamu').val($(this).data('r-tamu'));
        $('#r-keluarga').val($(this).data('r-keluarga'));
        $('#k-tidur').val($(this).data('k-tidur'));
        $('#k-mandi').val($(this).data('k-mandi'));
        $('#r-makan').val($(this).data('r-makan'));
        $('#dapur').val($(this).data('dapur'));
        $('#vr').val($(this).data('vr'));
        if ($('#kategori-tipe').val() == 'komersil') {
            $('#ceklis-komersil').prop('checked', true);
        } else {
            $('#ceklis-komersil').prop('checked', false);
        }
        if ($('#kategori-tipe').val() == 'subsidi') {
            $('#ceklis-subsidi').prop('checked', true);
        } else {
            $('#ceklis-subsidi').prop('checked', false);
        }
        if ($('#satuan-hrg').val() == 'jt') {
            $('#ceklis-satuan-jt').prop('checked', true);
        } else {
            $('#ceklis-satuan-jt').prop('checked', false);
        }
        if ($('#satuan-hrg').val() == 'm') {
            $('#ceklis-satuan-m').prop('checked', true);
        } else {
            $('#ceklis-satuan-m').prop('checked', false);
        }
        if ($(this).data('lantai') == '1') {
            $("#nm-denah-lt1, #denah-lt1-lama").val($(this).data('denah-lt1'));
            $('#denah-lt2').hide();
            $('#preview-denah-lt1').attr({
                src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt1')
            });
            if ($(this).data('denah-lt1') == '') {
                $('#val-denahlt1').val('');

            } else {
                $('#val-denahlt1').val('1');
            }

        } else {
            $('#denah-lt2').show();
            $("#nm-denah-lt1, #denah-lt1-lama").val($(this).data('denah-lt1'));
            $('#preview-denah-lt1').attr({
                src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt1')
            });

            $("#nm-denah-lt2, #denah-lt2-lama").val($(this).data('denah-lt2'));
            $('#preview-denah-lt2').attr({
                src: '<?php echo base_url('upload'); ?>/' + $(this).data('denah-lt2')
            });
            if ($(this).data('denah-lt1') == '') {
                $('#val-denahlt1').val('');

            } else {
                $('#val-denahlt1').val('1');
            }
            if ($(this).data('denah-lt2') == '') {
                $('#val-denahlt2').val('');

            } else {
                $('#val-denahlt2').val('1');
            }
        }
        action_input_denah();

    });
    $('#btn-delete-denah-lt1, #btn-delete-denah-lt2').click(function() {

        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            if ($(this).data('denah') == 'lt1') {
                $('#btn-pilih-denah-lt1').show();
                $('#btn-delete-denah-lt1').hide();
                $('#nm-denah-lt1').val('')
                $('#preview-denah-lt1').attr({
                    src: ''
                });

                let formData = new FormData();
                formData.append('action', $(this).data('denah'));
                formData.append('denah-lama', $('#denah-lt1-lama').val());
                formData.append('nm-denah', $('#nm-denah-lt1').val());
                formData.append('id-tipe', $('#id-tipe').val());
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('Tipe/delete_denah') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        load_tipe();
                        // alert('berhasil')
                        $('#form-input-tipe, #form-upload-denah').show();
                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });

            } else {
                $('#btn-pilih-denah-lt2').show();
                $('#btn-delete-denah-lt2').hide();
                $('#nm-denah-lt2').val('')
                $('#preview-denah-lt2').attr({
                    src: ''
                });

                let formData = new FormData();
                formData.append('action', $(this).data('denah'));
                formData.append('denah-lama', $('#denah-lt2-lama').val());
                formData.append('nm-denah', $('#nm-denah-lt2').val());
                formData.append('id-tipe', $('#id-tipe').val());
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('Tipe/delete_denah') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        load_tipe();
                        // alert('berhasil')
                        $('#form-input-tipe, #form-upload-denah').show();
                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        }

    });
    $('.btn-delete').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('denah-lt1', $(this).data('denah-lt1'));
            formData.append('denah-lt2', $(this).data('denah-lt2'));
            formData.append('id-tipe', $(this).data('id-tipe'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Tipe/delete_data_tipe') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    $(el).closest('tr').css('background', 'tomato');
                    $(el).closest('tr').fadeOut(300, function() {
                        $(this).remove();
                    });
                }
            });
        }
    });

    function action_input_denah() {
        if ($("#nm-denah-lt1").val() == '') {
            $('#btn-pilih-denah-lt1').show();
            $('#btn-delete-denah-lt1').hide();
        } else {
            $('#btn-pilih-denah-lt1').hide();
            $('#btn-delete-denah-lt1').show();
        }

        if ($("#nm-denah-lt2").val() == '') {

            $('#btn-pilih-denah-lt2').show();
            $('#btn-delete-denah-lt2').hide();
        } else {
            $('#btn-pilih-denah-lt2').hide();
            $('#btn-delete-denah-lt2').show();
        }
    }

    function load_tipe() {
        let formData = new FormData();
        formData.append('id-tipe-perum', $('#id-tipe-perum').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Tipe/data_tipe_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-tipe').html(data).show();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }
</script>