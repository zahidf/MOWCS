<?php
/**
 * Test Brevo Email Integration
 * 
 * This file can be used to test if Brevo is properly configured
 * Access it via: yoursite.com/wp-content/themes/osman-construction/test-brevo-email.php
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if user is logged in as admin
if (!current_user_can('manage_options')) {
    die('Access denied. Please log in as an administrator.');
}

$test_email = get_option('admin_email');
$message_sent = false;
$error_message = '';

if (isset($_POST['send_test'])) {
    $to = sanitize_email($_POST['test_email']);
    $subject = 'Test Email from Osman Wahidi Construction';
    
    $body = '<html><body style="font-family: Arial, sans-serif;">';
    $body .= '<h2 style="color: #ff8c00;">Test Email from Osman Wahidi Construction</h2>';
    $body .= '<p>This is a test email to verify that your Brevo email integration is working correctly.</p>';
    $body .= '<p>If you received this email, your email system is configured properly!</p>';
    $body .= '<hr>';
    $body .= '<p><small>Sent from: ' . get_site_url() . '</small></p>';
    $body .= '</body></html>';
    
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Osman Wahidi Construction <' . $test_email . '>'
    );
    
    $result = wp_mail($to, $subject, $body, $headers);
    
    if ($result) {
        $message_sent = true;
    } else {
        $error_message = 'Failed to send email. Please check your Brevo configuration.';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test Brevo Email Integration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #ff8c00;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #ff8c00;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff7700;
        }
        .success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .error {
            background-color: #f44336;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .info {
            background-color: #2196F3;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #ff8c00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Test Brevo Email Integration</h1>
        
        <?php if ($message_sent): ?>
            <div class="success">
                ✓ Test email sent successfully! Check your inbox.
            </div>
        <?php endif; ?>
        
        <?php if ($error_message): ?>
            <div class="error">
                ✗ <?php echo esc_html($error_message); ?>
            </div>
        <?php endif; ?>
        
        <div class="info">
            ℹ️ This tool helps you verify that your Brevo email integration is working correctly. 
            Enter an email address below to send a test email.
        </div>
        
        <form method="post">
            <div class="form-group">
                <label for="test_email">Send test email to:</label>
                <input type="email" 
                       id="test_email" 
                       name="test_email" 
                       value="<?php echo esc_attr($test_email); ?>" 
                       required>
            </div>
            
            <button type="submit" name="send_test">Send Test Email</button>
        </form>
        
        <div class="back-link">
            <a href="<?php echo admin_url(); ?>">← Back to WordPress Admin</a>
        </div>
    </div>
</body>
</html>