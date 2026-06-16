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







<section class="space" id="process-sec" data-bg-src="../assets/img/bg/process_bg_2.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8">
                <div class="title-area text-center">
                    <span class="sub-title2">Working Process</span>
                    <h2 class="sec-title text-white">How SRG Works</h2>
                    <p class="sec-text text-white">
                        <!-- Our team of certified plumbers & electricians is ready to assist you with all your home service needs.
                        Contact us today to get started. -->
                        <?= $workingProcessData[0]['Description'] ?? '' ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="process-box-wrap">
            <?php foreach ($workingProcessData as $index => $process) { ?>

                <div class="process-box">
                    <div class="box-number">
                        <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>
                    </div>

                    <div class="box-content">
                        <h3 class="box-title">
                            <?= htmlspecialchars($process['Title']); ?>
                        </h3>

                        <p class="box-text">
                            <?= htmlspecialchars($process['Description']); ?>
                        </p>
                    </div>
                </div>

            <?php } ?>
            <!-- <div class="process-box">
                <div class="box-number">02</div>
                <div class="box-content">
                    <h3 class="box-title">Get Free Estimate</h3>
                    <p class="box-text">
                        We provide transparent upfront pricing with no hidden charges
                    </p>
                </div>
            </div> -->
            <!-- <div class="process-box">
                <div class="box-number">03</div>
                <div class="box-content">
                    <h3 class="box-title">Service On Site</h3>
                    <p class="box-text">
                        Our expert technician arrives on time and completes the job efficiently
                    </p>
                </div>
            </div> -->
            <!-- <div class="process-box">
                <div class="box-number">04</div>
                <div class="box-content">
                    <h3 class="box-title">Quality Check</h3>
                    <p class="box-text">
                        We test everything and ensure 100% satisfaction before we leave
                    </p>
                </div>
            </div> -->
        </div>
    </div>
</section>