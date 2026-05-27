<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
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
</style>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Services</h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</div>

<section class="pb-5 my-5">
    <div class="container-fluid px-0 px-md-3 px-lg-5">
        <div class="services-layout">

            <div class="services-nav" id="servicesNav">
                <button class="nav-tab active" data-cat="all">
                   All Services
                    <span class="tab-count" id="count-all">8</span>
                </button>
                <button class="nav-tab" data-cat="plumbing">
                   Plumbing
                    <span class="tab-count" id="count-plumbing">3</span>
                </button>
                <button class="nav-tab" data-cat="electrical">
                    Electrical
                    <span class="tab-count" id="count-electrical">3</span>
                </button>
                <button class="nav-tab" data-cat="hvac">
                    AC & HVAC
                    <span class="tab-count" id="count-hvac">2</span>
                </button>
            </div>

            <div class="services-grid-wrap">
                <div class="row g-4" id="servicesGrid">

                    <!-- Plumbing Services -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="plumbing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_1.jpg" alt="Plumbing Repair">
                                </a>
                                <span class="box-date">Plumbing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Plumbing Repairs</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Expert repair for leaks, burst pipes, faucets, and all plumbing emergencies.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="plumbing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_2.jpg" alt="Drain Cleaning">
                                </a>
                                <span class="box-date">Plumbing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Drain Cleaning</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Professional drain unclogging and cleaning for kitchen, bathroom, and sewer lines.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="plumbing">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_3.jpg" alt="Water Heater">
                                </a>
                                <span class="box-date">Plumbing</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Water Heater Fix</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Repair and maintenance for all types of water heaters and geysers.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Electrical Services -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="electrical">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_4.jpg" alt="Electrical Wiring">
                                </a>
                                <span class="box-date">Electrical</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Electrical Wiring</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Complete home and commercial wiring, rewiring, and circuit installation.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="electrical">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_5.jpg" alt="Fan Installation">
                                </a>
                                <span class="box-date">Electrical</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Ceiling Fan Install</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Professional installation of ceiling fans, lights, and exhaust fans.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="electrical">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_6.jpg" alt="Emergency Electrician">
                                </a>
                                <span class="box-date">Electrical</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">Emergency Repair</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">24/7 emergency electrical services for power outages and faults.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HVAC Services -->
                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="hvac">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_7.jpg" alt="AC Repair">
                                </a>
                                <span class="box-date">AC & HVAC</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">AC Repair & Service</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Complete AC repair, gas refill, and annual maintenance service.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 service-card-wrap" data-cat="hvac">
                        <div class="border border-1" style="border-radius: 10px;">
                            <div class="blog-card">
                                <a href="/serivce-details" class="blog-img">
                                    <img src="assets/img/blog/blog_1_8.jpg" alt="HVAC Service">
                                </a>
                                <span class="box-date">AC & HVAC</span>
                                <div class="blog-content">
                                    <h3 class="box-title mb-0">
                                        <a href="/serivce-details">HVAC Maintenance</a>
                                    </h3>
                                    <p class="box-desc mb-0 pb-0">Heating and cooling system inspection, cleaning, and repair.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="no-results" id="noResults">
                        <span style="font-size:48px; opacity:0.3;">🔧</span>
                        <p>No services found in this category.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

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

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>
