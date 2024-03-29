#!/bin/bash
set -e

echo "Deployment started ..."

# Turn ON Maintenance Mode or return true
# if already is in maintenance mode
(php artisan down) || true



# pull latest version of app
cd /var/www/html/bvf/boursebf
git pull


# allow composer for root
export COMPOSER_ALLOW_SUPERUSER=1;

# Install composer dependencies
composer install --no-dev --optimize-autoloader --no-interaction
# composer update --lock

# Install npm dependencies
npm install

php artisan up
# Clearing Cache
php artisan cache:clear
php artisan config:clear

# Recreate cache
# php artisan optimize

# Run database migrations
#php artisan migrate --force

# Turn OFF Maintenance mode
php artisan up

echo "Deployment finished!"
