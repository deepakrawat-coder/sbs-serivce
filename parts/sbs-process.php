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






<section class="ovberflow-hidden space shape-mockup-wrap">
    <!-- <div class="shape-mockup spin" style="top: 24%; right: 4%;">
        <img src="../assets/img/shape/gear_1.svg" alt="shape">
    </div>
    <div class="shape-mockup jump" style="bottom: 20%; left: 3%;">
        <img src="../assets/img/shape/toolkit_1.svg" alt="shape">
    </div> -->
    <div class="container">

        <div class="title-area text-center">
            <span class="sub-title"><span class="line"></span>Working Process</span>
            <h2 class="sec-title">How SBS Works</h2>
            <p class="sec-text">
                <?= $workingProcessData[0]['Description'] ?? '' ?>
            </p>
        </div>
        <!-- <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">01</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Request Consultation</h3>
                        <p class="box-text text-mute">
                            Call us or fill the form for security or sanitary service requirements
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">02</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Site Assessment</h3>
                        <p class="box-text text-mute">
                            Our experts visit your location for complete security & sanitary inspection
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">03</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Custom Solution</h3>
                        <p class="box-text text-mute">
                            We design and install tailored security systems & sanitary fixtures
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number bg-black">04</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Support & Maintenance</h3>
                        <p class="box-text text-mute">
                            24/7 customer support and regular maintenance for all installations
                        </p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row gy-4 justify-content-center">
            <?php foreach ($workingProcessData as $index => $process): ?>
                <div class="col-xl-3 col-md-6">
                    <div class="process-card">
                        <div class="box-number"><?= str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                        <div class="box-content bg-black">
                            <h3 class="box-title text-white"> <?= ($process['Title']); ?></h3>
                            <p class="box-text text-mute">
                                <?= ($process['Content']); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">02</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Site Assessment</h3>
                        <p class="box-text text-mute">
                            Experts visit your site for complete security & sanitary check
                        </p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">03</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Custom Solution</h3>
                        <p class="box-text text-mute">
                            We design & install tailored security systems & sanitary fixtures
                        </p>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-xl-3 col-md-6">
                <div class="process-card">
                    <div class="box-number">04</div>
                    <div class="box-content bg-black">
                        <h3 class="box-title text-white">Support & Maintenance</h3>
                        <p class="box-text text-mute">
                            24/7 support and regular maintenance for all installations
                        </p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>