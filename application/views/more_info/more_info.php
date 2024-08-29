<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Montserrat", sans-serif;
    }

    body {
        /* height: 100vh; */
        min-width: 100%;
        /* display: flex;
        align-items: center;
        justify-content: center; */
        /* background: linear-gradient(0deg, #84e3c5, #6991fe); */
        background: #033b6c2b;
    }

    #more-info {

        /* height: 100vh; */
        min-width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cards .card-user {
        background: #ffffff;
        width: -webkit-fill-available;
        display: inline-flex;
        align-items: center;
        padding: 0px 15px;
        /* opacity: 0; */
        /* pointer-events: none; */
        position: relative;
        justify-content: space-between;
        border-radius: 100px 45px 45px 100px;
        /* animation: animate 15s linear infinite; */
        /* animation-delay: calc(3s * var(--delay)); */
        margin: 19px 7px;
    }



    .card-user .content {
        display: flex;
        align-items: center;
        margin-right: 6px;
    }

    .cards .card-user .img {
        height: 90px;
        width: 90px;
        position: absolute;
        left: -5px;
        background: #fff;
        border-radius: 50%;
        padding: 5px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
    }

    .card-user .img img {
        height: 100%;
        width: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .card-user .details {
        margin: 12px 57px 0px 88px;
    }

    @media (max-width: 425px) {
        .card-user .details {
            margin: 12px 47px 0px 88px !important;
        }
    }

    @media (max-width: 768px) {
        .card-user .details {
            margin: 12px 7px 0px 88px !important;
        }
    }


    .details span {
        font-weight: bold;
        font-size: 15px;
    }

    .card-user .wa {
        text-decoration: none;
        padding: 2px 5px;
        border-radius: 9px;
        color: #fff;
        background: linear-gradient(to bottom, #92ff86 0%, #44edd4 100%);
        /* transition: all 0.3s ease; */
    }

    .card-user .wa:hover {
        transform: scale(0.94);
    }

    .font-marketing {
        z-index: 999;
        position: relative;
        display: block;
        top: 15rem;
    }

    .font-serif {
        font-family: serif
    }
</style>
<section id="more-info" class="p-0" style="margin-top: 6rem;">
    <div class="cards">
        <center>
            <a href="">
                <div class="p-2 mb-3" style="border-radius: 21px;color: #000; background: #ffffff;">
                    <h6 class="mb-0">Website PT. KANPA</h6>
                </div>
            </a>
        </center>
        <?php
        foreach ($data_cs as $data) :
        ?>
            <div class="card-user">
                <div class="content">
                    <div class="img"><img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>"></div>
                    <div class="details">
                        <span class="name font-serif">Customer Service</span>
                        <p class="font-serif">Admin</p>
                    </div>
                </div>
                <a href="<?php echo $data->bitly; ?>" class="wa">
                    <i class="fa-brands fa-whatsapp" style="font-size: 33px;"></i>
                </a>
            </div>
            <br>
        <?php
        endforeach;
        ?>
        <center>
            <span style="color:white;"><span class="font-serif size-50px">M</span><span class="font-serif size-30px">arketing Perumahan</span></span>
        </center>
        <!-- <div class="outer" style="width: max-content;margin: auto;"> -->

        <?php
        foreach ($data_marketing as $data) :
            $marketing_nm = $data->nm_marketing;
            $nm_marketing = preg_replace("![^a-z0-9]+!i", "-", $marketing_nm);
            $perum_nm = $data->nm_perum;
            $nm_perum = preg_replace("![^a-z0-9]+!i", "-", $perum_nm);
        ?>
            <div class="card-user">
                <a href="<?php echo base_url('more_info/marketing'); ?>/<?php echo $nm_perum; ?>/<?php echo $nm_marketing; ?>" class="text-dark">
                    <div class="content">
                        <div class="img"><img src="<?php echo base_url('upload'); ?>/<?php echo $data->foto_marketing; ?>"></div>
                        <div class="details">
                            <span class="name font-serif"><?php echo $data->nm_perum; ?></span>
                            <p class="font-serif"><?php echo $data->nm_marketing; ?></p>
                        </div>
                    </div>
                </a>
                <a href="<?php echo $data->bitly; ?>" class="wa">
                    <i class="fa-brands fa-whatsapp" style="font-size: 33px;"></i>
                </a>
            </div>
            <br>
        <?php
        endforeach;
        ?>
        <br>
        <center>
            <a href="">
                <div class="p-2 mb-3" style="border-radius: 21px;color: #000; background: #ffffff;">
                    <h6 class="mb-0">Youtube PT. KANPA</h6>
                </div>
            </a>
            <!-- <span style="color:white;"><span class="font-auto size-50px">M</span><span class="font-auto size-30px">arketing Perumahan</span></span> -->
        </center>
    </div>
</section>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YN9QR6KJ0J"></script>

<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-YN9QR6KJ0J');
</script>