## Installation Guid


- Download the Project file
- Create .env file in root folder
- Run Command npm install
- Run command npm run dev 
- Run composer install
- Run php artisan storage:link

## Generate App Key
- php artisan key:generate

-

## (.env) file updates


create below rows in your .env file

- APP_URL=(http://url)
- Create Database Connection
- MAIL_DRIVER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=your gmail account
- MAIL_PASSWORD=your gmail password
- MAIL_ENCRYPTION=tls


## Database Migration and Seeding Data
- php artisan migrate --seed


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
