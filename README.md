## Installation Guid


- Download the Project file
- Create .env file in root folder
- Run Command npm install
- Run command npm run dev 
- Run composer install
- Run php artisan storage:link

## Generate App Key
- php artisan key:generate

## Database Migration and Seeding Data
- php artisan migrate --seed

## Pharmacy
- email => pharmacy@mail.com , password => password

## User
- email => user1@mail.com , password => password
- email => user2@mail.com , password => password

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


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
