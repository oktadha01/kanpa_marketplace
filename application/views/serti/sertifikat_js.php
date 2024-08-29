<script>
    $(document).ready(function() {

        load_qr_code();
    });


    const urlImage = document.getElementById("url-image");
    const convertBtn = document.getElementById("convert");
    const message = document.querySelector(".message");

    const resultArea = document.getElementById("result-area");
    const resultConvert = document.getElementById("result-convert");
    // const toast = document.getElementById("toast");

    function activeToast(message) {
        // // toast.innerText = message;

        // setTimeout(() => {
        //     // toast.innerText = "";
        // }, 1500)
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

    function load_qr_code() {

        $('#url-image').val("https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode($("#url-qr-code").val()) + "&chs=160x160&chld=L|0")
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
    }

    function createPDF() {
        var nm_user = $("#nm-user").val()
        var element = document.getElementById('element-to-print');
        html2pdf(element, {
            margin: 1,
            padding: 0,
            filename: 'Surat_Promo_AN_' + nm_user + '.pdf',
            image: {
                type: 'jpeg',
                quality: 1
            },
            html2canvas: {
                scale: 1,
                logging: true
            },
            // jsPDF: {
            //     unit: 'in',
            //     format: 'A4',
            //     orientation: 'P'
            // },
            class: createPDF
        });
    };
    // $(function() {
    //     // $("#generate").click(function() {
    //         $('#url-image').val("https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode($("#content").val()) + "&chs=160x160&chld=L|0")
    //         toBase64(urlImage.value, function(result) {
    //             if (result === "URL invalid") {
    //                 resultConvert.value = "";
    //                 // resultArea.classList.remove("show");

    //                 activeToast(result);
    //             } else {
    //                 activeToast("Converted");

    //                 // resultArea.classList.add("show");
    //                 resultConvert.value = result;
    //                 $(".qr-code").attr("src", result);
    //             }
    //         })
    //     // });
    // });
</script>