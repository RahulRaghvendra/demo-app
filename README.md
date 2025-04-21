<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# Task Management System

A Laravel-based Task Management System with user authentication, role-based access, CRUD operations for tasks, and document upload functionality.

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL or any compatible database
- Node.js and NPM (for frontend assets if needed)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/your-username/demo-app.git
cd demo-app
```

2. Install dependencies:

```bash
composer install
npm install && npm run dev
```

3. Copy the example environment file and configure your environment:

```bash
cp .env.example .env
php artisan key:generate
```

4. Set up your `.env` file with correct database credentials.

5. Run migrations:

```bash
php artisan migrate
```

6. Generate the admin user by visiting the following route in your browser:

```
http://localhost/demo-app/generate-admin
```

This will create a user with the following credentials:

- **Email**: admin@admin.com  
- **Password**: 12345678

---

## 📦 Features

### ✅ User Authentication & Role-Based Access

- User registration and login using Laravel's built-in authentication.
- Roles: `admin`, `user` (with scope for `manager`, etc.)
- Role-based access to features and routes.

### ✅ Task Management

- Task attributes: `title`, `description`, `priority`, `deadline`, `status`
- CRUD operations for tasks:
  - **Create**: Add tasks with title, description, priority, deadline, and assigned users.
  - **Read**: View tasks created or assigned.
  - **Update**: Modify task details.
  - **Delete**: Remove tasks.

### ✅ Document Upload

- Attach and upload documents to tasks.
- Download attachments from the task view.

### ✅ Validation & Error Handling

- Validates inputs (e.g., deadline must be today or later, not past the current year).
- Graceful handling of unauthorized actions and missing resources.

---

## 📁 Folder Structure

- `app/Models`: Contains the Eloquent models.
- `app/Http/Controllers`: Contains application logic.
- `routes/web.php`: Web routes.
- `resources/views`: Blade templates for UI.

---

## 🛡️ Security

- Passwords are hashed using Laravel's hashing system.
- Access control enforced using middleware and role checks.

---

## 🧪 Testing

Coming soon...

---

## 🧑‍💻 Author

Developed by Rahul raghvendra.

---

## 📜 License

This project is open-sourced under the MIT license.