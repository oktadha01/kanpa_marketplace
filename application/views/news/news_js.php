<script>
    $('.konten').removeAttr('hidden', true).hide();
    $('.add-view-news').on('click', function(e) {
        var id_berita = $(this).data('id-berita');
        let formData = new FormData();
        formData.append('id-berita', id_berita);
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('berita/add_view_berita'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // $('.konten' + id_berita).toggle(300);
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>