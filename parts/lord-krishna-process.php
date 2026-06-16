<?php require('../admin/includes/conn.php'); ?>

<?php

$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// print_r($productId);
// exit();

$workingProcessData = [];
$workingProcessQuery = $conn->query("SELECT * FROM working_process WHERE Product_id  = $productId AND Status = 1 ORDER BY ID ASC");
while ($workingProcess = $workingProcessQuery->fetch_assoc()) {
    $workingProcessData[] = $workingProcess;


}
// echo "<pre>";
// print_r($workingProcessData);
// echo "</pre>";
// exit();

?>


<section class="space shape-mockup-wrap" id="process-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title"><img src="../assets/img/theme-img/title_icon.svg" alt="Icon">Working
                        Process</span>
                    <h2 class="sec-title">How we work</h2>
                </div>
            </div>
        </div>
        <div class="process-item_wrapp">
            <?php foreach ($workingProcessData as $index => $process): ?>
                <div class="process-item">
                    <div class="process-item_icon">
                        <span class="number"><?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                    </div>
                    <div class="process-item_content">
                        <h2 class="box-title"><?= htmlspecialchars($process['Title']); ?></h2>
                        <p class="process-item_text"><?= htmlspecialchars($process['Content']); ?></p>
                    </div>
                    <div class="process-item_img">
                        <img src="../assets/img/normal/process_1_2.jpg" alt="Request Staff">
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="process-item">
                <div class="process-item_icon">
                    <span class="number">02</span>
                </div>
                <div class="process-item_content">
                    <h2 class="box-title">Get Free Quote</h2>
                    <p class="process-item_text">We provide detailed estimation for temporary or permanent staffing based on your budget and timeline</p>
                </div>
                <div class="process-item_img">
                    <img src="../assets/img/normal/process_1_2.jpg" alt="Get Free Quote">
                </div>
            </div> -->
            <!-- <div class="process-item">
                <div class="process-item_icon">
                    <span class="number">03</span>
                </div>
                <div class="process-item_content">
                    <h2 class="box-title">Deploy Staff</h2>
                    <p class="process-item_text">We deploy verified workforce within 24 hours with complete documentation and compliance support</p>
                </div>
                <div class="process-item_img">
                    <img src="../assets/img/normal/process_1_3.jpg" alt="Deploy Staff">
                </div>
            </div> -->
        </div>
    </div>
    <div class="shape-mockup" style="bottom: 0%; left: 0%;">
        <img src="../assets/img/shape/lines_2.png" alt="shape">
    </div>
</section>