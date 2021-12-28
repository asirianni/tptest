# TP Verifarma

Desarrollador de Software
Farmacia CRUD


## Getting Started

Servicio Desarrollado en Laravel 8

### Pre-requisitos

Verifique que su equipo tenga instalado las siguientes versiones. Abra una consola cmd  o terminal powershell:

```
php -v // PHP 7.4.27
composer -v // Version 2.2.1
git --version // version 2.34.1.windows.1

```

### Instalacion

Abra consola y por terminal seleccionar la ruta donde se va a clonar el proyecto. 

```
cd documents
```

crear carpeta en la ruta seleccionada con el siguiente comando

```
mkdir tpverifarma
```

ingresar a la carpeta

```
cd tpverifarma
```

Iniciar repositorio en la carpeta

```
git init .
```

agregar la ruta de clonacion con el siguiente comando

```
git remote add origin https://github.com/asirianni/tpverifarma.git
```

clonar proyecto

```
git pull origin main
```

El sistema solicitara sus credenciales de acceso al repositorio git privado

```
abra una ventana del browser cuando se lo solicite, logguese y luego cierre la pestaña asi corre el proceso por consola.
```

finalizada la clonacion corra el siguiente comando para instalar las dependencias

```
composer install
```

Editar el archivo .env en el proyecto con los datos de acceso de su base de datos local

```
DB_DATABASE=XXXXXX
DB_USERNAME=XXXXXX
DB_PASSWORD=XXXXXX
```

En una consola correr el siguiente comando 

```
php artisan migrate
```

El sistema mostrara las migraciones creadas en la base de datos

```
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (37.46ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (38.82ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (45.15ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (55.29ms)
Migrating: 2021_12_27_154744_create_farmacia_table
Migrated:  2021_12_27_154744_create_farmacia_table (21.19ms)
```


finalizadas la instalacion de dependencias y migraciones. Corra el servidor con el siguiente comando

```
php artisan serve
```

El servidor estara corriendo en el puerto 8000

```
PHP 7.4.27 Development Server (http://127.0.0.1:8000) started
```


## Corriendo tests

El servicio tiene 3 test unitarios realizados. FarmaciaTest realiza las pruebas sobre la clase Farmacia ubicada en app\Services

### Tests\Feature\app\Services\FarmaciaTest
#### dominio creacion exitosa
#### dominio creacion no exitosa
#### calculo distancia

Ejecute el siguiente comando en consola y sobre la ruta del proyecto creado

```
php artisan test
```

```
  PASS  Tests\Feature\app\Services\FarmaciaTest
  ✓ dominio creacion exitosa
  ✓ dominio creacion no exitosa
  ✓ calculo distancia
```


## API

## PERSISTIR NUEVA FARMACIA

* POST / http://localhost:8000/api/farmacia
Body
```
    {
        "nombre":"Farmacia 1",
        "direccion":"Mitre 750",
        "latitud":33.546,
        "longitud":25.698
    }
```
Resp
```
    {
        "data": {
            "exito": "Farmacia registrada",
            "id": 1
        },
        "status": 200
    }
```

## CONSULTAR FARMACIA REGISTRADA

* GET / http://localhost:8000/api/farmacia/1

Resp
```
    {
        "data": {
            "exito": "Farmacia registrada",
            "farmacia": {
                "id": 1,
                "nombre": "Farmacia 1",
                "direccion": "Mitre 750",
                "latitud": "33.54600000",
                "longitud": "25.69800000",
                "created_at": "2021-12-28T12:47:50.000000Z",
                "updated_at": "2021-12-28T12:47:50.000000Z"
            }
        },
        "status": 200
    }
```



## Authors

* **Adrian Sirianni** - *asprofactory.net* - [PurpleBooth](https://asprofactory.net)




