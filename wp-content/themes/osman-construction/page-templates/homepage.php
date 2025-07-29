<?php
/*
Template Name: Homepage
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osman Wahidi Construction Services - Professional Building Solutions</title>
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
        }

        /* Navigation */
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

        .logo-icon {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            position: relative;
        }

        .house-icon {
            font-size: 30px;
            color: var(--text-light);
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

        .nav-menu a:hover {
            color: var(--primary-orange);
        }

        .mobile-menu-toggle {
            display: none;
            color: var(--text-light);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23444" width="1200" height="600"/><path fill="%23555" d="M0 300L50 325L100 300L150 275L200 300L250 325L300 300L350 275L400 300L450 325L500 300L550 275L600 300L650 325L700 300L750 275L800 300L850 325L900 300L950 275L1000 300L1050 325L1100 300L1150 275L1200 300V600H0V300Z"/></svg>');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--text-light);
            
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .hero-logo {
            width: 100px;
            height: 100px;
            margin-bottom: 2rem;
            object-fit: contain;
            filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.5));
        }

        .hero-business-card {
            width: 300px;
            height: auto;
            margin-bottom: 2rem;
            object-fit: contain;
            filter: drop-shadow(2px 2px 4px rgba(0,0,0,0.5));
            transform: rotate(-5deg);
            transition: transform 0.3s ease;
        }

        .hero-business-card:hover {
            transform: rotate(-3deg) scale(1.05);
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
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

        .btn-secondary {
            background-color: transparent;
            color: var(--text-light);
            border: 2px solid var(--text-light);
        }

        .btn-secondary:hover {
            background-color: var(--text-light);
            color: var(--text-dark);
        }

        /* Services Section */
        .services {
            padding: 80px 20px;
            background-color: #f8f8f8;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 3rem;
            color: var(--dark-gray);
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: var(--primary-orange);
            margin: 1rem auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 1rem;
        }

        .service-card h3 {
            margin-bottom: 1rem;
            color: var(--dark-gray);
        }

        .service-check {
            color: var(--success-green);
            margin-right: 0.5rem;
        }

        /* Portfolio Preview */
        .portfolio-preview {
            padding: 80px 20px;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .portfolio-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            cursor: pointer;
            height: 250px;
            background-color: #ddd;
        }

        .portfolio-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .portfolio-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            display: flex;
            align-items: flex-end;
            padding: 1.5rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .portfolio-item:hover .portfolio-overlay {
            opacity: 1;
        }

        .portfolio-item:hover img {
            transform: scale(1.1);
        }

        .portfolio-info h3 {
            color: white;
            margin-bottom: 0.5rem;
        }

        .portfolio-info p {
            color: #ddd;
            font-size: 0.9rem;
        }

        /* Contact Section */
        .contact {
            background-color: var(--dark-gray);
            color: var(--text-light);
            padding: 80px 20px;
        }

        .contact-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            align-items: start;
        }

        .contact-info h3 {
            color: var(--primary-orange);
            margin-bottom: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            gap: 1rem;
        }

        .contact-item i {
            color: var(--primary-orange);
            font-size: 1.2rem;
            width: 25px;
        }

        .contact-item a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s;
        }

        .contact-item a:hover {
            color: var(--primary-orange);
        }

        .contact-form {
            background-color: var(--light-gray);
            padding: 2rem;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--primary-orange);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: rgba(255,255,255,0.1);
            color: var(--text-light);
            transition: background-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            background-color: rgba(255,255,255,0.2);
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #aaa;
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

        /* Responsive Design */
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

            .hero-content h1 {
                font-size: 2rem;
                padding:4px;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-business-card {
                width: 250px;
            }

            .cta-buttons {
                flex-direction: column;
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>    
    
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Osman Wahidi Construction Services" class="logo-img">
                <div class="logo-text">
                    <span class="logo-name">OSMAN WAHIDI</span>
                    <span class="logo-tagline">CONSTRUCTION SERVICES</span>
                </div>
            </a>
            <ul class="nav-menu">
                <li><a href="#home">Home</a></li>
                <li><a href="<?php echo home_url('/services'); ?>">Services</a></li>
                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
            </ul>
            <i class="fas fa-bars mobile-menu-toggle"></i>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <img src="<?php echo get_template_directory_uri(); ?>/images/businessCard.png" alt="Osman Wahidi Construction Services Business Card" class="hero-business-card">
            <h1>Quality Construction You Can Trust</h1>
            <p>Professional Building Solutions for Your Dream Projects</p>
            <div class="cta-buttons">
                <a href="#contact" class="btn btn-primary">
                    <i class="fas fa-phone"></i> Get Free Quote
                </a>
                <a href="<?php echo home_url('/portfolio'); ?>" class="btn btn-secondary">
                    <i class="fas fa-images"></i> View Portfolio
                </a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 class="section-title">Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-home service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Dormer</h3>
                    <p>Expert dormer installations to add space and light to your home</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-door-open service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Porch</h3>
                    <p>Beautiful porch designs and construction for enhanced curb appeal</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-arrow-up service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Loft Conversions</h3>
                    <p>Transform your loft into functional living space</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-road service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Driveways</h3>
                    <p>Durable and attractive driveway installations</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-expand-arrows-alt service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Extensions</h3>
                    <p>Seamless home extensions to increase your living space</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-seedling service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Gardening</h3>
                    <p>Professional landscaping and garden design services</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-sun service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Conservatory</h3>
                    <p>Stunning conservatories to bring the outdoors in</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-th service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Tiling</h3>
                    <p>Precision tiling for floors, walls, and bathrooms</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-paint-roller service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Plastering</h3>
                    <p>Smooth, professional plastering and rendering</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-paint-brush service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Painting</h3>
                    <p>Interior and exterior painting with attention to detail</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-hammer service-icon"></i>
                    <h3><i class="fas fa-check service-check"></i>Carpentry</h3>
                    <p>Custom carpentry and woodwork solutions</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Preview -->
    <section class="portfolio-preview" id="portfolio">
        <div class="container">
            <h2 class="section-title">Recent Projects</h2>
            <div class="portfolio-grid">
                <div class="portfolio-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pic1.jpg" alt="Preview Pic 1">
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3>Modern Loft Conversion</h3>
                            <p>Complete transformation with skylights</p>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pic2.jpg" alt="Preview Pic 2">
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3>Kitchen Extension</h3>
                            <p>Open-plan kitchen and dining area</p>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/pic3.jpg" alt="Preview Pic 3">
                    <div class="portfolio-overlay">
                        <div class="portfolio-info">
                            <h3>Block Paving Driveway</h3>
                            <p>Durable and elegant entrance</p>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 2rem;">
                <a href="<?php echo home_url('/portfolio'); ?>" class="btn btn-primary">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 class="section-title" style="color: white;">Get In Touch</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <a href="tel:+447727307150">(+44) 772 730 7150</a>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-mobile-alt"></i>
                        <a href="tel:+447727307150">(+44) 772 730 7150</a>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:osman.wahidi88@gmail.com">osman.wahidi88@gmail.com</a>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <a href="https://wa.me/447727307150">WhatsApp</a>
                    </div>
                    <h3 style="margin-top: 2rem;">Business Hours</h3>
                    <p>Monday - Friday: 8:00 AM - 6:00 PM<br>
                    Saturday: 9:00 AM - 4:00 PM<br>
                    Sunday: Closed</p>
                </div>
                <div class="contact-form">
                    <h3 style="color: var(--primary-orange); margin-bottom: 1.5rem;">Request a Free Quote</h3>
                    <form id="contact-form">
                        <div class="form-success-message" id="homeSuccessMessage" style="display: none; background-color: #4CAF50; color: white; padding: 1rem; border-radius: 5px; margin-bottom: 1rem;">
                            Thank you for your message! Osman will contact you soon.
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" required placeholder="John">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName" required placeholder="Doe">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required placeholder="john@example.com">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" placeholder="+44 7727 307150">
                        </div>
                        <div class="form-group">
                            <label for="service">Service Required</label>
                            <input type="text" id="service" name="service" placeholder="e.g., Loft Conversion">
                        </div>
                        <div class="form-group">
                            <label for="message">Project Details</label>
                            <textarea id="message" name="message" rows="4" placeholder="Tell us about your project..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
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

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    navMenu.classList.remove('active');
                }
            });
        });

        // Contact form submission
        const contactForm = document.getElementById('contact-form');
        const homeSuccessMessage = document.getElementById('homeSuccessMessage');
        const submitBtn = contactForm.querySelector('button[type="submit"]');
        
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            // Disable submit button and show loading state
            submitBtn.disabled = true;
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            
            // Get form data
            const formData = new FormData(contactForm);
            
            // Add action and nonce
            formData.append('action', 'submit_contact_form');
            formData.append('contact_nonce', typeof osman_ajax !== 'undefined' ? osman_ajax.nonce : '');
            
            try {
                // Send AJAX request
                const response = await fetch(typeof osman_ajax !== 'undefined' ? osman_ajax.ajax_url : '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Show success message
                    homeSuccessMessage.textContent = result.data.message || 'Thank you for your message! Osman will contact you soon.';
                    homeSuccessMessage.style.display = 'block';
                    
                    // Reset form
                    contactForm.reset();
                    
                    // Hide success message after 5 seconds
                    setTimeout(() => {
                        homeSuccessMessage.style.display = 'none';
                    }, 5000);
                } else {
                    // Show error message
                    alert(result.data || 'Sorry, there was an error sending your message. Please try again.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Sorry, there was an error sending your message. Please try again or contact us directly.');
            } finally {
                // Re-enable submit button
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 100) {
                navbar.style.backgroundColor = 'rgba(58, 58, 58, 0.95)';
            } else {
                navbar.style.backgroundColor = 'var(--dark-gray)';
            }
        });
    </script>
    
    <?php wp_footer(); ?>
</body>
</html>