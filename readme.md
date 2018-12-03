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


## Representation of Date and Time

All exchange of date and time-related data MUST be done according to ISO 8601 standard and stored in UTC.

When returning date and time-related data `YYYY-MM-DD hh:mm:ss` format MUST be used.

## Status Codes and Errors

This API uses HTTP status codes to communicate with the API consumer.

+ `200 OK` - Response to a successful GET, PUT, PATCH or DELETE.
+ `201 Created` - Response to a POST that results in a creation.
+ `204 No Content` - Response to a successful request that won't be returning a body (like a DELETE request).
+ `400 Bad Request` - Malformed request; form validation errors.
+ `401 Unauthorized` - When no or invalid authentication details are provided.
+ `403 Forbidden` - When authentication succeeded but authenticated user doesn't have access to the resource.
+ `404 Not Found` - When a non-existent resource is requested.
+ `405 Method Not Allowed` - Method not allowed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
