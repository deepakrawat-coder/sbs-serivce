<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
<style>
    .blog-card .box-date {
        padding: 10px 24px !important;
        line-height: 23px !important;
    }

    /* ── Layout wrapper ── */
    .services-layout {
        display: flex;
        gap: 28px;
        align-items: flex-start;
    }

    /* ══════════════════════════════
       LEFT VERTICAL NAV — desktop
    ══════════════════════════════ */
    .services-nav {
        width: 300px;
        flex-shrink: 0;
        position: sticky;
        top: 82px;
        /* adjust to your header height */
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
        white-space: nowrap;
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

    /* count badge */
    .services-nav .nav-tab .tab-count {
        margin-left: auto;
        font-size: 11px;
        font-weight: 600;
        background: rgba(0, 0, 0, 0.08);
        color: inherit;
        padding: 2px 7px;
        border-radius: 999px;
        line-height: 1.4;
    }

    .services-nav .nav-tab.active .tab-count {
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    /* ── Grid takes remaining width ── */
    .services-grid-wrap {
        flex: 1;
        min-width: 0;
    }

    /* ── Card & results ── */
    .service-card-wrap {
        transition: opacity 0.2s ease, transform 0.2s ease;
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

    /* ══════════════════════════════
       MOBILE — horizontal top bar
    ══════════════════════════════ */
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
            overflow-y: visible;
            position: sticky;
            top: 72px;
            background: #fff;
            padding: 10px 0;
            margin-bottom: 20px;
            gap: 8px;
            scrollbar-width: none;
            -webkit-overflow-scrolling: touch;
            /* subtle bottom border when sticky */
            border-bottom: 1px solid #f0f0f0;
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

        /* hide count badge on mobile to save space */
        .services-nav .nav-tab .tab-count {
            display: none;
        }
    }

    /* ══════════════════════════════
       TABLET — narrower left nav
    ══════════════════════════════ */
    @media (min-width: 768px) and (max-width: 991px) {
        .services-nav {
            width: 160px;
        }

        .services-nav .nav-tab {
            font-size: 13px;
            padding: 10px 12px;
        }
    }

    /* ── Equal height cards ── */
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
</style>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Services</h1>
            <ul class="breadcumb-menu">
                <li><a href="home-handyman.html">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</div>

<section class="pb-5 my-5">
    <div class="container-fluid px-0 px-md-3 px-lg-5">
        <div class="services-layout">

            <!-- ══ LEFT VERTICAL CATEGORY TABS ══ -->
            <div class="services-nav" id="servicesNav">
                <button class="nav-tab active" data-cat="all">
                    All Services
                    <span class="tab-count" id="count-all">7</span>
                </button>
                <button class="nav-tab" data-cat="roofing">
                    Roofing
                    <span class="tab-count" id="count-roofing">2</span>
                </button>
                <button class="nav-tab" data-cat="plumbing">
                    Plumbing
                    <span class="tab-count" id="count-plumbing">2</span>
                </button>
                <button class="nav-tab" data-cat="electrical">
                    Electrical
                    <span class="tab-count" id="count-electrical">1</span>
                </button>
                <button class="nav-tab" data-cat="cleaning">
                    Cleaning
                    <span class="tab-count" id="count-cleaning">1</span>
                </button>
                <button class="nav-tab" data-cat="painting">
                    Painting
                    <span class="tab-count" id="count-painting">1</span>
                </button>


            </div>
            <!-- ══ SERVICES GRID ══ -->
            <div class="services-grid-wrap">
                <div class="row g-4" id="servicesGrid">

                    <!-- ROOFING -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="roofing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_1.jpg" alt="Roof Repair">
                                </a>
                                <span class="box-date">Roofing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Roof Repair & Inspection</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Fix leaks, missing shingles, and structural issues with a full roof inspection from our team.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="roofing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_2.jpg" alt="Gutter Cleaning">
                                </a>
                                <span class="box-date">Roofing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Gutter Cleaning & Repair</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Complete gutter clearing, flushing, and downspout inspection for your home.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PLUMBING -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="plumbing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_3.jpg" alt="Leak Fix">
                                </a>
                                <span class="box-date">Plumbing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Leak Detection & Fix</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Quick detection and repair for all types of residential pipe leaks.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="plumbing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_4.jpg" alt="Drain Unclogging">
                                </a>
                                <span class="box-date">Plumbing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Drain Unclogging</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Professional drain clearing for kitchen, bathroom, and floor drains.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ELECTRICAL -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="electrical">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_5.jpg" alt="Wiring">
                                </a>
                                <span class="box-date">Electrical</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Wiring & Outlet Installation</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Install, repair, or upgrade outlets, switches, and home wiring safely.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CLEANING -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="cleaning">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_6.jpg" alt="Deep Cleaning">
                                </a>
                                <span class="box-date">Cleaning</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Deep Home Cleaning</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Full interior cleaning including kitchens, bathrooms, and all living areas.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PAINTING -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="painting">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="service-details.html" class="blog-img">
                                    <img src="assets/img/blog/blog_1_7.jpg" alt="Interior Painting">
                                </a>
                                <span class="box-date">Painting</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="service-details.html">Interior Painting</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Professional wall painting with premium paints and clean finishing.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- No Results -->
                    <div class="no-results" id="noResults">
                        <span style="font-size:48px; opacity:0.3; display:block; margin-bottom:12px;">🔍</span>
                        No services found in this category.
                    </div>

                </div>
            </div>
            <!-- /.services-grid-wrap -->

        </div>
        <!-- /.services-layout -->
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<script>
    (function() {
        const nav = document.getElementById('servicesNav');
        const cards = document.querySelectorAll('#servicesGrid .service-card-wrap');
        const noRes = document.getElementById('noResults');

        nav.addEventListener('click', function(e) {
            const btn = e.target.closest('.nav-tab');
            if (!btn) return;

            nav.querySelectorAll('.nav-tab').forEach(t => t.classList.remove('active'));
            btn.classList.add('active');

            const cat = btn.dataset.cat;
            let visible = 0;

            cards.forEach(function(card) {
                const show = (cat === 'all' || card.dataset.cat === cat);
                card.classList.toggle('hidden', !show);
                if (show) visible++;
            });

            noRes.style.display = visible === 0 ? 'block' : 'none';
        });
    })();
</script>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>

