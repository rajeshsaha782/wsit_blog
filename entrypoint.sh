#!/usr/bin/env bash

php artisan migrate:reset
#python3 manage.py migrate
#python3 manage.py create
exec "$@"