<?php
/**
 * EMAIL CONFIGURATION - GMAIL SMTP SETUP
 * 
 * To enable Gmail email sending:
 * 
 * 1. Go to https://myaccount.google.com/apppasswords
 * 2. Select "Mail" and "Windows Computer" (or your device)
 * 3. Google will generate a 16-character app password
 * 4. Copy the password and paste it below in 'password' field
 * 5. Make sure to enable "Less secure app access" if not using app passwords
 * 
 * IMPORTANT: Never commit this file with real credentials to version control!
 */

// Gmail SMTP Configuration
return [
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 465,
    'encryption' => 'ssl',
    
    // Gmail account credentials
    'username' => 'shyrilyatarrr@gmail.com',
    'password' => 'fqok ougq svsc fwxt',
    
    // Display name for sent emails
    'from_email' => 'shyrilyatarrr@gmail.com',
    'from_name' => 'TOOTH IMPRESSION Dau Branch',
    'app_url' => ''

];
?>

