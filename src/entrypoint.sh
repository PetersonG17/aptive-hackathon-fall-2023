#!/usr/bin/env bash
php-fpm -D
sleep 1
nginx -g 'daemon off;'
