# Laravel Breeze Installation Guide – Laravel-ETEC-2

## ⚙️ PHP Extensions Setup

Before installing, open the `php.ini` file in the `xampp/php` directory and **remove the semicolon (`;`)** from the following extensions:

```ini
;extension=ffi  
;extension=ftp  
;extension=zip  
```

Make sure they are enabled (remove the `;`).

---

## 🛠️ Required Tools

Make sure the following are installed:
- [Composer](https://getcomposer.org/)
- [Laravel Installer](https://laravel.com/docs/installation)
- [Node.js](https://nodejs.org/)
- [XAMPP](https://www.apachefriends.org/)

Install the Laravel installer globally:

```bash
composer global require laravel/installer
```

---

## 🚀 Project Setup

1. **Clone the repository:**

```bash
git clone https://github.com/HickSouldrow/Laravel-ETEC-2
cd Laravel-ETEC-2
```

2. **Install dependencies:**

```bash
npm install
composer install
```

3. **Set up the environment file:**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Run migrations:**

```bash
php artisan migrate
```

---

## 🌐 Laravel Breeze Installation

1. **Install Breeze via Composer:**

```bash
composer require laravel/breeze --dev
```

2. **Run Breeze installer:**  
(Choose "blade", "yes", and "phpunit" when prompted)

```bash
php artisan breeze:install
```

3. **Run migrations again (if needed):**

```bash
php artisan migrate
```

4. **Compile front-end assets:**

```bash
npm run dev
```

(Leave the terminal open while it compiles; it watches for changes.)

---

## ✅ Run the Application

Finally, start the Laravel server:

```bash
php artisan serve
```

Open the URL shown (usually `http://127.0.0.1:8000`) to access the project.

---

## 📌 Repository

[GitHub – Laravel-ETEC-2](https://github.com/HickSouldrow/Laravel-ETEC-2)

---

Feel free to modify or expand this README as needed.


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
