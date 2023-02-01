# Laravel 9 JWT Authentication

## Installing

1. Clone from GitHub

```
git clone https://github.com/jenesiszw/laravel-jwt.git <folder-name>
```

2. Change directory to `<folder-name>` & install with composer

```
cd <folder-name>

composer install or composer update
```

3. Copy env.example and rename to .env
4. Add database connection & migrate tables

```
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
```

5. Generate app key and JWT secret

```
php artisan jwt:secret

php artisan key:generate

```

## Usage

```
php artisan serve
```

1. Routes

```
1. GET /api/test # Test route
2. POST /api/auth/logout # Logout route
3. POST /api/auth/login # Login route
4. POST /api/auth/refresh # Refresh token route
```

2. Credentials

```
username: nigel
password: 12345678

```
