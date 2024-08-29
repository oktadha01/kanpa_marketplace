<div class="faq">
    <div class="" data-aos="fade-up">
        <hr>
        <div id="form-add-foto" class="row" hidden>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="file-foto-tipe">Foto</label>
                    <div class="input-group">
                        <input type="text" id="foto-tipe-lama" class="" value="" hidden>
                        <input type="file" id="file-foto-tipe" class="foto-tipe" value="" hidden>
                        <input type="text" class="form-control pilih-foto-tipe " readonly placeholder="Upload Gambar" id="nm-foto-tipe">
                        <div class="input-group-append">
                            <button type="button" id="btn-pilih-foto-tipe" class="pilih-foto-tipe browse btn btn-dark">Pilih Foto</button>
                            <button type="button" id="btn-delete-foto-tipe" class="browse btn btn-danger" hidden>Hapus Foto</button>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="harga">Label Foto</label>
                    <div class="custom-control custom-checkbox" style="font: -webkit-control;">
                        <input class="custom-control-input ceklis-label-foto" type="checkbox" id="ceklis-display" value="display">
                        <label for="ceklis-display" class="custom-control-label">Display</label>
                        <input class="custom-control-input ceklis-label-foto" type="checkbox" id="ceklis-interior" value="interior">
                        <label for="ceklis-interior" class="custom-control-label">Interior</label>
                        <input class="custom-control-input ceklis-label-foto" type="checkbox" id="ceklis-dashboard" value="dashboard">
                        <label for="ceklis-dashboard" class="custom-control-label">Dashboard</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <img id="preview-foto-tipe" src="" class="img-thumbnail" style="max-height: 20rem;">

            </div>
        </div>
        <div class="row mt-2">
            <div class="col-6">
                <button type="button" id="btn-cencel-foto" class="col-12 btn btn-sm btn-outline-danger" hidden><i class="fa-solid fa-xmark"></i> Batal</button>
            </div>
            <div class="col-6">
                <button type="button" id="btn-add-foto-tipe" class="col-12 btn btn-sm btn-outline-primary float-right"><i class="fa-solid fa-plus"></i> Tambah foto</button>
                <button type="button" id="btn-save-foto" class="col-12 btn btn-sm btn-outline-success float-right" value="save" hidden><i class="fa-solid fa-cloud-arrow-up"></i> Simpan foto</button>
            </div>
        </div>
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <table class="table">
                    <thead class="table__thead">
                        <tr>
                            <th class="table__th">FOTO</th>
                        </tr>
                    </thead>
                    <tbody class="table__tbody">
                        <?php
                        foreach ($data_foto as $data) :
                        ?>
                            <?php if ($data->label_foto == 'display') { ?>
                                <tr class="table-row table-row--chris">
                                    <td class="table-row__td">
                                        <div class="table-row__img">
                                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_tipe; ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="table-row__info">
                                            <p class="table-row__name"><?php echo $data->label_foto; ?></p>
                                        </div>
                                    </td>
                                    <td class="row-td-action">
                                        <a href="#form-add-foto" class="btn-edit" data-id-foto="<?php echo $data->id_foto; ?>" data-foto-tipe="<?php echo $data->foto_tipe; ?>" data-label-foto="<?php echo $data->label_foto; ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn-delete" data-id-foto="<?php echo $data->id_foto; ?>" data-foto-tipe="<?php echo $data->foto_tipe; ?>">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            } else { ?>
                                <tr class="table-row table-row--chris">
                                    <td class="table-row__td">
                                        <div class="table-row__img">
                                            <img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_tipe; ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="table-row__info">
                                            <p class="table-row__name"><?php echo $data->label_foto; ?></p>
                                        </div>
                                    </td>
                                    <td class="row-td-action">
                                        <a href="#form-add-foto" class="btn-edit" data-id-foto="<?php echo $data->id_foto; ?>" data-foto-tipe="<?php echo $data->foto_tipe; ?>" data-label-foto="<?php echo $data->label_foto; ?>">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="#" class="btn-delete" data-id-foto="<?php echo $data->id_foto; ?>" data-foto-tipe="<?php echo $data->foto_tipe; ?>">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn-save-foto, #btn-cencel-foto, #form-add-foto, #btn-delete-foto-tipe').removeAttr('hidden', true).hide();
    $('#btn-add-foto-tipe').click(function(e) {
        $('#btn-cencel-foto, #form-add-foto').show();
        $('#btn-add-foto-tipe').hide();
        $('#btn-save-foto').val('save');
    });
    $('#btn-cencel-foto').click(function(e) {
        $('#btn-cencel-foto,#btn-save-foto, #form-add-foto').hide();
        $('#btn-add-foto-tipe').show();
        $('#nm-foto-tipe, #label-foto').val('');
        $('#preview-foto-tipe').attr({
            src: ''
        });
        change_btn_foto();
        $('#btn-save-foto').val('save');
        $('#ubah-foto').val('');
    });
    $('.btn-edit').click(function(e) {
        $('#btn-save-foto').val('edit');
        $('#btn-add-foto-tipe').hide();
        $('#btn-cencel-foto, #form-add-foto').show();
        $('#preview-foto-tipe').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('foto-tipe')
        });
        $('#nm-foto-tipe,#foto-tipe-lama').val($(this).data('foto-tipe'));
        $('#label-foto').val($(this).data('label-foto'))
        $('#id-foto').val($(this).data('id-foto'))
        $('#ubah-foto').val('');
        change_btn_foto();
    });

    $('#btn-save-foto').click(function(e) {
        const foto_tipe = $('#file-foto-tipe').prop('files')[0];
        let formData = new FormData();
        formData.append('id-foto', $('#id-foto').val());
        formData.append('id-foto-tipe', $('#id-foto-tipe').val());
        formData.append('foto-tipe-lama', $('#foto-tipe-lama').val());
        formData.append('label-foto', $('#label-foto').val());
        formData.append('action', $('#ubah-foto').val());
        formData.append('foto-tipe', foto_tipe);
        if ($('#btn-save-foto').val() == 'save') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Foto/add_foto'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_foto_tipe();
                },
                error: function(msg) {
                    // alert("Data Gagal Diupload");
                }
            });
        } else if ($('#btn-save-foto').val() == 'edit') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Foto/edit_foto'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_foto_tipe();
                },
                error: function(msg) {
                    // alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('#btn-delete-foto-tipe').click(function(e) {
        $('#nm-foto-tipe, #label-foto').val('');
        $('#preview-foto-tipe').attr({
            src: ''
        });
        $('#ubah-foto').val('ubah-foto');
        change_btn_foto();

    });
    $('.btn-delete').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-foto', $(this).data('id-foto'));
            formData.append('foto-tipe', $(this).data('foto-tipe'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Foto/delete_foto') ?>",
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
    $('.ceklis-label-foto').click(function(e) {
        $('.ceklis-label-foto').not(this).prop('checked', false);
        if ($(this).is(":checked")) {
            $('#label-foto').val($(this).val())
        } else {

        }
    });
    $('#file-foto-tipe').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-tipe").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-tipe").src = e.target.result;
            $('#btn-save-foto').show();
            change_btn_foto();

        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    function change_btn_foto() {
        if ($('#nm-foto-tipe').val() == '') {
            $('#btn-delete-foto-tipe').hide();
            $('#btn-pilih-foto-tipe').show();
            $('#btn-save-foto').hide();
        } else {
            $('#btn-delete-foto-tipe').show();
            $('#btn-pilih-foto-tipe').hide();
            $('#btn-save-foto').show();

        }

        if ($('#label-foto').val() == 'display') {
            $('#ceklis-display').prop('checked', true);
        } else {
            $('#ceklis-display').prop('checked', false);
        }
        if ($('#label-foto').val() == 'interior') {
            $('#ceklis-interior').prop('checked', true);
        } else {
            $('#ceklis-interior').prop('checked', false);
        }
        if ($('#label-foto').val() == 'dashboard') {
            $('#ceklis-dashboard').prop('checked', true);
        } else {
            $('#ceklis-dashboard').prop('checked', false);
        }
    }

    function load_foto_tipe() {
        let formData = new FormData();
        formData.append('id-foto-tipe', $('#id-foto-tipe').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Foto/data_foto_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-foto').html(data).show();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }
</script>