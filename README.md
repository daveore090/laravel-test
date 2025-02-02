# OTP Verification System

## Overview
This project is an OTP (One-Time Password) verification system built with **Laravel 11, Livewire Volt, and Alpine.js**. It allows users to generate and verify OTPs for authentication via email or SMS.

---

## Features
- Secure OTP generation and verification
- OTP expiration handling (15 minutes validity)
- Auto-focus and paste functionality for OTP input
- Rate limiting to prevent brute-force attacks
- Livewire and Alpine.js integration for real-time interactions

---

## Installation

### **Step 1: Clone the Repository**
```bash
git clone https://github.com/your-username/otp-system.git
cd otp-system
```

### **Step 2: Install Dependencies**
```bash
composer install
npm install && npm run build
```

### **Step 3: Set Up Environment Variables**
Copy the `.env.example` file and update the database credentials:
```bash
cp .env.example .env
```
Then update these values in the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=otp_system
DB_USERNAME=root
DB_PASSWORD=
```

### **Step 4: Run Migrations**
```bash
php artisan migrate
```

### **Step 5: Install Livewire & Volt**
```bash
php artisan volt:install
```

### **Step 6: Start the Server**
```bash
php artisan serve
```
Your application should now be running at: **http://127.0.0.1:8000**

---

## Usage

### **1. Generate an OTP (For Testing Purposes)**
Open Laravel Tinker:
```bash
php artisan tinker
```
Run the following command to generate an OTP for a user (assuming a user with ID 1 exists):
```php
$user = \App\Models\User::find(1);
$user->generateOTP();
```
Retrieve the OTP:
```php
\App\Models\OTP::latest()->first();
```
Copy the **OTP code** from the output and use it in the frontend OTP input.

### **2. Verify the OTP**
- Go to `http://127.0.0.1:8000/otp-verification`
- Enter the OTP manually (or paste it).
- The system will automatically verify it.

---
## Assumptions & Technical Decisions
- OTPs are valid for **15 minutes**.
- OTPs can be sent via **email or SMS** (not implemented yet, but easy to integrate with services like Twilio or Mailgun).
- Using **Livewire + Alpine.js** for frontend interactions.

---





