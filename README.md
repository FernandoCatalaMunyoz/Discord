<div align="center"> <img src="./img/LFG.png"></img> </div>

# LFG Backend

<details>
  <summary>Contenido 📝</summary>
  <ol>
    <li><a href="## Objetivo🎯">Objetivo🎯</a></li>
    <li><a href="## Sobre el proyecto 📰">Sobre el proyecto 📰</a></li>
    <li><a href="## Stack ✨">Stack ✨</a></li>
    <li><a href="## Diagrama BD 🌐">Diagrama BD 🌐</a></li>
    <li><a href="## Instalación en local 💻"> Instalación en local 💻</a></li>
    <li><a href="#endpoints">Endpoints</a></li>
    <li><a href="#futuras-funcionalidades">Futuras funcionalidades</a></li>
    <li><a href="## Webgrafia 👓">Webgrafia 👓</a></li>
    <li><a href="## Compañeros de equipo 🐱‍👤:"> Compañeros de equipo 🐱‍👤:</a></li>    
  </ol>
</details>

## Objetivo🎯

Este proyecto requería una API funcional conectada a una base de datos en la que simula una aplicación web que permite a los usuarios contactar con otros usuarios a través de salas de videojuegos con la tecnología PHP Laravel. Además, este proyecto se ha realizado en grupo para así poder trabajar herramientas de gestión de tickets (organización de tareas a través de una plataforma como trello), trabajo en equipo y gestión del tiempo de forma eficiente.

## Sobre el proyecto 📰

LFG Backend es una aplicación web dónde los usuarios podrán registrarse e iniciar sesión para así poder crear salas en función a una lista de videojuegos para que otros usuarios puedan unirse para conversar en dichas salas.

## Stack ✨

Tecnologías utilizadas:

<div align="center">
<a href="">
    <img src= "https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white"/>
</a>
<a href="https:">
    <img src= "https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
</a>
<a href="https://">
    <img src= "https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"/>
</a>
<a href="https://">
    <img src= "https://img.shields.io/badge/Google%20Meet-00897B?style=for-the-badge&logo=google-meet&logoColor=white"/>
</a>
<a href="https://">
    <img src= "https://img.shields.io/badge/Slack-4A154B?style=for-the-badge&logo=slack&logoColor=white"/>
</a>
<a href="https://">
    <img src= "https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white"/>
</a>
<a href="https://">
    <img src= "https://img.shields.io/badge/GIT-E44C30?style=for-the-badge&logo=git&logoColor=white
    "/>
</a>
 </div>

## Diagrama BD 🌐

<img src="./img/DB Laravel Project.png"></img>

## Instalación en local 💻

Nota: para este proyecto será necesario tener instalado en local PHP y Composer

<a href="https://www.php.net/manual/en/install.php"> Descarga PHP </a>

<a href="https://getcomposer.org/download/"> Descarga Composer </a>

1. Clonar el repositorio
2. Instalamos dependencias
   `$ composer install`
3. Conectamos nuestro repositorio con la base de datos, para ello creamos el archivo .env copiando los datos de .env.example y rellenamos los campos con la conexión a nuestra base de datos en local.
4. Ejecutamos las migraciones
   `$ php artisan migrate`
5. Ejecutamos los seeders
   ` $ php artisan db:seed`
6. Iniciamos el servidor
   `$ php artisan serve`
7. ...

## Endpoints

<details>
<summary>Endpoints</summary>
Credenciales SuperAdmin:

        ``` js
            {
                "email": "super_admin@super_admin.com",
                "password": "123456"
            }
        ```

-   AUTH

        -   REGISTER

                  POST http://localhost:3000/api/register

                POST localhost:8000/api/auth/register
            body:

            ```js
                {
                    "nickName": "Datata",
                    "fullName": "Dani Apellido",
                    "email": "dani@dani.com",
                    "password": "princess",
                }
            ```

        -   LOGIN

                  POST http://localhost:3000/api/login

                POST localhost:8000/api/auth/login

    ¡ç
    body:

            ```js
                {
                    "email": "super_admin@super_admin.com",
                    "password": "123456"
                }
            ```

-   GAMES

    -   CREATE GAME

              POST localhost:8000/api/games

        Auth: token SupeAdmin
        body:

        ```js
            {
                "game_name": "Genshin Impact",
                "description": "Gachapon mundo abierto"
                "game_image": "https://preview.redd.it/ntccsv49x1a51.png?auto=webp&s=defee6ae55163ba253a3a7fa9007e584d5087bac"
            }
        ```

    -   GET GAMES

              GET localhost:8000/api/games

    -   UPDATE GAME

              PUT localhost:8000/api/games/{id}

        Auth: token SupeAdmin
        body:

        ```js
            {
                "description": "Descripción editada"
            }
        ```

    -   UPDATE GAME

              DELETE localhost:8000/api/games/{id}

        Auth: token SupeAdmin

-   MESSAGES

    -   CREATE MESSAGE

              POST localhost:8000/api/messages/{id}

        Auth: token usuario logeado
        body:

        ```js
            {
                "message": "Hola a todos",
            }
        ```

    -   GET ROOM MESSAGES

              GET localhost:8000/api/messages

</details>

## Futuras funcionalidades

[ ] Añadir create book  
[ ] Añadir logs con winston  
[ ] Validaciones de la solicitud con express-validator  
[ ] ...

## Webgrafia 👓

Para conseguir mi objetivo he recopilado información de:

-   <a href="https://laravel.com/docs/9.x/"> Laravel 9.x </a>

## Compañeros de equipo 🐱‍👤:

-   **Fernando**
    <a href="https://github.com/FernandoCatalaMunyoz" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>

-   **Miguel**  
    <a href="https://github.com/Miguel21S" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=red" target="_blank"></a>

-   **_Antonio_**  
    <a href="https://github.com/MR-ant1" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=green" target="_blank"></a>

-   **Ana**
    <a href="https://github.com/ariusvi" target="_blank"><img src="https://img.shields.io/badge/github-24292F?style=for-the-badge&logo=github&logoColor=white" target="_blank"></a>
