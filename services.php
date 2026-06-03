<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
<style>
    .blog-card .box-date {
        padding: 10px 24px !important;
        line-height: 23px !important;
    }

    .services-layout {
        display: flex;
        gap: 28px;
        align-items: flex-start;
    }

    .services-nav {
        width: 300px;
        flex-shrink: 0;
        position: sticky;
        top: 82px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        z-index: 40;
    }

    .services-nav .nav-tab {
        display: flex;
        align-items: center;
        gap: 10px;
        width: 100%;
        padding: 11px 16px;
        border-radius: 10px;
        border: 1.5px solid #dee2e6;
        background: #fff;
        color: #6c757d;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-align: left;
        transition: all 0.2s ease;
    }

    .services-nav .nav-tab:hover {
        border-color: var(--theme-color);
        color: var(--theme-color);
        background: #fff5f2;
    }

    .services-nav .nav-tab.active {
        background: var(--theme-color);
        border-color: var(--theme-color);
        color: #fff;
    }

    .services-nav .nav-tab .tab-icon {
        font-size: 16px;
        flex-shrink: 0;
    }

    .services-nav .nav-tab .tab-count {
        margin-left: auto;
        font-size: 11px;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.08);
        color: inherit;
        padding: 2px 7px;
        border-radius: 999px;
    }

    .services-nav .nav-tab.active .tab-count {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    .services-grid-wrap {
        flex: 1;
        min-width: 0;
    }

    .service-card-wrap {
        transition: opacity 0.2s ease;
    }
    
    .service-card-wrap.hidden {
        display: none !important;
    }

    .no-results {
        display: none;
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
        font-size: 16px;
        width: 100%;
    }

    @media (max-width: 767px) {
        .services-layout {
            flex-direction: column;
            gap: 0;
        }
        .services-nav {
            width: 100%;
            flex-direction: row;
            flex-wrap: nowrap;
            overflow-x: auto;
            position: sticky;
            top: 72px;
            background: #fff;
            padding: 10px 0;
            margin-bottom: 20px;
            gap: 8px;
            scrollbar-width: none;
        }
        .services-nav::-webkit-scrollbar {
            display: none;
        }
        .services-nav .nav-tab {
            flex-shrink: 0;
            width: auto;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 13px;
        }
        .services-nav .nav-tab .tab-count {
            display: none;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .services-nav {
            width: 180px;
        }
        .services-nav .nav-tab {
            font-size: 13px;
            padding: 10px 12px;
        }
    }

    .service-card-wrap {
        display: flex;
    }
    .service-card-wrap .border {
        display: flex;
        flex-direction: column;
        width: 100%;
    }
    .service-card-wrap .blog-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .service-card-wrap .blog-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-card .blog-img img, .box-img img{aspect-ratio:2/2 !important; height:300px !important;}
    .service-card{
        width:100% !important;
    }
</style>

<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php
include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php');

$product_id = (int) $_SESSION['Product_ID'];

// First, get all categories for this product
$categories_sql = $conn->query("
    SELECT 
        service_category.ID AS category_id,
        service_category.Name AS category_name
    FROM service_category
    WHERE service_category.Product_ID = $product_id
    ORDER BY service_category.Name
");

// Fetch services with category details
$services_sql = $conn->query("
    SELECT
        service_category.ID AS category_id,
        service_category.Name AS category_name,
        service.*
    FROM service_category
    LEFT JOIN service
        ON service_category.ID = service.Service_Category
    WHERE service_category.Product_ID = $product_id
    ORDER BY service_category.Name, service.Title
");

$serviceData = [];
$categoryCounts = [];
$allServicesCount = 0;

// Initialize all categories with empty services array
while ($category = $categories_sql->fetch_assoc()) {
    $categoryName = $category['category_name'];
    $categoryId = $category['category_id'];

    $serviceData[$categoryName] = [
        'id' => $categoryId,
        'services' => []
    ];
    $categoryCounts[$categoryName] = 0;
}

// Populate services into their categories
while ($row = $services_sql->fetch_assoc()) {
    $category = $row['category_name'];

    // Only add if service has an ID (exists)
    if ($row['ID']) {
        $serviceData[$category]['services'][] = $row;
        $categoryCounts[$category]++;
        $allServicesCount++;
    }
}

// Generate slug for data-cat attribute
function createSlug($string)
{
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    return trim($string, '-');
}
?>

<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Services</h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li><?= htmlspecialchars($_SESSION['Product_Name'] ?? 'Services') ?></li>
            </ul>
        </div>
    </div>
</div>

<section class="pb-5 my-5">
    <div class="container-fluid px-0 px-md-3 px-lg-5">
        <div class="services-layout">

           
<div class="services-nav" id="servicesNav">
    <button class="nav-tab <?php echo ($active_category_slug == 'all') ? 'active' : ''; ?>" data-cat="all">
        All Services
        <span class="tab-count" id="count-all"><?php echo $allServicesCount; ?></span>
    </button>
    <?php foreach ($serviceData as $category => $data): ?>
        
            <?php $catSlug = createSlug($category); ?>
            <button class="nav-tab <?php echo ($active_category_slug == $catSlug) ? 'active' : ''; ?>" data-cat="<?php echo $catSlug; ?>">
                <?php echo htmlspecialchars($category); ?>
                <span class="tab-count"><?php echo count($data['services']); ?></span>
            </button>
      
    <?php endforeach; ?>
</div>
            <div class="services-grid-wrap">
                <div class="row g-4" id="servicesGrid">
                    <?php
                    if ($_SESSION['Product_ID'] == '6') {
                        foreach ($serviceData as $category => $data):
                            $categorySlug = createSlug($category);
                            foreach ($data['services'] as $service):
                                ?>
                                <div class="col-12 col-sm-6 col-lg-3 service-card-wrap" data-cat="<?php echo $categorySlug; ?>">
                                    <div class="service-card p-0">
                                        <div class="box-img">
                                            <?php if (!empty($service['Image'])): ?>
                                                <img src="<?php echo htmlspecialchars($service['Image']); ?>" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                            <?php else: ?>
                                                <img src="assets/img/blog/blog_1_1.jpg" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="box-content">
                                            <div class="">
                                                <h3 class="box-title mb-0">
                                                    <a href="/service-details?slug=<?php echo $service['Slug']; ?>"><?php echo htmlspecialchars($service['Title']); ?></a>
                                                </h3>
                                                <p class="box-desc text-white mb-0 pb-0"><?php echo htmlspecialchars($service['Short_Description'] ?? ''); ?></p>
                                            </div>
                                            <a href="javascript:void(0)" class="icon-btn">
                                                <i class="far fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        endforeach;
                    } else if ($_SESSION['Product_ID'] == '9') {
                        foreach ($serviceData as $category => $data):
                            $categorySlug = createSlug($category);
                            foreach ($data['services'] as $service):
                                ?>
                                <div class="col-xxl-3 col-lg-4 col-md-6 service-card-wrap" data-cat="<?php echo $categorySlug; ?>">
                                    <div class="project-grid border border-1 rounded-3">
                                        <div class="box-img">
                                            <?php if (!empty($service['Image'])): ?>
                                                <img src="<?php echo htmlspecialchars($service['Image']); ?>" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                            <?php else: ?>
                                                <img src="assets/img/blog/blog_1_1.jpg" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="box-content">
                                            <h3 class="box-title"><a href="/service-details?slug=<?php echo $service['Slug']; ?>"><?php echo htmlspecialchars($service['Title']); ?></a></h3>
                                            <p class="box-text"><?php echo htmlspecialchars($service['Short_Description'] ?? ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        endforeach;
                    } else {
                        foreach ($serviceData as $category => $data):
                            $categorySlug = createSlug($category);
                            foreach ($data['services'] as $service):
                                ?>
                                <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="<?php echo $categorySlug; ?>">
                                    <div class="border border-1" style="border-radius: 10px;">
                                        <div class="blog-card">
                                            <a href="/service-details?slug=<?php echo $service['Slug']; ?>" class="blog-img">
                                                <?php if (!empty($service['Image'])): ?>
                                                    <img src="<?php echo htmlspecialchars($service['Image']); ?>" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                                <?php else: ?>
                                                    <img src="assets/img/blog/blog_1_1.jpg" alt="<?php echo htmlspecialchars($service['Title']); ?>">
                                                <?php endif; ?>
                                            </a>
                                            <span class="box-date"><?php echo htmlspecialchars($category); ?></span>
                                            <div class="blog-content">
                                                <h3 class="box-title mb-0">
                                                    <a href="/service-details?slug=<?php echo $service['Slug']; ?>"><?php echo htmlspecialchars($service['Title']); ?></a>
                                                </h3>
                                                <p class="box-desc mb-0 pb-0"><?php echo htmlspecialchars($service['Short_Description'] ?? ''); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        endforeach;
                    }
                    ?>

                    <div class="no-results" id="noResults">
                        <span style="font-size:48px; opacity:0.3;">🔧</span>
                        <p>No services found in this category.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script>
    (function() {
        const nav = document.getElementById('servicesNav');
        const grid = document.getElementById('servicesGrid');
        
        if (!nav || !grid) return;
        
        // Get all service cards (excluding the no-results div)
        const cards = Array.from(grid.querySelectorAll('.service-card-wrap'));
        const noRes = document.getElementById('noResults');

        function filterServices(category) {
            let visible = 0;
            
            cards.forEach(function(card) {
                const cardCat = card.dataset.cat;
                const show = (category === 'all' || cardCat === category);
                
                if (show) {
                    card.classList.remove('hidden');
                    visible++;
                } else {
                    card.classList.add('hidden');
                }
            });
            
            // Show/hide no results message
            if (noRes) {
                noRes.style.display = visible === 0 ? 'block' : 'none';
            }
        }

        // Add click event listeners to nav tabs
        const navTabs = nav.querySelectorAll('.nav-tab');
        navTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                // Remove active class from all tabs
                navTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Get category and filter
                const category = this.dataset.cat;
                filterServices(category);
            });
        });
        
        // Initial filter to ensure everything is visible
        filterServices('all');
    })();
</script> -->
<script>
    (function() {
        const nav = document.getElementById('servicesNav');
        const grid = document.getElementById('servicesGrid');
        
        if (!nav || !grid) return;
        
        // Get all service cards (excluding the no-results div)
        const cards = Array.from(grid.querySelectorAll('.service-card-wrap'));
        const noRes = document.getElementById('noResults');

        function filterServices(category) {
            let visible = 0;
            
            cards.forEach(function(card) {
                const cardCat = card.dataset.cat;
                const show = (category === 'all' || cardCat === category);
                
                if (show) {
                    card.classList.remove('hidden');
                    visible++;
                } else {
                    card.classList.add('hidden');
                }
            });
            
            // Show/hide no results message
            if (noRes) {
                noRes.style.display = visible === 0 ? 'block' : 'none';
            }
        }

        // Add click event listeners to nav tabs
        const navTabs = nav.querySelectorAll('.nav-tab');
        navTabs.forEach(function(tab) {
            tab.addEventListener('click', function(e) {
                // Remove active class from all tabs
                navTabs.forEach(function(t) {
                    t.classList.remove('active');
                });
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Get category and filter
                const category = this.dataset.cat;
                filterServices(category);
                
                // Update URL without page reload (optional)
                const url = new URL(window.location.href);
                if (category === 'all') {
                    url.searchParams.delete('category');
                    url.searchParams.delete('cat_id');
                } else {
                    // Find category name from active tab text (without count)
                    let catName = this.childNodes[0].nodeValue.trim();
                    url.searchParams.set('category', catName);
                }
                window.history.pushState({}, '', url);
            });
        });
        
        // Get initial category from URL and filter
        const urlParams = new URLSearchParams(window.location.search);
        const initialCategory = urlParams.get('category');
        
        if (initialCategory) {
            // Find the tab with matching category
            let found = false;
            navTabs.forEach(function(tab) {
                if (tab.dataset.cat !== 'all') {
                    let tabText = tab.childNodes[0].nodeValue.trim();
                    if (tabText.toLowerCase() === initialCategory.toLowerCase()) {
                        tab.click();
                        found = true;
                    }
                }
            });
            if (!found) {
                // If category not found, show all services
                document.querySelector('.nav-tab[data-cat="all"]').click();
            }
        } else {
            // Initial filter to ensure everything is visible
            filterServices('all');
        }
    })();
</script>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include ($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>