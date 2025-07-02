# 2-Tier Architecture Deployment Using AWS

## 📌 Project Overview

This project demonstrates the deployment of a 2-tier architecture on AWS using EC2 instances and a remote database. It consists of:

- **Web Tier (Frontend)**: Hosts the HTML form using NGINX.
- **App Tier (Backend + DB)**: Handles the form data using PHP and stores it in a database (MySQL or MariaDB on EC2 or RDS).

---

## 📂 Architecture Components

### 1️⃣ Web Instance (Frontend)
- Hosted on EC2 (Ubuntu)
- NGINX to serve `form.html`
- Sends form data to App Tier via HTTP POST

### 2️⃣ App Instance (Backend + Database)
- Hosted on EC2 (Ubuntu)
- PHP backend (`submit.php`)
- MySQL or MariaDB installed
- Stores submitted form data in the `users` table

---

## 📁 Directory Structure

project-directory/
├── form.html
├── submit.php
└── README.md


---

## ⚙️ Technologies Used

- **AWS EC2** (Ubuntu 22.04)
- **NGINX**
- **PHP 8.x**
- **MySQL / MariaDB**
- **Security Groups for tier isolation**

---

## 🔐 Security Group Configuration

### Web SG
- Inbound:
  - Port 80 (HTTP) - from Anywhere
- Outbound:
  - Allow HTTP (Port 80) to App SG

### App SG
- Inbound:
  - Port 80 - from Web SG
  - Port 3306 (MySQL) - from itself or admin IP
- Outbound:
  - Allow all traffic or specific to DB if RDS used

---

## 🧩 Connectivity Flow

[User Browser]
↓ (HTTP)
[Web EC2 (NGINX)]
↓ (POST)
[App EC2 (PHP + DB)]
↓
[Database (MySQL/MariaDB)]

🚀 Deployment Steps
Launch 2 EC2 Instances: Web & App

Configure SGs for isolated communication

Install necessary packages:

Web: nginx

App: php, mysql-server or mariadb-server

Copy form.html to /var/www/html on Web instance

Copy submit.php to /var/www/html on App instance

Start services and test from browser

✅ Outcome
Data submitted through form.html is stored in the App server’s database.

Clear segregation between frontend and backend layers.

Secure and scalable foundation for multi-tier applications.
