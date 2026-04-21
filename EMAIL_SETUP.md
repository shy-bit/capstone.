# Email Configuration Setup

## Setting up Gmail SMTP for the Dental Clinic System

Follow these steps to enable email sending functionality:

### Step 1: Enable 2-Factor Authentication on Gmail
1. Go to https://myaccount.google.com/
2. Click on "Security" in the left menu
3. Enable "2-Step Verification"

### Step 2: Generate App Password
1. Go to https://myaccount.google.com/apppasswords
2. Select "Mail" and "Windows Computer"
3. Google will generate a 16-character password
4. Copy this password (without spaces)

### Step 3: Update mail_config.php
Open `mail_config.php` in the project root and update:

```php
'username' => 'your-email@gmail.com',      // Your Gmail address
'password' => 'xxxx xxxx xxxx xxxx',       // 16-character app password (remove spaces)
```

### Step 4: Test Email Sending
1. Log into the Admin Panel
2. Go to Appointments
3. Click "Contact" on any appointment
4. Send a test message

### Troubleshooting

**Error: "Connection failed"**
- Verify Gmail credentials are correct
- Make sure 2-Factor Authentication is enabled
- Check that you're using an App Password, not your regular Gmail password

**Error: "Authentication failed"**
- Double-check the 16-character app password (copy directly from Gmail, remove spaces)
- Ensure username is your full Gmail address

**Email not sent**
- Check the error message for specific details
- Verify the customer email address is correct
- Ensure your Gmail account isn't blocking the connection

### Without Gmail (Alternative: Local Mail Server)

If you prefer to use a local mail server instead:
1. Install and configure Postfix or similar on your machine
2. Update `mail_config.php` with your local server settings
3. Or use a third-party service like SendGrid or Mailgun

---

**Important:** Keep your Gmail App Password confidential. Don't commit `mail_config.php` to public repositories.
