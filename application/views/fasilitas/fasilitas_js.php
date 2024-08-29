<script>
    $('.data-perum').click(function() {
        $('.data-fasilitas').hide();
        $('.data-fasilitas').hide().html('0');
        $('.data').removeClass('data-fasilitas')
        $('#data' + $(this).data('id-perum')).addClass('data-fasilitas');
        $('#id-fasilitas-perum').val($(this).data('id-perum'));
        let formData = new FormData();
        formData.append('id-fasilitas-perum', $(this).data('id-perum'));

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Fasilitas/data_fasilitas_perum'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.data-fasilitas').html(data).show();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
</script>