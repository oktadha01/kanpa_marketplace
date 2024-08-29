<script>
    $('.data-perum').click(function() {
        $('.data-lokasi-terdekat').hide();
        $('.data-lokasi-terdekat').hide().html('0');
        $('.data').removeClass('data-lokasi-terdekat')
        $('#data' + $(this).data('id-perum')).addClass('data-lokasi-terdekat');
        $('#id-lokasi-terdekat-perum').val($(this).data('id-perum'));
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
                $('.data-lokasi-terdekat').html(data).show();
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    })
</script>