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

<section class="overflow-hidden space">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title"><span class="line"></span><img src="../assets/img/theme-img/title_icon4.svg"
                    alt="shape">Why Choose Us</span>
            <h2 class="sec-title">Why Clients Trust Lord Krishna Manpower</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-xl-4 col-md-6">
                <div class="why-feature-left">
                    <?php
                    $leftItems = array_slice($whyChooseData, 0, 2);

                    foreach ($leftItems as $item) {
                        ?>
                        <div class="why-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/why_1_1.svg" alt=""></div>
                            <h3 class="box-title"> <?= htmlspecialchars($item['Title']) ?></h3>
                            <p class="box-text"> <?= htmlspecialchars($item['Content']) ?></p>
                        </div>
                    <?php } ?>
                    <!-- <div class="why-feature2">
                        <div class="box-icon"><img src="../assets/img/icon/why_1_2.svg" alt=""></div>
                        <h3 class="box-title">100% Client Satisfaction</h3>
                        <p class="box-text">We prioritize your needs and ensure complete satisfaction with our staffing solutions and support services.</p>
                    </div> -->
                </div>
            </div>
            <div class="col-xl-4 align-self-end d-none d-xl-block">
                <div class="why-img4 bg-mask" style="mask-image: url('../assets/img/normal/why-shape.png');">
                    <img src="<?= '/admin' . ($whyChooseData[0]['Image'] ?? '') ?>" alt="Lord Krishna Manpower">
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="why-feature-right">
                    <?php
                    $rightItems = array_slice($whyChooseData, 2, 2);

                    foreach ($rightItems as $item) {
                        ?>
                        <div class="why-feature2">
                            <div class="box-icon"><img src="../assets/img/icon/why_1_3.svg" alt=""></div>
                            <h3 class="box-title"><?= htmlspecialchars($item['Title']) ?></h3>
                            <p class="box-text"><?= htmlspecialchars($item['Content']) ?></p>
                        </div>
                    <?php } ?>
                    <!-- <div class="why-feature2">
                        <div class="box-icon"><img src="../assets/img/icon/why_1_4.svg" alt=""></div>
                        <h3 class="box-title">24/7 Support Available</h3>
                        <p class="box-text">Round-the-clock customer support for all your manpower requirements and
                            emergency staffing needs.</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>