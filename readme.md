<br>

# Laravel Backend REST API using passport return JSON

this is an open source project, for understanding the REST API communication

between Frontend and Backend



## Frontend could be a SPA maybe in Ember-JS, VUE-JS or other JS-App



### Installation maybe for example on a Ubuntu Linux LAMP System

git clone git@github.com:rassloff/Laravel_Backend.git

cd Laravel_Backend

chmod -R 777 storage/

composer install

create a database

create a .env file

cp .env.example .env

php artisan key:generate


php artisan serve (local mac / linux)

config your webserver( apache or nginx ) document root to public

if apache:

<Directory /var/www/Laravel_Backend/public/>
                Options Indexes FollowSymLinks
                AllowOverride All
                Require all granted
                Order allow,deny
                allow from all
</Directory>

php artisan migrate

php artisan passport:install


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
+ `302 Found is a common way of performing URL redirection` 
+ `400 Bad Request` - Malformed request; form validation errors.
+ `401 Unauthorized` - When no or invalid authentication details are provided.
+ `403 Forbidden` - When authentication succeeded but authenticated user doesn't have access to the resource.
+ `404 Not Found` - When a non-existent resource is requested.
+ `405 Method Not Allowed` - Method not allowed.
+ `419 Authentication Timeout` - Auth Error
+ `422 Unprocessable Entity` - ???

## cURL code

curl -X GET -H 'Accept: application/vnd.api+json' -H "Content-Type:application/vnd.api+json"   http://localhost:8000/users

curl http://localhost:8000/movies

curl http://localhost:8000/projects

curl http://localhost:8000/users

### Data Model

User / Project - many to many

User / Movie - one to many



### Authentication with PASSPORT

## Support or Helping ?!

connect me on GitHub or Linkedin

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
