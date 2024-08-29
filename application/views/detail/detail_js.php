<script script async src="https://www.googletagmanager.com/gtag/js?id=G-YN9QR6KJ0J"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-YN9QR6KJ0J');
</script>
<script>
    // Asep Irman
    // UI / UX Designer & Front End Developer

    // E: sibaturaspirman @gmail.com
    // W: asepirman.com
    // B: behance.net / sibaturasepirman
    // D: dribbble.com / sibaturaspirman *
    //     /
    // load_detail_tipe();
    $(document).ready(function(e) {
        var file = $("#type-<?php echo $this->uri->segment(5); ?>");
        file.trigger("click");
        var id = <?php echo $this->uri->segment(5); ?>;
        $('#id-' + id).removeAttr('hidden', true);
        // $('.grid-' + id).removeAttr('hidden', true);
        // alert(id);
        if ($('#id-marketing').val() >= '1') {

            $('#cs').attr('hidden', true);
        } else {}
    });
    $('.item').magnificPopup({
        delegate: 'a',
    });
    var tabs = $('.tabs'),
        tabsLists = $('.tabs ul.tabs--list li');
    tabs.each(function() {
        var tab = $(this),
            tabItems = tab.find('ul.tabs--list'),
            tabContentWrapper = tab.children('ul.tabs--content');

        tabItems.on('click', 'a', function(event) {
            event.preventDefault();
            var activedItem = $(this);
            if (!activedItem.hasClass('actived')) {
                var activedTab = activedItem.data('content'),
                    activedContent = tabContentWrapper.find('li[data-content="' + activedTab + '"]');

                tabItems.find('a.actived').removeClass('actived');
                activedItem.addClass('actived');
                activedContent.addClass('actived').siblings('li').removeClass('actived');
            }
        });
    });

    tabsLists.click(function(e) {
        // if ($(this).hasClass('moving-tab')) {
        // return;
        // }
        var whatTab = $(this).index();
        var howFar = 25 * whatTab;
        $(".moving-tab").css({
            left: howFar + "%"
        });
    });


    $(".type").click(function(e) {
        window.history.pushState("object or string", "Title", $(this).data('url'));
        // alert(<?php echo $this->uri->segment(5); ?>)
        $('#nm-perum').val($(this).data('nm-perum'));
        $('#luas-bangunan').val($(this).data('luas-bangunan'));
        $('#luas-tanah').val($(this).data('luas-tanah'));
        $('.vr-perum').attr('hidden', true);
        var id = $(this).data('luas-bangunan');
        $('#id-' + id).removeAttr('hidden', true);
        // $('.grid-' + id).removeAttr('hidden', true);
        load_detail_tipe();
    });

    function load_detail_tipe() {
        let formData = new FormData();
        formData.append('nm-perum', $('#nm-perum').val());
        formData.append('luas-bangunan', $('#luas-bangunan').val());
        formData.append('luas-tanah', $('#luas-tanah').val());

        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('Detail/detail_tipe'); ?>",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#detail-tipe').html(data);
                // $('.filter').attr('hidden', true);
                // $("#tipe-" + $('#luas-bangunan').val()).trigger("click").removeAttr('hidden', true);
                // $("#display-" + $('#luas-bangunan').val()).removeAttr('hidden', true);
                // $("#interior-" + $('#luas-bangunan').val()).removeAttr('hidden', true);


            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>