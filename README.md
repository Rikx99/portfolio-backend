# Portfolio Backend (PHP/MySQL)

This repository contains the backend of my personal portfolio.  
It manages the admin area, project CRUD operations, authentication, and image handling.

## 🚀 Main Features

- Admin login and authentication
- Private dashboard
- Full project CRUD:
  - Create
  - Edit
  - Delete
  - View
- Image upload for projects
- Database connection via PDO
- Basic error handling and validation

---

## 🧱 Project Structure

portfolio-backend/
├── config/
│   ├── db.php              # Database credentials (ignored by Git)
│   └── db.example.php      # Template for DB configuration
│
├── core/
│   ├── Project.php         # CRUD logic for projects
│   ├── Auth.php            # Login management
│   └── helpers.php         # Utility functions
│
├── public/
│   ├── index.php           # Login page
│   ├── dashboard.php       # Admin area
│   ├── projects/           # CRUD pages
│   └── uploads/            # Uploaded images (ignored by Git)
│
└── README.md


---

## 🛠 Technologies Used

- PHP 8+
- MySQL
- PDO
- HTML / CSS / Bootstrap
- JavaScript

---

## 🔐 Security

- `config/db.php` is ignored by Git to protect database credentials.
- `public/uploads/` is ignored to avoid committing user-uploaded files.

---

## 📬 Contact

**Riccardo Barchi**  
Junior Full Stack Web Developer  
GitHub: https://github.com/Rikx99  
Portfolio: https://rikx99.github.io

