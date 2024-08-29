<div class="faq">
    <!-- <div class="" data-aos="fade-up"> -->
    <div class="row">
        <div class="accordion accordion-flush" id="faqlist">
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th class="table__th">NO</th>
                        <th class="table__th">PERUMAHAN</th>
                        <th class="table__th">KODE</th>
                        <th class="table__th">ALAMAT</th>
                        <th class="table__th">LOGO</th>
                        <th class="table__th">ACTION</th>
                    </tr>
                </thead>
                <tbody class="table__tbody">
                    <?php
                    foreach ($data_perum as $data) :
                    ?>
                        <tr class="table-row table-row--chris">
                            <td class="table-row__td" style=" width: 60px;">
                                <input type="text" id="order-perum-<?php echo $data->id_perum; ?>" class="form-control order-perum" data-id-perum="<?php echo $data->id_perum; ?>" autocomplete="off" required value="<?php echo $data->order_perum; ?>">
                            </td>
                            <td class="table-row__td">
                                <div class="table-row__img">
                                    <img src="<?php echo base_url('upload'); ?>/<?php echo $data->logo; ?>" class="img-fluid" alt="">
                                </div>
                                <div class="table-row__info">
                                    <p class="table-row__name"><?php echo $data->nm_perum; ?></p>
                                </div>
                            </td>
                            <td class="table-row__td">
                                <?php echo $data->kode_perum; ?>
                            </td>
                            <td class="table-row__td">
                                <?php echo $data->alamat; ?>
                                <textarea id="map-<?php echo $data->id_perum; ?>" hidden><?php echo $data->map; ?></textarea>
                            </td>
                            <td class="table-row__td">
                                <div class="form-group">
                                    <div id="bg-rekomen<?php echo $data->id_perum; ?>" class="custom-control custom-checkbox boder-rekomend">
                                        <input class="custom-control-input ceklis-rekomen" type="checkbox" id="ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>" data-id-perum="<?php echo $data->id_perum; ?>" value="<?php echo $data->status_perum; ?>">
                                        <label for="ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>" class="ceklis-ubah-foto-logo<?php echo $data->id_perum; ?> custom-control-label"></label>
                                    </div>
                                </div>
                            </td>
                            <td class="row-td-action">
                                <a href="#" class="btn-edit" data-id-perum="<?php echo $data->id_perum; ?>" data-nm-perum="<?php echo $data->nm_perum; ?>" data-kode-perum="<?php echo $data->kode_perum; ?>" data-alamat="<?php echo $data->alamat; ?>" data-url-map="<?php echo $data->url_map; ?>" data-map="" data-deskripsi="<?php echo $data->deskripsi; ?>" data-meta-deskripsi="<?php echo $data->meta_deskripsi; ?>" data-logo="<?php echo $data->logo; ?>" data-video="<?php echo $data->video; ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="#" class="btn-delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <script>
                            if ($('#ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>').val() == 'Direkomendasikan') {
                                $('#ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>').prop('checked', true);
                                $('.ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>').text('Direkomendasikan');
                                $('#bg-rekomen<?php echo $data->id_perum; ?>').addClass('direkomendasikan');
                            } else {
                                $('#ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>').prop('checked', false);
                                $('.ceklis-ubah-foto-logo<?php echo $data->id_perum; ?>').text('');
                                $('#bg-rekomen<?php echo $data->id_perum; ?>').removeClass('direkomendasikan');
                            }
                        </script>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            <input type="text" id="id-perum" value="" hidden>
        </div>
    </div>
    <!-- </div> -->
</div>
<script>
    $('.ceklis-rekomen').click(function(e) {
        if ($(this).is(":checked")) {
            // profesi.push($(this).val());
            // alert($(this).data('id-perum'));
            var status = 'Direkomendasikan';
            $('#ceklis-ubah-foto-logo' + $(this).data('id-perum')).prop('checked', true);
            $('.ceklis-ubah-foto-logo' + $(this).data('id-perum')).text('Direkomendasikan');
            $('#bg-rekomen' + $(this).data('id-perum')).addClass('direkomendasikan');
        } else {
            var status = '';
            $('#ceklis-ubah-foto-logo' + $(this).data('id-perum')).prop('checked', false);
            $('.ceklis-ubah-foto-logo' + $(this).data('id-perum')).text('');
            $('#bg-rekomen' + $(this).data('id-perum')).removeClass('direkomendasikan');
        }
        let formData = new FormData();
        formData.append('id-perum', $(this).data('id-perum'));
        formData.append('status-perum', status);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('perum/status_data_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('berhasil')
                // form_default();
                // load_data_perum();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
    $('.btn-edit').click(function(e) {
        $('#herf-batal, #ceklis-ubah-logo').removeAttr('hidden', true);
        $('.btn-simpan-perum').val('edit');
        $('#id-perum').val($(this).data('id-perum'));
        $('#nm-perum').val($(this).data('nm-perum'));
        $('#kode-perum').val($(this).data('kode-perum'));
        $('#alamat').val($(this).data('alamat'));
        $('#url-map').val($(this).data('url-map'));
        $('#map').val($('#map-' + $(this).data('id-perum')).val());
        $('#deskripsi').val($(this).data('deskripsi'));
        $('#meta-deskripsi').val($(this).data('meta-deskripsi'));
        $('#logo').val($(this).data('logo'));
        $('#video').val($(this).data('video'));
        $('#logo-lama').val($(this).data('logo'));
        $('#preview-foto-logo').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('logo')
        });
    });
    $('.order-perum').on('input', function() {
        if ($('#order-perum-' + $(this).data('id-perum')).val() == ''){

        }else{
            // alert($(this).data('id-perum'));
            let formData = new FormData();
            formData.append('id-perum', $(this).data('id-perum'));
            formData.append('order-perum', $('#order-perum-' + $(this).data('id-perum')).val());
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('perum/move_columns'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
    
            });
        }
    });
</script>