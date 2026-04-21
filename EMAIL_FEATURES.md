# Email Features - Admin Guide

## How to Send Emails to Customers

The TOOTH IMPRESSION admin panel now includes full **Gmail SMTP email support** for contacting customers directly.

### Features Available

✅ **Send appointment confirmations** - Confirm customer appointments
✅ **Send appointment reminders** - Remind customers about upcoming appointments  
✅ **Send appointment updates** - Notify customers of any changes
✅ **Send custom messages** - Send personalized messages to customers
✅ **HTML formatted emails** - Professional formatted emails with branding
✅ **Email tracking** - Replies stored and viewable in system
✅ **Error handling** - Clear error messages if email fails

---

## Step 1: Configure Gmail

**Before sending emails, you MUST configure Gmail credentials:**

1. **Edit `/mail_config.php`**:
   ```php
   'username' => 'your-gmail@gmail.com',        // Your Gmail address
   'password' => 'xxxx xxxx xxxx xxxx',         // App password (16 chars)
   'from_address' => 'your-gmail@gmail.com',    // Same as username
   'from_name' => 'TOOTH IMPRESSION Support'    // Display name
   ```

2. **Get App Password** (if not already done):
   - Go to: https://myaccount.google.com/apppasswords
   - Select: Mail + Windows Computer
   - Copy the 16-character password
   - Paste into mail_config.php

---

## Step 2: Send Email to a Customer

### From Admin Dashboard:

1. **Go to Admin Dashboard** → `/admin/admin.php`
2. **Find the appointment** in the Appointments table
3. **Click "Email" button** in the Actions column
4. **You'll see:**
   - Customer email displayed
   - Subject field
   - Message body field

### Write Your Email:

**Subject line** (Required):
```
Appointment Confirmation - April 10, 2026
```

**Message** (Required):
```
Dear [Customer Name],

We are pleased to confirm your appointment on April 10, 2026 at 2:00 PM for Dental Cleaning.

Please arrive 10 minutes early. If you need to reschedule, contact us at (+63) 917 123 4567.

Best regards,
TOOTH IMPRESSION Dau Branch Team
```

### Click "Send Email"

**Success Message:**
```
✅ Email successfully sent and added to customer inbox.
```

**Error Message:**
```
❌ Failed to send email (with error details)
```

---

## Email Template Examples

### Appointment Confirmation Template

```
Dear {Customer First Name},

Thank you for scheduling an appointment with TOOTH IMPRESSION Dau Branch!

APPOINTMENT DETAILS:
- Date: {Appointment Date}
- Time: {Appointment Time}
- Treatment: {Treatment Type}
- Doctor: TOOTH IMPRESSION Dau Branch

LOCATION:
Dau, Mabalacat, Pampanga, Philippines
Phone: (+63) 917 123 4567

IMPORTANT:
- Please arrive 10 minutes early
- Bring a valid ID
- Have your ID/insurance information ready

If you need to reschedule or have questions, contact us immediately at (+63) 917 123 4567.

Best regards,
TOOTH IMPRESSION Dau Branch Team
```

### Appointment Reminder Template

```
Dear {Customer First Name},

This is a friendly reminder about your upcoming appointment:

📅 Date: {Appointment Date}
🕐 Time: {Appointment Time}
🦷 Treatment: {Treatment Type}

Please arrive 10 minutes early. Contact us at (+63) 917 123 4567 if you need to reschedule.

Looking forward to seeing you!

TOOTH IMPRESSION Dau Branch Team
```

### Follow-up Template

```
Dear {Customer First Name},

Thank you for visiting TOOTH IMPRESSION Dau Branch on {Appointment Date}!

We hope your {Treatment Type} went well. 

If you have any questions or concerns, please don't hesitate to contact us at (+63) 917 123 4567.

We look forward to seeing you again!

Best regards,
TOOTH IMPRESSION Dau Branch Team
```

---

## Viewing Email History

### Customer can see replies:
- Customers log into their dashboard
- They see all admin emails sent to them
- They can reply to messages

### Admin can track emails:
- Check `admin_replies` table in database
- See all emails sent to each customer
- View timestamps and status

---

## Troubleshooting

### Email not sending?

1. **Check Gmail credentials**
   - Verify email in mail_config.php
   - Verify app password (16 characters)
   - Make sure 2FA is enabled on Gmail account

2. **Check server connectivity**
   - Can XAMPP reach the internet?
   - Is port 465 available? (try port 587 if blocked)

3. **Check customer email**
   - Is it correct in the appointment record?
   - Is it a valid email address?

4. **Check spam folder**
   - Email might arrive in spam
   - Add your Gmail to customer's contacts

### Still not working?

1. Restart Apache in XAMPP
2. Restart MySQL in XAMPP
3. Clear browser cache
4. Try sending from a different appointment
5. Check error messages carefully for clues

---

## Testing

### Test Email Checklist:

- [ ] Gmail is configured in mail_config.php
- [ ] 2FA is enabled on Gmail account
- [ ] App password is 16 characters
- [ ] Test message sent from admin panel
- [ ] Email received in test customer inbox
- [ ] Email formatting looks correct
- [ ] Branding header is visible

---

## Security Notes

⚠️ **IMPORTANT:**

- ❌ Never share your app password
- ❌ Never hardcode credentials in frontend code
- ❌ Never commit real credentials to public repositories
- ✅ Add mail_config.php to .gitignore
- ✅ Regenerate app password if compromised
- ✅ Only admins should access email feature

---

## Support

For Gmail setup issues:
- See: GMAIL_SETUP.md
- See: EMAIL_SETUP_COMPLETE.md
- Visit: https://support.google.com/mail/

---

**Last Updated:** April 7, 2026
**Version:** 1.0
**System:** TOOTH IMPRESSION Admin Panel
