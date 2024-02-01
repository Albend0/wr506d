# Symfony Movie App 

## Installation
Download Composer and use the composer binary installed on your computer

Run : 
```git clone https://github.com/Albend0/wr506d.git my_project```
```
$ cd my_project/
$ composer install
# create the database
$ php bin/console doctrine:database:create
$ php bin/console make:migration
$ php bin/console doctrine:migrations:migrate
```
## Usage
There's no need to configure anything before running the application. There are 2 different ways of running this application depending on your needs:

Option 1. Download Symfony CLI and run this command:
```
$ cd my_project/
$ symfony server:start
```
Then access the application in your browser at the given URL (http://127.0.0.1:8000/ by default).

Option 2. Use a web server like Nginx or Apache to run the application (read the documentation about configuring a web server for Symfony).

On your local machine, you can run this command to use the built-in PHP web server:
```
$ cd my_project/
$ php -S localhost:8000 -t public/
```
