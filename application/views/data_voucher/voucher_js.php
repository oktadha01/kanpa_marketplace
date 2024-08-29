<script>
    select();
    load_data_voucher();
    $('#select-perum').change(function(e) {
        let formData = new FormData();
        formData.append('id-perum', $("#select-perum").find(':selected').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('voucher/select_data_tipe'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#select-tipe").html(data);

            },
            error: function() {
                alert("Data Gagal Diuploadzzzzz");
            }
        });
    });
    $('#btn-save-voucher').click(function(e) {
        if ($('#nm-foto-voucher').val() == $('#foto-voucher-lama').val()) {
            var action = ''
        } else {
            var action = 'edit-voucher'

        }
        const foto_tipe = $('#file-foto-voucher').prop('files')[0];
        let formData = new FormData();
        formData.append('id-voucher', $('#id-voucher').val());
        formData.append('id-perum-voucher', $("#select-perum").find(':selected').val());
        formData.append('id-tipe-voucher', $("#select-tipe").find(':selected').val());
        formData.append('nm-voucher', $('#nm-voucher').val());
        formData.append('wa-voucher', $('#wa-voucher').val());
        formData.append('foto-voucher', foto_tipe);
        formData.append('foto-voucher-lama', $('#foto-voucher-lama').val());
        formData.append('action', action);
        if ($('#btn-save-voucher').val() == 'save') {

            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('voucher/add_voucher'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_voucher();
                    form_default();
                },
                error: function(msg) {
                    alert("Data Gagal Diupload");
                }
            });
        } else if ($('#btn-save-voucher').val() == 'edit') {
            // alert(action);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('voucher/edit_voucher'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_voucher();
                    form_default();
                },
                error: function(msg) {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('#btn-cencel-voucher').click(function(e) {
        form_default();
    });
    $('#file-foto-voucher').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-voucher").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-voucher").src = e.target.result;
            // $('#btn-save-foto').show();
            // change_btn_foto();

        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    function load_data_voucher() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('voucher/data_voucher'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#data-voucher").html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function form_default() {
        $('#btn-save-voucher').val('save');
        $('#nm-voucher,#wa-voucher,#foto-voucher-lama,#file-foto-voucher,#nm-foto-voucher').val('');
        document.getElementById("preview-foto-voucher").src = '';
        $('#select-perum, #select-tipe').val('');
        $('#select-perum, #select-tipe').select2().trigger('change');
        select();
    }

    function select() {
        $("#select-perum").select2({
            placeholder: "Pilih perumahan",
            allowClear: true
        });
        $("#select-tipe").select2({
            placeholder: "Pilih tipe",
            allowClear: true
        });
    }
</script>