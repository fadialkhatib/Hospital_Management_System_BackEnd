# 🏥 Hospital Management System (HMS)

> Enterprise-level Backend System built with Laravel to streamline hospital operations, inventory, and patient care.

## 🎯 The Challenge
Hospitals need a unified system that handles sensitive patient data while managing complex logistics like multi-level inventory, tenders, and departmental supplies without data redundancy.

## 🛠️ Tech Stack
- **Backend:** Laravel 10/11
- **Database:** MySQL (Complex Relationships)
- **Authentication:** Laravel Sanctum / Breeze (RBAC)
- **Frontend:** Blade / Livewire (or API Ready for Frontend)
- **Tools:** Git, Postman, Docker

## ✨ Key Features

### 🏥 Patient Management
- Full Electronic Health Records (EHR)
- Admission, Discharge, Transfer (ADT) workflow
- Medical history tracking

### 📦 Advanced Inventory System
- **Central Warehouse:** Main storage management.
- **Departmental Warehouses:** Rotating stock for each department.
- **Auto-Alerts:** Notifications for low stock levels.
- **Transactions:** Track Input, Output, Transfer, and Damage.

### 🤝 Procurement & Tenders
- Supplier management & evaluation.
- Tender bidding system.
- Contract lifecycle management.

### 📊 Analytics Dashboard
- Real-time statistics for bed occupancy.
- Inventory turnover rates.
- Financial reports on procurement.

## 🏗️ Architecture Highlights
- **RBAC:** Granular permissions (Admin, Doctor, Nurse, Warehouse Manager, Supplier).
- **Data Integrity:** Database transactions for critical inventory operations.
- **Security:** Encrypted patient data, secure API endpoints.
- **Scalability:** Repository Pattern for clean data access.


## 🚀 Installation
```bash
git clone https://github.com/fadialkhatib/Hospital_Management_System_BackEnd.git
composer install
cp .env.example .env
php artisan migrate --seed
php artisan serve
