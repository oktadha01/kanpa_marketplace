<script>
    $("#perum").select2({
        placeholder: "Select a programming language",
        allowClear: true
    });

    $('#file-ktp').change(function(e) {

        $('#preview-foto-ktp').removeAttr('hidden', true);
        $('.icon-foto').hide();
        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-ktp").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $(function() {
        $('#tgl-lahir').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD-MM-YYYY'
            },
        });
    });
    // var nik = '11111'
    // location.href = "<?php echo base_url('Surat/promo'); ?>/" + nik

    $('#simpan-data-promo').click(function(e) {
        // alert($('#perum').find(':selected').text());
        var nik = $('#nik').val();
        const ktp = $('#file-ktp').prop('files')[0];
        let formData = new FormData();
        formData.append('nama', $('#nama').val());
        formData.append('nik', $('#nik').val());
        formData.append('tempat-lahir', $('#tempat-lahir').val());
        formData.append('tgl-lahir', $('#tgl-lahir').val());
        formData.append('alamat', $('#alamat').val());
        formData.append('ktp', ktp);
        formData.append('kontak', $('#kontak').val());
        formData.append('perum', $('#perum').find(':selected').text());
        formData.append('promo', $('#promo').val());
        formData.append('nm-marketing', $('#nm-marketing').val());
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('promo/simpan_user_promo'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                // alert('berhasil')
                   location.href = "<?php echo base_url('Surat/promo'); ?>/" + nik
            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    });
</script>
<!-- <script>
    function createPDF() {

        var element = document.getElementById('element-to-print');
        html2pdf(element, {
            margin: 0,
            padding: 0,
            filename: 'myfile.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1,
                logging: true
            },
            jsPDF: {
                // unit: 'in',
                // format: 'A4',
                // orientation: 'P'
            },
            class: createPDF
        });
    };
    const urlImage = document.getElementById("url-image");
    const convertBtn = document.getElementById("convert");
    const message = document.querySelector(".message");

    const resultArea = document.getElementById("result-area");
    const resultConvert = document.getElementById("result-convert");
    const toast = document.getElementById("toast");

    function activeToast(message) {
        toast.innerText = message;

        setTimeout(() => {
            toast.innerText = "";
        }, 1500)
    }

    async function toBase64(url, callback) {
        try {
            const response = await fetch(url);
            const blobUrl = await response.blob();

            if (response.status === 200) {
                const reader = new FileReader();
                reader.onload = function(base64) {
                    callback(base64.currentTarget.result);
                }
                reader.readAsDataURL(blobUrl);

            } else {
                callback("URL invalid");
            }
        } catch (error) {
            console.error("Erro: " + error);
            callback("URL invalid");
        }
    }

    function htmlEncode(value) {
        return $('<div/>').text(value).html();
    }

    $(function() {
        $("#generate").click(function() {
            $('#url-image').val("https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode($("#content").val()) + "&chs=160x160&chld=L|0")
            toBase64(urlImage.value, function(result) {
                if (result === "URL invalid") {
                    resultConvert.value = "";
                    // resultArea.classList.remove("show");

                    activeToast(result);
                } else {
                    activeToast("Converted");

                    // resultArea.classList.add("show");
                    resultConvert.value = result;
                    $(".qr-code").attr("src", result);
                }
            })
        });
    });



    convertBtn.addEventListener("click", (e) => {
        e.preventDefault();
        // if (urlImage.value === "") {
        //     message.classList.add("show");
        //     urlImage.focus();
        //     resultArea.classList.remove("show")

        // } else {
        // message.classList.remove("show");

        toBase64(urlImage.value, function(result) {
            if (result === "URL invalid") {
                resultConvert.value = "";
                // resultArea.classList.remove("show");

                activeToast(result);
            } else {
                activeToast("Converted");

                // resultArea.classList.add("show");
                resultConvert.value = result;
            }
        })
        // }
    });

    const copyBtn = document.getElementById("copy-btn");
    copyBtn.addEventListener("click", () => {
        resultConvert.select();
        document.execCommand("copy");
        activeToast("Copyed");
    });
</script>
<script>
    const urlImage = document.getElementById("url-image");
    const convertBtn = document.getElementById("convert");
    const message = document.querySelector(".message");

    const resultArea = document.getElementById("result-area");
    const resultConvert = document.getElementById("result-convert");
    const toast = document.getElementById("toast");

    function activeToast(message) {
        toast.innerText = message;

        setTimeout(() => {
            toast.innerText = "";
        }, 1500)
    }

    async function toBase64(url, callback) {
        try {
            const response = await fetch(url);
            const blobUrl = await response.blob();

            if (response.status === 200) {
                const reader = new FileReader();
                reader.onload = function(base64) {
                    callback(base64.currentTarget.result);
                }
                reader.readAsDataURL(blobUrl);

            } else {
                callback("URL invalid");
            }
        } catch (error) {
            console.error("Erro: " + error);
            callback("URL invalid");
        }
    }

    convertBtn.addEventListener("click", (e) => {
        e.preventDefault();
        if (urlImage.value === "") {
            message.classList.add("show");
            urlImage.focus();
            resultArea.classList.remove("show")

        } else {
            message.classList.remove("show");

            toBase64(urlImage.value, function(result) {
                if (result === "URL invalid") {
                    resultConvert.value = "";
                    resultArea.classList.remove("show");

                    activeToast(result);
                } else {
                    activeToast("Converted");

                    resultArea.classList.add("show");
                    resultConvert.value = result;
                }
            })
        }
    });

    const copyBtn = document.getElementById("copy-btn");
    copyBtn.addEventListener("click", () => {
        resultConvert.select();
        document.execCommand("copy");
        activeToast("Copyed");
    });
</script> -->