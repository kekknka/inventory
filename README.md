<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sistema de inventario

Sistema de inventario con control de entradas y salidas y total de stock

## Prerequisitos
Este es un proyecto del framework Laravel 9 asi que necesitaras las siguientes versiones:
 - PHP >= 8.0
 - Node.js >= 18
 - MySQL >= 8.0

Tambien, necesitarás instalar Composer: https://getcomposer.org/doc/00-intro.md
## Laravel
1. Descargue el zip del proyecto, luego copie y pegue en su carpeta de proyectos o installe el proyecto por linea de comando `https://github.com/kekknka/inventory.git`
2. Asegúrese de tener Node y Composer instalados localmente.
3.Ejecute el siguiente comando para descargar todas las dependencias del proyecto. `composer install`
4. En su terminal, ejecute `npm install`
5. Copie `.env.example` a `.env` y actualice las configuraciones (principalmente la configuración de la base de datos)
6. En su terminal, ejecute `php artisan key:generate`
7. Es necesario que ingrese la `url` base de su website local en el archivo `.env` en el parametro `API_SITE` con esta variable podremos lanzar peticiones a la api de nuestro proyecto \n
<small>En caso de que use `Laragon` como su proveedor de servicio apache, basta con que especifique la direcciones de su url virtual generado por Laragon</small><br>
<small>En caso de que tenga algun otro proveedor como `XAMPP` basta con que especifiques la raiz del proyecto seguido del `public\index.php`</small>

8. Limpiamos route, cache, config, views ejecutando el siguiente comando `php artisan optimize`
9. Ejecute `php artesanal migrate --seed` para crear las tablas de la base de datos y sembrar las tablas de usuarios y productos, ademas de crear algunos registros de prueba
10. En caso de que no tenga los assets en la carpeta public necesitara ejecutar el siguiente comando para visualizar la vistas `npm run dev` o `npm run build`

## Esquema de la base de datos
La base de datos cuenta con 5 tablas principales mas tablas adiciones que genera laravel

 - failed_jobs
 - migrations
 - operation_types
 - operations
 - orders
 - password_resets
 - personal_access_tokens
 - products
 - users

<img width="50%" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322159866_1139073429925396_6253785192699770439_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=YEj0m-rYW3sAX_Mdscy&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfDq3QL0H-vu68KSCQvgWUEHRq5bGm0n0kNSjPcJC9GcDw&oe=63AFD97D" />

## Api

<h4>Rutas</h4>

<table width="100%">
    <tr>
        <th>Rutas</th>
        <th>Funcion</th>
        <th>Token</th>
        <th>Peticion</th>
    </tr>
    <tr>
        <td>../api/login</td>
        <td>Permite autentificarse y obtener un token para hacer uso de las siguientes apis (<a href="#login">Ver ejemplo</a>)</td>
        <td>No</td>
        <td>POST</td>
    </tr>
    <tr>
        <td>../api/v1/products</td>
        <td>Obtenemos un volcado de todos los productos en la base de datos, de manera paginada, en caso de que noquiera la informacion paginada, basta con pasarle un [parametro] `paginate = false` (<a href="#getProducts">Ver ejemplo</a></td>
        <td>Si</td>
        <td>GET</td>
    </tr>
    <tr>
        <td>../api/v1/products</td>
        <td>Guardamos un nuevo producto</td>
        <td>Si</td>
        <td>POST</td>
    </tr>
    <tr>
        <td>../api/v1/products/{product}</td>
        <td>Obtenemos un producto</td>
        <td>Si</td>
        <td>GET</td>
    </tr>
    <tr>
        <td>../api/v1/products/{product}</td>
        <td>Actualizamos un producto</td>
        <td>Si</td>
        <td>PUT/PATCH</td>
    </tr>
    <tr>
        <td>../api/v1/products/{product}</td>
        <td>Desactivamos un producto</td>
        <td>Si</td>
        <td>DELETE</td>
    </tr>
    <tr>
        <td>../api/v1/orders</td>
        <td>Obtenemos un volcado de todas las entradas y salidas asi como el ultimo stock (<a href="#getOrders">Ver ejemplo</a>)</td>
        <td>Si</td>
        <td>GET</td>
    </tr>
    <tr>
        <td>../api/v1/orders</td>
        <td>Agregamos una nueva entrada/salida (<a href="#postOrders">Ver ejemplo</a></td>
        <td>Si</td>
        <td>POST</td>
    </tr>
    <tr>
        <td>../api/v1/orders/{order}</td>
        <td>Obtenemos el historial de entrada y salida de un producto</td>
        <td>Si</td>
        <td>GET</td>
    </tr>
</table>

## Esquema archivos

El esquema esta organizada de la siguiente manera, en caso de que quiera expandir el aplicativo, todos los modulos se almacenaran en la carpeta `app` extendiendo de su archivo `layouts > dashboard.blade.php`

<img width="25%" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322102648_2175632835942982_7402213592169369536_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=730e14&_nc_ohc=uwiYhwYSEOIAX_I_yGW&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfDqrz2ay592BBpuE9KdjhOOv2-MiO7m0z8GvnnshLQTaw&oe=63B152C1" />

## Vistas

Login

para entrar al sistema solo es necesario copiar el `email` de un usuario dentro de nuestra base de datos y la contraseña es `password` para todos los usuarios

<img src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322663092_527516872742003_2493375480214473149_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=hfa9lqFWsSgAX_CREkp&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfBQwLw75oLeNikp0tXbfLGfYmMZa7RvWABQ0hfA51APFQ&oe=63B06407" />

Orders

<img src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322548479_548953543780075_7474387638525534318_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=730e14&_nc_ohc=hJiwJp7x4osAX-LkAoA&tn=T_1grpLqD31XIKfP&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfD_lQZm3oVD8p7rUSvZBGy-MR0AY-3Wb69ZyB6pYto92w&oe=63B1B0FE" />

Add Order

<img src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322674970_476692121084870_5722889110370102517_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=dSeq85N01BYAX_Jhppi&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfDhSlUz4uB7TMrEx68Au5gcpVcuwFeTm3d1KvnViKjlwg&oe=63B016CB" />

## Ejemplos postman

../api/login

<img id="login" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/321942198_2356129337887400_1192856794104471928_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=730e14&_nc_ohc=T_dgWa5dlTgAX_KwC5A&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfD2NsWC2xj-9vG4esr7_6ZsDxCgM4ZXIqhOFJ-8HDRo4g&oe=63B0B2C7" />

../api/v1/products

<img id="getProducts" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322598726_826706558557696_749245033962866152_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=Yusyypzb1fsAX8cwZYy&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfDYN5CoP9ACJtifs3Vw1zVdmfYuaVJKMivMWIDt86LuWQ&oe=63B15756" alt="">

../api/v1/orders

<img id="getOrders" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322059191_884567892567382_2709355708449576888_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=730e14&_nc_ohc=kgnSdVsGsqwAX_wwBaA&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfCFIH8R5sgfHVG52e5i7POwFPhSgZ3MckkxrlBG8RV7ig&oe=63B14C27" alt="">

../api/v1/orders [POST]

<img id="postOrders" src="https://scontent.fgdl9-1.fna.fbcdn.net/v/t39.30808-6/322568899_4004688639783755_1262459644198538947_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=pLh_old9V9AAX85EODh&_nc_oc=AQlFZ41b6hLp8fNcV3KeO3SVROujs_VHJUyF-NQa03qYS2ZctIwrOH8dI7xjthl1Ba4sP5BTW5pEpgezd1FYIHm6&tn=T_1grpLqD31XIKfP&_nc_ht=scontent.fgdl9-1.fna&oh=00_AfAk7eQIO7QVzJswi7OHc30N6hdCqw0a4zz0sJGejFNZNg&oe=63B0161C" alt="">


