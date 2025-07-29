<?php
/*
Template Name: About
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Osman Wahidi Construction Services</title>
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

        /* Navigation - Same as other pages */
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

        /* About Section */
        .about-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        .about-intro {
            background-color: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
            text-align: center;
        }

        .about-intro h2 {
            font-size: 2.5rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
        }

        .about-intro h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-orange);
            margin: 1rem auto;
        }

        .about-intro p {
            font-size: 1.2rem;
            line-height: 1.8;
            color: #555;
            max-width: 800px;
            margin: 0 auto 1.5rem;
        }

        /* About Content Grid */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .about-text {
            background-color: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .about-text h3 {
            font-size: 2rem;
            color: var(--dark-gray);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .about-text h3 i {
            color: var(--primary-orange);
        }

        .about-text p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .about-image {
            position: relative;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
        }

        .profile-image-container {
            position: relative;
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
        }

        .profile-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .profile-frame {
            position: absolute;
            top: -15px;
            left: -15px;
            right: -15px;
            bottom: -15px;
            border: 3px solid var(--primary-orange);
            border-radius: 10px;
            z-index: -1;
        }

        /* Values Section */
        .values-section {
            background-color: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 4rem;
        }

        .values-section h3 {
            font-size: 2.5rem;
            color: var(--dark-gray);
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .values-section h3::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-orange);
            margin: 1rem auto;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .value-card {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            transition: all 0.3s;
            background-color: #f8f8f8;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            background-color: white;
        }

        .value-icon {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 1rem;
        }

        .value-card h4 {
            font-size: 1.3rem;
            color: var(--dark-gray);
            margin-bottom: 1rem;
        }

        .value-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--dark-gray), var(--light-gray));
            color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
            margin-bottom: 4rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary-orange);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
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

        /* Footer */
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

            .about-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-intro h2 {
                font-size: 2rem;
            }

            .about-intro p {
                font-size: 1.1rem;
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
                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                <li><a href="#" class="active">About</a></li>
                <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
            </ul>
            <i class="fas fa-bars mobile-menu-toggle"></i>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <h1>About Osman Wahidi</h1>
        <p>Dedicated to Quality Construction & Customer Satisfaction</p>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <!-- Introduction -->
        <div class="about-intro">
            <h2>Mohammad Osman Wahidi</h2>
            <p>With many years of hands-on experience in the construction industry, I bring passion and dedication to every project. My commitment to quality craftsmanship and attention to detail has earned the trust of countless homeowners throughout the region.</p>
            <p>I believe that every construction project is an opportunity to transform spaces and improve lives. Whether it's a simple tiling job or a complete property renovation, I approach each task with the same level of professionalism and care.</p>
        </div>

        <!-- About Content -->
        <div class="about-content">
            <div class="about-text">
                <h3><i class="fas fa-user-tie"></i> Professional Journey</h3>
                <p>My journey in construction began many years ago, driven by a genuine passion for transforming spaces and creating beautiful, functional environments. Over the years, I have honed my skills across various aspects of construction, from intricate tiling work to complete property renovations.</p>
                <p>What started as a fascination with building and design has evolved into a comprehensive construction service that covers everything from driveways and roofing to bathroom renovations and garden landscaping. Each project has added to my expertise and reinforced my commitment to excellence.</p>
                <p>I take pride in staying updated with the latest construction techniques and materials, ensuring that my clients receive modern solutions that stand the test of time.</p>
            </div>
            <div class="about-image">
                <div class="profile-image-container">
                    <div class="profile-frame"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pic2.jpg" alt="Mohammad Osman Wahidi" class="profile-image">
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="values-section">
            <h3>Core Values</h3>
            <div class="values-grid">
                <div class="value-card">
                    <i class="fas fa-award value-icon"></i>
                    <h4>Quality First</h4>
                    <p>Every project is completed to the highest standards, using premium materials and proven techniques.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-handshake value-icon"></i>
                    <h4>Trust & Reliability</h4>
                    <p>Building trust through transparent communication, fair pricing, and delivering on promises.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-clock value-icon"></i>
                    <h4>Timely Delivery</h4>
                    <p>Respecting your time with efficient project management and on-schedule completion.</p>
                </div>
                <div class="value-card">
                    <i class="fas fa-heart value-icon"></i>
                    <h4>Passion for Craft</h4>
                    <p>Bringing enthusiasm and dedication to transform your vision into reality.</p>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">Years of Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Client Satisfaction</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">11+</div>
                    <div class="stat-label">Services Offered</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h2>Let's Build Something Amazing Together</h2>
        <p>Ready to transform your space? Get in touch for a free consultation</p>
        <a href="<?php echo home_url(); ?>#contact" class="btn btn-primary">
            <i class="fas fa-phone"></i> Get Free Quote
        </a>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/447727307150"><i class="fab fa-whatsapp"></i></a>
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

        // Animate stats on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const target = parseInt(stat.textContent);
                        let current = 0;
                        const increment = target / 50;
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                                if (stat.textContent.includes('+')) {
                                    stat.textContent = target + '+';
                                } else if (stat.textContent.includes('%')) {
                                    stat.textContent = target + '%';
                                } else {
                                    stat.textContent = target;
                                }
                            } else {
                                stat.textContent = Math.floor(current);
                            }
                        }, 30);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>

    <?php wp_footer(); ?>
</body>
</html>