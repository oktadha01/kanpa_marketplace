<script type="text/javascript">
    $(document).ready(function() {
        $('#code_preview0').summernote({
            height: 300
        });
    });
    var content_row = 1;

    function addContent() {
        html = '<div id="content-row">';
        html += '<div class="form-group">';
        html += '<label class="col-sm-2">Page Content</label>';
        html += '<div class="col-sm-10">';
        html +=
            '<textarea class="form-control" id="code_preview' +
            content_row +
            '" name="page_code[' +
            content_row +
            '][code]" style="height: 300px;"></textarea>';
        html += "</div>";
        html += "</div>";
        html += "</div>";
        $("#content-row").append(html);
        $("#code_preview" + content_row).summernote({
            height: 300
        });

        content_row++;
    }
    $(function() {
        var url = window.location.href;

        // passes on every "a" tag
        $(".note-toolbar").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest(".btn-default").addClass("active");
            }
        });
        // this will get the full URL at the address bar
    });
</script>
<script>
    load_data_berita();
    select_tag();
    $('.input-tag').hide();
    $('.btn-tambah-berita').click(function(e) {
        $('#form-berita').removeAttr('hidden', true);
        $('.btn-tambah-berita').attr('hidden', true);
        $('.btn-simpan-berita, .btn-batal-berita').removeAttr('hidden', true);
    });
    $('#select-tag').change(function(e) {
        var tag = $("#select-tag").find(':selected').val();
        // alert(tag)
        if (tag == 'add tag') {
            $('.input-tag').val('').show();
        } else {
            $('.input-tag').hide();
            $('#tag-berita').val(tag);
        }
    });

    $('#file-foto-berita').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-berita").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-berita").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $('#ceklis-ubah-foto-berita').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-berita').val('change-foto-berita');
        } else {
            $('#ceklis-ubah-foto-berita').val('');
        }
    });
    $('.btn-simpan-berita').click(function(e) {
        var action = $('.btn-simpan-berita').val();
        const foto_berita = $('#file-foto-berita').prop('files')[0];
        const foto_btn = $('#file-foto-btn').prop('files')[0];
        let formData = new FormData();
        formData.append('id-berita', $('#id-berita').val());
        formData.append('id-data-berita', $('#id-data-berita').val());
        formData.append('text-berita', $("#code_preview0").code());
        formData.append('ceklis-ubah-foto-berita', $('#ceklis-ubah-foto-berita').val());
        formData.append('judul-berita', $('#judul-berita').val());
        formData.append('meta-desk', $('#meta-desk').val());
        formData.append('tgl-berita', $('#tgl-berita').val());
        formData.append('tag-berita', $('#tag-berita').val());
        formData.append('foto-berita', foto_berita);
        formData.append('foto-lama', $('#foto-lama').val());
        formData.append('file-foto-btn', foto_btn);
        formData.append('link-btn', $('#link-btn').val());
        formData.append('foto-btn-lama', $('#foto-btn-lama').val());
        if (action == 'simpan') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/simpan_data_berita'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil')
                    load_data_berita();
                    select_tag();
                    form_default();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if (action == 'edit') {
            // alert('ya')
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/edit_data_berita'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data)
                    load_data_berita();
                    select_tag();
                    form_default();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if (action == 'add-content') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/add_content'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_content_berita();
                    form_default();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });

        } else if (action == 'edit-content') {
            // alert('edit');
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('berita/edit_content'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data)
                    alert('Data berhasil di edit')
                    load_data_content_berita();
                    form_default();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-batal-berita').click(function(e) {

        form_default();
    });

    $('.filter').click(function() {
        $('#filter').val($(this).data('filter'))
        load_data_berita();
    });
    $(function() {
        $('#tgl-berita').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD MMMM YYYY'
            }
        })
    });

    $('#file-foto-btn').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-btn").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-btn").src = e.target.result;
            $('#btn-delete-foto-btn').show();
            $('#btn-pilih-foto-btn').hide();
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $('#btn-delete-foto-btn').click(function() {

        document.getElementById("preview-foto-btn").src = '';
        $('#btn-delete-foto-btn').hide();
        $('#btn-pilih-foto-btn').show();
        $('#file-foto-btn, #nm-foto-btn, #link-btn').val('');
        $('#foto-btn-lama').val($(this).val());
    });

    function form_default() {
        // alert('ya');
        $('.btn-simpan-berita').val('simpan');
        $('.btn-simpan-berita, .btn-batal-berita').attr('hidden', true);
        $('#form-berita, #content-berita').attr('hidden', true);
        $('.btn-tambah-berita').removeAttr('hidden', true);
        $('#judul-berita,#tgl-berita,#desk-berita,#file-foto-berita,#nm-foto-berita, #nm-foto-btn, #link-btn').val('');
        $("#code_preview0").code('');

        $('#preview-foto-berita').attr({
            src: ''
        });
        $('#preview-foto-btn').attr({
            src: ''
        });
        $('#ceklis-ubah-foto-berita').prop('checked', false);
        $('.btn-batal-berita').attr('hidden', true);
        $('#ceklis-ubah-berita').attr('hidden', true);
    }

    function load_data_berita() {
        let formData = new FormData();
        formData.append('filter', $('#filter').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('berita/data_berita'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-berita').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function load_data_content_berita() {
        var id_berita = $('#id-berita').val();
        let formData = new FormData();
        formData.append('id-berita', $('#id-berita').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Berita/data_artikel_berita'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#berita-data' + id_berita).html(data).show();
                // $('#id-berita').val(id_berita);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }

    function select_tag() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('berita/select_data_tag'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $("#select-tag").html(data);
            },
            error: function() {
                alert("Data Gagal Diuploadzzzzz");
            }
        });
    }
    $("#select-tag").select2({
        placeholder: "Pilih item barang",
        allowClear: true
    });
</script>