<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
<style>
    /* Same CSS as above plus blog-specific styles */
    .blog-details-meta { display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 25px; padding-bottom: 20px; border-bottom: 1px solid #eee; }
    .blog-details-meta span { display: flex; align-items: center; gap: 8px; color: #666; font-size: 14px; }
    .blog-details-meta span i { color: var(--theme-color); }
    .blog-details-meta a { color: #666; text-decoration: none; transition: color 0.2s ease; }
    .blog-details-meta a:hover { color: var(--theme-color); }
    .blog-quote { background: #f8f9fc; padding: 30px; border-left: 4px solid var(--theme-color); border-radius: 12px; margin: 30px 0; font-style: italic; font-size: 18px; color: #333; }
    .blog-tags { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; }
    .blog-tags a { background: #f5f5f5; padding: 5px 15px; border-radius: 30px; font-size: 12px; text-decoration: none; color: #666; transition: all 0.2s ease; }
    .blog-tags a:hover { background: var(--theme-color); color: #fff; }
    .comment-list { list-style: none; padding-left: 0; margin-top: 30px; }
    .comment-item { display: flex; gap: 20px; margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #eee; }
    .comment-avatar { width: 60px; height: 60px; border-radius: 50%; overflow: hidden; flex-shrink: 0; }
    .comment-avatar img { width: 100%; height: 100%; object-fit: cover; }
    .comment-meta h5 { margin-bottom: 5px; font-size: 16px; }
    .comment-meta .comment-date { font-size: 12px; color: #999; margin-bottom: 10px; display: block; }
    .comment-reply { color: var(--theme-color); text-decoration: none; font-size: 13px; font-weight: 500; }
    .comment-form input, .comment-form textarea { width: 100%; padding: 14px 20px; border: 1px solid #eee; border-radius: 12px; margin-bottom: 15px; transition: all 0.2s ease; }
    .comment-form input:focus, .comment-form textarea:focus { outline: none; border-color: var(--theme-color); box-shadow: 0 0 0 2px rgba(244,180,26,0.1); }
</style>
<?php
// Ensure slug is provided
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';

if (empty($slug)) {
    // Handle missing slug gracefully - redirect or show error
    echo "<div class='container'><div class='alert alert-danger'>Invalid blog post.</div></div>";
    include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php');
    include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php');
    exit;
}

// Get main blog details - FIXED variable name conflict
$blogDetailsQuery = $conn->query("SELECT blogs.*, product.name as product_name FROM blogs LEFT JOIN product ON blogs.Product_ID = product.ID WHERE blogs.slug = '$slug' AND blogs.status = '1'");
if (!$blogDetailsQuery || $blogDetailsQuery->num_rows == 0) {
    echo "<div class='container'><div class='alert alert-danger'>Blog post not found.</div></div>";
    include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php');
    include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php');
    exit;
}
$blogRow = $blogDetailsQuery->fetch_assoc();
$faq = json_decode($blogRow['faq'], true);
$id = $blogRow['ID'];

// Get recent posts - FIXED variable name to not conflict
$recentQuery = $conn->query("SELECT * FROM blogs WHERE Status='1' AND ID!='$id' ORDER BY rand() LIMIT 4");
$recentBlog = [];
while ($recentRow = $recentQuery->fetch_assoc()) {
    $recentBlog[] = $recentRow;
}
?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title"><?= htmlspecialchars($blogRow['title']) ?></h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li><a href="javascript:void(0)">Blog</a></li>
                <li><?= htmlspecialchars($blogRow['title']) ?></li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <div class="page-single mb-30">
                    <div class="page-img"><img src="<?= htmlspecialchars($blogRow['image']) ?>" alt="Blog Image"></div>
                    <div class="page-content">
                        <div class="blog-details-meta">
                            <span><i class="fas fa-user"></i> By <a href="javascript:void(0)"><?= htmlspecialchars($blogRow['product_name']) ?></a></span>
                            <span><i class="fas fa-calendar"></i> <?= date('d M, Y', strtotime($blogRow['Created_At'])) ?></span>                            
                        </div>
                        <h2 class="h3 sec-title page-title" style="text-transform: capitalize;"><?= htmlspecialchars($blogRow['title']) ?></h2>
                        <div style="text-align: justify;"><?= $blogRow['content'] ?></div>                  
                    </div>
                </div>
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
            <?php if (!empty($recentBlog)) { ?>
            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    <div class="widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">
                            <?php foreach ($recentBlog as $recentItem) { ?>
                            <div class="recent-post">
                                <div class="media-img"><a href="?slug=<?= urlencode($recentItem['slug']) ?>"><img src="<?= htmlspecialchars($recentItem['image']) ?>" alt="<?= htmlspecialchars($recentItem['title']) ?>" style="width:100px; height:80px; object-fit: cover;"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title mb-0"><a class="text-inherit" href="?slug=<?= urlencode($recentItem['slug']) ?>"><?= htmlspecialchars($recentItem['title']) ?></a></h4>
                                    <div class="recent-post-meta"><i class="far fa-calendar"></i> <?= date('d M, Y', strtotime($recentItem['Created_At'])) ?></div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </aside>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>