<main id="main" class="pt-5rem">
    <div class="faq">
        <div class="" data-aos="fade-up">
            <div class="accordion accordion-flush" id="faqlist">
                <?php
                foreach ($data_perum as $data) :
                ?>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed data-perum" type="button" data-id-perum="<?php echo $data->id_perum; ?>" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $data->id_perum; ?>">
                                <i class="bi bi-question-circle question-icon"></i>
                                <?php echo $data->nm_perum; ?>
                            </button>
                        </h3>
                        <div id="faq-content-<?php echo $data->id_perum; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                            <div class="accordion-body">
                                <div id="data<?php echo $data->id_perum; ?>" class="data"></div>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
    <input type="text" id="id-lokasi-terdekat" value="" hidden>
    <input type="text" id="id-lokasi-terdekat-perum" value="" hidden>
</main>