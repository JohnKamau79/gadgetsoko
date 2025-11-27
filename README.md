# GadgetSoko

## Project Overview
**GadgetSoko** is an e-commerce platform for buying and selling gadgets online. Users can browse products, add them to their cart, and checkout securely. The platform includes an admin panel for managing products, orders, and retailers.

**Technologies Used:**
- Backend: Laravel, PHP 8.2
- Frontend: Blade, TailwindCSS, Alpine.js
- Database: MySQL
- Local Development: XAMPP, Composer, Node.js, NPM

---

## Development Journey

### **October 20, 2025**
- **Task:** Set up Laravel project and XAMPP environment.
- **Error:** PHP version mismatch with `maatwebsite/excel` package (requires PHP ^7.0, project uses PHP 8.2.12)
- **Fix:** Decided to either use a compatible version or choose a different package (later switched to `maatwebsite/excel 3.1 alternative compatible with PHP 8`).

### **October 21, 2025**
- **Task:** Created database `gadgetsoko` and set up `.env` file.
- **Fix:** Ensured correct DB username/password. Ran migrations successfully with `php artisan migrate`.

### **October 22, 2025**
- **Task:** Built product listing functionality.
- **Error:** Products were not showing in the Blade view.
- **Fix:** Corrected controller to pass products to view using `compact('products')`.

### **October 23, 2025**
- **Task:** Implemented user authentication.
- **Error:** Login failed due to bcrypt hash mismatch.
- **Fix:** Verified password hashing with Laravel's `Hash::make` and updated login logic.

### **October 24, 2025**
- **Task:** Added admin panel and user roles (Admin, Retailer, User).
- **Error:** Retailer role assignment was not saving to DB.
- **Fix:** Updated migration and controller logic to properly assign roles with `$user->assignRole('retailer')`.

### **October 25, 2025**
- **Task:** Made website responsive.
- **Error:** Hero section overlapped on mobile devices.
- **Fix:** Adjusted Tailwind classes using responsive utilities like `sm:`, `md:`, `lg:`.

### **October 26, 2025**
- **Task:** Added contact form with email sending functionality.
- **Error:** Emails were not sending in local XAMPP environment.
- **Fix:** Configured `MAIL_MAILER=smtp` in `.env` and tested with Gmail SMTP server.

### **October 27, 2025**
- **Task:** Merged homepage sections (About, Contact, Testimonials) into a single landing page.
- **Fix:** Resolved layout conflicts by creating separate Blade components and using Tailwind grid system.

### **October 28, 2025**
- **Task:** Added image upload functionality for products and team members.
- **Error:** Images not saving due to incorrect `storage:link`.
- **Fix:** Ran `php artisan storage:link` and updated file path references in Blade.

### **October 29, 2025**
- **Task:** Integrated search and filter for products.
- **Error:** Pagination broke after filter.
- **Fix:** Preserved query parameters in pagination links using `appends(request()->query())`.

### **October 30, 2025**
- **Task:** Final UI/UX improvements, added Tailwind color theme (teal/blue gradients).
- **Fix:** Adjusted spacing, hover effects, and responsive typography.

---

## Features
- User registration/login with role-based access
- Admin panel to manage products, orders, and retailers
- Product listing with search and pagination
- Cart and checkout system
- Responsive landing page with About, Contact, and Testimonials
- Image upload and storage handling
- Email notifications for contact form

---

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/username/GadgetSoko.git
