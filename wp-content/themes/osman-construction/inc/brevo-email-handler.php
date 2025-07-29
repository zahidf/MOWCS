<?php
/**
 * Brevo Email Handler for Contact Form
 */

// Process contact form submission
function process_contact_form_submission() {
    // Verify nonce for security
    if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        wp_send_json_error('Security check failed');
        return;
    }

    // Sanitize form data
    $firstName = sanitize_text_field($_POST['firstName'] ?? '');
    $lastName = sanitize_text_field($_POST['lastName'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $phone = sanitize_text_field($_POST['phone'] ?? '');
    $service = sanitize_text_field($_POST['service'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill in all required fields');
        return;
    }

    // Validate email
    if (!is_email($email)) {
        wp_send_json_error('Please provide a valid email address');
        return;
    }

    // Prepare email content
    $to = 'osman.wahidi88@gmail.com'; // Force admin email
    $subject = 'New Contact Form Submission - ' . $firstName . ' ' . $lastName;
    
    // Get site domain for proper From address
    $site_url = parse_url(get_site_url());
    $domain = $site_url['host'];
    $from_email = 'noreply@' . $domain;
    
    // Create HTML email body
    $email_body = '<html><body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
    $email_body .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px;">';
    $email_body .= '<h2 style="color: #ff8c00; border-bottom: 2px solid #ff8c00; padding-bottom: 10px;">New Contact Form Submission</h2>';
    $email_body .= '<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">';
    $email_body .= '<tr><td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Name:</strong></td><td style="padding: 10px; border-bottom: 1px solid #eee;">' . esc_html($firstName . ' ' . $lastName) . '</td></tr>';
    $email_body .= '<tr><td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Email:</strong></td><td style="padding: 10px; border-bottom: 1px solid #eee;"><a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a></td></tr>';
    
    if (!empty($phone)) {
        $email_body .= '<tr><td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Phone:</strong></td><td style="padding: 10px; border-bottom: 1px solid #eee;"><a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a></td></tr>';
    }
    
    if (!empty($service)) {
        $email_body .= '<tr><td style="padding: 10px; border-bottom: 1px solid #eee;"><strong>Service Required:</strong></td><td style="padding: 10px; border-bottom: 1px solid #eee;">' . esc_html($service) . '</td></tr>';
    }
    
    $email_body .= '<tr><td style="padding: 10px; vertical-align: top;"><strong>Message:</strong></td><td style="padding: 10px;">' . nl2br(esc_html($message)) . '</td></tr>';
    $email_body .= '</table>';
    $email_body .= '<p style="margin-top: 30px; padding: 15px; background-color: #f0f0f0; border-left: 4px solid #ff8c00;">This message was sent from the contact form on your website.</p>';
    $email_body .= '<p style="margin-top: 20px;"><strong>Customer Contact Info:</strong><br>';
    $email_body .= 'Email: <a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a><br>';
    if (!empty($phone)) {
        $email_body .= 'Phone: <a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a>';
    }
    $email_body .= '</p>';
    $email_body .= '</div></body></html>';

    // Set headers for HTML email - Use domain email as From to avoid spam filters
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Osman Wahidi Construction <' . $from_email . '>',
        'Reply-To: ' . $firstName . ' ' . $lastName . ' <' . $email . '>'
    );

    // Send email using wp_mail (which Brevo plugin should intercept)
    $email_sent = wp_mail($to, $subject, $email_body, $headers);

    // Send confirmation email to the user
    if ($email_sent) {
        $user_subject = 'Thank you for contacting Osman Wahidi Construction Services';
        
        $user_body = '<html><body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">';
        $user_body .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px;">';
        $user_body .= '<h2 style="color: #ff8c00;">Thank you for your inquiry!</h2>';
        $user_body .= '<p>Dear ' . esc_html($firstName) . ',</p>';
        $user_body .= '<p>We have received your message and appreciate your interest in Osman Wahidi Construction Services. Our team will review your inquiry and get back to you as soon as possible.</p>';
        $user_body .= '<div style="background-color: #f0f0f0; padding: 20px; border-radius: 5px; margin: 20px 0;">';
        $user_body .= '<h3 style="color: #333; margin-top: 0;">Your Message Details:</h3>';
        
        if (!empty($service)) {
            $user_body .= '<p><strong>Service Required:</strong> ' . esc_html($service) . '</p>';
        }
        
        $user_body .= '<p><strong>Message:</strong><br>' . nl2br(esc_html($message)) . '</p>';
        $user_body .= '</div>';
        $user_body .= '<p>In the meantime, feel free to:</p>';
        $user_body .= '<ul>';
        $user_body .= '<li>Call us directly at <a href="tel:+447727307150">+44 7727 307150</a></li>';
        $user_body .= '<li>Send us a WhatsApp message at <a href="https://wa.me/447727307150">+44 7727 307150</a></li>';
        $user_body .= '</ul>';
        $user_body .= '<p>Best regards,<br>Osman Wahidi<br>Osman Wahidi Construction Services</p>';
        $user_body .= '</div></body></html>';
        
        $user_headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: Osman Wahidi Construction <' . $from_email . '>',
            'Reply-To: osman.wahidi88@gmail.com'
        );
        
        wp_mail($email, $user_subject, $user_body, $user_headers);
    }

    if ($email_sent) {
        wp_send_json_success(array(
            'message' => 'Thank you for your message! Osman will contact you soon.'
        ));
    } else {
        wp_send_json_error('Sorry, there was an error sending your message. Please try again or contact us directly.');
    }
}

// Register AJAX handlers
add_action('wp_ajax_submit_contact_form', 'process_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'process_contact_form_submission');

// Add email template filter for better Brevo compatibility
add_filter('wp_mail_content_type', function($content_type) {
    return 'text/html';
});

// Optional: Add custom email from name
add_filter('wp_mail_from_name', function($from_name) {
    return 'Osman Wahidi Construction';
});