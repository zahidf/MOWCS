<?php
/*
Template Name: Services
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Osman Wahidi Construction Services</title>
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

        /* Services Section */
        .services-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        /* Service Category */
        .service-category {
            margin-bottom: 4rem;
        }

        .category-header {
            background: linear-gradient(135deg, var(--primary-orange), #ff7700);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(255,140,0,0.3);
        }

        .category-header h2 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .category-header p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        /* Service Cards Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .service-card-detailed {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
            position: relative;
        }

        .service-card-detailed:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .service-card-header {
            background-color: var(--dark-gray);
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .service-card-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: -50px;
            width: 100px;
            height: 100%;
            background-color: var(--primary-orange);
            transform: skewX(-20deg);
            opacity: 0.3;
        }

        .service-card-header h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .service-card-header i {
            font-size: 2.5rem;
            color: var(--primary-orange);
        }

        .service-card-body {
            padding: 2rem;
        }

        .service-description {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }

        .service-features {
            margin-bottom: 1.5rem;
        }

        .service-features h4 {
            color: var(--dark-gray);
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .service-features ul {
            list-style: none;
        }

        .service-features li {
            padding: 0.5rem 0;
            padding-left: 1.5rem;
            position: relative;
            color: #666;
        }

        .service-features li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--success-green);
            font-weight: bold;
        }

        .service-cta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .service-price {
            font-size: 0.9rem;
            color: #666;
        }

        .btn-service {
            background-color: var(--primary-orange);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 600;
        }

        .btn-service:hover {
            background-color: #ff7700;
            transform: translateX(5px);
        }

        /* Process Section */
        .process-section {
            background-color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 4rem;
        }

        .process-section h2 {
            text-align: center;
            font-size: 2.5rem;
            color: var(--dark-gray);
            margin-bottom: 3rem;
            position: relative;
        }

        .process-section h2::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-orange);
            margin: 1rem auto;
        }

        .process-steps {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            position: relative;
        }

        .process-step {
            text-align: center;
            padding: 2rem;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary-orange);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 1.5rem;
            position: relative;
            z-index: 1;
        }

        .process-step h3 {
            color: var(--dark-gray);
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .process-step p {
            color: #666;
            line-height: 1.6;
        }

        /* Why Choose Section */
        .why-choose {
            background: linear-gradient(135deg, var(--dark-gray), var(--light-gray));
            color: white;
            padding: 4rem 2rem;
            border-radius: 15px;
            margin-bottom: 4rem;
            text-align: center;
        }

        .why-choose h2 {
            font-size: 2.5rem;
            margin-bottom: 3rem;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .benefit-item {
            padding: 1.5rem;
        }

        .benefit-item i {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 1rem;
        }

        .benefit-item h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .benefit-item p {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        /* CTA Section */
        .cta-section {
            background-color: var(--primary-orange);
            color: white;
            padding: 60px 20px;
            text-align: center;
            border-radius: 15px;
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

        .btn-white {
            background-color: white;
            color: var(--primary-orange);
        }

        .btn-white:hover {
            background-color: #f5f5f5;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Footer */
        .footer {
            background-color: #2a2a2a;
            color: var(--text-light);
            text-align: center;
            padding: 2rem 20px;
            margin-top: 4rem;
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

            .services-grid {
                grid-template-columns: 1fr;
            }

            .category-header h2 {
                font-size: 2rem;
            }

            .service-card-header h3 {
                font-size: 1.5rem;
            }

            .process-steps {
                grid-template-columns: 1fr;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
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
                <li><a href="#" class="active">Services</a></li>
                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                <li><a href="<?php echo home_url(); ?>/contact">Contact</a></li>
            </ul>
            <i class="fas fa-bars mobile-menu-toggle"></i>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Professional Construction Services</h1>
        <p>Quality Workmanship for Every Project</p>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        
        <!-- Construction Services Category -->
        <div class="service-category">
            <div class="category-header">
                <h2>Construction & Extensions</h2>
                <p>Transforming spaces with structural expertise</p>
            </div>
            <div class="services-grid">
                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-home"></i> Dormer Construction</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Expert dormer installations to maximise your living space and bring natural light into your home. Each dormer is carefully designed to complement your property's architecture.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Structural assessment and planning</li>
                                <li>Building regulation compliance</li>
                                <li>Weatherproofing and insulation</li>
                                <li>Interior and exterior finishing</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Free Consultation</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-expand-arrows-alt"></i> Extensions</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Seamlessly expand your living space with professionally designed and built extensions. From single-story rear extensions to complex multi-level additions.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Design and planning assistance</li>
                                <li>Foundation and structural work</li>
                                <li>Matching existing architecture</li>
                                <li>Complete interior fit-out</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Competitive Pricing</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-arrow-up"></i> Loft Conversions</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Transform unused loft space into beautiful, functional rooms. Whether you need an extra bedroom, home office, or play area, we create spaces that add value to your home.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Structural reinforcement</li>
                                <li>Staircase installation</li>
                                <li>Velux windows and dormers</li>
                                <li>Electrical and plumbing work</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Full Project Management</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-sun"></i> Conservatory</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Create a stunning connection between your home and garden with a beautifully crafted conservatory. Perfect for year-round enjoyment of your outdoor space.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Base and foundation work</li>
                                <li>Frame installation</li>
                                <li>Glass and roofing systems</li>
                                <li>Heating and ventilation</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Bespoke Designs</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-door-open"></i> Porch Construction</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Enhance your home's entrance with a well-designed porch. Providing both practical benefits and improved curb appeal for your property.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Design consultation</li>
                                <li>Foundation and brickwork</li>
                                <li>Roofing to match existing</li>
                                <li>Doors and glazing</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Quality Guaranteed</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tiling Services Category -->
        <div class="service-category">
            <div class="category-header">
                <h2>Professional Tiling Services</h2>
                <p>Precision tiling for every surface</p>
            </div>
            <div class="services-grid">
                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-th"></i> Interior Tiling</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Transform your living spaces with expertly installed floor and wall tiles. From kitchens to living rooms, we ensure perfect alignment and lasting quality.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Surface preparation</li>
                                <li>Precision tile cutting</li>
                                <li>Professional grouting</li>
                                <li>Sealing and finishing</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Per Square Meter</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-bath"></i> Bathroom Tiling</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Luxury bathroom tiling with waterproof solutions. Specialising in marble, porcelain, and ceramic tiles to create your perfect bathroom sanctuary.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Waterproof tanking</li>
                                <li>Floor and wall tiling</li>
                                <li>Shower enclosure tiling</li>
                                <li>Anti-slip treatments</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Complete Packages</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-tree"></i> Garden Tiling</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Weather-resistant outdoor tiling solutions for patios, pathways, and garden areas. Using premium porcelain tiles designed for exterior use.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Ground preparation</li>
                                <li>Drainage solutions</li>
                                <li>Non-slip tile options</li>
                                <li>Weather-sealed grouting</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Durable Solutions</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- External Services Category -->
        <div class="service-category">
            <div class="category-header">
                <h2>External & Specialty Services</h2>
                <p>Complete solutions for your property</p>
            </div>
            <div class="services-grid">
                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-road"></i> Driveways</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Professional driveway installation including block paving, resin bound, and traditional options. Enhancing your property's entrance with durable, attractive surfaces.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Excavation and base preparation</li>
                                <li>Drainage installation</li>
                                <li>Choice of materials</li>
                                <li>Edging and finishing</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-seedling"></i> Gardening & Landscaping</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Complete garden transformation services from design to implementation. Creating beautiful outdoor spaces that complement your lifestyle.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Garden design and planning</li>
                                <li>Lawn and planting</li>
                                <li>Fencing and decking</li>
                                <li>Water features</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Tailored Solutions</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-paint-roller"></i> Plastering</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Professional plastering services for walls and ceilings. From skim coating to decorative plasterwork, achieving smooth, perfect finishes every time.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Wall preparation</li>
                                <li>Skim coating</li>
                                <li>Decorative cornices</li>
                                <li>Repair and restoration</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Expert Finish</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-paint-brush"></i> Painting & Decorating</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Complete interior and exterior painting services. Using premium paints and techniques to protect and beautify your property.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Surface preparation</li>
                                <li>Interior painting</li>
                                <li>Exterior weatherproofing</li>
                                <li>Wallpaper installation</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Quality Paints Only</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="service-card-detailed">
                    <div class="service-card-header">
                        <h3><i class="fas fa-hammer"></i> Carpentry</h3>
                    </div>
                    <div class="service-card-body">
                        <p class="service-description">
                            Custom carpentry solutions from built-in storage to complete roof structures. Quality craftsmanship for all your woodworking needs.
                        </p>
                        <div class="service-features">
                            <h4>Service Includes:</h4>
                            <ul>
                                <li>Roof carpentry</li>
                                <li>Built-in furniture</li>
                                <li>Door and window fitting</li>
                                <li>Decking and outdoor structures</li>
                            </ul>
                        </div>
                        <div class="service-cta">
                            <span class="service-price">Custom Solutions</span>
                            <a href="<?php echo home_url(); ?>#contact" class="btn-service">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Section -->
        <div class="process-section">
            <h2>How We Work</h2>
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <h3>Initial Consultation</h3>
                    <p>We discuss your project requirements and provide expert advice on the best solutions.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">2</div>
                    <h3>Detailed Quote</h3>
                    <p>Receive a comprehensive, transparent quote with no hidden costs or surprises.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">3</div>
                    <h3>Project Planning</h3>
                    <p>We plan every detail, from materials to timeline, ensuring smooth execution.</p>
                </div>
                <div class="process-step">
                    <div class="step-number">4</div>
                    <h3>Quality Delivery</h3>
                    <p>Professional execution with regular updates and a final walkthrough upon completion.</p>
                </div>
            </div>
        </div>

        <!-- Why Choose Section -->
        <div class="why-choose">
            <h2>Why Choose Osman Wahidi Construction?</h2>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <i class="fas fa-certificate"></i>
                    <h3>Experienced Professional</h3>
                    <p>Many years of expertise across all construction services</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-pound-sign"></i>
                    <h3>Fair Pricing</h3>
                    <p>Competitive rates with transparent, detailed quotations</p>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-thumbs-up"></i>
                    <h3>Quality Guarantee</h3>
                    <p>Reputation of exceeding expectations consistently</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-section">
            <h2>Ready to Start Your Project?</h2>
            <p>Get in touch today for a free consultation and quote</p>
            <a href="<?php echo home_url(); ?>#contact" class="btn btn-white">
                <i class="fas fa-phone"></i> Contact Now
            </a>
        </div>
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

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Animate elements on scroll
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

        // Observe service cards
        document.querySelectorAll('.service-card-detailed').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            observer.observe(card);
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>