<!-- <div class="col-6"> -->
<label class="desk" for="">Add & Edit Lokasi Terdekat</label>
<!-- </div> -->

<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <label for="nm-lokasi-terdekat">Lokasi Terdekat</label>
        <div class="form-group mt-2">
            <input type="text" id="nm-lokasi-terdekat" class="form-control" name="tittle_project" required readonly value="">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <label for="nm-lokasi-terdekat">Jarak Ke Lokasi</label>
        <div class="form-group mt-2">
            <input type="number" id="jarak-lokasi-terdekat" class="form-control" name="tittle_project" required readonly value="">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-6 col-md-6 col-4">
        <button type="button" id="btn-cencel" class="btn btn-sm btn-outline-danger" hidden><i class="fa-solid fa-xmark"></i> Batal</button>
    </div>
    <div class="col-lg-6 col-md-6 col-8">
        <button type="button" id="btn-add" class="btn btn-sm float-right btn-outline-info"><i class="fa-regular fa-pen-to-square"></i> Tambah lokasi terdekat</button>
        <button type="button" id="btn-save" class="btn btn-sm float-right btn-outline-success" value="" hidden><i class=" fa-regular fa-pen-to-square"></i> Simpan lokasi terdekat </button>
    </div>
</div>
<hr>
<table class="table">
    <thead class="table__thead">
        <tr>
            <th class="table__th">LOKASI TERDEKAT</th>
            <th class="table__th">WAKTU JARAK</th>
        </tr>
    </thead>
    <tbody class="table__tbody">
        <?php
        foreach ($data_lokasi_terdekat as $data) :
        ?>
            <tr class="table-row table-row--chris">
                <td class="table-row__td">
                    <ul>
                        <li style="list-style:none;">
                            <p class="table-row__name"><?php echo $data->nm_lokasi_terdekat; ?></p>
                        </li>
                    </ul>
                </td>
                <td class="table-row__td">
                    <ul>
                        <li style="list-style:none;">
                            <p class="table-row__name"><?php echo $data->jarak_lokasi_terdekat; ?> Menit</p>
                        </li>
                    </ul>
                </td>
                <td class="row-td-action">
                    <a href="#" class="btn-edit" data-id-lokasi-terdekat="<?php echo $data->id_lokasi_terdekat; ?>" data-nm-lokasi-terdekat="<?php echo $data->nm_lokasi_terdekat; ?>" data-jarak-lokasi-terdekat="<?php echo $data->jarak_lokasi_terdekat; ?>">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" class="btn-delete" data-id-lokasi-terdekat="<?php echo $data->id_lokasi_terdekat; ?>">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </tbody>
</table>
<script>
    $('#btn-add').click(function(e) {
        $('#nm-lokasi-terdekat, #jarak-lokasi-terdekat').removeAttr('readonly', true);
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);
        $('#btn-save').val('save');
    });
    $('#btn-cencel').click(function(e) {
        $('#btn-save').val('save');
        $('#id-lokasi-terdekat, #id-lokasi-terdekat-perum').val('');
        $('#nm-lokasi-terdekat, #jarak-lokasi-terdekat').val('').attr('readonly', true);
        $('#btn-save, #btn-cencel').attr('hidden', true);
        $('#btn-add').removeAttr('hidden', true);
    });

    $('#btn-save').click(function(e) {
        let formData = new FormData();
        formData.append('id-lokasi-terdekat', $('#id-lokasi-terdekat').val());
        formData.append('id-lokasi-terdekat-perum', $('#id-lokasi-terdekat-perum').val());
        formData.append('nm-lokasi-terdekat', $('#nm-lokasi-terdekat').val());
        formData.append('jarak-lokasi-terdekat', $('#jarak-lokasi-terdekat').val());
        if ($('#btn-save').val() == 'save') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Lokasi_terdekat/add_data_lokasi_terdekat'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_lokasi_terdekat()
                },
                error: function(msg) {
                    alert(msg);
                    // alert("Data Gagal Diupload");
                }
            });
        } else if ($('#btn-save').val() == 'edit') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Lokasi_terdekat/edit_data_lokasi_terdekat'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_lokasi_terdekat()
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-edit').click(function(e) {
        $('#btn-save').val('edit');
        $('#id-lokasi-terdekat').val($(this).data('id-lokasi-terdekat'));
        $('#nm-lokasi-terdekat').val($(this).data('nm-lokasi-terdekat')).removeAttr('readonly', true);
        $('#jarak-lokasi-terdekat').val($(this).data('jarak-lokasi-terdekat')).removeAttr('readonly', true);
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);

    });

    $('.btn-delete').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-lokasi-terdekat', $(this).data('id-lokasi-terdekat'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Lokasi_terdekat/delete_data_lokasi_terdekat') ?>",
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

    function load_lokasi_terdekat() {
        let formData = new FormData();
        formData.append('id-lokasi-terdekat-perum', $('#id-lokasi-terdekat-perum').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Lokasi_terdekat/data_lokasi_terdekat_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-lokasi-terdekat').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }
</script>