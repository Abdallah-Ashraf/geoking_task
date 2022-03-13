Shopping Cart
===
Shopping Cart is a  solution that look into many Items and display results from
all the available Categories and Brands, add Shopping Cart items and save as order

## Requirements
The project is based on the version `8.x` of the Laravel framework,
so make sure that you are satisfying the requirements
listed in the [framework's documentation](https://laravel.com/docs/8.x#server-requirements)

## Installation
Run the following commands in order to get a ready to use clone of the application:

1. Clone the repository
```bash
git clone  https://github.com/Abdallah-Ashraf/geoking_task.git
```
2. Get into the directory
```bash
cd geoking_task
```
3. Check that your environment satisfy the requirements
```bash
composer check-platform-reqs
```
4. Install composer dependencies
```bash
composer install
```
5. Setup your envorinment
```bash
cp .env.example .env
```
update .env with database name , username and password .
6. Generate app secret key
```bash
php artisan key:generate
```


7. install npm 
```bash
npm i
```

8. compile js and vue files
```bash
npm run dev
```
9. Database Tables Migration 
```bash
php artisan migrate
```

10. add initial user with two locations 
```bash
php artisan db:seed
```
feel free to register your user and add your locations want to ses as markers in google maps.
###Initial Data 

email : admin@gmail.com

password : password

Now you have a ready to use clone of the application.

## How To?



### Start The Development Server
In order to run the development server you need to run the following command:
```bash
php artisan serve
```

### Use The Solution

You can use Example
simply make a get request to the following :
```
http://127.0.0.1:8000/
```


