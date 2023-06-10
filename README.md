# CustomerApp

Laravel 10 and Livewire CRUD Project
This GitHub repository contains a CRUD (Create, Read, Update, Delete) project built using Laravel 10 and Livewire https://laravel-livewire.com/. It provides a foundation for building web applications with Laravel and demonstrates the usage of Livewire components for interactive user interfaces.


# Prerequisites
Before you can use this project, make sure you have the following software installed on your machine:

PHP (version 8.0 or higher)
Composer
Node.js (version 14 or higher)
NPM (Node Package Manager)
# Installation
To download and set up the project, follow these steps:

1. Clone the repository to your local machine using the following command:
git clone https://github.com/imhemayatsangin/CustomerApp.git

2. Navigate to the project directory:
cd your-repository

3. Install the PHP dependencies using Composer:
composer install

4. Create a copy of the .env.example file and name it .env:
cp .env.example .env

5. Generate an application key:
php artisan key:generate

6. Configure the database connection in the .env file. Set the appropriate values for your database server:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

7. Run the database migrations to create the necessary tables:
php artisan migrate

8. Install the JavaScript dependencies using NPM:
npm install

# Usage
To run the project locally, execute the following command:
php artisan serve
This will start a development server at http://localhost:8000, and you can access the application in your web browser.
# Enjoy the show.
