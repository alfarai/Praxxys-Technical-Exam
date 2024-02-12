# Praxxys Technical Exam

My submission for Praxxys Internship as BE Developer by Benito Male

# Installation

To install and run on a local machine:
1. Setup XAMPP Environment: https://www.apachefriends.org/
2. Download Composer: https://getcomposer.org/
3. Download Visual Studio Code: https://code.visualstudio.com/
4. Download this Github project
5. Open /xampp/htdocs/ directory in the file explorer and extract the zip file here
6. Open VS Code and drag and drop the project repository under /xampp/htdocs/ to the window
7. Setup appropriate .env configurations to connect the app to a local database made in http://localhost/phpmyadmin/ (Also start the Apache and MySQL services in XAMPP control panel)
8. In VS Code, run the following commands in the terminals:

```
npm run build
npm run dev

```

```
php artisan serve

```

#Populating the database
To populate the database, run the following commands in VS Code terminals:
```
php artisan db:seed
php artisan db:seed --class=ProductsSeeder

```
The first command populates the default user database, while the second command populates the products database.

#INCASE IMAGES DON'T WORK
Delete /storage folder under /public, then run the following command:
```
php artisan storage:link
```

#Credits
This application was developed using the Laravel 10 framework with Vue, designed with Bootstrap 5
	





