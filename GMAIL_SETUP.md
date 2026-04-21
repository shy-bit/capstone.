# Gmail SMTP Setup Guide

## How to Configure Gmail for Sending Emails

Follow these steps to enable email sending from the TOOTH IMPRESSION admin panel:

### Step 1: Enable 2-Factor Authentication (Required)
1. Go to [myaccount.google.com](https://myaccount.google.com)
2. Click on **"Security"** in the left menu
3. Scroll down to **"2-Step Verification"** and enable it
4. Follow Google's verification process

### Step 2: Generate App Password
1. Go to [myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)
2. Select **"Mail"** from the first dropdown
3. Select **"Windows Computer"** (or your device type) from the second dropdown
4. Google will generate a **16-character password** (format: `xxxx xxxx xxxx xxxx`)
5. **Copy this password** (without spaces)

### Step 3: Update mail_config.php
1. Open `/mail_config.php` in your text editor
2. Replace `'username'` with your Gmail address:
   ```php
   'username' => 'your-email@gmail.com',
   ```
3. Replace `'password'` with the 16-character app password (remove spaces):
   ```php
   'password' => 'xxxxxxxxxxxxxxxx',
   ```
4. Update `'from_address'` to match your Gmail:
   ```php
   'from_address' => 'your-email@gmail.com',
   ```
5. **Save the file**

### Step 4: Test Email Sending
1. Go to Admin Dashboard (`/admin/admin.php`)
2. Click on an appointment's **"Email"** button
3. Compose a test message
4. Click **"Send Email"**
5. Check if the email arrives in the customer's inbox

## Troubleshooting

### "Authentication failed. Check credentials."
- Verify you used the **App Password** (16 characters), not your regular Gmail password
- Ensure you removed any spaces from the password
- Check that 2-Factor Authentication is enabled

### "Failed to connect to mail server"
- Ensure your server allows outbound SMTP connections (port 465)
- Check with your hosting provider if port 465 is blocked
- You can try port 587 with TLS encryption instead (change in mail_config.php)

### Email not sending but no error
- Check spam/junk folder of recipient
- Verify the Gmail credentials are correct
- Test with a simple message first

## Security Notes

⚠️ **Important:**
- Never push `mail_config.php` with real credentials to public repositories
- Add `mail_config.php` to `.gitignore` if using version control
- Keep your App Password safe and never share it
- If compromised, delete the app password and generate a new one

## Email Features

Once configured, admins can:
- ✅ Send appointment confirmations to customers
- ✅ Send appointment reminders
- ✅ Send appointment status updates
- ✅ Send custom messages to customers
- ✅ Keep records in admin_replies table

## Support

If you need help:
1. Check the official [Gmail SMTP documentation](https://support.google.com/mail/answer/7126229)
2. Verify your account has App Passwords enabled
3. Contact your hosting provider about SMTP port availability

---

**Last Updated:** April 7, 2026
**TOOTH IMPRESSION Dau Branch**
