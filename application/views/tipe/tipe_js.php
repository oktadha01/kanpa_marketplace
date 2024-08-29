<script>
    $('.data-perum').click(function() {

        $('.data-tipe').hide();
        $('.data-tipe').hide().html('0');
        $('.data').removeClass('data-tipe')
        $('#data' + $(this).data('id-perum')).addClass('data-tipe');
        $('#id-tipe-perum').val($(this).data('id-perum'));
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
    })
</script>