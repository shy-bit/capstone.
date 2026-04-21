# Email Setup Guide - Complete Instructions

## Quick Setup for SMTP Success

### Option 1: Using Gmail Account (Recommended)

#### Step 1: Create/Verify Gmail Account
Use or create: `dentalclinicemail@gmail.com` or your own Gmail

#### Step 2: Enable 2-Factor Authentication
1. Go to https://myaccount.google.com/
2. Click **Security** in left menu
3. Enable **2-Step Verification** (if not already enabled)

#### Step 3: Generate App Password
1. Go to https://myaccount.google.com/apppasswords
2. Select **Mail** and **Windows Computer**
3. Google generates a 16-character password
4. **Copy the entire password** (example: `abcd efgh ijkl mnop`)

#### Step 4: Update mail_config.php
Edit `mail_config.php` in your project root:

```php
'username' => 'dentalclinicemail@gmail.com',  // Change to your Gmail
'password' => 'abcd efgh ijkl mnop',          // Paste the 16-char password here
```

**IMPORTANT**: When you copy from Google, it has spaces. Keep them exactly as is - do NOT remove spaces!

---

### Option 2: Using Outlook/Hotmail

```php
'host' => 'smtp-mail.outlook.com',
'port' => 587,
'encryption' => 'tls',
'username' => 'your-email@outlook.com',
'password' => 'your-password',
```

---

### Testing Your Setup

1. **Log into Admin Panel**
2. **Go to Appointments** table
3. **Click "Email"** on any appointment
4. **Send a test message**
5. Check the alert - it will show:
   - ✅ "Email sent successfully to..." = Working!
   - ❌ Error message = Follow troubleshooting below

---

## Troubleshooting

### Error: "Authentication failed"
- **Solution**: Check your app password is exactly 16 characters
- Copy directly from Google App Passwords page
- Don't modify or remove spaces

### Error: "Failed to connect to mail server"
- **Solution**: Verify SMTP settings:
  - Gmail: `smtp.gmail.com:465` with SSL
  - Outlook: `smtp-mail.outlook.com:587` with TLS
- Your firewall might block port 465/587 - try both

### Error: "Connection timed out"
- **Solution**: 
  - Check internet connection
  - Port might be blocked by ISP
  - Try port 587 instead of 465

### Email sent but customer doesn't receive
- Check spam folder
- Verify customer email address in appointment
- Check Gmail "Sent" folder to confirm it was sent

---

## What's Working?

The system now:
- ✅ Tries PHP mail() first (if available)
- ✅ Falls back to SMTP connection
- ✅ Handles both SSL (port 465) and TLS (port 587)
- ✅ Provides detailed error messages
- ✅ Supports Gmail, Outlook, and other SMTP providers
- ✅ Works on XAMPP for Windows

---

## Next Steps

1. Set up your Gmail account with 2FA + App Password
2. Update mail_config.php
3. Send a test email to yourself
4. It should work! ✅

Need help? Check your error message carefully - it will guide you to the solution.
