# Blockonomics Payment Button API Demo in Laravel

This demo uses the Payment Button API provided by Blockonomics to receive Bitcoin payments. It can be easily integrated with your online store. 

## Installing Guide

```
git clone https://github.com/AJ-54/Blockonomics_Payment_Button_Demo.git
cd Blockonomics_Payment_Button_Demo
composer install
npm install
cp .env.example .env
php artisan key:generate
```

By now, you have installed all the dependencies and also created copy of the .env file. In the .env file, add database information to allow Laravel to connect to the database. In the .env file fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. This will allow us to run migrations in the next step.

```
php artisan migrate
php artisan serve
```

Now you are all set to locally run the demo!
