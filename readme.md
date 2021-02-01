# Blockonomics Payment Button API Demo in Laravel

This demo uses the Payment Button API provided by Blockonomics to receive Bitcoin payments. It can be easily integrated with your online store. The video tutorial for this demo can be found [here]( https://www.youtube.com/watch?v=1sE2r5tDkNY).

## Installing Guide


* `git clone https://github.com/AJ-54/Blockonomics_Payment_Button_Demo.git`
* `cd Blockonomics_Payment_Button_Demo`
* `composer install`
* `npm install`
* `cp .env.example .env`
* `php artisan key:generate`
* By now, you have installed all the dependencies and also created copy of the .env file. 
* In the .env file, add database information to allow Laravel to connect to the database, fill in the `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` options to match the credentials of the database you just created. 
* Place your Blockonomics API Key in the `Blockonomics_API` field. This will allow us to run migrations in the next step.
* `php artisan migrate`
* `php artisan storage:link`
* Create your payment button from [here](https://www.blockonomics.co/merchants) by going to PAYMENT BUTTONS/URL tab. Get the button code to paste in the html page from step 01.
* Head to [this line](https://github.com/AJ-54/Blockonomics_Payment_Button_Demo/blob/main/resources/views/home.blade.php#L44) and replace the payment button code with your code.
* Go to `OPTIONS` in the PAYMENT BUTTONS/URL tab on [this page](https://www.blockonomics.co/merchants#/page3). You need to setup the `ORDER HOOK URL` and `Redirection URL`.
* To test the code locally, follow instructions from [this](https://www.youtube.com/watch?v=6Ydk32avIgo) video and make sure to place the `<domain>/receive` as your order hook url and `<domain>/home` as redirection url. Here `<domain>` is the domain you get from reverse proxy (Ngrok/localtunnel).
* Please make sure you are using `http` and not `https`. Your domain would be in `https` but place `http` URL in the order hook url and redirection url. 
* Make sure to save your changes!
* `php artisan serve`

Now you are all set to locally run the demo!
