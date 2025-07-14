# Könyvtár Rendszer (Laravel + Vue.js)

Ez egy online könyvkölcsönző rendszer, amit Laravel backenddel és Vue.js frontendtel készítettem. A projekt célja egy könyvtári működés szimulálása – felhasználókezeléssel, kölcsönzésekkel, admin jogosultságokkal.

## 🚀 Funkciók

- Könyvek listázása, keresése
- Kölcsönzés, visszahozatal
- Admin könyvkezelés (CRUD)
- Autentikáció (login, tokenek)
- Vue.js frontend
- REST API

## 🧪 Tech stack

- Laravel 10
- Vue 3 + Vite
- MySQL
- Bootstrap ,Tailwind CSS
- Laravel Sanctum (tokenes autentikáció)

## 🛠 Telepítés

1. **Backend:**
```bash
git clone 
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
