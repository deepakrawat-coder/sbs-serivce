<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-top.php') ?>
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
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Header-bottom.php') ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Menu.php') ?>

<div class="breadcumb-wrapper background-image">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blog Details</h1>
            <ul class="breadcumb-menu">
                <li><a href="/">Home</a></li>
                <li><a href="javascript:void(0)">Blog</a></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</div>

<section class="space-top space-extra-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-lg-7">
                <div class="page-single mb-30">
                    <div class="page-img"><img src="../assets/img/service/service_details.jpg" alt="Blog Image"></div>
                    <div class="page-content">
                        <div class="blog-details-meta">
                            <span><i class="fas fa-user"></i> By <a href="javascript:void(0)">SRG Team</a></span>
                            <span><i class="fas fa-calendar"></i> 15 January, 2025</span>
                            <span><i class="fas fa-tag"></i> <a href="javascript:void(0)">Plumbing</a></span>
                            <span><i class="fas fa-comment"></i> 3 Comments</span>
                        </div>
                        <h2 class="h3 sec-title page-title">5 Signs You Need to Call a Plumber Immediately</h2>
                        <p>Plumbing issues can quickly escalate from minor annoyances to major disasters. Knowing when to call a professional can save you thousands in water damage repair costs. Here are five critical signs that you need to call a plumber right away.</p>
                        
                        <h4 class="mt-4 mb-3">1. Low Water Pressure Throughout Your Home</h4>
                        <p>If you notice weak water flow from multiple faucets simultaneously, it could indicate a hidden leak or pipe blockage. This often points to a serious issue like corroded pipes or a main line break that requires immediate professional attention.</p>
                        
                        <h4 class="mt-4 mb-3">2. Persistent Dripping Sounds</h4>
                        <p>Hearing water running when all faucets are off is a clear warning sign. A hidden leak behind walls or under floors can cause structural damage, mold growth, and significantly higher water bills.</p>
                        
                        <div class="blog-quote">
                            <i class="fas fa-quote-left" style="color: var(--theme-color); margin-right: 15px;"></i>
                            Don't ignore small leaks — a dripping faucet can waste over 3,000 gallons of water per year!
                        </div>
                        
                        <h4 class="mt-4 mb-3">3. Sewage Odor</h4>
                        <p>A foul smell resembling rotten eggs indicates a sewer line issue. This could be a cracked pipe, clogged vent, or dried-out P-trap. Sewage gases are hazardous to your health and require emergency plumbing services.</p>
                        
                        <h4 class="mt-4 mb-3">4. Water Stains on Walls or Ceilings</h4>
                        <p>Yellowish-brown discoloration, bubbling paint, or peeling wallpaper are signs of moisture behind surfaces. These indicate a leaking pipe that needs immediate repair to prevent structural damage and mold.</p>
                        
                        <h4 class="mt-4 mb-3">5. Sudden Increase in Water Bills</h4>
                        <p>If your water usage hasn't changed but your bill has spiked, you likely have an undetected leak. A professional plumber can locate and fix the issue before it costs you more money.</p>
                        
                        <div class="blog-tags">
                            <strong>Tags:</strong>
                            <a href="javascript:void(0)">Plumbing Tips</a>
                            <a href="javascript:void(0)">Home Maintenance</a>
                            <a href="javascript:void(0)">Emergency Plumbing</a>
                            <a href="javascript:void(0)">DIY vs Professional</a>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-lg-5">
                <aside class="sidebar-area">
                    
                  

                    <div class="widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">
                            <div class="recent-post">
                                <div class="media-img"><a href="javascript:void(0)"><img src="../assets/img/blog/recent-post-1-1.jpg" alt="Post"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="javascript:void(0)">Electrical Safety Tips Every Homeowner Should Know</a></h4>
                                    <div class="recent-post-meta"><i class="far fa-calendar"></i>12 Jan, 2025</div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img"><a href="javascript:void(0)"><img src="../assets/img/blog/recent-post-1-2.jpg" alt="Post"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="javascript:void(0)">How to Maintain Your AC for Better Efficiency</a></h4>
                                    <div class="recent-post-meta"><i class="far fa-calendar"></i>10 Jan, 2025</div>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="media-img"><a href="javascript:void(0)"><img src="../assets/img/blog/recent-post-1-3.jpg" alt="Post"></a></div>
                                <div class="media-body">
                                    <h4 class="post-title"><a class="text-inherit" href="javascript:void(0)">Benefits of Regular Home Maintenance</a></h4>
                                    <div class="recent-post-meta"><i class="far fa-calendar"></i>8 Jan, 2025</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget_banner background-image" style="background-image: url('../assets/img/bg/widget_banner.jpg');">
                        <div class="widget-banner">
                            <h3 class="box-title">Need Professional Help?</h3>
                            <div class="logo"><img src="../assets/img/logo.svg" alt="Logo"></div>
                            <p class="box-text">Call us anytime</p>
                            <h3 class="box-link"><a href="tel:+0123456789">+0 (123) 456 789</a></h3>
                            <a href="javascript:void(0)" class="th-btn style2">Get a Quote</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-top.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/pannels/Footer-bottom.php'); ?>