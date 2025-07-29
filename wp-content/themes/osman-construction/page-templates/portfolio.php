<?php
/*
Template Name: Portfolio
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Osman Wahidi Construction Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php wp_head(); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-orange: #ff8c00;
            --dark-gray: #3a3a3a;
            --light-gray: #4a4a4a;
            --text-light: #ffffff;
            --text-dark: #333333;
            --success-green: #4CAF50;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: #f5f5f5;
        }

        /* Navigation - Same as homepage */
        .navbar {
            background-color: var(--dark-gray);
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            color: var(--text-light);
            text-decoration: none;
        }

        .logo-img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
            object-fit: contain;
        }

        .logo-text {
            display: flex;
            flex-direction: column;
        }

        .logo-name {
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logo-tagline {
            font-size: 0.7rem;
            color: var(--primary-orange);
            letter-spacing: 2px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--primary-orange);
        }

        .mobile-menu-toggle {
            display: none;
            color: var(--text-light);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400"><rect fill="%23444" width="1200" height="400"/><path fill="%23555" d="M0 200L50 225L100 200L150 175L200 200L250 225L300 200L350 175L400 200L450 225L500 200L550 175L600 200L650 225L700 200L750 175L800 200L850 225L900 200L950 175L1000 200L1050 225L1100 200L1150 175L1200 200V400H0V200Z"/></svg>');
            background-size: cover;
            background-position: center;
            padding: 120px 20px 60px;
            text-align: center;
            color: var(--text-light);
            margin-bottom: 60px;
        }

        .page-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .page-header p {
            font-size: 1.2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        /* Portfolio Filter */
        .portfolio-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .filter-btn {
            padding: 10px 25px;
            background-color: white;
            border: 2px solid var(--dark-gray);
            color: var(--dark-gray);
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,140,0,0.3);
        }

        /* Portfolio Grid */
        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            background-color: white;
            transition: all 0.3s;
        }

        .portfolio-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .portfolio-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .portfolio-item:hover .portfolio-image {
            transform: scale(1.1);
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent 50%);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-info h3 {
            color: white;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .portfolio-info p {
            color: #ddd;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .portfolio-category {
            display: inline-block;
            background-color: var(--primary-orange);
            color: white;
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        /* Lightbox */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            z-index: 2000;
            cursor: pointer;
        }

        .lightbox.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            z-index: 2001;
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 30px;
            cursor: pointer;
            padding: 20px;
            background-color: rgba(0,0,0,0.5);
            transition: background-color 0.3s;
        }

        .lightbox-nav:hover {
            background-color: rgba(0,0,0,0.8);
        }

        .lightbox-prev {
            left: 20px;
        }

        .lightbox-next {
            right: 20px;
        }

        .lightbox-caption {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            text-align: center;
            background-color: rgba(0,0,0,0.7);
            padding: 10px 20px;
            border-radius: 5px;
        }

        /* CTA Section */
        .cta-section {
            background-color: var(--dark-gray);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: bold;
        }

        .btn-primary {
            background-color: var(--primary-orange);
            color: var(--text-light);
        }

        .btn-primary:hover {
            background-color: #ff7700;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,140,0,0.3);
        }

        /* Footer - Same as homepage */
        .footer {
            background-color: #2a2a2a;
            color: var(--text-light);
            text-align: center;
            padding: 2rem 20px;
        }

        .social-links {
            margin-bottom: 1rem;
        }

        .social-links a {
            color: var(--text-light);
            font-size: 1.5rem;
            margin: 0 10px;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--primary-orange);
        }

        /* WhatsApp Float Button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #25d366;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: all 0.3s;
            z-index: 999;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: var(--dark-gray);
                flex-direction: column;
                padding: 1rem;
            }

            .nav-menu.active {
                display: flex;
            }

            .mobile-menu-toggle {
                display: block;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .portfolio-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }

            .filter-buttons {
                justify-content: center;
            }

            .lightbox-nav {
                font-size: 20px;
                padding: 10px;
            }

            .lightbox-close {
                top: 10px;
                right: 20px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?php echo home_url(); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Osman Wahidi Construction Services" class="logo-img">
                <div class="logo-text">
                    <span class="logo-name">OSMAN WAHIDI</span>
                    <span class="logo-tagline">CONSTRUCTION SERVICES</span>
                </div>
            </a>
            <ul class="nav-menu">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url(); ?>/services">Services</a></li>
                <li><a href="#" class="active">Portfolio</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
            </ul>
            <i class="fas fa-bars mobile-menu-toggle"></i>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Portfolio</h1>
        <p>Showcasing Quality Craftsmanship & Professional Results</p>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="filter-btn active" data-filter="all">All Projects</button>
            <button class="filter-btn" data-filter="driveway">Driveways</button>
            <button class="filter-btn" data-filter="tiling">Interior Tiling</button>
            <button class="filter-btn" data-filter="bathroom-tiling">Bathroom Tiling</button>
            <button class="filter-btn" data-filter="garden-tiling">Garden Tiling</button>
            <button class="filter-btn" data-filter="roofing">Roofing</button>
            <button class="filter-btn" data-filter="garden-landscaping">Landscaping</button>
            <button class="filter-btn" data-filter="conservatory">Conservatory</button>
        </div>

        <!-- Portfolio Grid -->
        <div class="portfolio-grid">
            <?php
            // Array of projects with categories
            $projects = array(
                array('id' => 1, 'category' => 'driveway', 'title' => 'Block Paving Driveway', 'desc' => 'Professional block paving with elegant pattern design'),
                array('id' => 2, 'category' => 'driveway', 'title' => 'Decorative Block Paving', 'desc' => 'Durable driveway with premium finish'),
                array('id' => 3, 'category' => 'roofing', 'title' => 'Roof Frame Construction', 'desc' => 'Structural roof frame installation and reinforcement'),
                array('id' => 4, 'category' => 'garden-tiling', 'title' => 'Outdoor Porcelain Tiling', 'desc' => 'Weather-resistant luxury garden flooring'),
                array('id' => 5, 'category' => 'garden-tiling', 'title' => 'Garden Patio Tiling', 'desc' => 'Premium porcelain tiles for outdoor living'),
                array('id' => 6, 'category' => 'tiling', 'title' => 'Modern Living Room Floor', 'desc' => 'Contemporary tiling for spacious interiors'),
                array('id' => 7, 'category' => 'bathroom-tiling', 'title' => 'Luxury Marble Bathroom', 'desc' => 'High-end marble tile installation'),
                array('id' => 8, 'category' => 'bathroom-tiling', 'title' => 'Designer Bathroom Tiling', 'desc' => 'Precision tiling with waterproof finish'),
                array('id' => 9, 'category' => 'bathroom-tiling', 'title' => 'Master Bathroom Renovation', 'desc' => 'Complete marble tiling transformation'),
                array('id' => 10, 'category' => 'tiling', 'title' => 'Open-Plan Floor Tiling', 'desc' => 'Seamless tiling for modern living spaces'),
                array('id' => 11, 'category' => 'roofing', 'title' => 'Timber Roof Structure', 'desc' => 'Expert roof frame carpentry work'),
                array('id' => 12, 'category' => 'driveway', 'title' => 'Herringbone Pattern Drive', 'desc' => 'Intricate block paving design'),
                array('id' => 13, 'category' => 'tiling', 'title' => 'Interior Floor Renovation', 'desc' => 'Professional tiling with perfect alignment'),
                array('id' => 14, 'category' => 'conservatory', 'title' => 'Garden Conservatory', 'desc' => 'Seamless indoor-outdoor living space'),
                array('id' => 15, 'category' => 'roofing', 'title' => 'Traditional Roof Tiling', 'desc' => 'Quality roof tiles expertly installed'),
                array('id' => 16, 'category' => 'garden-tiling', 'title' => 'Patio Extension Tiling', 'desc' => 'Durable outdoor porcelain installation'),
                array('id' => 17, 'category' => 'garden-tiling', 'title' => 'Garden Terrace Tiling', 'desc' => 'Non-slip outdoor tile solution'),
                array('id' => 18, 'category' => 'bathroom-tiling', 'title' => 'Ensuite Bathroom Tiling', 'desc' => 'Elegant marble finish throughout'),
                array('id' => 19, 'category' => 'garden-landscaping', 'title' => 'Garden Base Preparation', 'desc' => 'Professional groundwork and landscaping'),
                array('id' => 20, 'category' => 'garden-tiling', 'title' => 'Outdoor Entertainment Area', 'desc' => 'Premium porcelain for garden spaces'),
            );

            foreach ($projects as $project) {
                $image_url = get_template_directory_uri() . '/images/pic' . $project['id'] . '.jpg';
                $category_display = str_replace('-', ' ', $project['category']);
            ?>
                <div class="portfolio-item" data-category="<?php echo $project['category']; ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $project['title']; ?>" class="portfolio-image" loading="lazy">
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3><?php echo $project['title']; ?></h3>
                            <p><?php echo $project['desc']; ?></p>
                            <span class="portfolio-category"><?php echo ucwords($category_display); ?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Ready to Start Your Project?</h2>
        <p>Let's discuss how we can transform your space</p>
        <a href="<?php echo home_url(); ?>#contact" class="btn btn-primary">
            <i class="fas fa-phone"></i> Get Free Quote
        </a>
    </section>

    <!-- Lightbox -->
    <div class="lightbox">
        <span class="lightbox-close">&times;</span>
        <div class="lightbox-content">
            <img src="" alt="" class="lightbox-image">
            <span class="lightbox-prev">&#10094;</span>
            <span class="lightbox-next">&#10095;</span>
            <div class="lightbox-caption"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/5555676873"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p>&copy; 2025 Osman Wahidi Construction Services. All rights reserved.</p>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/447727307150" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');

        mobileMenuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });

        // Portfolio Filter
        const filterButtons = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const filterValue = button.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        setTimeout(() => {
                            item.style.opacity = '1';
                            item.style.transform = 'scale(1)';
                        }, 100);
                    } else {
                        item.style.opacity = '0';
                        item.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            item.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Lightbox functionality
        const lightbox = document.querySelector('.lightbox');
        const lightboxImage = document.querySelector('.lightbox-image');
        const lightboxCaption = document.querySelector('.lightbox-caption');
        const lightboxClose = document.querySelector('.lightbox-close');
        const lightboxPrev = document.querySelector('.lightbox-prev');
        const lightboxNext = document.querySelector('.lightbox-next');
        let currentImageIndex = 0;
        let visibleImages = [];

        // Open lightbox
        portfolioItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                const img = item.querySelector('.portfolio-image');
                const info = item.querySelector('.portfolio-info');
                
                // Get currently visible images
                visibleImages = Array.from(portfolioItems).filter(item => 
                    window.getComputedStyle(item).display !== 'none'
                );
                
                currentImageIndex = visibleImages.indexOf(item);
                
                lightboxImage.src = img.src;
                lightboxCaption.innerHTML = `<h3>${info.querySelector('h3').textContent}</h3><p>${info.querySelector('p').textContent}</p>`;
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        // Close lightbox
        lightboxClose.addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Navigate lightbox
        lightboxPrev.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex - 1 + visibleImages.length) % visibleImages.length;
            updateLightboxImage();
        });

        lightboxNext.addEventListener('click', (e) => {
            e.stopPropagation();
            currentImageIndex = (currentImageIndex + 1) % visibleImages.length;
            updateLightboxImage();
        });

        function updateLightboxImage() {
            const item = visibleImages[currentImageIndex];
            const img = item.querySelector('.portfolio-image');
            const info = item.querySelector('.portfolio-info');
            
            lightboxImage.src = img.src;
            lightboxCaption.innerHTML = `<h3>${info.querySelector('h3').textContent}</h3><p>${info.querySelector('p').textContent}</p>`;
        }

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('active')) {
                if (e.key === 'Escape') closeLightbox();
                if (e.key === 'ArrowLeft') lightboxPrev.click();
                if (e.key === 'ArrowRight') lightboxNext.click();
            }
        });

        // Add smooth appearance on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Apply initial styles and observe
        portfolioItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.5s, transform 0.5s';
            observer.observe(item);
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>