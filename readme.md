<br>

# Laravel Backend API using passport

## 



### Installation

git clone git@github.com:rassloff/API_passport.git

sudo chmod -R 777 storage/

composer install

create a database

create a .env file

php artisan key:generate

php artisan passport:install

php artisan serve

if there were some problems, like:

RuntimeException: Personal access client not found. Please create one.

php artisan migrate:fresh

php artisan passport:install

or

php artisan passport:client --personal

create some dummy users

composer dump-autoload

php artisan db:seed


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
