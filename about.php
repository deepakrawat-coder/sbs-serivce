<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>
<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 mb-35 mb-xl-0">
                <div class="img-box8">
                    <div class="img1"><img src="../assets/img/normal/about_7.png" alt="About"></div>
                    <div class="customer-box">
                        <div class="media-body">
                            <h4 class="box-title"><span class="counter-number">18</span>+</h4>
                            <p class="box-text">Years Experience</p>
                        </div>
                    </div>
                    <div class="box-badge">
                        <div class="spin-text"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="300px" height="300px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" preserveAspectRatio="none" xml:space="preserve">
                                <defs>
                                    <path id="circlePath5" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 "></path>
                                </defs>
                                <circle cx="150" cy="100" r="75" fill="none"></circle>
                                <g>
                                    <use xlink:href="#circlePath5" fill="none"></use><text fill="#fff">
                                        <textPath xlink:href="#circlePath5">Best Rakar Service Provider</textPath>
                                    </text>
                                </g>
                            </svg></div>
                        <div class="box-icon"><img src="../assets/img/icon/about_badge2.svg" alt="icon"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 text-center text-xl-start">
                <div class="ps-xxl-5 pe-xl-4">
                    <div class="title-area mb-37"><span class="sub-title"><span class="line"></span><img src="../assets/img/theme-img/title_icon4.svg" alt="shape">About Us</span>
                        <h2 class="sec-title">Protecting Homes &amp; Businesses with Expert Roofing</h2>
                        <p class="sec-text">With years of experience, we specialize in residential and commercial roofing Our expert team ensures durability safety and long-lasting results with premium materials</p>
                        <p class="sec-text">With years of experience, we specialize in residential and commercial roofing Our expert team ensures durability safety and long-lasting results with premium materials</p>
                    </div>

                    <div class="btn-group mt-30 justify-content-center"><a href="javascript:void(0)" class="th-btn">Discover More <i class="far fa-arrow-right ms-2"></i></a>
                        <div class="call-btn">
                            <div class="play-btn"><i class="fal fa-phone"></i></div>
                            <div class="media-body">
                                <p class="box-label">Call Us 24/7</p>
                                <h6 class="box-link"><a href="tel:+0123456789">+0 (123) 456 789</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$service = '3';
if ($service == '1') {
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-services.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-why-choose.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-process.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-feedback.php');
} elseif ($service == '2') {
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-services.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-why-choose.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-process.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-feedback.php');
} else {
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/srg-services.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/srg-why-choose.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/srg-process.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/parts/srg-feedback.php');
}
?>

<div class="bg-black space-extra">
    <div class="container-fluid">
        <h2 class="sec-title text-white text-center mb-35">our trusted Clients</h2>
        <div class="swiper th-slider" id="brandSlider2" data-slider-options='{"spaceBetween":45,"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1300":{"slidesPerView":"5"},"1500":{"slidesPerView":"6"}}}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_1.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_2.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_3.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_4.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_5.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_6.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_1.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_2.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_3.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_4.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_5.svg" alt="Brand Logo"></div>
                </div>
                <div class="swiper-slide">
                    <div class="brand-card"><img src="../assets/img/brand/brand_2_6.svg" alt="Brand Logo"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>