@echo off

start cmd /k "npm run watch"
start cmd /k "php artisan serve --port=3000"


exit
