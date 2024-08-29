<script>
    $(document).ready(function() {
        if ($('#kategori-tipe').val() == 'subsidi') {
            $('#btn-subsidi').addClass('active-btn-filter')
        } else if ($('#kategori-tipe').val() == 'komersil') {
            $('#btn-komersil').addClass('active-btn-filter')
        }
    })
</script>