<div class="accordion accordion-flush" id="faqlist">
    <table class="table">
        <thead class="table__thead">
            <tr>
                <th class="table__th">FOTO</th>
            </tr>
        </thead>
        <tbody class="table__tbody">
            <?php
            foreach ($data_voucher as $data) :
            ?>
                <tr class="table-row table-row--chris">
                    <td class="table-row__td">
                        <div class="table-row__img">
                            <img src="<?php echo base_url('upload'); ?>/voucher/<?php echo $data->foto_voucher; ?>" class="img-fluid" alt="">
                        </div>
                        <div class="table-row__info">
                            <p class="table-row__name"><?php echo $data->nm_voucher; ?></p>
                        </div>
                    </td>
                    <td>
                        <?php
                        foreach ($data_perum as $perum) {
                            if ($perum->id_perum == $data->id_perum_voucher) {
                                echo $perum->nm_perum;
                            }
                        }
                        ?>
                        <?php
                        foreach ($data_tipe as $tipe) {
                            if ($tipe->id_tipe == $data->id_tipe_voucher) { ?>
                                Tipe <?php echo $tipe->luas_bangunan; ?>/<?php echo $tipe->luas_tanah;?>
                        <?php
                            }
                        }
                        ?>
                    </td>
                    <td class="row-td-action">
                        <a href="#" class="btn-edit" data-id-voucher="<?php echo $data->id_voucher; ?>" data-foto-voucher="<?php echo $data->foto_voucher; ?>" data-nm-voucher="<?php echo $data->nm_voucher; ?>" data-wa-voucher="<?php echo $data->wa_voucher; ?>" data-id-perum-voucher="<?php echo $data->id_perum_voucher; ?>" data-id-tipe-voucher="<?php echo $data->id_tipe_voucher; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </a>
                        <a href="#" class="btn-delete" data-id-voucher="<?php echo $data->id_voucher; ?>" data-foto-voucher="<?php echo $data->foto_voucher; ?>">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<input type="text" id="id-voucher" hidden>
<script>
    $('.btn-edit').click(function(e) {
        $('#id-voucher').val($(this).data('id-voucher'));
        $('#btn-save-voucher').val('edit');
        $('#nm-voucher').val($(this).data('nm-voucher'));
        $('#wa-voucher').val($(this).data('wa-voucher'));
        $('#foto-voucher-lama,#file-foto-vouche,#nm-foto-voucher').val($(this).data('foto-voucher'));
        var perum = $(this).data('id-perum-voucher');
        var tipe = $(this).data('id-tipe-voucher');
        $('#select-perum').val(perum);
        $('#select-perum').select2().trigger('change');
        setTimeout(function() {
            $('#select-tipe').val(tipe);
            $('#select-tipe').select2().trigger('change');
        }, 300);
        document.getElementById("preview-foto-voucher").src = '<?php echo base_url('upload'); ?>/voucher/' + $(this).data('foto-voucher');

    });

    $('.btn-delete').click(function(e) {
        // alert($(this).data('foto-voucher'))
        var el = this;

        // Delete id
        var confirmalert = confirm("Are you sure?");
        if (confirmalert == true) {
            let formData = new FormData();
            formData.append('id-voucher', $(this).data('id-voucher'));
            formData.append('foto-voucher', $(this).data('foto-voucher'));
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('voucher/delete_voucher') ?>",
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
</script>