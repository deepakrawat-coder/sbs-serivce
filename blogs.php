<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>
<?php
$productId = (int) $_SESSION['Product_ID'];

$query = $conn->query("
    SELECT blogs.*, product.name as product_name 
    FROM blogs 
    LEFT JOIN product ON blogs.Product_ID = product.ID
    WHERE blogs.Product_ID = $productId 
    AND blogs.status = '1'
");

$rows = [];

if ($query && $query->num_rows > 0) {
    $rows = $query->fetch_all(MYSQLI_ASSOC);
}

// echo '<pre>';
// print_r($rows);

?>
<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blogs</h1>
            <ul class="breadcumb-menu">
                <li><a href="index.html">Home</a></li>
                <li>Blogs</li>
            </ul>
        </div>
    </div>
</div>
<section class="space" id="blog-sec">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-5 col-lg-6 col-md-7">
                <div class="title-area text-center text-md-start">
                    <span class="sub-title2"><img src="assets/img/theme-img/title_icon5.svg" alt="shape">Blog &amp; Articles</span>
                    <h2 class="sec-title">
                      Blog &amp; Articles
                    </h2>
                </div>
            </div>
           
        </div>
    
        <div class="row gy-4">
            <?php foreach ($rows as $key => $row) { ?>
                <?php if ($productId == 6) { ?>
                <div class="col-xl-4 col-md-6">
                    <div class="blog-box">
                        <a href="/blog-details?slug=<?= $row['slug'] ?>" class="blog-img"><img src="<?php echo $row['image']; ?>" alt="blog image"> </a><span class="box-date"></span>
                        <div class="blog-content">
                            <div class="blog-meta">
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-user"></i>By <?= $row['product_name'] ?></a>
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-calendar-days"></i><span class="date"><?= date('d', strtotime($row['Created_At'])) ?></span> <?= date('M, Y', strtotime($row['Created_At'])) ?></a>
                        </div>
                        <h3 class="box-title">
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><?= $row['title'] ?></a>
                            <p><?= $row['short_description'] ?></p>
                        </h3>
                        <a href="/blog-details?slug=<?= $row['slug'] ?>" class="hexa-btn box-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div></div>
                  <?php } else if ($productId == 7) { ?>
                 <div class="col-xl-4 col-md-6">
                  <div class="blog-grid">
                    <a href="/blog-details?slug=<?= $row['slug'] ?>" class="blog-img"><img src="<?php echo $row['image']; ?>" alt="blog image"> </a><a href="/blog-details?slug=<?= $row['slug'] ?>" class="icon-btn"><i class="far fa-arrow-right"></i></a>
                    <span class="box-date"></span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-user"></i>By <?= $row['product_name'] ?></a>
                            
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-calendar-days"></i><span class="date"><?= date('d', strtotime($row['Created_At'])) ?></span> 
                            <?= date('M, Y', strtotime($row['Created_At'])) ?></a>
                        </div>
                        <h3 class="box-title">
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><?= $row['title'] ?></a>
                            <p><?= $row['short_description'] ?></p>
                        </h3>
                    </div>
                    </div>
                 </div>
                <?php } else { ?>
                   <div class="col-xl-4 col-md-6">
                  <div class="blog-card style3">
                    <a href="/blog-details?slug=<?= $row['slug'] ?>" class="blog-img"><img src="../assets/img/blog/blog_2_1.jpg" alt="blog image"> </a>
                    <span class="box-date"><span class="date"><?= date('d', strtotime($row['Created_At'])) ?></span> <?= date('M, Y', strtotime($row['Created_At'])) ?></span>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-user"></i>By <?= $row['product_name'] ?></a>
                            <a href="/blog-details?slug=<?= $row['slug'] ?>"><i class="fas fa-tags"></i>Manpower</a>
                        </div>
                        <h3 class="box-title"><a href="/blog-details?slug=<?= $row['slug'] ?>"><?= $row['title'] ?></a></h3>
                        <p class="box-text"><?= $row['short_description'] ?></p>
                    </div>
                   </div>
                    </div>
                <?php } ?>
                
            <?php } ?>
        </div>
        
    </div>
</section>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>