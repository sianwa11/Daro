# Daro

A Learning platform made in Laravel. This project aimed to develop a web-based information system that enables qualified teachers to share educational content to students in vulnerable areas and situations for free and interact with them when necessary.

## Setup

Clone the repository.

```bash
git clone https://github.com/sianwa11/Daro.git
```

## Run the following commands

```
composer install
```

```
npm install
```

## .env file setup
Set up the .env file below, filling in the relevant data that suits your project

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

```

Run the following commands

```
# Generate the app key
php artisan key:generate

# Migrate the database
php artisan migrate:fresh

# Seed the data
php artisan db:seed

# Run the application
php artisan serve
```

## Main Features
- Creating virtual classes and adding content to them.
- Video chat with WebRTC.
- Detailed reports.
- Assignments and grading.

## Improvements to be made
- Chat functionality between teacher and student.
- Multiple users in video chat rooms.
- Reduce page reloads.
- Share content on USSD for students with no internet.

# License
[MIT](https://choosealicense.com/licenses/mit/)
