[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ed723c215dbf4468af34e1e9616b249b)](https://www.codacy.com/gh/bigben35/OCR_5_Blog/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=bigben35/OCR_5_Blog&amp;utm_campaign=Badge_Grade)

# OCR_5_Blog

Project 5 DA PHP/Symfony. This project involves creating a Blog using HTML5, CSS3, PHP, SQL, and JavaScript.

# Installation :
composer : https://getcomposer.org/download/

Download and run Composer-Setup.exe.

Run composer install.

Run composer init in your terminal.

In your command terminal, type composer to verify if the dependency manager has been installed successfully.

# Environment Variables:
This can be achieved using Dotenv: run composer require vlucas/phpdotenv.

Create a .env file at the project's root, using .env.example as a template to connect to your database.

Edit the .env file with the connection values for your database:

DB_HOST=your_host
DB_PORT=your_port
DB_USERNAME=username
DB_PASSWORD=password
DB_NAME=dbname

APP_ENV=development

# Error Handling with Whoops:
Run composer require filp/whoops.

Run composer update to update the installation with the new package.


# Project Installation:
Clone the project using git clone https://github.com/bigben35/OCR_5_Blog.git in your IDE (e.g., VSCode).

I used XAMPP for my local server and phpMyAdmin for database management.

I used PHP 8 (Version php 8.0.12 on my side).

Import the blog-ocr-version-finale.sql into your database.

# Starting the Project:
I'm using XAMPP with an Apache server. I have an .htaccess file for URL rewriting. You can run the project on your localhost: **http://localhost/folder-name/home**. You can also find it hosted here: **https://www.josselin-crenn.fr/webcode/**

To log in as an admin, use the following credentials: email: **jojo@gmail.com** and password: **azerty**, or modify the role (set to 1) in the database as needed.

