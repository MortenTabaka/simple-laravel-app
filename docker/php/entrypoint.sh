#!/bin/sh

chown -R www-data:www-data storage bootstrap/cache

echo "Waiting for database..."

# wait until mysql is ready
until php -r "
try {
    new PDO('mysql:host=db;dbname=simple_api','laravel','root');
    echo 'DB ready';
} catch (Exception \$e) {
    exit(1);
}
"; do
    sleep 2
done

echo "Running migrations..."
php artisan migrate --force

echo "Starting PHP-FPM..."
exec php-fpm
