# 🏥 Hospital Management System (HMS)

> Enterprise-level Backend System built with Laravel to streamline hospital operations, inventory, and patient care.

## 🚀 The Challenge & Solution

### The Problem
The hospital was operating on a **legacy paper-based system**, leading to:
- ❌ High risk of patient record loss and data errors.
- ❌ Inefficient inventory management (stockouts & overstocking).
- ❌ Lack of transparency in procurement and tenders.
- ❌ Slow decision-making due to fragmented data.

### The Engineering Solution
I built a centralized **Digital Transformation Platform** to replace the manual workflow.

**Key Technical & Operational Challenges Solved:**
1.  **Paperless Transition:** Designed intuitive digital workflows to ensure staff adoption and minimize training time (UX Awareness).
2.  **Inventory Accuracy:** Implemented a multi-level warehouse system (Central + Departmental) with automated alerts to prevent stock discrepancies.
3.  **Data Integrity:** Used database transactions and constraints to ensure critical health and inventory data is never corrupted.
4.  **Security & Privacy:** Enforced strict Role-Based Access Control (RBAC) to protect sensitive patient information.

### Impact
- 📉 Reduced manual errors in inventory by estimating 90%.
- ⚡ Instant access to patient records instead of physical file retrieval.
- 📊 Real-time dashboard for administration to monitor hospital performance.
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
