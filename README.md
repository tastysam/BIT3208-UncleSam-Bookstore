# 📚 Uncle Sam's Bookstore Management System

> **BIT3208 — Advanced Web Design and Development**
> Mount Kenya University | Bachelor of Business Information Technology

---

##  Student Details

| Field | Details |
|---|---|
| **Student Name** | Samuel Muthee Wainaina |
| **Admission Number** | BBIT/2024/55411 |
| **Course** | Bachelor of Business Information Technology |
| **Unit Code** | BIT3208 |
| **Unit Name** | Advanced Web Design and Development |
| **Lecturer** | Mr. Nyoro |
| **Semester** | Year 3, Semester 2 |

---

##  Project Overview

**Uncle Sam's Bookstore Management System** is a web-based application developed as part of the BIT3208 unit practical assignment. The system allows users to register, log in, and manage a bookstore inventory through a fully functional CRUD (Create, Read, Update, Delete) interface.

The project was built progressively over 5 weeks, starting from environment setup all the way to a fully working web application connected to a MySQL database.

---

## Features

-  User Registration with password hashing
- Secure Login with PHP Sessions
-  Protected Dashboard (only accessible after login)
-  Add Books to inventory
-  View all Books in a dynamic table
-  Edit existing Book records
-  Delete Book records with confirmation
-  Logout with session destruction
-  JavaScript form validation
-  Real-time Password Strength Checker
-  Responsive design for mobile and desktop

---

##  Technology Stack

| Layer | Technology |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript |
| **Backend** | PHP |
| **Database** | MySQL |
| **Local Server** | XAMPP (Apache + MySQL) |
| **Database Manager** | phpMyAdmin |
| **Code Editor** | Visual Studio Code |
| **UI Design** | Figma |
| **Version Control** | GitHub |

---

##  Project Structure

```
BIT3208_UncleSam/
│
├── Week1/                          # Local Environment Setup
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── index.php           # Hello World test page
│   │       └── db_connect.php      # Database connection test
│   ├── screenshots/
│   └── notes/
│
├── Week2/                          # UI Design and Wireframes
│   ├── project_files/
│   ├── wireframes/                 # Exported Figma designs (PNG)
│   ├── screenshots/
│   └── notes/
│
├── Week3/                          # Frontend and Backend Basics
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── login.php           # Login page (HTML + CSS)
│   │       ├── register.php        # Registration page
│   │       ├── style.css           # Global stylesheet
│   │       ├── script.js           # JavaScript validation
│   │       ├── password_checker.html
│   │       ├── welcome.php         # PHP practice
│   │       ├── user_input.php      # Dynamic input form
│   │       └── display.php         # PHP GET handler
│   ├── screenshots/
│   └── notes/
│
├── Week4/                          # Authentication System
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── db_connect.php      # DB connection + session_start
│   │       ├── login.php           # Login with POST
│   │       ├── register.php        # Register form
│   │       ├── register_process.php # Inserts user into DB
│   │       ├── process_login.php   # Verifies credentials
│   │       ├── dashboard.php       # Protected dashboard
│   │       └── logout.php          # Destroys session
│   ├── screenshots/
│   └── notes/
│
└── Week5/                          # CRUD Operations
    ├── project_files/
    │   └── unclesam_bookstore/
    │       ├── add_book.php        # Add book form
    │       ├── insert_book.php     # INSERT INTO books
    │       ├── view_books.php      # SELECT all books
    │       ├── edit_book.php       # Load book for editing
    │       ├── update_book.php     # UPDATE book record
    │       └── delete_book.php     # DELETE book record
    ├── database_backup/
    │   └── unclesam_bookstore_db_week5.sql
    ├── screenshots/
    └── notes/
```

---

##  Database Structure

### Database Name: `unclesam_bookstore_db`

#### Table: `users`
| Column | Type | Description |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key |
| fullname | VARCHAR(100) | User's full name |
| email | VARCHAR(100) UNIQUE | User's email address |
| username | VARCHAR(50) UNIQUE | Chosen username |
| password | VARCHAR(255) | Hashed password |
| created_at | TIMESTAMP | Account creation date |

#### Table: `books`
| Column | Type | Description |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key |
| title | VARCHAR(255) | Book title |
| author | VARCHAR(255) | Author name |
| category | VARCHAR(100) | Book category |
| price | DECIMAL(10,2) | Price in KSH |
| quantity | INT | Stock quantity |
| created_at | TIMESTAMP | Date added |

---

##  How to Run This Project Locally

Follow these steps exactly to run the project on your computer:

### Step 1 — Install XAMPP
Download and install XAMPP from:
```
https://www.apachefriends.org
```

### Step 2 — Start XAMPP
Open XAMPP Control Panel and start:
-  Apache
-  MySQL

### Step 3 — Clone or Download This Repository
Click the green **Code** button on this page and select **Download ZIP**.

Extract the ZIP file and copy the `unclesam_bookstore` folder into:
```
C:\xampp\htdocs\
```

### Step 4 — Create the Database
Open your browser and go to:
```
http://localhost/phpmyadmin
```

Click **New** on the left side and create a database named:
```
unclesam_bookstore_db
```

Then click the **SQL** tab and run this to create the users table:
```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Then run this to create the books table:
```sql
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Step 5 — Open the Project
Open your browser and go to:
```
http://localhost/unclesam_bookstore/login.php
```

### Step 6 — Register and Login
- Click **Create Account** to register a new user
- Login with your username and password
- You will be taken to the Dashboard

---

##  Weekly Development Progress

| Week | Title | What Was Done |
|---|---|---|
| **Week 1** | Local Environment Setup | Installed XAMPP, tested localhost, created project folder, built index.php and db_connect.php |
| **Week 2** | Wireframes and GUI Design | Designed Login, Register, Dashboard, Add Book pages and Mobile view in Figma |
| **Week 3** | Frontend and Backend Basics | Built HTML/CSS pages, JavaScript validation, password strength checker, PHP input handling |
| **Week 4** | Authentication System | Created users table, built register/login system with sessions, protected dashboard, logout |
| **Week 5** | CRUD Operations | Created books table, built Add/View/Edit/Delete book functionality, exported database backup |

---

##  Color Theme

| Color | Hex Code | Used For |
|---|---|---|
| Dark Navy | `#1a1a2e` | Page background |
| Dark Blue | `#16213e` | Cards and containers |
| Deep Blue | `#0f3460` | Input fields |
| Red Accent | `#e94560` | Buttons, titles, highlights |
| Teal | `#4ecca3` | Links, success messages |

---

##  Screenshots

> Screenshots of all pages and database tables are documented in the weekly logbook report submitted alongside this project.

---

##  License

This project was developed for academic purposes as part of the BIT3208 unit at Mount Kenya University.

---

##  Acknowledgements

- **Lecturer:** Mr. Nyoro — for guidance and the project brief
- **Mount Kenya University** — BIT3208 Advanced Web Design and Development
- **Tools Used:** XAMPP, VS Code, Figma, phpMyAdmin, GitHub

---

*Developed by **Samuel Muthee Wainaina** | BBIT/2024/55411 | Mount Kenya University*
