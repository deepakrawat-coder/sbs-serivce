<?php require('../admin/includes/conn.php'); ?>

<?php

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// print_r($productId);
// exit();

$whyChooseData = [];
$whyChooseQuery = $conn->query("SELECT * FROM why_choose_us WHERE Product_id  = $productId AND Status = 1 ORDER BY ID ASC");
while ($whyChoose = $whyChooseQuery->fetch_assoc()) {
    $whyChooseData[] = $whyChoose;


}
// echo "<pre>";
// print_r($whyChooseData);
// echo "</pre>";
// exit();

?>

<section class="overflow-hidden space ">
    <div class="shape-mockup" data-top="0%" data-left="0%">
        <img src="../assets/img/bg/why_bg_2.png" alt="shape" />
    </div>
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title2">Why
                Choose Us</span>
            <h2 class="sec-title">Great Reasons To Hire SRG</h2>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="why-feature-left">
                    <?php
                    $leftItems = array_slice($whyChooseData, 0, 3);

                    foreach ($leftItems as $index => $item) {
                        ?>
                        <div class="why-feature">
                            <div class="box-number">
                                <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                            </div>

                            <h3 class="box-title">
                                <?= $item['Title']; ?>
                            </h3>

                            <p class="box-text">
                                <?= $item['Content']; ?>
                            </p>
                        </div>
                    <?php } ?>
                    <!-- <div class="why-feature">
                        <div class="box-number">02</div>
                        <div class="box-icon">
                            <img src="../assets/img/icon/why_feature_2.svg" alt="" />
                        </div>
                        <h3 class="box-title">Competitive Services</h3>
                        <p class="box-text">
                            We offer affordable pricing without compromising on quality for any plumbing or electrical
                            work.
                        </p>
                    </div> -->
                    <!-- <div class="why-feature">
                        <div class="box-number">03</div>
                        <div class="box-icon">
                            <img src="../assets/img/icon/why_feature_3.svg" alt="" />
                        </div>
                        <h3 class="box-title">Expert Team</h3>
                        <p class="box-text">
                            Our certified technicians are trained in both residential and commercial plumbing &
                            electrical services.
                        </p>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-4 align-self-end d-none d-xl-block">
                <div class="why-img2">
                    <img src="/admin<?= $whyChooseData[0]['Image']; ?>" alt="Why" />
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="why-feature-right">
                    <?php
                    $rightItems = array_slice($whyChooseData, 3, 3);

                    foreach ($rightItems as $index => $item) {
                        ?>
                        <div class="why-feature">
                            <div class="box-number">
                                <?= str_pad($index + 4, 2, '0', STR_PAD_LEFT); ?>
                            </div>

                            <h3 class="box-title">
                                <?= $item['Title']; ?>
                            </h3>

                            <p class="box-text">
                                <?= $item['Content']; ?>
                            </p>
                        </div>
                    <?php } ?>
                    <!-- <div class="why-feature">
                        <div class="box-number">05</div>
                        <div class="box-icon">
                            <img src="../assets/img/icon/why_feature_5.svg" alt="" />
                        </div>
                        <h3 class="box-title">30 Days Warranty</h3>
                        <p class="box-text">
                            All repairs and installations come with a 30-day warranty for your complete peace of mind.
                        </p>
                    </div> -->
                    <!-- <div class="why-feature">
                        <div class="box-number">06</div>
                        <div class="box-icon">
                            <img src="../assets/img/icon/why_feature_6.svg" alt="" />
                        </div>
                        <h3 class="box-title">Flexible Pricing Plan</h3>
                        <p class="box-text">
                            Transparent upfront pricing with multiple payment options to suit your budget and needs.
                        </p>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="">
            <div class="container">
                <div class="counter-card-wrap style4">
                    <div class="counter-card">
                        <div class="media-body">
                            <h2 class="box-number text-white">
                                <span class="counter-number">1250</span>+
                            </h2>
                            <p class="box-text text-white">Completed Projects</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h2 class="box-number text-white">
                                <span class="counter-number">180</span>+
                            </h2>
                            <p class="box-text text-white">Happy Clients</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h2 class="box-number text-white">
                                <span class="counter-number">85</span>+
                            </h2>
                            <p class="box-text text-white">Expert Team</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="counter-card">
                        <div class="media-body">
                            <h2 class="box-number text-white">
                                <span class="counter-number">158</span>+
                            </h2>
                            <p class="box-text text-white">Awards Won</p>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
    </div>
</section>