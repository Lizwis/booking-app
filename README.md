# Booking App / Laravel / Vue.js

## Installation Api

- Clone this repository 
- navigate to the `api` directory
- Copy `.env` file: `cp .env.example .env`
- Set the environment variables in `.env` file
- Run command: `docker-compose up --build -d`
- Run the container in bash mode: `docker exec -it bookings-app /bin/sh`
- Inside this container now you can run all the commands as if if you are on local environment:
- Install composer dependencies: `composer install`
- Generate key: `php artisan key:generate`
- Run migration: `php artisan migrate`


## Installation vue App

- navigate to the `vue-app` directory
- make sure the api url is correct on `src/Api.js`
- Run command: `docker-compose up --build -d`
- You can access the project at: `http://localhost:8080`
