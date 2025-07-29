<?php
/*
Template Name: Contact
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Osman Wahidi Construction Services</title>
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

        /* Contact Section */
        .contact-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 80px;
        }

        /* Contact Cards */
        .contact-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .contact-card {
            background-color: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-orange), #ff7700);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .contact-icon {
            font-size: 3rem;
            color: var(--primary-orange);
            margin-bottom: 1.5rem;
        }

        .contact-card h3 {
            font-size: 1.5rem;
            color: var(--dark-gray);
            margin-bottom: 1rem;
        }

        .contact-card p {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .contact-card a {
            color: var(--primary-orange);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .contact-card a:hover {
            color: #ff7700;
            text-decoration: underline;
        }

        /* Main Contact Content */
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            margin-bottom: 4rem;
        }

        /* Contact Form */
        .contact-form-section {
            background-color: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-form-section h2 {
            font-size: 2rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .contact-form-section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-orange);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-gray);
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 3px rgba(255,140,0,0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn-submit {
            background-color: var(--primary-orange);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            background-color: #ff7700;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,140,0,0.3);
        }

        /* Contact Info Section */
        .contact-info-section {
            background-color: var(--dark-gray);
            color: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .contact-info-section h2 {
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }

        .contact-info-section h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-orange);
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 2rem;
            gap: 1rem;
        }

        .info-item i {
            font-size: 1.5rem;
            color: var(--primary-orange);
            width: 30px;
            margin-top: 0.2rem;
        }

        .info-content h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .info-content p {
            opacity: 0.9;
            line-height: 1.6;
        }

        .info-content a {
            color: var(--primary-orange);
            text-decoration: none;
            transition: color 0.3s;
        }

        .info-content a:hover {
            color: #ff7700;
            text-decoration: underline;
        }

        /* Business Hours */
        .business-hours {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .business-hours h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--primary-orange);
        }

        .hours-list {
            list-style: none;
        }

        .hours-list li {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Map Section */
        .map-section {
            background-color: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 4rem;
        }

        .map-section h2 {
            font-size: 2rem;
            color: var(--dark-gray);
            margin-bottom: 2rem;
            text-align: center;
        }

        .map-container {
            width: 100%;
            height: 400px;
            background-color: #e0e0e0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
        }

        /* Quick Contact Buttons */
        .quick-contact {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 4rem;
        }

        .quick-btn {
            background-color: white;
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .quick-btn:hover {
            background-color: var(--primary-orange);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(255,140,0,0.3);
        }

        .quick-btn i {
            font-size: 1.5rem;
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

        /* Success Message */
        .success-message {
            background-color: var(--success-green);
            color: white;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
            display: none;
        }

        .success-message.show {
            display: block;
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

            .contact-content {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .contact-cards {
                grid-template-columns: 1fr;
            }

            .quick-contact {
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
                <li><a href="<?php echo home_url('/services'); ?>">Services</a></li>
                <li><a href="<?php echo home_url('/portfolio'); ?>">Portfolio</a></li>
                <li><a href="<?php echo home_url('/about'); ?>">About</a></li>
                <li><a href="#" class="active">Contact</a></li>
            </ul>
            <i class="fas fa-bars mobile-menu-toggle"></i>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Get In Touch</h1>
        <p>Let's discuss your construction project today</p>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        
        <!-- Contact Cards -->
        <div class="contact-cards">
            <div class="contact-card">
                <i class="fas fa-phone contact-icon"></i>
                <h3>Call Directly</h3>
                <p>Speak with Osman for immediate assistance</p>
                <a href="tel:+447727307150">+44 7727 307150</a>
            </div>
            <div class="contact-card">
                <i class="fab fa-whatsapp contact-icon"></i>
                <h3>WhatsApp</h3>
                <p>Send a message for quick response</p>
                <a href="https://wa.me/447727307150">+44 7727 307150</a>
            </div>
            <div class="contact-card">
                <i class="fas fa-envelope contact-icon"></i>
                <h3>Email</h3>
                <p>Send detailed project inquiries</p>
                <a href="mailto:osman.wahidi88@gmail.com">osman.wahidi88@gmail.com</a>
            </div>
        </div>

        <!-- Quick Contact Buttons -->
        <div class="quick-contact">
            <a href="tel:+447727307150" class="quick-btn">
                <i class="fas fa-phone"></i>
                Call Now
            </a>
            <a href="https://wa.me/447727307150" class="quick-btn">
                <i class="fab fa-whatsapp"></i>
                WhatsApp Message
            </a>
            <a href="mailto:osman.wahidi88@gmail.com" class="quick-btn">
                <i class="fas fa-envelope"></i>
                Send Email
            </a>
        </div>

        <!-- Main Contact Content -->
        <div class="contact-content">
            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2>Request a Free Quote</h2>
                <div class="success-message" id="successMessage">
                    Thank you for your message! Osman will contact you soon.
                </div>
                <form id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="+44">
                    </div>
                    <div class="form-group">
                        <label for="service">Service Required</label>
                        <select id="service" name="service">
                            <option value="">Select a service</option>
                            <option value="dormer">Dormer Construction</option>
                            <option value="extension">Extensions</option>
                            <option value="loft">Loft Conversions</option>
                            <option value="conservatory">Conservatory</option>
                            <option value="porch">Porch Construction</option>
                            <option value="tiling">Tiling Services</option>
                            <option value="driveway">Driveways</option>
                            <option value="landscaping">Garden & Landscaping</option>
                            <option value="plastering">Plastering</option>
                            <option value="painting">Painting & Decorating</option>
                            <option value="carpentry">Carpentry</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Project Details *</label>
                        <textarea id="message" name="message" required placeholder="Please describe your project requirements..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-info-section">
                <h2>Contact Information</h2>
                
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <div class="info-content">
                        <h3>Phone</h3>
                        <p><a href="tel:+447727307150">+44 7727 307150</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fab fa-whatsapp"></i>
                    <div class="info-content">
                        <h3>WhatsApp</h3>
                        <p><a href="https://wa.me/447727307150">+44 7727 307150</a></p>
                        <p>Quick responses to messages</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <div class="info-content">
                        <h3>Email</h3>
                        <p><a href="mailto:osman.wahidi88@gmail.com">osman.wahidi88@gmail.com</a></p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="info-content">
                        <h3>Service Area</h3>
                        <p>Serving customers within the Birmingham Area</p>
                    </div>
                </div>

                <div class="business-hours">
                    <h3>Business Hours</h3>
                    <ul class="hours-list">
                        <li>
                            <span>Monday - Friday</span>
                            <span>8:00 AM - 6:00 PM</span>
                        </li>
                        <li>
                            <span>Saturday</span>
                            <span>9:00 AM - 4:00 PM</span>
                        </li>
                        <li>
                            <span>Sunday</span>
                            <span>Closed</span>
                        </li>
                    </ul>
                    <p style="margin-top: 1rem; font-size: 0.9rem; opacity: 0.8;">
                        * Emergency services available outside regular hours
                    </p>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="map-section">
            <h2>Service Coverage Area</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155455.2800158233!2d-2.028783009524563!3d52.4974432232081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870942d1b417173%3A0xca81fef0aeee7998!2sBirmingham!5e0!3m2!1sen!2suk!4v1753788056192!5m2!1sen!2suk" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="100%"></iframe>
                
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

        // Contact form submission
        const contactForm = document.getElementById('contactForm');
        const successMessage = document.getElementById('successMessage');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(contactForm);
            const data = Object.fromEntries(formData);
            
            // Here you would integrate with your email service (Brevo)
            console.log('Form data:', data);
            
            // Show success message
            successMessage.classList.add('show');
            
            // Reset form
            contactForm.reset();
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.classList.remove('show');
            }, 5000);
            
            // Scroll to top of form
            contactForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });

        // Phone number formatting
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', (e) => {
            // Basic UK phone number formatting
            let value = e.target.value.replace(/\s/g, '');
            if (value.startsWith('44')) {
                value = '+' + value;
            } else if (value.startsWith('0')) {
                value = '+44' + value.substring(1);
            }
            e.target.value = value;
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

        // Observe contact cards
        document.querySelectorAll('.contact-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s, transform 0.5s';
            observer.observe(card);
        });
    </script>

    <?php wp_footer(); ?>
</body>
</html>