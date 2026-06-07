#!/bin/bash
set -e

echo "==> Caching config..."
php /var/www/html/artisan config:cache

echo "==> Linking storage..."
php /var/www/html/artisan storage:link --force

echo "==> Running migrations..."
php /var/www/html/artisan migrate --force

echo "==> Starting services (Apache + Reverb)..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
