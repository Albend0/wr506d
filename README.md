# Symfony Movie App 

## Installation
Download Composer and use the composer binary installed on your computer

Run : 
```git clone https://github.com/Albend0/wr506d.git```
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

Download Symfony CLI and run this command:
```
$ cd wr506d/
$ symfony server:start
```
