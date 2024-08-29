<style>

</style>
<section class=" content-fixed">
    <h1 class="text-center title-city font-weight-bold text-blue m-0"><?= preg_replace("![^a-z0-9]+!i", " ", $this->uri->segment(3)); ?> </h1>
    <ul class="ul-type-properti list-none justify-content-center mb-0" style="gap: 1rem;">
        <li class="text-webkit-center mx-w-li li-menu-properti" data-target="rumah">
            <div class="border-li-sm menu-li-properi i-home-sm"></div>
            <span class="font-weight-bold f-sz-li-porperti">Rumah</span>
        </li>
        <li class="text-webkit-center mx-w-li li-menu-properti" data-target="perumahan">
            <div class="border-li-sm menu-li-properi i-perumahan-sm"></div>
            <span class="font-weight-bold f-sz-li-porperti">Perumahan</span>
        </li>
        <li class="text-webkit-center mx-w-li li-menu-properti" data-target="apartement">
            <div class="border-li-sm menu-li-properi i-apartment-sm"></div>
            <span class="font-weight-bold f-sz-li-porperti">Apartment</span>
        </li>
        <li class="text-webkit-center mx-w-li li-menu-properti" data-target="kavling">
            <div class="border-li-sm menu-li-properi i-kavling-sm"></div>
            <span class="font-weight-bold f-sz-li-porperti">Kavling</span>
        </li>
        <li class="text-webkit-center mx-w-li li-menu-properti" data-target="pilih-city">
            <div class="border-li-sm menu-li-properi i-pilih-kota-sm menu-kota"></div>
            <span class="font-weight-bold f-sz-li-porperti">Pilih Kota</span>
        </li>
    </ul>
</section>
<main style="min-height: 44rem;">
    <section id="main-page" hidden>
        <section id="rumah" class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between text-align-center">
                        <h1 class="tittle">Rumah</h1>
                        <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="slider-wrapper slider-wrapper-populer">
                        <ul id="load-data-rumah" class="image-list swiper-liproperty row">
                            <li class="img-item">
                                <div class="populer-container">
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="row row-btn-vw-next text-center mt-4">
                    <div class="col">
                        <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="perumahan">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between text-align-center">
                        <h1 class="tittle">Perumahan</h1>
                        <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="slider-wrapper slider-wrapper-populer">
                        <ul id="load-data-perumahan" class="image-list swiper-liproperty row">
                            <li class="img-item">
                                <div class="populer-container">
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="row row-btn-vw-next text-center mt-4">
                    <div class="col">
                        <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="apartement">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between text-align-center">
                        <h1 class="tittle">Apartement</h1>
                        <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="slider-wrapper slider-wrapper-populer">
                        <ul id="load-data-apartement" class="image-list swiper-liproperty row">
                            <li class="img-item">
                                <div class="populer-container">
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="row row-btn-vw-next text-center mt-4">
                    <div class="col">
                        <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="kavling">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between text-align-center">
                        <h1 class="tittle">Kavling</h1>
                        <a href="#" class="spn-vw-all text-blue">Lihat Semua</a>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="slider-wrapper slider-wrapper-populer">
                        <ul id="load-data-kavling" class="image-list swiper-liproperty row">
                            <li class="img-item">
                                <div class="populer-container">
                                </div>
                            </li>
                        </ul>
                        <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>
                        <button class="next-slide slide-button material-symbols-rounded box-shadow">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="row row-btn-vw-next text-center mt-4">
                    <div class="col">
                        <a href="#" class="btn-blue">Lihat Selanjutnya</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="pilih-city" class="city-bottom">
            <div class="container">

                <div class="row">
                    <h1 class="tittle">Pilih Kota</h1>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="slider-wrapper slider-wrapper-city">
                            <ul id="load-data-kota-bottom" class="image-list swiper-gap-city p-0">
                                <li class="img-item">
                                    <div class="card border li-city-none">
                                    </div>
                                </li>
                            </ul>
                            <button class="prev-slide slide-button material-symbols-rounded box-shadow">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="next-slide slide-button material-symbols-rounded box-shadow">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>