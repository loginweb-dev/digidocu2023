![image](public/docs/.gitbook/assets/digidocu_mokup.jpg)
# DigiDocu
DigiDocu es un sistema de gestión de documentos de código abierto construido con laravel. Que proporcionan una manera fácil de
administre documentos con funciones como permisos, cambie el tamaño y comprima imágenes, combine varias imágenes en un solo pdf,
comprimir todos los archivos, etc.

## Installation
1. Download the latest release from [here](https://github.com/harish81/digidocu/releases) or clone repository.
2. Run `composer install`.
3. Copy & setup `.env` file.
4. Create database & Change `DB_DATABASE` in `.env`.
5. Migrate the Database `php artisan migrate`.
6. Run `php artisan key:generate`
7. Run `php artisan db:seed` (This will generate super-admin & basic settings [required]).
8. Visit URL in the browser

##### Default Login Credential for super admin
| Username | Password |
|----------|----------|
| super    | 123456   |

## Documentation
1. [User Documentation](https://nandoliyaharish.gitbook.io/digidocu/user)
2. [Developer Documentation](https://nandoliyaharish.gitbook.io/digidocu/dev)

## Contribution
 - Please explain your PR in clear language otherwise your PR may rejected.
 - Contribute to documentation in `public/docs` directory. 
 
## Licence
  - DigiDocu is primary licenced under [GPLv3 license](https://github.com/harish81/digidocu/blob/master/LICENSE).

## Solutions
 - Contactar al Ing. Percy Alvarez 71130523
