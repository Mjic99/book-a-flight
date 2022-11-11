## Prerequisites

- PHP V8.1
- Composer
- A Postgresql database
- Node

## Installation

After cloning the project, navigate to the folder and install all dependencies:
```
npm install
composer install
```

Remember to point the project to a Postgresql Database by changing the credentials in `.env`:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=bookaflight
DB_USERNAME=bookaflight
DB_PASSWORD=bookaflight
```

Finally, start the server and npm separately:
```
php artisan serve
```
```
npm run dev
```
