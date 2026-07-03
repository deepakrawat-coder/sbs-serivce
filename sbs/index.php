<?php

include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php')

?>

<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

<?php

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// print_r($productId);
// exit;

// $bannerData = [];
// $bannerQuery = $conn->query('SELECT * FROM `banner` WHERE Product_id  = $productId AND Status = 1 ORDER BY ID DESC');
// while ($banner = $bannerQuery->fetch_assoc()) {
//     $bannerData[] = $banner;
// }

$bannerQuery = $conn->query("SELECT *  FROM banner  WHERE Product_id = $productId AND Status = 1 ORDER BY ID DESC LIMIT 1");
$bannerData = $bannerQuery->fetch_assoc();

$imageArray = explode(',', $bannerData['Image']);

// echo "<pre>";
// print_r($imageArray);
// echo "</pre>";
// exit();

$clientsData = [];
$ourClients = $conn->query("SELECT * FROM our_trusted_clients WHERE Product_id = $productId AND Status = 1 ORDER BY ID DESC");
while ($ourClientsData = $ourClients->fetch_assoc()) {
    $clientsData[] = $ourClientsData;
}

$aboutQuery = $conn->query("SELECT *  FROM about_us  WHERE Product_id = $productId AND Status = 1 ORDER BY ID DESC LIMIT 1");
$aboutData = $aboutQuery->fetch_assoc();

// echo "<pre>";
// print_r($aboutData);
// echo "</pre>";
// exit();

$contactQuery = $conn->query("SELECT *  FROM contact  WHERE Product_id = $productId AND Status = 1 ORDER BY ID DESC LIMIT 1");
$contactData = $contactQuery->fetch_assoc();

// echo "<pre>";
// print_r($contactData );
// echo "</pre>";
// exit();

?>
<div class="th-hero-wrapper hero-5 slider-area" id="hero">
    <div class="swiper th-slider" id="heroSlide5" data-slider-options='{"effect":"fade","autoHeight":true}'>
        <div class="swiper-wrapper">

            <?php foreach ($imageArray as $image): ?>
                <div class="swiper-slide">
                    <div class="hero-inner" data-bg-src="../admin-assets/img/banner/<?php echo trim($image); ?>">

                        <div class="container">
                            <div class="hero-style5">
                                <span class="sub-title2" data-ani="slideinup" data-ani-delay="0.1s"><span
                                        class="line"></span><img src="../assets/img/hero/battery_icon.svg"
                                        alt="shape" /><?= ($bannerData['Name']) ?></span>

                                <h1 class="hero-title">
                                    <span class="title1" data-ani="slideinup"
                                        data-ani-delay="0.2s"><?= ($bannerData['Title']) ?></span>
                                    <span class="title2" data-ani="slideinup" data-ani-delay="0.4s"><span
                                            class="text-theme">Electrical</span> Services</span>
                                </h1>

                                <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">
                                    <?= ($bannerData['Content']) ?>
                                </p>
                                <div class="btn-group" data-ani="slideinup" data-ani-delay="0.8s">
                                    <a href="javascript:void(0)" class="th-btn rounded-12 style2">Our All Services<i
                                            class="fas fa-arrow-right ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!-- <div class="swiper-slide">
                <div class="hero-inner" data-bg-src="../assets/img/hero/hero_bg_5_2.jpg">
                    <div class="container">
                        <div class="hero-style5">
                            <span class="sub-title2" data-ani="slideinup" data-ani-delay="0.1s"><span
                                    class="line"></span><img src="../assets/img/hero/battery_icon.svg"
                                    alt="shape" />Welcome To Rakar</span>
                            <h1 class="hero-title">
                                <span class="title1" data-ani="slideinup" data-ani-delay="0.2s">We are expert in</span>
                                <span class="title2" data-ani="slideinup" data-ani-delay="0.4s"><span
                                        class="text-theme">Electrical</span> Services</span>
                            </h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">
                                We believe in providing top quality workman and are so
                                confident in our level of service that we back it up
                            </p>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.8s">
                                <a href="javascript:void(0)" class="th-btn rounded-12 style2">Our All Services<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <div class="swiper-slide">
                <div class="hero-inner" data-bg-src="../assets/img/hero/hero_bg_5_3.jpg">
                    <div class="container">
                        <div class="hero-style5">
                            <span class="sub-title2" data-ani="slideinup" data-ani-delay="0.1s"><span
                                    class="line"></span><img src="../assets/img/hero/battery_icon.svg"
                                    alt="shape" />Welcome To Rakar</span>
                            <h1 class="hero-title">
                                <span class="title1" data-ani="slideinup" data-ani-delay="0.2s">We are expert in</span>
                                <span class="title2" data-ani="slideinup" data-ani-delay="0.4s"><span
                                        class="text-theme">Electrical</span> Services</span>
                            </h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">
                                We believe in providing top quality workman and are so
                                confident in our level of service that we back it up
                            </p>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.8s">
                                <a href="javascript:void(0)" class="th-btn rounded-12 style2">Our All Services<i
                                        class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="slider-pagination"></div>
    </div>
    <div class="icon-box">
        <button data-slider-prev="#heroSlide5" class="slider-arrow default">
            <i class="far fa-arrow-left"></i>
        </button>
        <button data-slider-next="#heroSlide5" class="slider-arrow default">
            <i class="far fa-arrow-right"></i>
        </button>
    </div>
</div>
<div class="brand-sec3">
    <div class="brand-inner">
        <div class="swiper th-slider" id="brandSlider2"
            data-slider-options='{"spaceBetween":30,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"4"},"1300":{"slidesPerView":"5"},"1500":{"slidesPerView":"7"}}}'>
            <div class="swiper-wrapper">
                <?php foreach ($clientsData as $our_clients): ?>
                    <div class="swiper-slide">
                        <div class="brand-card">
                            <img src="/admin/<?= $our_clients['Image']; ?>" alt="Brand Logo">
                        </div>
                    </div>
                <?php endforeach; ?>
              
            </div>
        </div>
    </div>
</div>
        
                  
      
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-services.php') ?>

<style>
    .service-card {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .service-card .box-img img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card:hover .box-img img {
        transform: scale(1.05);
    }

    .service-card .box-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .service-card .box-title a {
        color: white;
        text-decoration: none;
        font-size: 1.1rem;
        margin: 0;
    }

    .service-card .icon-btn {
        background: var(--theme-color, #f4b41a);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        transition: all 0.3s ease;
    }

    .service-card .icon-btn:hover {
        background: white;
        color: var(--theme-color, #f4b41a);
    }

    @media (max-width: 768px) {
        .service-card .box-img img {
            height: 200px;
        }

        .service-card .box-title a {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .service-card .box-img img {
            height: 180px;
        }
    }
</style>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-why-choose.php');
include ($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-process.php'); ?>

<section style="background: var(--theme-color) !important;">
    <div class="contact-area area-shape1" style="background: var(--theme-color) !important;">
        <div class="row">
            <div class="col-xl-5 mb-35 mb-xl-0">
                <div class="contact-media-area">
                    <div class="contact-media-wrap">
                        <h3 class="box-title">Our Location</h3>
                        <div class="contact-media">
                            <div class="icon-btn">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <p class="box-text">
                                    <!-- 789 Inner Lane, Holy park, California, USA -->
                                     <?= ($contactData['Address']) ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="contact-media-wrap">
                        <h3 class="box-title">Quick Contact</h3>
                        <div class="contact-media">
                            <div class="icon-btn">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="box-label">Call Us:</h4>
                                <p class="box-text">
                                    <a href="tel:+09876543210"> <?= ($contactData['Phone']) ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="contact-media">
                            <div class="icon-btn"><i class="fas fa-envelope"></i></div>
                            <div class="media-body">
                                <h4 class="box-label">Email Us:</h4>
                                <p class="box-text">
                                    <a href="mailto:support24@rakar.com"> <?= ($contactData['Email']) ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <h6 class="contact-info-text">
                        We will get back to you within 24 hours, or Call us everyday,
                        09:00AM - 04:00PM
                    </h6>
                </div>
            </div>
            <div class="col-xl-7 text-center text-xl-start">
                <div class="ps-xxl-4 ms-xl-3">
                    <div class="title-area">
                        <span class="sub-title text-white"><span class="line"></span>Book an appointment</span>
                        <h2 class="sec-title">Request a quote</h2>
                    </div>
                    <form action="https://html.themehour.net/rakar/demo/mail.php" method="POST" class="contact-form2 ajax-contact">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <i class="fal fa-user"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                                <i class="fal fa-phone"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select">
                                    <option value="" disabled="disabled" selected="selected" hidden="">
                                        Select Subject
                                    </option>
                                    <option value="General Query">General Query</option>
                                    <option value="Help Support">Help Support</option>
                                    <option value="Sales Support">Sales Support</option>
                                </select>
                                <i class="fal fa-chevron-down"></i>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                                <i class="fal fa-pencil"></i>
                            </div>
                            <div class="form-btn col-12">
                                <button class="th-btn rounded-10" style="background: var( --title-color) !important;">
                                    Submit Request<i class="far fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/parts/sbs-feedback.php') ?>
<section class="space" id="blog-sec" style="background: var(--theme-color) !important;">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="title-area text-center text-md-start">
                    <span class="sub-title text-dark"><span class="line"></span>Blog &amp; Articles</span>
                    <h2 class="sec-title">Every Single Update From SBS Security & Sanitary</h2>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="sec-btn mt-n3 mt-md-0">
                    <a href="javascript:void(0)" class="th-btn style4 rounded-12">View All Articles<i class="far fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-xl-4 col-md-6">
                <div class="blog-box">
                    <a href="javascript:void(0)" class="blog-img"><img src="../assets/img/blog/blog_3_1.jpg" alt="blog image"> </a><span class="box-date"></span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="javascript:void(0)"><i class="fas fa-user"></i>By SBS</a>
                            <a href="javascript:void(0)"><i class="fas fa-calendar-days"></i><span class="date">15</span> Jan, 2025</a>
                        </div>
                        <h3 class="box-title">
                            <a href="javascript:void(0)">5 Tips to Improve Home Security with CCTV Cameras</a>
                        </h3>
                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="blog-box">
                    <a href="javascript:void(0)" class="blog-img"><img src="../assets/img/blog/blog_3_2.jpg" alt="blog image"> </a><span class="box-date"></span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="javascript:void(0)"><i class="fas fa-user"></i>By SBS</a>
                            <a href="javascript:void(0)"><i class="fas fa-calendar-days"></i><span class="date">16</span> Jan, 2025</a>
                        </div>
                        <h3 class="box-title">
                            <a href="javascript:void(0)">Modern Sanitary Solutions for Your Bathroom Renovation</a>
                        </h3>
                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="blog-box">
                    <a href="javascript:void(0)" class="blog-img"><img src="../assets/img/blog/blog_3_3.jpg" alt="blog image"> </a><span class="box-date"></span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="javascript:void(0)"><i class="fas fa-user"></i>By SBS</a>
                            <a href="javascript:void(0)"><i class="fas fa-calendar-days"></i><span class="date">17</span> Jan, 2025</a>
                        </div>
                        <h3 class="box-title">
                            <a href="javascript:void(0)">Importance of Access Control Systems for Office Safety</a>
                        </h3>
                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="bg-title " style="background-color: white !important;" id="faq-sec">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-xl-7 text-center text-xl-start">
                <div class="space">
                    <div class="title-area mb-35">
                        <!-- <span class="sub-title shape-white"><span class="line"></span><img
                                src="../assets/img/theme-img/title_icon4_white.svg"
                                alt="shape" />Asked Questions</span> -->
                        <span class="sub-title2">Blog & Articles</span>
                        <h2 class="sec-title text-dark">Find Answers Here</h2>
                    </div>
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-card style3 active">
                            <div class="accordion-header" id="collapse-item-1">
                                <button
                                    class="accordion-button"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1"
                                    aria-expanded="true"
                                    aria-controls="collapse-1">
                                    How long does roof installation take?
                                </button>
                            </div>
                            <div
                                id="collapse-1"
                                class="accordion-collapse collapse show"
                                aria-labelledby="collapse-item-1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Get quick answers to the most common roofing questions
                                        our customers ask From installation timelines and
                                        material choices to emergency repairs and warranties
                                        decisions
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-2">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2"
                                    aria-expanded="false"
                                    aria-controls="collapse-2">
                                    Which roofing material is best for my home?
                                </button>
                            </div>
                            <div
                                id="collapse-2"
                                class="accordion-collapse collapse"
                                aria-labelledby="collapse-item-2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Get quick answers to the most common roofing questions
                                        our customers ask From installation timelines and
                                        material choices to emergency repairs and warranties
                                        decisions
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-3">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3"
                                    aria-expanded="false"
                                    aria-controls="collapse-3">
                                    Do you provide emergency roofing repairs?
                                </button>
                            </div>
                            <div
                                id="collapse-3"
                                class="accordion-collapse collapse"
                                aria-labelledby="collapse-item-3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Get quick answers to the most common roofing questions
                                        our customers ask From installation timelines and
                                        material choices to emergency repairs and warranties
                                        decisions
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-4">
                                <button
                                    class="accordion-button collapsed"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4"
                                    aria-expanded="false"
                                    aria-controls="collapse-4">
                                    What warranties do you offer?
                                </button>
                            </div>
                            <div
                                id="collapse-4"
                                class="accordion-collapse collapse"
                                aria-labelledby="collapse-item-4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Get quick answers to the most common roofing questions
                                        our customers ask From installation timelines and
                                        material choices to emergency repairs and warranties
                                        decisions
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 p-0">
                <div class="faq-image">
                    <img src="../assets/img/normal/faq-img.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php') ?>