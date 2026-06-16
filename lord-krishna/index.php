<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

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
// exit;




$aboutQuery = $conn->query("SELECT *  FROM about_us  WHERE Product_id = $productId AND Status = 1 ORDER BY ID DESC LIMIT 1");
$aboutData = $aboutQuery->fetch_assoc();

// echo "<pre>";
// print_r($aboutData);
// echo "</pre>";
// exit();


?>



<div class="th-hero-wrapper hero-2 slider-area" id="hero" data-bg-src="../assets/img/hero/hero_bg_2.jpg">
    <div class="swiper th-slider" id="heroSlide2" data-slider-options='{"effect":"fade","autoHeight":true}'>
        <div class="swiper-wrapper">
            <?php foreach ($imageArray as $image): ?>
                <div class="swiper-slide">
                    <div class="hero-inner">
                        <div class="container">
                            <div class="hero-style2">
                                <div class="hero-arrow" data-ani="slideinright" data-ani-delay="0.4s"><img
                                        src="../assets/img/hero/hero_arrow.svg" alt="Arrow"></div>
                                <h1 class="hero-title"><span class="title1" data-ani="slideinup"
                                        data-ani-delay="0.2s"><?= ($bannerData['Title']) ?></span> <span class="title2"
                                        data-ani="slideinup" data-ani-delay="0.4s">Manpower <span
                                            class="text-theme">Solutions</span></span></h1>
                                <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">
                                    <?= ($bannerData['Content']) ?>
                                </p>
                                <a href="lk-services.html" class="th-btn2 style3" data-ani="slideinup"
                                    data-ani-delay="0.8s">Our All Services<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="hero-img" data-ani="slideinright" data-ani-delay="0.2s"><img
                                src="../assets/img/hero/hero_2_1.png" alt="Manpower Solutions"></div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style2">
                            <div class="hero-arrow" data-ani="slideinright" data-ani-delay="0.4s"><img src="../assets/img/hero/hero_arrow.svg" alt="Arrow"></div>
                            <h1 class="hero-title"><span class="title1" data-ani="slideinup" data-ani-delay="0.2s">Trusted workforce</span> <span class="title2" data-ani="slideinup" data-ani-delay="0.4s">for <span class="text-theme">Industries</span></span></h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">We provide skilled and semi-skilled workers for industries, factories, offices, and homes across the country.</p>
                            <a href="lk-services.html" class="th-btn2 style3" data-ani="slideinup" data-ani-delay="0.8s">Hire Workers<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.2s"><img src="../assets/img/hero/hero_2_2.png" alt="Workforce"></div>
                </div>
            </div> -->
            <!-- <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="container">
                        <div class="hero-style2">
                            <div class="hero-arrow" data-ani="slideinright" data-ani-delay="0.4s"><img src="../assets/img/hero/hero_arrow.svg" alt="Arrow"></div>
                            <h1 class="hero-title"><span class="title1" data-ani="slideinup" data-ani-delay="0.2s">Reliable staffing</span> <span class="title2" data-ani="slideinup" data-ani-delay="0.4s">since <span class="text-theme">2010</span></span></h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">Temporary and permanent staffing solutions with complete payroll management and compliance support.</p>
                            <a href="lk-services.html" class="th-btn2 style3" data-ani="slideinup" data-ani-delay="0.8s">Get Workers<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="hero-img" data-ani="slideinright" data-ani-delay="0.2s"><img src="../assets/img/hero/hero_2_3.png" alt="Staffing"></div>
                </div>
            </div> -->
        </div>
    </div>
    <button data-slider-prev="#heroSlide2" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
    <button data-slider-next="#heroSlide2" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
    <!-- <div class="h1 transparen-text">Manpower Services</div> -->
</div>
<div class="overflow-hidden space background-image" id="about-sec"
    style="background-image: url(&quot;assets/img/bg/pattern_bg_5.png&quot;);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-4 text-center text-xl-start">
                <div class="title-area mb-37"><span class="sub-title"><span class="line"></span>About Lord
                        Krishna</span>
                    <h2 class="sec-title"><?= ($aboutData['Name']) ?></h2>
                    <p class="sec-text"><?= ($aboutData['Content']) ?></p>
                </div>
                <div class="checklist mb-45">
                    <ul>
                        <li>100% quality workforce</li>
                        <li>Verified & Licensed Workers</li>
                        <li>Affordable Staffing Plans</li>
                    </ul>
                </div>
                <div class="btn-group justify-content-center btn-mr"><a href="lk-about.html"
                        class="th-btn style4">Discover More<i class="far fa-arrow-right ms-2"></i></a>
                    <div class="call-btn">
                        <div class="play-btn"><i class="fal fa-phone"></i></div>
                        <div class="media-body">
                            <p class="box-label">Call Us 24/7</p>
                            <h6 class="box-link"><a href="tel:+0123456789"><?= ($aboutData['Phone']) ?></a></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 my-5 my-xl-0">
                <div class="rounded-img1"><img class="w-100" src="/admin<?= ($aboutData['Image']) ?>"
                        alt="Lord Krishna Manpower"></div>
            </div>
            <div class="col-xl-4">
                <div class="contact-process-wrap no-bg">
                    <div class="contact-process">
                        <div class="box-number">01</div>
                        <div class="media-body">
                            <h3 class="box-title text-title">Request Workers</h3>
                            <p class="box-text text-body">Willing to go the extra mile to provide quality workforce. We
                                are based across India and serve all major cities.</p>
                        </div>
                    </div>
                    <div class="contact-process">
                        <div class="box-number">02</div>
                        <div class="media-body">
                            <h3 class="box-title text-title">Get Free Quote</h3>
                            <p class="box-text text-body">We provide detailed estimation for temporary or permanent
                                staffing based on your requirements and budget.</p>
                        </div>
                    </div>
                    <div class="contact-process">
                        <div class="box-number">03</div>
                        <div class="media-body">
                            <h3 class="box-title text-title">Deploy Staff</h3>
                            <p class="box-text text-body">We deploy verified workers within 24 hours with complete
                                documentation and compliance support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-services.php') ?>
<!-- <div class="choose-area overflow-hidden space background-image" style="background-image: url('../assets/img/bg/choose_bg_1.png');">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-6">
                <div class="">
                    <div class="title-area">
                        <span class="sub-title2 text-uppercase">Why Choose Us</span>
                        <h2 class="sec-title text-white">Why Businesses Trust Lord Krishna Manpower Services</h2>
                    </div>
                    <div class="choose-feature2-wrap">
                        <div class="choose-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/choose_1_1.svg" alt="Icon"></div>
                            <h3 class="box-title">Quality Workforce</h3>
                            <p class="box-text">Providing businesses and industries with skilled, verified, and reliable manpower for all their operational needs.</p>
                        </div>
                        <div class="choose-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/choose_1_2.svg" alt="Icon"></div>
                            <h3 class="box-title">Quick Deployment</h3>
                            <p class="box-text">We deploy verified workers within 24 hours with complete documentation, background checks, and compliance support.</p>
                        </div>
                        <div class="choose-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/choose_1_3.svg" alt="Icon"></div>
                            <h3 class="box-title">Affordable Pricing</h3>
                            <p class="box-text">Competitive rates for temporary and permanent staffing solutions without compromising on quality or reliability.</p>
                        </div>
                        <div class="choose-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/choose_1_4.svg" alt="Icon"></div>
                            <h3 class="box-title">24/7 Support</h3>
                            <p class="box-text">Round-the-clock customer support for all your manpower requirements, emergencies, and workforce management needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-why-choose.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-process.php') ?>
<div class="overflow-hidden bg-white shape-mockup-wrap" id="contact-sec">
    <div class="shape-mockup moving d-none d-xxl-block" style="right: 0%; bottom: 0%;">
        <img src="../assets/img/shape/man_shape_1.png" alt="shape">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="img-box3">
                    <div class="img1">
                        <img src="../assets/img/normal/contact_1.jpg" alt="Manpower Services">
                    </div>
                    <div class="contact-process-wrap lord-krishna">
                        <div class="contact-process">
                            <div class="box-number">01</div>
                            <div class="media-body">
                                <h3 class="box-title">Request Staff</h3>
                                <p class="box-text">
                                    Tell us your workforce requirements - skilled, semi-skilled, or support staff for
                                    your business needs.
                                </p>
                            </div>
                        </div>
                        <div class="contact-process">
                            <div class="box-number">02</div>
                            <div class="media-body">
                                <h3 class="box-title">Get Free Quote</h3>
                                <p class="box-text">
                                    We provide detailed estimation for temporary or permanent staffing based on your
                                    budget and timeline.
                                </p>
                            </div>
                        </div>
                        <div class="contact-process">
                            <div class="box-number">03</div>
                            <div class="media-body">
                                <h3 class="box-title">Staff Verification</h3>
                                <p class="box-text">
                                    All our workers are background verified, licensed, and insured before deployment to
                                    your location.
                                </p>
                            </div>
                        </div>
                        <div class="contact-process">
                            <div class="box-number">04</div>
                            <div class="media-body">
                                <h3 class="box-title">Quick Deployment</h3>
                                <p class="box-text">
                                    We deploy verified workforce within 24 hours with complete documentation and
                                    compliance support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 text-center text-xl-start align-self-center space-extra">
                <div class="title-area">
                    <span class="sub-title"><img src="../assets/img/theme-img/title_icon.svg" alt="shape">Hire Workforce
                        Today</span>
                    <h2 class="sec-title">Request a free quote</h2>
                </div>
                <form action="https://html.themehour.net/rakar/demo/mail.php" method="POST"
                    class="input-light ajax-contact pb-30 pb-md-0">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                            <i class="fal fa-user"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email Address">
                            <i class="fal fa-envelope"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                            <i class="fal fa-phone"></i>
                        </div>
                        <div class="form-group col-md-6">
                            <select name="subject" id="subject" class="form-select">
                                <option value="" disabled="disabled" selected="selected" hidden="">
                                    Select Service
                                </option>
                                <option value="Skilled Workers">Skilled Workers</option>
                                <option value="Industrial Staff">Industrial Staff</option>
                                <option value="Temporary Staffing">Temporary Staffing</option>
                                <option value="Permanent Hiring">Permanent Hiring</option>
                                <option value="Payroll Management">Payroll Management</option>
                            </select>
                            <i class="fal fa-chevron-down"></i>
                        </div>
                        <div class="form-group col-12">
                            <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                                placeholder="Tell us about your workforce requirements"></textarea>
                            <i class="fal fa-pencil"></i>
                        </div>
                        <div class="form-btn col-12">
                            <button class="th-btn">
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

<?php include($_SERVER['DOCUMENT_ROOT'] . '/parts/lord-krishna-feedback.php') ?>
<section class="space" id="blog-sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="title-area text-center text-md-start">
                    <span class="sub-title"><span class="line"></span>Blog &amp; Articles</span>
                    <h2 class="sec-title">Every Single Update From Lord Krishna Manpower</h2>
                </div>
            </div>
            <div class="col-md-auto">
                <div class="sec-btn mt-n3 mt-md-0"><a href="lk-blog.html" class="th-btn style4">View All Articles<i
                            class="far fa-arrow-right ms-2"></i></a></div>
            </div>
        </div>
        <div class="row gy-4">
            <!-- Blog 1 -->
            <div class="col-xl-4 col-md-6">
                <div class="blog-card style3">
                    <a href="lk-blog-details.html" class="blog-img"><img src="../assets/img/blog/blog_2_1.jpg"
                            alt="blog image"> </a>
                    <span class="box-date"><span class="date">15</span> Jan, 2025</span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="lk-blog.html"><i class="fas fa-user"></i>By Lord Krishna</a>
                            <a href="lk-blog.html"><i class="fas fa-tags"></i>Manpower</a>
                        </div>
                        <h3 class="box-title"><a href="lk-blog-details.html">5 Tips to Hire Skilled Workers for Your
                                Business</a></h3>
                        <p class="box-text">Learn how to find, verify, and hire skilled workforce for your business.
                            Complete guide to manpower recruitment and staffing solutions.</p>
                    </div>
                </div>
            </div>
            <!-- Blog 2 -->
            <div class="col-xl-4 col-md-6">
                <div class="blog-card style3">
                    <a href="lk-blog-details.html" class="blog-img"><img src="../assets/img/blog/blog_2_2.jpg"
                            alt="blog image"> </a>
                    <span class="box-date"><span class="date">16</span> Jan, 2025</span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="lk-blog.html"><i class="fas fa-user"></i>By Lord Krishna</a>
                            <a href="lk-blog.html"><i class="fas fa-tags"></i>Staffing</a>
                        </div>
                        <h3 class="box-title"><a href="lk-blog-details.html">Benefits of Temporary Staffing for
                                Industries</a></h3>
                        <p class="box-text">Flexible workforce solutions for seasonal demands and project-based work.
                            Reduce costs and improve efficiency with temporary staffing.</p>
                    </div>
                </div>
            </div>
            <!-- Blog 3 -->
            <div class="col-xl-4 col-md-6">
                <div class="blog-card style3">
                    <a href="lk-blog-details.html" class="blog-img"><img src="../assets/img/blog/blog_2_3.jpg"
                            alt="blog image"> </a>
                    <span class="box-date"><span class="date">17</span> Jan, 2025</span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="lk-blog.html"><i class="fas fa-user"></i>By Lord Krishna</a>
                            <a href="lk-blog.html"><i class="fas fa-tags"></i>Compliance</a>
                        </div>
                        <h3 class="box-title"><a href="lk-blog-details.html">Essential Labor Law Compliance for
                                Employers</a></h3>
                        <p class="box-text">Everything you need to know about labor laws, contracts, insurance, and
                            statutory compliance for your workforce.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="bg-title" id="faq-sec">
    <div class="container">
        <div class="row flex-row-reverse align-items-center">
            <div class="col-xl-7 text-center text-xl-start">
                <div class="space">
                    <div class="title-area mb-35">
                        <span class="sub-title2"><img src="../assets/img/theme-img/title_icon4_white.svg"
                                alt="shape">FAQ's</span>
                        <h2 class="sec-title text-white">Frequently Asked Questions</h2>
                    </div>
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ 1 -->
                        <div class="accordion-card style3 active">
                            <div class="accordion-header" id="collapse-item-1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                    What types of workers do you provide?
                                </button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse show"
                                aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        We provide skilled workers (plumbers, electricians, carpenters, welders),
                                        semi-skilled workers (helpers, assistants),
                                        industrial staff (machine operators, supervisors), and support staff (office
                                        peons, housekeeping, security guards)
                                        for businesses and industries.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 2 -->
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                    How quickly can you deploy staff?
                                </button>
                            </div>
                            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        We deploy verified workforce within 24 hours of your request. Our team handles
                                        all documentation,
                                        background verification, and compliance requirements before deployment to ensure
                                        quality and reliability.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 3 -->
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                    Do you provide temporary or permanent staffing?
                                </button>
                            </div>
                            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Yes, we offer both temporary and permanent staffing solutions. Temporary
                                        staffing is ideal for seasonal demands,
                                        project-based work, or covering employee absences. Permanent hiring is available
                                        for full-time positions with
                                        complete recruitment and onboarding support.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 4 -->
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                    Do you handle payroll and compliance?
                                </button>
                            </div>
                            <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="collapse-item-4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Absolutely! We offer complete payroll management services including salary
                                        processing, tax compliance,
                                        PF/ESIC contributions, and labor law compliance. Our team ensures all statutory
                                        requirements are met
                                        for your workforce.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- FAQ 5 - Extra -->
                        <div class="accordion-card style3">
                            <div class="accordion-header" id="collapse-item-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                    Are your workers verified and insured?
                                </button>
                            </div>
                            <div id="collapse-5" class="accordion-collapse collapse" aria-labelledby="collapse-item-5"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">
                                        Yes, all our workers undergo thorough background verification, identity checks,
                                        and skill assessments.
                                        They are properly licensed and insured, ensuring complete safety and reliability
                                        for your business.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 p-0">
                <div class="faq-image">
                    <img src="../assets/img/normal/faq-img.jpg" alt="Lord Krishna Manpower FAQ">
                </div>
            </div>
        </div>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php') ?>