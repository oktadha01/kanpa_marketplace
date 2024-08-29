<!-- <div class="col-6"> -->
<label class="desk" for="">Add & Edit Fasilitas</label>
<!-- </div> -->

<div class="row">
    <div class="col-12">
        <div class="form-group mt-2">
            <input type="text" id="nm-fasilitas" class="form-control" name="tittle_project" required readonly value="">
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-6">
        <button type="button" id="btn-cencel" class="btn btn-sm btn-outline-danger" data-id-project="" hidden><i class="fa-solid fa-xmark"></i> Batal</button>
    </div>
    <div class="col-6">
        <button type="button" id="btn-add" class="btn btn-sm float-right btn-outline-info" data-id-project=""><i class="fa-regular fa-pen-to-square"></i> Tambah fasilitas</button>
        <button type="button" id="btn-save" class="btn btn-sm float-right btn-outline-success" value="" hidden><i class=" fa-regular fa-pen-to-square"></i> Simpan Fasilitas </button>
    </div>
</div>
<hr>
<table class="table">
    <thead class="table__thead">
        <tr>
            <th class="table__th">fasilitas</th>
        </tr>
    </thead>
    <tbody class="table__tbody">
        <?php
        foreach ($data_fasilitas as $data) :
        ?>
            <tr class="table-row table-row--chris">
                <td class="table-row__td">
                    <ul>
                        <li>
                            <p class="table-row__name"><?php echo $data->nm_fasilitas; ?></p>
                        </li>
                    </ul>
                </td>
                <td class="row-td-action">
                    <a href="#" class="btn-edit" data-id-fasilitas="<?php echo $data->id_fasilitas; ?>" data-nm-fasilitas="<?php echo $data->nm_fasilitas; ?>">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <a href="#" class="btn-delete" data-id-fasilitas="<?php echo $data->id_fasilitas; ?>">
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
        $('#nm-fasilitas').removeAttr('readonly', true);
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);
        $('#btn-save').val('save');
    });
    $('#btn-cencel').click(function(e) {
        $('#btn-save').val('save');
        $('#id-fasilitas').val('');
        $('#nm-fasilitas').val('').attr('readonly', true);
        $('#btn-save, #btn-cencel').attr('hidden', true);
        $('#btn-add').removeAttr('hidden', true);
        $('#nm-fasilitas').val('').attr('readonly', true);
    });

    $('#btn-save').click(function(e) {
        let formData = new FormData();
        formData.append('nm-fasilitas', $('#nm-fasilitas').val());
        formData.append('id-fasilitas', $('#id-fasilitas').val());
        formData.append('id-fasilitas-perum', $('#id-fasilitas-perum').val());
        if ($('#btn-save').val() == 'save') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Fasilitas/add_data_fasilitas'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_fasilitas()
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if ($('#btn-save').val() == 'edit') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Fasilitas/edit_data_fasilitas'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_fasilitas()
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-edit').click(function(e) {
        $('#btn-save').val('edit');
        $('#id-fasilitas').val($(this).data('id-fasilitas'));
        $('#nm-fasilitas').val($(this).data('nm-fasilitas')).removeAttr('readonly', true);
        $('#btn-save, #btn-cencel').removeAttr('hidden', true);
        $('#btn-add').attr('hidden', true);

    });

    $('.btn-delete').click(function(e) {
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-fasilitas', $(this).data('id-fasilitas'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('Fasilitas/delete_data_fasilitas') ?>",
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

    function load_data_fasilitas() {
        let formData = new FormData();
        formData.append('id-fasilitas-perum', $('#id-fasilitas-perum').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Fasilitas/data_fasilitas_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-fasilitas').html(data);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }
</script>