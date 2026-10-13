# National Cybersecurity Awareness Portal

A cybersecurity awareness website built with **PHP 8**, **MySQL**, and **Bootstrap 5** — featuring a public education site, an interactive quiz, and a complete admin dashboard for content and user management.

> ⚠️ This is an independent educational project. It is **not** an official Philippine government website unless formally authorized by a government agency.

---

## 📖 About the Project

Many Filipinos fall victim to online scams, phishing, and identity theft simply because cybersecurity awareness is not widely accessible. This portal aims to change that by providing:

- Clear, jargon-free explanations of common cyber threats
- Real-world examples of scams targeting Filipino users
- An interactive quiz that tests and reinforces learning
- Official contacts for reporting cybercrime

---

## ✨ Features

### Public Site (10 pages)
| Page | Purpose |
|------|---------|
| **Home** | Hero section, topic cards, safety checklist, FAQ |
| **About** | What cybersecurity is and why it matters |
| **Scams** | 12 common scam types with warning signs |
| **Phishing** | Interactive phishing email simulator |
| **Passwords** | Browser-only password strength checker |
| **Privacy** | Personal data protection & privacy tips |
| **Practices** | Scored cybersecurity checklist |
| **Quiz** | DB-driven quiz with instant feedback and score saving |
| **Resources** | Official PH agency contacts (PNP-ACG, NBI, DICT, NPC, CICC, BSP) |
| **Contact** | Contact form saved to the database |

### Admin Dashboard
- Login with rate limiting (5 failures → 15-minute lockout)
- Overview stats: users, quiz attempts, average score, unread messages
- **Users** — view all registered accounts
- **Quiz Questions** — add / delete questions
- **Quiz Results** — view all attempts with percentage coloring
- **Messages** — read, mark as read, and view contact submissions

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.x |
| Database | MySQL 5.7+ / MariaDB (via PDO prepared statements) |
| Frontend | HTML5, CSS3, Vanilla JavaScript |
| UI Framework | Bootstrap 5.3 |
| Icons | Font Awesome 6.4 |
| Fonts | Google Fonts — Inter |
| Server | Apache (WAMP / XAMPP / LAMP) |

---

## 📁 Project Structure
