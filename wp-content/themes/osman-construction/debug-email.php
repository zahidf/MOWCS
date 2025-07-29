<?php
/**
 * Debug Email System
 * 
 * This file helps debug email sending issues
 * Access it via: yoursite.com/wp-content/themes/osman-construction/debug-email.php
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if user is logged in as admin
if (!current_user_can('manage_options')) {
    die('Access denied. Please log in as an administrator.');
}

// Get current settings
$admin_email = get_option('admin_email');
$site_url = get_site_url();
$site_name = get_bloginfo('name');

// Check for active email plugins
$active_plugins = get_option('active_plugins', array());
$email_plugins = array();

foreach ($active_plugins as $plugin) {
    if (stripos($plugin, 'mail') !== false || 
        stripos($plugin, 'smtp') !== false || 
        stripos($plugin, 'brevo') !== false || 
        stripos($plugin, 'sendinblue') !== false) {
        $email_plugins[] = $plugin;
    }
}

// Test email function
$test_result = null;
if (isset($_POST['test_email'])) {
    $test_to = sanitize_email($_POST['test_to']);
    $test_type = sanitize_text_field($_POST['test_type']);
    
    if ($test_type === 'simple') {
        // Simple text email
        $subject = 'Test Email - Simple';
        $message = "This is a simple test email from your WordPress site.\n\n";
        $message .= "Site: " . $site_url . "\n";
        $message .= "Time: " . current_time('mysql') . "\n";
        
        $result = wp_mail($test_to, $subject, $message);
        $test_result = array(
            'type' => 'Simple Email',
            'to' => $test_to,
            'result' => $result ? 'Success' : 'Failed'
        );
    } else {
        // HTML email like contact form
        $subject = 'Test Email - HTML Format';
        
        // Get site domain for From address
        $site_url_parts = parse_url($site_url);
        $domain = $site_url_parts['host'];
        $from_email = 'noreply@' . $domain;
        
        $body = '<html><body style="font-family: Arial, sans-serif;">';
        $body .= '<h2 style="color: #ff8c00;">Test HTML Email</h2>';
        $body .= '<p>This is a test HTML email similar to your contact form emails.</p>';
        $body .= '<table style="width: 100%; border-collapse: collapse;">';
        $body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>From Email:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $from_email . '</td></tr>';
        $body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Reply-To:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">test@example.com</td></tr>';
        $body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Site:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . $site_url . '</td></tr>';
        $body .= '<tr><td style="padding: 10px; border: 1px solid #ddd;"><strong>Time:</strong></td><td style="padding: 10px; border: 1px solid #ddd;">' . current_time('mysql') . '</td></tr>';
        $body .= '</table>';
        $body .= '</body></html>';
        
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $site_name . ' <' . $from_email . '>',
            'Reply-To: test@example.com'
        );
        
        $result = wp_mail($test_to, $subject, $body, $headers);
        $test_result = array(
            'type' => 'HTML Email (Contact Form Style)',
            'to' => $test_to,
            'from' => $from_email,
            'result' => $result ? 'Success' : 'Failed'
        );
    }
}

// Check if mail function exists
$mail_function_exists = function_exists('mail');
$wp_mail_exists = function_exists('wp_mail');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Debug Email System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
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
        h1, h2 {
            color: #ff8c00;
        }
        .info-box {
            background-color: #f0f8ff;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin: 20px 0;
        }
        .success-box {
            background-color: #f0fff0;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin: 20px 0;
        }
        .error-box {
            background-color: #fff0f0;
            border-left: 4px solid #f44336;
            padding: 15px;
            margin: 20px 0;
        }
        .warning-box {
            background-color: #fffbf0;
            border-left: 4px solid #ff9800;
            padding: 15px;
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .test-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #ff8c00;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #ff7700;
        }
        code {
            background-color: #f5f5f5;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: monospace;
        }
        .code-block {
            background-color: #f5f5f5;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Email System Debugger</h1>
        
        <?php if ($test_result): ?>
            <div class="<?php echo $test_result['result'] === 'Success' ? 'success-box' : 'error-box'; ?>">
                <h3>Test Result</h3>
                <p><strong>Type:</strong> <?php echo esc_html($test_result['type']); ?></p>
                <p><strong>To:</strong> <?php echo esc_html($test_result['to']); ?></p>
                <?php if (isset($test_result['from'])): ?>
                    <p><strong>From:</strong> <?php echo esc_html($test_result['from']); ?></p>
                <?php endif; ?>
                <p><strong>Result:</strong> <?php echo esc_html($test_result['result']); ?></p>
            </div>
        <?php endif; ?>
        
        <h2>System Information</h2>
        <table>
            <tr>
                <th>Setting</th>
                <th>Value</th>
                <th>Status</th>
            </tr>
            <tr>
                <td>WordPress Admin Email</td>
                <td><code><?php echo esc_html($admin_email); ?></code></td>
                <td><?php echo $admin_email === 'osman.wahidi88@gmail.com' ? '✅ Correct' : '⚠️ Different from expected'; ?></td>
            </tr>
            <tr>
                <td>Site URL</td>
                <td><code><?php echo esc_html($site_url); ?></code></td>
                <td>✅</td>
            </tr>
            <tr>
                <td>PHP mail() function</td>
                <td><?php echo $mail_function_exists ? 'Available' : 'Not Available'; ?></td>
                <td><?php echo $mail_function_exists ? '✅' : '❌'; ?></td>
            </tr>
            <tr>
                <td>WordPress wp_mail() function</td>
                <td><?php echo $wp_mail_exists ? 'Available' : 'Not Available'; ?></td>
                <td><?php echo $wp_mail_exists ? '✅' : '❌'; ?></td>
            </tr>
        </table>
        
        <h2>Active Email-Related Plugins</h2>
        <?php if (empty($email_plugins)): ?>
            <div class="warning-box">
                <p>⚠️ No email-related plugins detected. This might be why emails aren't being sent properly.</p>
                <p>You should install one of these:</p>
                <ul>
                    <li>Brevo (official plugin)</li>
                    <li>WP Mail SMTP</li>
                    <li>Post SMTP</li>
                </ul>
            </div>
        <?php else: ?>
            <div class="info-box">
                <p>Found <?php echo count($email_plugins); ?> email-related plugin(s):</p>
                <ul>
                    <?php foreach ($email_plugins as $plugin): ?>
                        <li><code><?php echo esc_html($plugin); ?></code></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <h2>Test Email Sending</h2>
        <div class="test-form">
            <form method="post">
                <label for="test_to">Send test email to:</label>
                <input type="email" id="test_to" name="test_to" value="osman.wahidi88@gmail.com" required>
                
                <label for="test_type">Email type:</label>
                <select id="test_type" name="test_type">
                    <option value="simple">Simple Text Email</option>
                    <option value="html">HTML Email (Contact Form Style)</option>
                </select>
                
                <button type="submit" name="test_email">Send Test Email</button>
            </form>
        </div>
        
        <h2>Troubleshooting Guide</h2>
        
        <div class="info-box">
            <h3>Common Issues & Solutions</h3>
            
            <h4>1. No Email Plugin Installed</h4>
            <p>WordPress needs an SMTP plugin to send emails reliably. Install Brevo plugin:</p>
            <div class="code-block">
                1. Go to Plugins → Add New
                2. Search for "Brevo"
                3. Install "Newsletter, SMTP, Email marketing and Subscribe forms by Brevo"
                4. Activate and configure with your API key
            </div>
            
            <h4>2. From Address Issues</h4>
            <p>Many servers reject emails with mismatched From addresses. We now use:</p>
            <div class="code-block">
                From: noreply@<?php 
                $parts = parse_url($site_url);
                echo esc_html($parts['host']); 
                ?>
            </div>
            
            <h4>3. Check Spam Folder</h4>
            <p>Emails might be going to spam. Check your spam/junk folder.</p>
            
            <h4>4. Hosting Restrictions</h4>
            <p>Some hosts block email sending. Contact your hosting provider if emails consistently fail.</p>
        </div>
        
        <h2>Debug Contact Form</h2>
        <div class="warning-box">
            <p>To debug the contact form specifically:</p>
            <ol>
                <li>Enable WordPress debug logging in wp-config.php:
                    <div class="code-block">
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
                    </div>
                </li>
                <li>Submit a contact form</li>
                <li>Check the debug log at: <code>wp-content/debug.log</code></li>
            </ol>
        </div>
        
        <div style="margin-top: 30px; text-align: center;">
            <a href="<?php echo admin_url(); ?>" style="color: #ff8c00;">← Back to WordPress Admin</a>
        </div>
    </div>
</body>
</html>