run this on cmd
composer install
npm install
npm run dev

duplicate .env.exampe createa .env

edit these lines
DB_CONNECTION=smysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=husayhub
DB_USERNAME=root
DB_PASSWORD=

run xampp mysql
run on cmd
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan serve
