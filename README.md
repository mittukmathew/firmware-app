# Firmware Symfony App

## Requirements
- PHP 8.0+
- MySQL
- Composer

## Setup

1. Install dependencies
composer install

2. Configure DB in .env
DATABASE_URL="mysql://root:@127.0.0.1:3306/firmware_bimmertech"

4. Create DB
php bin/console doctrine:database:create

5. Run migrations
php bin/console doctrine:migrations:migrate

6. Start server
php -S 127.0.0.1:8000 -t public

## Admin Panel
http://127.0.0.1:8000/admin
## customer versin download
http://127.0.0.1:8000
## API
POST /api/software-download

## Managing Software
- Add new version in admin
- Mark latest
- Add links

## IMPORTANT
Only ONE version should be marked as latest
Wrong configuration may break devices
