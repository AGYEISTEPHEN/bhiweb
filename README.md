# Bono Heart Initiative — Full Stack Website
### XAMPP / PHP / MySQL / AJAX / JavaScript Backend

This package turns the static BHI website (`index.html`) into a fully dynamic,
database-driven site with an admin panel, outreach program management, a
gallery, screening registration, contact forms, newsletter signups, and
partnership enquiries.

---

## 1. Folder Structure

```
bhi_project/
├── index.html              ← The combined frontend (Home / CMR Education / Founder)
├── admin/                  ← Admin panel (login required)
│   ├── login.php
│   ├── logout.php
│   ├── index.php           ← Dashboard
│   ├── outreach.php        ← Manage outreach programs + sessions
│   ├── gallery.php         ← Upload & manage gallery images
│   ├── registrations.php   ← View/export screening registrations
│   ├── messages.php        ← Contact form submissions
│   ├── subscribers.php     ← Newsletter subscriber list
│   ├── partnerships.php    ← Partnership enquiries
│   ├── stats.php           ← Edit homepage impact numbers
│   ├── admins.php          ← Manage admin users (superadmin only)
│   ├── activity.php        ← System activity log (superadmin only)
│   └── partials/           ← Shared header/footer for admin pages
├── api/                    ← Public-facing AJAX endpoints (called by index.html)
│   ├── bootstrap.php       ← Shared bootstrap loaded by every endpoint
│   ├── subscribe.php       ← POST newsletter signups
│   ├── contact.php         ← POST contact form
│   ├── register_screening.php  ← POST screening registration
│   ├── partner_enquiry.php ← POST partnership enquiry
│   ├── outreach.php        ← GET outreach programs / sessions / stats
│   ├── gallery.php         ← GET gallery images / categories
│   └── unsubscribe.php     ← GET unsubscribe link handler
├── includes/                ← Core PHP classes (not web-accessible)
│   ├── config.php          ← All site/DB configuration — EDIT THIS FIRST
│   ├── Database.php        ← PDO connection singleton
│   ├── helpers.php         ← Validation, security, upload helpers
│   └── Mailer.php           ← Email templates and sending logic
├── assets/
│   ├── css/bhi-dynamic.css ← Styles for outreach/gallery/modal/lightbox
│   └── js/bhi-main.js      ← AJAX controller — wires forms to the API
├── uploads/
│   ├── gallery/             ← Uploaded gallery images land here
│   └── outreach/            ← Outreach program cover images land here
└── database/
    └── bhi_schema.sql       ← Run this once to create the database
```

---

## 2. Installation (XAMPP)

### Step 1 — Copy files
Copy the entire `bhi_project` folder into your XAMPP `htdocs` directory, e.g.:
```
C:\xampp\htdocs\bhi\        (Windows)
/Applications/XAMPP/htdocs/bhi/   (Mac)
/opt/lampp/htdocs/bhi/      (Linux)
```

### Step 2 — Start Apache & MySQL
Open the XAMPP Control Panel and start **Apache** and **MySQL**.

### Step 3 — Create the database
1. Go to `http://localhost/phpmyadmin`
2. Click **Import** → choose `database/bhi_schema.sql` → click **Go**

This creates the `bhi_db` database with all tables, a default admin account,
default gallery categories, and default impact stat rows.

### Step 4 — Configure the site
Open `includes/config.php` and update:

```php
define('DB_USER', 'root');          // your MySQL username
define('DB_PASS', '');              // your MySQL password
define('SITE_URL', 'http://localhost/bhi');   // match your folder name
```

If you renamed the project folder from `bhi`, also update `apiBase` in
`assets/js/bhi-main.js`:

```js
apiBase: '/bhi/api',   // change 'bhi' to match your folder name
```

### Step 5 — Set folder permissions
Make sure `uploads/gallery` and `uploads/outreach` are writable by the
web server (on Linux/Mac: `chmod -R 755 uploads`).

### Step 6 — Visit the site
```
Frontend:     http://localhost/bhi/
Admin Panel:  http://localhost/bhi/admin/login.php
```

---

## 3. Default Admin Login

```
Email:    admin@bonoheartinitiative.org
Password: BHI@admin2026
```

**Change this password immediately** after first login — there's no
in-app "change password" page yet for your own account, so update it
via `admin/admins.php` (superadmin only) by editing your own admin record
and entering a new password.

---

## 4. What's Dynamic Now vs. Static

| Section                     | Status                                            |
|------------------------------|---------------------------------------------------|
| Newsletter signup (footer)   | ✅ Live — saves to `subscribers` table, sends welcome email |
| Contact form                 | ✅ Live — saves to `contact_messages`, sends ack + admin alert |
| Partnership enquiry form     | ✅ Live — saves to `partnership_enquiries`, sends ack + admin alert |
| Outreach Programs section    | ✅ Live — pulled from `outreach_programs` / `outreach_sessions` via AJAX |
| Screening registration modal | ✅ Live — saves to `screening_registrations`, decrements session slots, emails confirmation |
| Gallery section               | ✅ Live — pulled from `gallery_images` via AJAX, with category filters + lightbox |
| "Live Progress" stats (Impact section) | ✅ Live — pulled from `impact_stats`, editable in admin |
| Year 1 Targets (Impact section)         | Static narrative content (strategic plan targets — intentionally left as-is) |
| CMR Education / Founder pages           | Static content (no DB-backed dynamic parts requested) |

---

## 5. Adding Your First Outreach Program & Gallery Images

1. Log into `/admin/`
2. Go to **Outreach Programs** → **+ Add Program** → fill in title, district,
   community, date, etc. → Save.
3. Click **+ Session** on that program to add one or more specific
   screening dates/venues with slot capacity. Sessions are what
   visitors actually register for.
4. Go to **Gallery** → **+ Upload Images** → choose a category (or create
   a new one) → optionally link to the outreach program you just created
   → upload. Mark key images **Featured** to have them appear in the
   homepage's featured strip (if you wire that section in).

Once a program has at least one open session, its card on the public
site will show a **"Register for Screening →"** button that opens the
registration modal pre-filled with available dates.

---

## 6. Security Notes for Production

This build is configured for local XAMPP development. Before deploying
publicly:

- Set `display_errors` to `0` and `error_reporting` to a safe level in `includes/config.php`.
- Change `DB_USER` / `DB_PASS` to a dedicated non-root MySQL user with limited privileges.
- Set session cookies to `secure => true` in `includes/helpers.php` once running on HTTPS.
- Replace the PHP `mail()` calls in `includes/Mailer.php` with a real SMTP provider
  (e.g. PHPMailer + Gmail/SendGrid/Mailgun) — `mail()` is unreliable for production deliverability.
- Restrict CORS in `api/bootstrap.php` from `*` to your actual domain.
- Change the default admin password and delete/disable any test accounts.
- Consider adding a proper CAPTCHA (e.g. hCaptcha) to public forms in addition to the honeypot field already included.

---

## 7. Database Tables Reference

| Table                     | Purpose                                      |
|----------------------------|-----------------------------------------------|
| `admin_users`              | Admin panel logins (bcrypt-hashed passwords) |
| `subscribers`               | Newsletter subscribers                       |
| `contact_messages`          | Contact form submissions                     |
| `screening_registrations`   | Individuals who registered for screening     |
| `outreach_programs`         | Outreach program records (title, location, date, etc.) |
| `outreach_sessions`         | Specific dates/venues/slots within a program |
| `gallery_categories`        | Gallery category list                        |
| `gallery_images`            | Uploaded gallery images + metadata           |
| `partnership_enquiries`     | Partner/donor enquiries                      |
| `impact_stats`               | Editable homepage "Live Progress" numbers    |
| `admin_activity_log`        | Audit trail of admin actions                 |

All foreign keys, indexes, and the default seed data (admin account,
gallery categories, impact stat placeholders) are included in
`database/bhi_schema.sql`.
