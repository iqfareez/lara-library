# Library System

Laravel training by [Mr. Ahmad Saiful Bahri](https://github.com/epool86)\
Date: 23 & 24 August 2023\
Platform: Online

## Notes

### View all routes

```bash
php artisan route:list
```

### Naming Convention

`PascalCase`

### Create migration file in DB

```bash
php artisan migrate:install
```

### Debug print in blade

```php
@dd(Auth::user())
```

### Create model with migration file

```bash
php artisan make:model Book -m
```

Then, edit the migration file to add columns etc. Finally, run

```bash
php artisan migrate
```

## Screenshots

### Register/login screen

<img width="1440" alt="Screenshot 2023-08-25 at 4 24 12 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/802ab223-c87d-4955-9fd6-0c4c0bd918fe">

### User homepage

<img width="1440" alt="Screenshot 2023-08-25 at 4 24 31 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/018e22a6-7492-41ad-b97a-9e0922451b7f">

### User borrowed books

<img width="1440" alt="Screenshot 2023-08-25 at 4 24 38 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/07a33649-898e-41a0-8e0a-c993a3fcfed8">

### Profile screen

<img width="1440" alt="Screenshot 2023-08-25 at 4 24 55 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/5124cb17-120b-4663-8635-062beb3da28c">

### Book search

<img width="1440" alt="Screenshot 2023-08-25 at 4 24 48 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/26368ebf-3097-41fa-82a0-949c822fa33e">

### [Admin] Dashboard

<img width="1440" alt="Screenshot 2023-08-25 at 4 26 21 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/653fecbe-4ed8-48df-bceb-70ac42600b58">

### [Admin] Manage books

<img width="1440" alt="Screenshot 2023-08-25 at 4 26 29 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/22179854-b955-4fb3-b989-fa6989c5bd76">

### [Admin] User Management

<img width="1440" alt="Screenshot 2023-08-25 at 4 27 09 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/27be250a-aead-4fe3-b34c-0eedaa28faf2">

### [Admin] Add/edit book

<img width="1440" alt="Screenshot 2023-08-25 at 4 26 54 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/132824a9-8f18-4812-b601-613b4dd72805">

### [Admin] List of transactions (borrowed/returned books)

<img width="1440" alt="Screenshot 2023-08-25 at 4 27 00 PM" src="https://github.com/iqfareez/lara-library/assets/60868965/ee260493-a284-400a-8c05-f8fe03810499">

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
-   **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
