# Proyecto de Ingenieria de sistemas II

Esta es una proyecto que servira de refuerzo para los estudiantes de la carrera de Ingenieria de sistemas de la UPEA

Esta plataforma contiene un apartado donde podras buscar los contenidos por semestres con el contenido del plan de estudio de la carrera, separada por semestres

Tambien contiene un apartado de foro donde podran publicar sus dudas lo mas detallada posible para que la comunidad pueda responderle

## Herramientas
-   php +v8.2
-   mysql
-   composer
-   nodejs y npm
-   activar los extensiones zip
-   Tener agregado al path las rutas de php y mysql
---
## Instalacion

1. **php** puede descargar [xampp](https://www.apachefriends.org/download.html) desde su pagina oficial.
2. **Composer**, puede instalar desde su [pagina oficial](https://getcomposer.org/download/) eliga el recomendado para su sistema operativo.
3. **NodeJS** puede descargar desde su [pagina inicial](https://nodejs.org/en/download/package-manager)
4. Si no tiene activada las extenciones zip `extension=intl` y `extension=zip` en el archivo de configuracion de php `php.ini`
5. Clonar este repositorio en su maquina local e instalar dependencias
   ```bash
      git clone https://github.com/clbcom/kolla-admin.git
      cd kolla-admin
      composer install
   ```
6. Configurar las variables de entorno de la base de datos
   ```env
      DB_CONNECTION=mariadb
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=kolla
      DB_USERNAME=root
      DB_PASSWORD=
   ```
7. Descomentar las lineas que estan dentro la funcion ```run``` que son los datos iniciales para ser cargados con la migracion
   ```php
      // database/seeders/DatabaseSeeder.php
      namespace Database\Seeders;

      // use Illuminate\Database\Console\Seeds\WithoutModelEvents;
      use Illuminate\Database\Seeder;
      use Database\Seeders\DatosInicialesUsuarios;
      use Database\Seeders\DatosInicialesSemestres;
      use Database\Seeders\DatosInicialesCategorias;

      class DatabaseSeeder extends Seeder
      {
         /**
         * Seed the application's database.
         */
         public function run(): void
         {
            // $this->call(DatosInicialesCategorias::class);
            // $this->call(DatosInicialesSemestres::class);
            // $this->call(DatosInicialesUsuarios::class);
         }
      }
   ```
8. Correr las migraciones con los datos iniciales junto con los seeders
   ```bash
      php artisan migrate --seed
   ```
9. Correr la aplicacion, debe ejecutar simultaneamente los seguientes comandos
   ```bash
      # inicia la aplicacion
      php artisan serve
   ```
   ```bash
      # inicia los estilos de tailwind
      npm run dev
   ```
---
## Uso
Para acceder al panel de usuarios docentes dirigase a la ruta en su navegador ```http://localhost:8000/admin```
Para acceder a la pagina principal dirijase a la ruta ```http://localhost:8000```


## Tabla de usuarios
| Email                    | Contraseña | Tipo de usuario |
| ------------------------ | ---------- | --------------- |
| clb@clb.com              | clb        | Docente         |
| dmcm@gmail.com           | dmcm       | Docente         |
| dfcm@gmail.com           | dfcm       | Docente         |
| carlos.perez@gmail.com   | 1234       | Alumno          |
| maria.lopez@gmail.com    | 12345      | Alumno          |
| jorge.gonzales@gmail.com | 123456     | Alumno          |
| ana.rojas@gmail.com      | 1234567    | Alumno          |
| luis.vargas@gmail.com    | 12345678   | Alumno          |
