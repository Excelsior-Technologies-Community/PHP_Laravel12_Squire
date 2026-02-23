# PHP_Laravel12_Squire
This document provides a complete end‑to‑end setup guide for building a Laravel project called **Squire Management System**.

The system demonstrates:

* One‑to‑Many Relationship (Knight → Squires)
* Full CRUD Operations
* Validation
* Pagination
* Factories & Seeders
* Bootstrap 5 UI
* Optional Authentication using Laravel Breeze

---

## PREREQUISITES

Before starting, ensure you have:

* PHP 8.1 or higher
* Composer installed
* MySQL / PostgreSQL / SQLite
* Node.js and NPM (for frontend assets)

---

## STEP 1 – Create New Laravel Project

composer create-project laravel/laravel squire-project
cd squire-project

Optional: Install Authentication (Recommended)

composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run dev

---

## STEP 2 – Configure Database

Open .env file and update:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=squire_db
DB_USERNAME=root
DB_PASSWORD=yourpassword

Create database manually:

CREATE DATABASE squire_db;

---

## STEP 3 – Create Migrations

Create tables:

php artisan make:migration create_knights_table
php artisan make:migration create_squires_table

Knights Table Fields:

* id
* name
* age
* title (nullable)
* weapon (nullable)
* experience_years (default 0)
* timestamps

Squires Table Fields:

* id
* name
* age
* training_level (beginner, intermediate, advanced)
* knight_id (foreign key, cascade delete)
* timestamps

Run migrations:

php artisan migrate

---

## STEP 4 – Create Models

Knight Model:

* fillable fields
* hasMany relationship with Squire

Squire Model:

* fillable fields
* belongsTo relationship with Knight

Relationship:
Knight → hasMany → Squires
Squire → belongsTo → Knight

---

## STEP 5 – Create Controllers

php artisan make:controller KnightController --resource
php artisan make:controller SquireController --resource

KnightController Handles:

* index (list knights + squires)
* create
* store (with validation)
* show
* edit
* update
* destroy

SquireController Handles:

* index
* create
* store
* show
* edit
* update
* destroy

Validation Examples:

Knight:

* age between 18–100
* experience_years between 0–70

Squire:

* age between 10–30
* training_level required (enum)
* knight_id must exist

---

## STEP 6 – Define Routes

Route::resource('knights', KnightController::class);
Route::resource('squires', SquireController::class);

Optional dashboard route if using auth.

---

## STEP 7 – Create Views (Bootstrap 5)

Directory Structure:

resources/views/
layouts/app.blade.php
knights/
squires/

Features:

* Navigation bar
* Flash success messages
* Paginated tables
* Create & Edit forms
* Delete confirmation

---

## STEP 8 – Factories and Seeders

Create factories:

php artisan make:factory KnightFactory --model=Knight
php artisan make:factory SquireFactory --model=Squire

Seeder:

php artisan make:seeder KnightSeeder

Seeder Logic:

* Create 10 knights
* Each knight gets 1–3 squires

Run seeder:

php artisan db:seed --class=KnightSeeder

---

## STEP 9 – Run Application

php artisan serve

If using Breeze:

npm run dev

Visit:
[http://localhost:8000](http://localhost:8000)
<img width="1667" height="860" alt="image" src="https://github.com/user-attachments/assets/2c4341f3-2b48-45f9-a04c-726a9cd20da0" />
<img width="1604" height="875" alt="image" src="https://github.com/user-attachments/assets/81799272-cbf5-4767-998a-f21f89a3b6aa" />

---

## STEP 10 – Testing Checklist

* Create Knight
* Edit Knight
* Delete Knight
* Assign Squires
* Edit Squire
* Delete Squire
* Verify Cascade Delete
* Verify Pagination

---

## USEFUL ARTISAN COMMANDS

php artisan route:list
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan make:migration add_field_to_knights_table
php artisan test
php artisan tinker

---

## PROJECT STRUCTURE SUMMARY

squire-project/
├── app/
│   ├── Http/Controllers/
│   │   ├── KnightController.php
│   │   └── SquireController.php
│   └── Models/
│       ├── Knight.php
│       └── Squire.php
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── knights/
│   ├── squires/
│   └── layouts/
└── routes/web.php

---

## FEATURES IMPLEMENTED

* Full CRUD (Knights & Squires)
* One-to-Many Relationship
* Form Validation
* Pagination
* Bootstrap UI
* Database Seeding
* Authentication (Optional)

---

## POSSIBLE EXTENSIONS

* REST API version
* Role-based access control
* Soft deletes
* Activity logs
* Dashboard statistics
* Search and filtering
* Unit & feature tests

---

## SUMMARY

This Laravel Squire Management System is a complete example project demonstrating clean architecture, proper relationships, validation, seeding, and UI integration.

It is suitable for:

* Learning Laravel fundamentals
* Academic projects
* Portfolio demonstration
* Interview preparation

End of Documentation

