<script>
    $('#btn-set-foto-outher-header').click(function() {
        load_data_set_outher_header();
    });
    $('#btn-set-foto-header').click(function() {
        load_data_set_header();
    });
    $('#btn-change-foto-header').click(function() {
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            var file = $(this).parents().find(".set-foto-header");
            file.trigger("click");
        }
    });
    $('#file-set-foto-header').change(function() {
        const set_foto_header = $('#file-set-foto-header').prop('files')[0];
        let formData = new FormData();
        formData.append('header-foto', set_foto_header);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('foto/set_foto_header') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(msg) {
                alert('Foto berhasil di simpan');
                load_data_set_header();
            },
            error: function(msg) {
                alert('Foto gagal di simpan');
            }
        });
    });

    function load_data_set_header() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('foto/load_set_foto_header') ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.load-set-foto-header').attr('src', data)
            },
            error: function(msg) {
                alert('Foto gagal di simpan');
            }
        });
    }

    function load_data_set_outher_header() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('foto/load_set_foto_outher_header') ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // $('.load-set-foto-outher-header').attr('src', data);
                $('.data-outher-header').html(data).show();
            },
            error: function(msg) {
                alert('Foto gagal di simpan');
            }
        });
    }
    $('.data-tipe').click(function() {
        $('.data-foto').hide();
        $('.data-foto').hide().html('0');
        $('.data').removeClass('data-foto')
        $('#data' + $(this).data('id-foto-tipe')).addClass('data-foto');
        $('#id-foto-tipe').val($(this).data('id-foto-tipe'));
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
    });
    // $('.btn-add-foto').click(function() {
    //     alert($(this).data('id-perum'));
    // });
    $('#file-foto-header-perum').change(function(e) {
        // var id_perum = $('#id-perum').val();
        var fileName = e.target.files[0].name;
        $("#nm-foto-header-perum").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            // document.getElementById("preview-foto-header-perum-" + id_perum).src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        var kategori = $("#select-kategori").find(':selected').val();

        if (kategori == 'promo') {
            if ($('#text-wa-input').val() == '') {
                alert('Inputan tidak boleh kosong!')
            } else {
                input_foto_header();
                // alert(kategori)
            }
        } else if (kategori == 'siteplan') {
            if ($('#url-siteplan').val() == '') {
                alert('Inputan tidak boleh kosong!')
            } else {
                input_foto_header();
                // alert(kategori)
            }
        } else {
            input_foto_header();
        }

    });

    function input_foto_header() {
        var kategori = $("#select-kategori").find(':selected').val();
        if (kategori == 'other') {
            var id_perum = '0';
        } else {
            var id_perum = $('#id-perum').val();
        }
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            const foto_header_perum = $('#file-foto-header-perum').prop('files')[0];
            let formData = new FormData();
            formData.append('id-foto-perum', id_perum);
            formData.append('header-foto', foto_header_perum);
            formData.append('kategori-foto', $("#select-kategori").find(':selected').val());
            formData.append('text-wa', $("#text-wa-input").val());
            formData.append('url-siteplan', $("#url-siteplan").val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('foto/add_foto_header') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    alert('Foto berhasil di simpan');
                    load_foto_header();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    };
    $('.accordion-button').click(function() {
        $('#id-perum').val($(this).data('id-perum'));
        load_foto_header();
        $('.form-input-foto-header').html('');
        $('#form-input-foto-header-' + $(this).data('id-perum')).html('<div class="row mb-2">' +
            '<div class="col">' +
            '    <div class="float-right">' +
            '        <div class="form-group">' +
            '            <select id="select-kategori" class="js-states form-control col-lg-6 col-12">' +
            '                <option value=""></option>' +
            '                <option value="perumahan">Perumahan</option>' +
            '                <option value="promo">Promo</option>' +
            '                <option value="siteplan">Site Plan</option>' +
            '                <option value="other">Other</option>' +
            '            </select>' +
            '        </div>' +
            '    </div>' +
            '</div>' +
            '</div>' +
            '<ul class="nav nav-tabs row gy-4 d-flex mb-2">' +
            '    <li>' +
            '        <div id="input-url" class="form-group mb-2">' +
            '            <input type="text" id="url-siteplan" class="form-control" autocomplete="off" placeholder="URL" required value="">' +
            '        </div>' +
            '        <div id="input-text-wa" class="form-group mb-2">' +
            '            <input type="text" id="text-wa-input" class="form-control" autocomplete="off" placeholder="Text Wa" required value="">' +
            '        </div>' +
            '        <center id="btn-add-foto" class="border-add-foto">' +
            '            <i class="fa-regular fa-images fa-bounce"></i>' +
            '            <br>' +
            '            <span>add foto header</span>' +
            '        </center>' +
            '    </li>' +
            '    <hr>' +
            '</ul>');
        $("#select-kategori").select2({
            placeholder: "Add foto header",
            allowClear: true
        });
        $('#input-text-wa, #btn-add-foto, #input-url').hide();
        $('#select-kategori').change(function(e) {
            // alert('yas')
            var kategori = $("#select-kategori").find(':selected').val();
            // alert(kategori)
            $('#btn-add-foto').show();
            if (kategori == 'promo') {
                $('#input-text-wa').show();
                $('#input-url').hide();

            } else if (kategori == 'siteplan') {
                $('#input-url').show();
                $('#input-text-wa').hide();
            } else {
                $('#input-url').hide();
                $('#input-text-wa').hide();
            }
            if (kategori == '') {
                $('#input-text-wa, #btn-add-foto, #input-url').hide();
            }
        });

    });

    function btn_action_foto_header() {
        $('.btn-ceklis-foto-h').click(function() {
            if ($(this).attr('class') == 'btn-ceklis-foto-h ' || $(this).attr('class') == 'btn-ceklis-foto-h') { //harus ada sepasi '
                $(this).addClass('show-dashboard '); //harus ada sepasi '
                $(this).html('<i class="fa-solid fa-circle-check"></i>');
                var status_foto_header = 'show-dashboard'
                // alert($(this).data('id-foto-header') + status_foto_header);
            } else {
                $(this).removeClass('show-dashboard')
                $(this).html('');
                var status_foto_header = '';
                // alert($(this).data('id-foto-header') + status_foto_header)
            }
            // load_foto_header();
            let formData = new FormData();
            formData.append('id-foto-header', $(this).data('id-foto-header'));
            formData.append('status-foto-header', status_foto_header);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('foto/show_foto_dashboard') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (status_foto_header == '') {
                        alert('Foto tidak di tampilkan');
                    } else {
                        alert('Foto berhasil di tampilkan');
                    }

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });

        });
        $('.btn-edit-foto-header').click(function() {
            var id_foto_header = $(this).data('id-foto-header');
            var kategori_foto = $(this).data('kategori-foto');
            var header_foto = $(this).data('header-foto');
            $('.btn-simpan-edit-foto-header').attr('id', id_foto_header).val(kategori_foto);
            $('.btn-modal-delete-foto').attr('data-id-foto-header', id_foto_header).attr('data-foto-header', header_foto);
            if ($(this).data('kategori-foto') == 'promo') {
                $('#exampleModalLabel').text('Form Edit Link Wa');
                $('.attr-id-edit').attr('id', 'edit-text-wa').val($(this).data('text-wa'));
            } else if ($(this).data('kategori-foto') == 'siteplan') {
                $('#exampleModalLabel').text('Form Edit Link Site Plan');
                $('.attr-id-edit').attr('id', 'edit-url-siteplan').val($(this).data('url-siteplan'));
            }
        });
        $('.btn-simpan-edit-foto-header').click(function() {
            var id_foto_header = $(this).attr('id');
            var kategori_foto = $(this).val();
            // alert(id_foto_header + kategori_foto);
            let formData = new FormData();
            formData.append('id-foto-header', id_foto_header);
            formData.append('kategori-foto', kategori_foto);
            formData.append('text-wa', $('#edit-text-wa').val());
            formData.append('url-siteplan', $('#edit-url-siteplan').val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('foto/edit_foto_header') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg);
                    if (kategori_foto == 'promo') {
                        alert('Link wa berhasil di ubah');
                    } else if (kategori_foto == 'siteplan') {
                        alert('Url site plan berhasil di ubah');
                    }
                    load_foto_header();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        });
        $('.btn-delete-foto-header, .btn-modal-delete-foto').click(function() {
            var confirmalert = confirm("Apakah anda yakin untuk menghapus foto??");
            if (confirmalert == true) {
                // alert($(this).data('id-foto-header') + $(this).data('foto-header'))
                let formData = new FormData();
                formData.append('id-foto-header', $(this).data('id-foto-header'));
                formData.append('header-foto', $(this).data('foto-header'));
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('foto/delete_foto_header') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        alert('Foto berhasil di hapus !!');
                        load_foto_header();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });
        $('.btn-delete-foto-outher-header').click(function() {
            var confirmalert = confirm("Apakah anda yakin untuk menghapus foto??");
            if (confirmalert == true) {
                // alert($(this).data('id-foto-header') + $(this).data('foto-header'))
                let formData = new FormData();
                formData.append('id-foto-header', $(this).data('id-foto-header'));
                formData.append('header-foto', $(this).data('foto-header'));
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('foto/delete_foto_header') ?>",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(msg) {
                        alert('Foto berhasil di hapus !!');
                        load_data_set_outher_header();

                    },
                    error: function() {
                        alert("Data Gagal Diupload");
                    }
                });
            }
        });
    }

    $(document).on("click", "#btn-add-outher-header", function() {
        var file = $(this).parents().find(".file-set-foto-outher-header");
        file.trigger("click");

    });
    $('.file-set-foto-outher-header').change(function(e) {
        var fileName = e.target.files[0].name;
        // $("#nm-foto-header-perum").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
        }
        // document.getElementById("preview-foto-header-perum-" + id_perum).src = e.target.result;
        var confirmalert = confirm("Apakah anda yakin ??");
        if (confirmalert == true) {
            const foto_header_perum = $('.file-set-foto-outher-header').prop('files')[0];
            let formData = new FormData();
            formData.append('header-foto', foto_header_perum);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('foto/add_outher_header') ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(msg) {
                    // alert(msg);
                    alert('Foto berhasil di simpan');
                    load_data_set_outher_header();

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    function load_foto_header() {
        let formData = new FormData();
        formData.append('id-perum', $('#id-perum').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('foto/load_foto_header') ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('data')
                $('.data-foto-header').html('');
                $('#data-foto-header-' + $('#id-perum').val()).html(data);
                $('.show-dashboard').html('<i class="fa-solid fa-circle-check"></i>');
                btn_action_foto_header();

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });

    }


    // $('.btn-edit-foto-header').click(function() {
    //     var action = $(this).data('id-action')
    //     if ($(this).attr('class') == 'action-foto action') {
    //         $('.btn-action').attr('hidden', true);
    //         $(this).removeClass('action')
    //     } else {

    //         $('.btn-action').attr('hidden', true);
    //         $('.action-foto').removeClass('action');
    //         $('#action-' + action).removeAttr('hidden', true);
    //         $(this).addClass('action')
    //     }
    //     // alert('ya');
    // });
</script>