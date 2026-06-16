<?php require('../admin/includes/conn.php'); ?>

<?php

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// print_r($productId);
// exit();

$testimonialsData = [];
$testimonialsQuery = $conn->query("SELECT * FROM testimonials WHERE Product_id  = $productId AND Status = 1 ORDER BY ID ASC");
while ($testimonials = $testimonialsQuery->fetch_assoc()) {
    $testimonialsData[] = $testimonials;


}
// echo "<pre>";
// print_r($testimonialsData);
// echo "</pre>";
// exit();

?>

<section class="overflow-hidden space" id="project-sec" style="margin-top:102px;margin-bottom:102px;"
    data-bg-src="../assets/img/bg/project_bg_4.jpg">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-5 text-center text-xl-start">
                <div class="title-area">
                    <span class="sub-title shape-white"><span class="line"></span><img
                            src="../assets/img/theme-img/title_icon4_white.svg" alt="shape" />Client Feedback</span>
                    <h2 class="sec-title text-white">
                        What Our Clients Say About SBS Security & Sanitary
                    </h2>
                    <p class="sec-text text-white">
                        Our team of security experts and sanitary engineers is dedicated to providing complete safety
                        and hygiene solutions.
                        Read what our valued clients have to say about their experience with SBS.
                    </p>
                </div>
                <a href="javascript:void(0)" class="th-btn style2 rounded-12">View All Feedback<i
                        class="far fa-arrow-right ms-2"></i></a>
            </div>
            <div class="col-xl-6 mt-40 mt-xl-0">
                <div class="slider-wrap text-xl-start text-center">
                    <div class="swiper th-slider has-shadow project-slider4" id="projectSlider4"
                        data-slider-options='{"paginationType":"fraction","centeredSlidesBounds":true,"loop":true}'>
                        <div class="swiper-wrapper">
                            <?php foreach ($testimonialsData as $index => $test): ?>
                                <div class="swiper-slide">
                                    <div class="project-block">
                                        <div class="box-img">
                                            <img src="<?= '/admin' . $test['Image']; ?>" alt="client feedback" />
                                            <a href="javascript:void(0)" class="hexa-btn box-btn"><i
                                                    class="far fa-arrow-right"></i></a>
                                        </div>
                                        <div class="box-content">
                                            <div class="box-number"> <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                                            <p class="box-subtitle"><?= ($test['Name']); ?></p>
                                            <h3 class="box-title">
                                                <a href="javascript:void(0)"> <?= ($test['Title']); ?></a>
                                            </h3>
                                            <p class="box-text">
                                                <?= ($test['Content']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- <div class="swiper-slide">
                                <div class="project-block">
                                    <div class="box-img">
                                        <img
                                            src="../assets/img/gallery/project_4_2.jpg"
                                            alt="client feedback" />
                                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                                    </div>
                                    <div class="box-content">
                                        <div class="box-number">02</div>
                                        <p class="box-subtitle">Priya Verma</p>
                                        <h3 class="box-title">
                                            <a href="javascript:void(0)">Excellent Sanitary Solutions</a>
                                        </h3>
                                        <p class="box-text">
                                            SBS provided modern low-flow plumbing fixtures for my home. Great quality and affordable pricing.
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="swiper-slide">
                                <div class="project-block">
                                    <div class="box-img">
                                        <img
                                            src="../assets/img/gallery/project_4_1.jpg"
                                            alt="client feedback" />
                                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                                    </div>
                                    <div class="box-content">
                                        <div class="box-number">03</div>
                                        <p class="box-subtitle">Amit Patel</p>
                                        <h3 class="box-title">
                                            <a href="javascript:void(0)">Trusted Security Partner</a>
                                        </h3>
                                        <p class="box-text">
                                            SBS handles security for our office building. Their team is well-trained and always on time.
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="swiper-slide">
                                <div class="project-block">
                                    <div class="box-img">
                                        <img
                                            src="../assets/img/gallery/project_4_2.jpg"
                                            alt="client feedback" />
                                        <a href="javascript:void(0)" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                                    </div>
                                    <div class="box-content">
                                        <div class="box-number">04</div>
                                        <p class="box-subtitle">Neha Gupta</p>
                                        <h3 class="box-title">
                                            <a href="javascript:void(0)">Great Sanitary & Plumbing Work</a>
                                        </h3>
                                        <p class="box-text">
                                            SBS did complete sanitary installation in my new home. Very clean work and excellent support.
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="slider-controller">
                        <button data-slider-prev="#projectSlider4" class="slider-arrow text-white default slider-prev">
                            <i class="far fa-arrow-left"></i>
                        </button>
                        <div class="slider-pagination white-color" data-slider-id="#projectSlider4"></div>
                        <button data-slider-next="#projectSlider4" class="slider-arrow text-white default slider-next">
                            <i class="far fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>