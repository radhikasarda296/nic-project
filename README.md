# Project Tile
Excel File Upload
# Project Overview
This project aims to develop a robust web application using Laravel 10 framework, focusing on managing Excel file uploads, user authentication, role-based access control (RBAC), and providing a RESTful API for fetching Excel data. The application ensures secure handling of user credentials and data storage in a PostgreSQL database.
## Technologies Used
- Backend: Laravel 10
- Frontend: Blade, HTML, CSS, Bootstrap, Vanilla JS
- Database: PostgreSQL
## Prerequisites
Ensure you have the following installed and configured:
- PHP - v8.3
- Composer v2.7
- PostgreSQL
## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/radhikasarda296/nic-project.git
   cd nic-project
2. **Install PHP dendencies:**
    ```bash
    composer install
3. **Copy environment file:**
    ```bash
    cp .env.example .env
4. **Generate application key:**
    ```bash
    cp .env.example .env
5. **Configure Database:**
   - Create a new PostgreSQL database.
   - Update .env file with database credentials:
    ```bash
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
6. **Define Swagger Host:**
  - Update .env file with swagger host:
    ```bash
    L5_SWAGGER_CONST_HOST=http://localhost:8000/api
7. **Run Migrations & Seeders:**
    ```bash
    php artisan migrate
    php artisan db:seed
8. **Serve the application:**
    ```bash
    php artisan serve
9. **Access the application:**    
Open your web browser and go to http://localhost:8000 to view the application.

## Usage
Open your web browser and go to http://localhost:8000. We have two options here: LogIn & Register
1. **Register:** 
  - Enter name,email,phone number,password & select a role from the dropdown.<br>
  - Click on Register (This will auto login and open dashboard)
2. **Login:** 
  - Enter email,password & Click on Login
3. **Upload Excel File:**
  - If you have selected Admin/Uploader Role then in dashboard you will see Import Excel functionality.<br>
  - You can select a file from the "Choose File" option.<br>
  - This will display the content of the excel file in a table format with a "Import Excel" button in the end.<br>
  - Click on the button to import the excel.<br>
  - On successfull upload, a message will be displayed "Data imported successfully".
4. **Profile:**
  - This page shows account information like name,email & phone number.
  - We can edit name and phone number and click on "Save Changes" to update Profile.
5. **View Uploaded Files:**
  - This page shows the list of uploaded excel files in a tabular format.
6. **Reset Password**
  - Enter Current password, New Password and retype new password and click on "Reset Password".
7. **Logout**
  - To logout from the application, click on Logout.

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
