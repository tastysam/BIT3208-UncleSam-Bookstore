📚 Uncle Sam's Bookstore Management System

> BIT3208 — Advanced Web Design and Development
> Mount Kenya University | Bachelor of Business Information Technology

---

👤 Student Details

| Field | Details |
|---|---|
| Student Name | Samuel Muthee Wainaina |
| Admission Number | BBIT/2024/55411 |
| Course | Bachelor of Business Information Technology |
| Unit Code | BIT3208 |
| Unit Name | Advanced Web Design and Development |
| Lecturer | Mr. Nyoro |
| Semester / Year | Year 3, Semester 2 |

---

 📖 Project Overview

Uncle Sam's Bookstore Management System is a fully functional web-based application developed progressively over 8 weeks as part of the BIT3208 practical assignment at Mount Kenya University.

The system allows administrators to register, log in securely, and manage a complete bookstore inventory through a responsive interface that works on mobile, tablet, and desktop devices.

---

 🚀 Features

 Authentication and Security
- ✅ User Registration with password hashing using `password_hash()`
- ✅ Secure Login with credential verification using `password_verify()`
- ✅ PHP Session management across all protected pages
- ✅ Brute force protection — login locked after 3 failed attempts for 60 seconds
- ✅ SQL injection prevention using prepared statements and `bind_param()`
- ✅ Server-side input validation on all forms
- ✅ Secure logout using `session_destroy()`
- ✅ Protected pages — unauthorized users redirected to login

 Book Inventory Management (CRUD)
- ✅ Add new books to inventory
- ✅ View all books in a dynamic table
- ✅ Search books by title, author, or category
- ✅ Edit existing book records
- ✅ Delete book records with confirmation prompt
- ✅ Real-time form validation (JavaScript + PHP)

 Responsive Design
- ✅ Mobile-First CSS design approach
- ✅ CSS Grid layout for Book Showcase page
- ✅ Flexbox for navigation and dashboard
- ✅ Media query breakpoints at 768px, 1024px, and 1440px
- ✅ Responsive images (`max-width: 100%`)
- ✅ Viewport meta tag on all pages
- ✅ Tested on mobile (iPhone), tablet (iPad), and desktop views

---

 🛠️ Technology Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP |
| Database | MySQL |
| Local Server | XAMPP (Apache + MySQL) |
| Database Manager | phpMyAdmin |
| Code Editor | Visual Studio Code |
| UI Design | Figma |
| Version Control | GitHub |
| Testing | Chrome DevTools Device Toolbar |

---

 📁 Complete Project Structure

```
BIT3208_UncleSam/
│
├── Week1/                             Local Environment Setup
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── index.php              Hello World PHP test page
│   │       └── db_connect.php         Database connection test
│   ├── screenshots/
│   └── notes/
│
├── Week2/                             UI Design and Wireframes
│   ├── project_files/
│   ├── wireframes/                    Exported Figma designs (PNG)
│   ├── screenshots/
│   └── notes/
│
├── Week3/                             Frontend and Backend Basics
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── login.php              Login page (HTML + CSS)
│   │       ├── register.php           Registration page
│   │       ├── style.css              Global stylesheet
│   │       ├── script.js              JavaScript validation
│   │       ├── password_checker.html  Password strength checker
│   │       ├── welcome.php            PHP variable practice
│   │       ├── user_input.php         Dynamic input form
│   │       └── display.php            PHP GET handler
│   ├── screenshots/
│   └── notes/
│
├── Week4/                             Authentication System
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── db_connect.php         DB connection + session_start
│   │       ├── login.php              Login with POST method
│   │       ├── register.php           Registration form
│   │       ├── register_process.php   Inserts user into database
│   │       ├── process_login.php      Verifies credentials
│   │       ├── dashboard.php          Protected dashboard
│   │       └── logout.php             Destroys session
│   ├── screenshots/
│   └── notes/
│
├── Week5/                             CRUD Operations
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── add_book.php           Add book form
│   │       ├── insert_book.php        INSERT INTO books
│   │       ├── view_books.php         SELECT all books
│   │       ├── edit_book.php          Load book for editing
│   │       ├── update_book.php        UPDATE book record
│   │       └── delete_book.php        DELETE book record
│   ├── database_backup/
│   │   └── unclesam_bookstore_db_week5.sql
│   ├── screenshots/
│   └── notes/
│
├── Week6/                             Advanced CRUD and Security
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── view_books.php         UPDATED — with search feature
│   │       ├── insert_book.php        UPDATED — prepared statements + validation
│   │       └── update_book.php        UPDATED — prepared statements
│   ├── screenshots/
│   └── notes/
│
├── Week7/                             Authentication Enhancement
│   ├── project_files/
│   │   └── unclesam_bookstore/
│   │       ├── process_login.php      UPDATED — prepared stmt + brute force protection
│   │       └── login.php              UPDATED — shows lockout message
│   ├── screenshots/
│   └── notes/
│
└── Week8/                             Responsive Web Design
    ├── project_files/
    │   └── unclesam_bookstore/
    │       ├── showcase.php           NEW — responsive book showcase (CSS Grid)
    │       └── style.css              UPDATED — mobile-first media queries
    ├── screenshots/
    └── notes/
```

---

 🗄️ Database Structure

 Database Name: `unclesam_bookstore_db`

 Table: `users`

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

| Column | Type | Description |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key — unique user ID |
| fullname | VARCHAR(100) | User's full name |
| email | VARCHAR(100) UNIQUE | User's email address |
| username | VARCHAR(50) UNIQUE | Chosen username for login |
| password | VARCHAR(255) | Hashed password (password_hash) |
| created_at | TIMESTAMP | Date and time account was created |

 Table: `books`

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

| Column | Type | Description |
|---|---|---|
| id | INT AUTO_INCREMENT | Primary key — unique book ID |
| title | VARCHAR(255) | Book title |
| author | VARCHAR(255) | Author name |
| category | VARCHAR(100) | Book category (e.g. Fiction, Programming) |
| price | DECIMAL(10,2) | Price in KSH |
| quantity | INT | Number of copies in stock |
| created_at | TIMESTAMP | Date and time book was added |

---

 ⚙️ How to Run This Project Locally

Follow these steps exactly:

 Step 1 — Install XAMPP
Download and install XAMPP from:
```
https://www.apachefriends.org
```

 Step 2 — Start XAMPP Services
Open XAMPP Control Panel and click Start for:
- ✅ Apache
- ✅ MySQL

 Step 3 — Download This Repository
Click the green Code button on this page → Download ZIP

Extract the ZIP and copy the `unclesam_bookstore` folder from the latest week (Week8) into:
```
C:\xampp\htdocs\
```

 Step 4 — Create the Database
Open your browser and go to:
```
http://localhost/phpmyadmin
```

Click New on the left and create a database named:
```
unclesam_bookstore_db
```

 Step 5 — Create the Tables
Click the SQL tab and run this to create the users table:

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

Then run this for the books table:

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

 Step 6 — Add Sample Data (Optional)
To populate the bookstore with sample books, run this SQL:

```sql
INSERT INTO books (title, author, category, price, quantity) VALUES
('Introduction to Algorithms', 'Thomas Cormen', 'Computer Science', 3500.00, 8),
('Clean Code', 'Robert Martin', 'Programming', 2800.00, 12),
('Things Fall Apart', 'Chinua Achebe', 'Fiction', 850.00, 25),
('A Brief History of Time', 'Stephen Hawking', 'Science', 1500.00, 10),
('Rich Dad Poor Dad', 'Robert Kiyosaki', 'Finance', 1200.00, 18),
('The Alchemist', 'Paulo Coelho', 'Fiction', 950.00, 20),
('Database Systems', 'Raghu Ramakrishnan', 'Computer Science', 4200.00, 6),
('Atomic Habits', 'James Clear', 'Self Help', 1750.00, 15);
```

 Step 7 — Open the System
Open your browser and go to:
```
http://localhost/unclesam_bookstore/login.php
```

 Step 8 — Register and Login
1. Click Create Account to register a new user
2. Fill in your full name, email, username, and password
3. Click Create Account
4. You will be redirected to login — enter your credentials
5. The Dashboard will open

---

 🔒 Security Features Implemented

| Security Measure | How It Is Implemented |
|---|---|
| Password Hashing | `password_hash($password, PASSWORD_DEFAULT)` |
| Password Verification | `password_verify($password, $hashed)` |
| SQL Injection Prevention | Prepared statements with `bind_param()` in all database queries |
| Server-Side Validation | PHP checks on all form inputs before database operations |
| Session Protection | `$_SESSION['user_id']` check on every protected page |
| Brute Force Protection | Login locked for 60 seconds after 3 failed attempts |
| XSS Prevention | `htmlspecialchars()` used on all output from database |
| Secure Logout | `session_destroy()` clears all session data |

---

 📱 Responsive Design Breakpoints

| Device | Screen Width | CSS Grid Columns |
|---|---|---|
| Mobile (default) | 0px — 767px | 1 column |
| Tablet | 768px and above | 2 columns |
| Laptop | 1024px and above | 3—4 columns |
| Desktop | 1440px and above | 4 columns |

---

 📅 Weekly Development Progress

| Week | Title | Key Work Done |
|---|---|---|
| Week 1 | Local Environment Setup | XAMPP installed and tested, localhost confirmed, Hello World PHP page, database created, db_connect.php tested |
| Week 2 | Wireframes and GUI Design | Figma wireframes for Login, Register, Dashboard, Add Book, Mobile View, Color Theme, Navigation Flow |
| Week 3 | Frontend and Backend Basics | HTML/CSS login and register pages, JavaScript validation, password strength checker, PHP input handling |
| Week 4 | Authentication System | Users table, registration with password hashing, login with sessions, protected dashboard, logout |
| Week 5 | CRUD Operations | Books table, Add/View/Edit/Delete book functionality, full CRUD tested, database backup exported |
| Week 6 | Advanced CRUD and Security | Search feature on View Books, server-side validation, prepared statements in insert and update files |
| Week 7 | Authentication Enhancement | Brute force protection on login, SQL injection fix in process_login using prepared statements, lockout message |
| Week 8 | Responsive Web Design | Mobile-first media queries in style.css, new responsive Book Showcase page using CSS Grid, Chrome DevTools testing |

---

 🎨 Color Theme

| Color Name | Hex Code | Used For |
|---|---|---|
| Dark Navy | `1a1a2e` | Page background |
| Dark Blue | `16213e` | Cards and containers |
| Deep Blue | `0f3460` | Input fields |
| Red Accent | `e94560` | Buttons, titles, highlights |
| Teal | `4ecca3` | Links, success messages |
| Light Blue | `a8b2d8` | Body text and labels |

---

 📂 Key Files Explained

| File | Purpose |
|---|---|
| `db_connect.php` | Connects PHP to MySQL and starts the session |
| `login.php` | Login form with brute force lockout display |
| `process_login.php` | Verifies credentials using prepared statements and manages login attempts |
| `register.php` | Registration form with password strength checker |
| `register_process.php` | Inserts new users with hashed passwords |
| `dashboard.php` | Protected main menu — only accessible after login |
| `logout.php` | Destroys session and redirects to login |
| `add_book.php` | Form to add new books to inventory |
| `insert_book.php` | Processes add book form with validation and prepared statements |
| `view_books.php` | Displays all books with search functionality |
| `edit_book.php` | Loads existing book data into an editable form |
| `update_book.php` | Updates book record using prepared statements |
| `delete_book.php` | Deletes a book record with session protection |
| `showcase.php` | Responsive book showcase using CSS Grid |
| `style.css` | Global stylesheet with mobile-first media queries |
| `script.js` | JavaScript form validation for login and registration |
| `password_checker.html` | Standalone password strength testing page |

---

 🧪 Testing

The system was tested for:

- ✅ Correct registration and login flow
- ✅ Password hashing and verification
- ✅ Session creation and protection
- ✅ Brute force lockout after 3 failed attempts
- ✅ SQL injection attempts blocked by prepared statements
- ✅ Server-side validation rejecting invalid data (zero price, negative quantity)
- ✅ Search filtering by title, author and category
- ✅ Full CRUD cycle (Create, Read, Update, Delete) on books
- ✅ Responsive layout on mobile (iPhone SE), tablet (iPad Air), and desktop
- ✅ Logout and session destruction

---

 📸 Screenshots

All screenshots are documented week by week in the practical logbook submitted alongside this project.

---

 🤝 Acknowledgements

- Lecturer: Mr. Nyoro — for project guidance and the weekly course material
- Mount Kenya University — BIT3208 Advanced Web Design and Development
- Tools: XAMPP, Visual Studio Code, Figma, phpMyAdmin, GitHub, Chrome DevTools

---

 📄 License

This project was developed for academic purposes as part of the BIT3208 unit at Mount Kenya University. All rights reserved to the developer.

---

*Developed by Samuel Muthee Wainaina | BBIT/2024/55411 | Mount Kenya University*

*BIT3208 — Advanced Web Design and Development | Year 3, Semester 2*
