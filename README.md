# National Cybersecurity Awareness Portal — PHP/MySQL (WAMP/XAMPP)

A bilingual (English/Filipino) cybersecurity awareness website for Filipino
citizens, built as a **classic PHP 8 + MySQL + PDO** project with Bootstrap-free
custom CSS, Font Awesome icons, and a full admin console — ready to drop into
`htdocs` / `www`.

> Independent educational platform. Not an official Philippine government website.

## Project structure

```
cybersecurity-portal/
├── index.php · about.php · scams.php · phishing.php · passwords.php
├── privacy.php · practices.php · quiz.php · resources.php · contact.php · 404.php
├── .htaccess                     # friendly 404 + security headers
├── admin/
│   ├── login.php                 # sign-in + first-run admin bootstrap
│   ├── dashboard.php             # users, attempts, avg score, messages
│   ├── users.php                 # user management (admin role)
│   ├── quizzes.php               # bilingual question bank CRUD
│   ├── results.php               # saved quiz results
│   ├── messages.php              # contact inbox (read/unread/delete)
│   ├── logout.php                # secure POST logout
│   └── nav.php                   # admin sidebar partial
├── includes/
│   ├── config.php                # DB creds, sessions, CSRF, helpers
│   ├── database.php              # shared PDO connection + helpers
│   ├── language.php              # EN/FIL dictionary + session/cookie persistence
│   ├── header.php · navbar.php · footer.php
│   └── admin_guard.php           # session check for admin pages
├── assets/
│   ├── css/style.css             # whole theme (navy/cyan/gold design system)
│   └── js/script.js              # all interactivity (checker, simulator, checklist, quiz…)
└── database/
    └── cybersecurity_portal.sql  # database + 5 tables + 10 seeded questions
```

## Setup on WAMP or XAMPP (5 minutes)

1. **Install** WAMP (Windows) or XAMPP, and start **Apache** and **MySQL**.
2. **Copy** the `cybersecurity-portal` folder into your web root:
   - WAMP → `C:\wamp64\www\`
   - XAMPP → `C:\xampp\htdocs\`
3. **Open phpMyAdmin** → `http://localhost/phpmyadmin` → **Import** → choose
   `cybersecurity-portal/database/cybersecurity_portal.sql` → **Go**.
   This creates the `cybersecurity_portal` database, all tables, and seeds
   10 bilingual quiz questions.
4. **Configure credentials** in `includes/config.php` if yours differ:
   ```php
   define('DB_USER', 'root');
   define('DB_PASS', '');        // WAMP/XAMPP default is empty
   ```
   Also confirm `BASE_URL` matches your folder name (`/cybersecurity-portal`).
5. **Open the site:** `http://localhost/cybersecurity-portal/`

## Admin access (secure first run)

1. Go to `http://localhost/cybersecurity-portal/admin/login.php`.
2. Because the `users` table is empty, a **bootstrap form** appears: create the
   first administrator (password is stored with `password_hash()` — bcrypt,
   never plaintext). The form permanently disappears once an admin exists.
3. Sign in. The dashboard shows total users, quiz attempts, average score,
   and contact messages; side pages manage users (admin role), quiz questions,
   saved results, and messages.

## Features

- **10 public pages** — home, about, scams (12-scam bilingual library), phishing
  (interactive simulator), passwords (browser-only strength checker), privacy,
  practices (scored checklist saved on-device), quiz (DB-driven, opt-in result
  saving), resources (official PH agency links), contact.
- **EN / FIL switcher** — floating lower-right control on every page; choice
  persisted in PHP session + a 1-year cookie; entire site translated.
- **All JavaScript interactions** — password strength meter (never sent to the
  server), phishing Safe/Suspicious simulator, checklist score, quiz engine,
  accordion, tip rotator, topic search overlay, mobile menu, back-to-top.

## Security practices implemented

- PDO **prepared statements** for every query (no string-built SQL).
- `htmlspecialchars()` escaping on all output (via `e()` helper).
- CSRF tokens on every form; POST-only state changes.
- `password_hash()` / `password_verify()` authentication; session
  `session_regenerate_id()` on login; secure cookie params.
- Login **rate limiting**: 5 failures → 15-minute lock.
- Role-based authorization (user management requires `admin`).
- Security headers in both `config.php` and `.htaccess`.
- No error internals, stack traces, or DB credentials shown to visitors.

## Notes

- Statistics are truthfully replaced by Learn/Protect/Verify/Report pillars —
  no invented numbers.
- The Resources page links only to official domains (PNP-ACG, NBI, DICT, NPC,
  CICC, BSP) and reminds visitors to verify hotlines on those sites — nothing
  is fabricated.
