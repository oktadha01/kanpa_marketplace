<script>
    load_data_perum();
    $('.btn-filter-price').click(function(e) {
        $('#price-min').val($(this).data('min'));
        $('#price-max').val($(this).data('max'));
        $('#satuan-hrg').val($(this).data('satuan-hrg'));
        load_data_perum();
    })

    function load_data_perum() {
        let formData = new FormData();
        formData.append('satuan-hrg', $('#satuan-hrg').val());
        formData.append('price-min', $('#price-min').val());
        formData.append('price-max', $('#price-max').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('estimasi_harga/filter_price'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-estimasi-hrg').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
    var header = document.getElementById("btn-price");
    var btns = header.getElementsByClassName("btn-filter-price");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("btn-filter-active");
            current[0].className = current[0].className.replace(" btn-filter-active", "");
            this.className += " btn-filter-active";
        });
    }
</script>