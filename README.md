<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sistema de inventario

Sistema de inventario con control de entradas y salidas y total de stock

## Prerequisites
Este es un proyecto del framework Laravel 9 asi que necesitaras las siguientes versiones:
 - PHP >= 8.0
 - Node.js >= 18
 - MySQL >= 8.0

Tambien, necesitarás instalar Composer: https://getcomposer.org/doc/00-intro.md
## Laravel
1. Descargue el zip del proyecto, luego copie y pegue la carpeta volt-dashboard-master en su carpeta de proyectos. Cambie el nombre de la carpeta al nombre de su proyecto
2. Asegúrese de tener Node y Composer instalados localmente.
3.Ejecute el siguiente comando para descargar todas las dependencias del proyecto. `composer install`
4. En su terminal, ejecute `npm install`
5. Copie `.env.example` a `.env` y actualice las configuraciones (principalmente la configuración de la base de datos)
6. En su terminal, ejecute `php artisan key:generate`
7. Ejecute `php artesanal migrate --seed` para crear las tablas de la base de datos y sembrar las tablas de usuarios y productos, ademas de crear algunos registros de prueba
8. En caso de que no tenga los assets en la carpeta public necesitara ejecutar el siguiente comando para visualizar la vistas `npm run dev`

## Esquema de la base de datos
La base de datos cuenta con 5 tablas principales mas tablas adiciones que genera laravel

<img src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322159866_1139073429925396_6253785192699770439_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=YEj0m-rYW3sAX_Mdscy&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfDq3QL0H-vu68KSCQvgWUEHRq5bGm0n0kNSjPcJC9GcDw&oe=63AFD97D" />

## Api


