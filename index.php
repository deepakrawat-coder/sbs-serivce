<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php'); ?>

<?php require('admin/includes/conn.php'); ?>

<?php

$productData = [];
$productQuery = $conn->query('SELECT * FROM `product` WHERE Status = 1 ORDER BY ID DESC');
while ($product = $productQuery->fetch_assoc()) {
    $productData[] = $product;
}
// echo "<pre>";
// print_r($productData);
// echo"</pre>";
// exit;
?>


<style>
    .main-home-alignment {
        min-height: 100dvh;
        display: flex;
        align-items: center;
    }

    .service-list ul {
        list-style: none;
        padding-left: 0;
        margin-top: 12px;
        margin-bottom: 12px;
    }

    .service-list ul li {
        padding: 6px 0;
        font-size: 14px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .service-list ul li i {
        color: var(--theme-color, #f4b41a);
        width: 25px;
        margin-right: 8px;
    }

    .blog-grid .box-text {
        margin-top: 10px;
        font-size: 14px;
        line-height: 1.5;
        color: #666;
    }

    .mt-2 {
        margin-top: 10px;
    }

    .blog-grid .icon-btn:after {
        border-color: black;
    }

    .blog-grid:after,
    .blog-grid:before {

        box-shadow: inset 30px 30px 0 0 #000000 !important;
    }

    p {
        margin-bottom: 0 !important
    }
</style>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<section class="main-home-alignment" style="background:black;">
    <div class="container-fluid px-lg-5 px-xl-5 px-md-3 px-sm-2">
        <div class="row gy-4">
            <!-- SRG Card - Plumbing & Electrical Services -->
            <?php
            foreach ($productData as $products):
                $productUrl = $products['Slug'] . '?id=' . $products['ID'];

                ?>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-grid">
                        <a href="<?= $productUrl ?>" class="blog-img">
                            <!-- <img src="assets/img/blog/blog_4_1.jpg" alt="SRG Services"> -->
                            <img src="./admin<?= ($products['Image']) ?>" alt="<?= ($products['Name']) ?>">

                        </a>
                        <a href="<?= $productUrl ?>" class="icon-btn"><i class="far fa-arrow-right"></i></a>
                        <div class="blog-content">
                            <h3 class="box-title"><a href="<?= $productUrl ?>"><?= ($products['Name']) ?></a></h3>
                            <!-- <p class="box-text">Professional plumbing, electrical wiring, AC repair, water heater fixing,
                                and home maintenance services 24/7.</p> -->
                            <p class="box-text mb-0"><?= ($products['Content']) ?></p>
                            <div class="service-list">
                                <div class="row">
                                    <?php
                                    $servicekey = array_map('trim', explode(',', $products['Services']));

                                    // Split array into 2 equal parts
                                    $half = ceil(count($servicekey) / 2);

                                    $firstColumn = array_slice($servicekey, 0, $half);
                                    $secondColumn = array_slice($servicekey, $half);
                                    ?>

                                    <!-- First Column -->
                                    <div class="col-12 col-md-6">
                                        <ul>
                                            <?php foreach ($firstColumn as $value) { ?>
                                                <li>
                                                    <i class="fas fa-check-circle"></i>
                                                    <?= $value ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="col-12 col-md-6">
                                        <ul>
                                            <?php foreach ($secondColumn as $value) { ?>
                                                <li>
                                                    <i class="fas fa-check-circle"></i>
                                                    <?= $value ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= $productUrl ?>" class="th-btn style4 mt-2">View All Services <i
                                    class="far fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- SBS Card - Security & Sanitary Services -->

            <!-- <div class="col-xl-4 col-md-6">
                <div class="blog-grid">
                    <a href="/sbs/" class="blog-img">
                        <img src="assets/img/blog/blog_4_2.jpg" alt="SBS Services">
                    </a>
                    <a href="/sbs/" class="icon-btn"><i class="far fa-arrow-right"></i></a>
                    <div class="blog-content">                     
                        <h3 class="box-title"><a href="/sbs/">SBS - Security & Sanitary Solutions</a></h3>
                        <p class="box-text">Integrated security systems, CCTV surveillance, security guards, modern sanitary fixtures, and access control systems.</p>
                        <div class="service-list">                          
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> CCTV Surveillance</li>
                                        <li><i class="fas fa-check-circle"></i> Security Guards</li>

                                    </ul>
                                </div>
                                <div class="col-12 col-md-6">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Sanitary Fixtures</li>
                                        <li><i class="fas fa-check-circle"></i> Access Control</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="/sbs/" class="th-btn style4 mt-2">View All Services <i class="far fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div> -->


            <!-- Lord Krishna Card - Manpower Services -->
            <!-- <div class="col-xl-4 col-md-6">
                <div class="blog-grid">
                    <a href="/lord-krishna/" class="blog-img">
                        <img src="assets/img/blog/blog_4_3.jpg" alt="Lord Krishna Services">
                    </a>
                    <a href="/lord-krishna/" class="icon-btn"><i class="far fa-arrow-right"></i></a>
                    <div class="blog-content">                        
                        <h3 class="box-title"><a href="/lord-krishna/">Lord Krishna - Manpower Solutions</a></h3>
                        <p class="box-text">Skilled and semi-skilled workforce, temporary staffing, industrial manpower, and payroll management services.</p>
                        <div class="service-list">                         
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Skilled Workers</li>
                                        <li><i class="fas fa-check-circle"></i> Temporary Staffing</li>

                                    </ul>
                                </div>
                                <div class="col-12 col-md-6">
                                    <ul>
                                        <li><i class="fas fa-check-circle"></i> Industrial Staff</li>
                                        <li><i class="fas fa-check-circle"></i> Payroll Management</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="/lord-krishna/" class="th-btn style4 mt-2">View All Services <i class="far fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<script src="/assets/js/vendor/jquery-3.7.1.min.js"></script>
<script src="/assets/js/swiper-bundle.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/tilt.jquery.min.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/main.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php') ?>