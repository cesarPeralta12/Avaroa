#!/bin/bash
set -e

echo "==> Ensuring upload directories exist with correct permissions..."
mkdir -p /var/www/html/public/uploads
chown -R www-data:www-data /var/www/html/public/uploads
chmod -R 775 /var/www/html/public/uploads

echo "==> Caching config..."
php /var/www/html/artisan config:cache

echo "==> Linking storage..."
php /var/www/html/artisan storage:link --force

echo "==> Running migrations..."
php /var/www/html/artisan migrate --force || echo "==> WARNING: migration had errors — continuing startup anyway"

echo "==> Starting services (Apache + Reverb)..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
