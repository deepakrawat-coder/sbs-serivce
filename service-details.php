<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php');
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php'); ?>
<?php
$slug = $_GET['slug'];
$query = $conn->query("SELECT service.*,service_category.Name AS category_name FROM service LEFT JOIN service_category ON service.Service_Category=service_category.ID WHERE service.Slug='$slug'");
while ($row = $query->fetch_assoc()) {
    $details = $row;
}
$serviceID = $details['ID'];
$otherQuery = $conn->query("SELECT * FROM service WHERE ID !=$serviceID LIMIT 5");
$otherService = [];
while ($row = $otherQuery->fetch_assoc()) {
    $otherService[] = $row;
}
// echo ('<pre>');
// print_r($otherService);
// die;
$currentCategoryId = $details['Service_Category'];
$faq = json_decode($details['FAQ'], true);
$Product_ID = $_SESSION['Product_ID'];
$categoryQuery = $conn->query("
    SELECT
        service_category.ID,
        service_category.Name,
        COUNT(service.ID) AS ServiceCount
    FROM service_category
    LEFT JOIN service
        ON service_category.ID = service.Service_Category
    WHERE service_category.Status = '1'
      AND service_category.ID != $currentCategoryId AND service_category.Product_ID = $Product_ID
    GROUP BY service_category.ID, service_category.Name
    ORDER BY service_category.ID DESC
    LIMIT 5;
");
$categoryList = [];
while ($row = $categoryQuery->fetch_assoc()) {
    $categoryList[] = $row;
}

?>
<style>
    .page-img img {
        height: 450px !important;
    }
</style>
<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Service: <?= $details['Title'] ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li><?= $details['category_name'] ?></li>
                <li><?= $details['Title'] ?></li>
            </ul>
        </div>
    </div>
</div>
<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <div class="page-single mb-30">
                    <div class="page-img">
                    <?php
                    if (!empty($details['Image'])) {
                        echo '<img src="' . $details['Image'] . '" alt="Service Image">';
                    } else {
                        echo '<img src="../assets/img/service/service_details.jpg" alt="Service Image">';
                    }
                    ?>    
                    </div>
                    <div class="page-content">
                        <div class="service-meta"><a href="javascript:void(0)"><?= $details['category_name'] ?></a>
                            <?php if (!empty($details['Rating'])) { ?>
                                <span><i class="fa-sharp fas fa-star"></i><?= $details['Rating'] ?></span>
                            <?php } ?>
                        </div>
                        <h2 class="h3 sec-title page-title"><?= $details['Title'] ?></h2>
                        <p class=""><?= $details['Content'] ?></p>
                        <!-- <p class="mb-30">You may visit our website to see other handyman services that we offer. If you have ever assembled furniture yourself, then you know that the experience is not very different from put together a jigsaw puzzle.</p>
                        <h4 class="mt-40 mb-4">From our gallery</h4>
                        <div class="mb-30">
                            <div class="row gy-4 masonary-active" style="position: relative; height: 469.032px;">
                                <div class="col-xl-4 col-md-6 filter-item" style="position: absolute; left: 0px; top: 0px;">
                                    <div class="service-gallery"><a href="../assets/img/service/service_inner_2.jpg" class="popup-image box-btn"><i class="fa-light fa-magnifying-glass-plus"></i></a> <img class="rounded-10 w-100" src="../assets/img/service/service_inner_2.jpg" alt="service"></div>
                                </div>
                                <div class="col-xl-8 col-md-6 filter-item" style="position: absolute; left: 296px; top: 0px;">
                                    <div class="service-gallery"><a href="../assets/img/service/service_inner_3.jpg" class="popup-image box-btn"><i class="fa-light fa-magnifying-glass-plus"></i></a> <img class="rounded-10 w-100" src="../assets/img/service/service_inner_3.jpg" alt="service"></div>
                                </div>
                                <div class="col-xl-8 col-md-6 filter-item" style="position: absolute; left: 0px; top: 234.594px;">
                                    <div class="service-gallery"><a href="../assets/img/service/service_inner_4.jpg" class="popup-image box-btn"><i class="fa-light fa-magnifying-glass-plus"></i></a> <img class="rounded-10 w-100" src="../assets/img/service/service_inner_4.jpg" alt="service"></div>
                                </div>
                                <div class="col-xl-4 col-md-6 filter-item" style="position: absolute; left: 592px; top: 234.594px;">
                                    <div class="service-gallery"><a href="../assets/img/service/service_inner_5.jpg" class="popup-image box-btn"><i class="fa-light fa-magnifying-glass-plus"></i></a> <img class="rounded-10 w-100" src="../assets/img/service/service_inner_5.jpg" alt="service"></div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mt-40 mb-4">Service Feature Highlights</h4>
                        <div class="checklist">
                            <ul>
                                <li class="fw-normal">Visit most popular location of Maldives</li>
                                <li class="fw-normal">Buffet Breakfast for all traveler with good quality.</li>
                                <li class="fw-normal">Expert guide always guide you and give informations.</li>
                                <li class="fw-normal">Best Hotel for all also great food.</li>
                                <li class="fw-normal">Helping all traveler for Money Exchange.</li>
                                <li class="fw-normal">Buffet Breakfast for all traveler with good quality.</li>
                                <li class="fw-normal">Buffet Breakfast for all traveler with good quality.</li>
                            </ul>
                        </div> -->
                       <?php if (!empty($faq) && isset($faq)) { ?>
    <h4 class="mt-40 mb-4">Some FAQ About This Service</h4>
    <div class="accordion mt-40" id="faqAccordion">
        <?php
        $faqCount = 1;
        foreach ($faq as $item):
            $uniqueId = 'collapse-' . $faqCount;
            $headerId = 'collapse-item-' . $faqCount;
            $isFirst = ($faqCount === 1);
            ?>
            <div class="accordion-card">
                <div class="accordion-header" id="<?php echo $headerId; ?>">
                    <button class="accordion-button <?php echo $isFirst ? '' : 'collapsed'; ?>" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#<?php echo $uniqueId; ?>" 
                            aria-expanded="<?php echo $isFirst ? 'true' : 'false'; ?>" 
                            aria-controls="<?php echo $uniqueId; ?>">
                      <?= 'Q' . $faqCount ?>  <?php echo htmlspecialchars($item['question']); ?>
                    </button>
                </div>
                <div id="<?php echo $uniqueId; ?>" 
                     class="accordion-collapse collapse <?php echo $isFirst ? 'show' : ''; ?>" 
                     aria-labelledby="<?php echo $headerId; ?>" 
                     data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <p class="faq-text"><?= ' ' ?><?php echo nl2br(htmlspecialchars($item['answer'])); ?></p>
                    </div>
                </div>
            </div>
        <?php
            $faqCount++;
        endforeach;
        ?>
    </div>
<?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                   
                    <div class="widget widget_categories">
                        <h3 class="widget_title">Categories</h3>
                        <ul>
                            <?php

                            // foreach ($categoryList as $cat):
                            //     echo '<li> <a href="javascript:void(0);">' . $cat['Name'] . '</a> <span>(' . $cat['ServiceCount'] . ')</span> </li>';

                            foreach ($categoryList as $cat) {
                                // Create slug for URL
                                $catSlug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cat['Name'])));
                                echo '<li>
                                <a href="/services?category=' . urlencode($cat['Name']) . '&cat_id=' . $cat['ID'] . '">' . htmlspecialchars($cat['Name']) . '</a>
                                <span>(' . $cat['ServiceCount'] . ')</span>
                                </li>';
                            }
                            ?>
                            <!-- <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_1.svg" alt="icon"> Electrician</a> <span>(10)</span></li>
                            <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_2.svg" alt="icon"> House Roof Work</a> <span>(12)</span></li>
                            <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_3.svg" alt="icon"> Pest Control</a> <span>(13)</span></li>
                            <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_4.svg" alt="icon"> News &amp; Tips</a> <span>(12)</span></li>
                            <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_5.svg" alt="icon"> Repair</a> <span>(16)</span></li>
                            <li><a href="javascript:void(0);"><img src="../assets/img/icon/cat_6.svg" alt="icon"> Solar</a> <span>(15)</span></li> -->
                        </ul>
                    </div>
<?php

if (!empty($otherService)) {
    // Single row ko array me convert karo
    if (isset($otherService['ID'])) {
        $otherService = [$otherService];
    }

    ?>

<div class="widget">
    <h3 class="widget_title">Other Services</h3>

    <div class="recent-post-wrap">

        <?php foreach ($otherService as $other): ?>

            <?php

            $serviceImage = !empty($other['Image'])
                ? $other['Image']
                : '/assets/img/blog/recent-post-1-1.jpg';

            $shortDesc = !empty($other['Short_Description'])
                ? strip_tags($other['Short_Description'])
                : 'Click to view service details';

            if (strlen($shortDesc) > 60) {
                $shortDesc = substr($shortDesc, 0, 60) . '...';
            }

            ?>

            <div class="recent-post">

                <div class="media-img">
                    <a href="/service-details?slug=<?= urlencode($other['Slug']) ?>">
                        <img
                            src="<?= htmlspecialchars($serviceImage) ?>"
                            alt="<?= htmlspecialchars($other['Title']) ?>"  style="object-fit: cover; width:70px; height:70px;">
                    </a>
                </div>

                <div class="media-body">

                    <h4 class="post-title">
                        <a class="text-inherit"
                           href="/service-details?slug=<?= urlencode($other['Slug']) ?>">
                            <?= htmlspecialchars($other['Title']) ?>
                        </a>
                    </h4>

                    <div class="recent-post-meta">
                        <a href="/service-details?slug=<?= urlencode($other['Slug']) ?>">
                            <i class="far fa-file-alt"></i>
                            <?= htmlspecialchars($shortDesc) ?>
                        </a>
                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php } ?>
               
                    <!-- <div class="widget widget_banner background-image" style="background-image: url(&quot;assets/img/bg/widget_banner.jpg&quot;);">
                        <div class="widget-banner">
                            <h3 class="box-title">Need Help? We Are Here To Help You</h3>
                            <div class="logo"><img src="../assets/img/logo.svg" alt="Logo"></div>
                            <p class="box-text">You Get Online support</p>
                            <h3 class="box-link"><a href="tel:+256214203215">+256 214 203 215</a></h3><a href="contact.html" class="th-btn style2">Get a Quote<i class="far fa-arrow-right ms-2"></i></a>
                        </div>
                    </div> -->
                </aside>
            </div>
        </div>
    </div>
</section>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>