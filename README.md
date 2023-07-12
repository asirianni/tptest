# TP GEOPAGOS
API REST - Simulador de torneos


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
mkdir tptest
```

ingresar a la carpeta

```
cd tptest
```

Iniciar repositorio en la carpeta

```
git init .
```

agregar la ruta de clonacion con el siguiente comando

```
git remote add origin https://github.com/asirianni/tptest.git
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

finalizando la instalacion genere la llave key ejecutando el siguiente comando

```
php artisan key:generate
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
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (39.77ms)
Migrating: 2023_07_12_181257_create_player_types_table
Migrated:  2023_07_12_181257_create_player_types_table (18.63ms)
Migrating: 2023_07_12_181310_create_tournaments_table
Migrated:  2023_07_12_181310_create_tournaments_table (48.08ms)
Migrating: 2023_07_12_181332_create_players_table
Migrated:  2023_07_12_181332_create_players_table (46.88ms)
Migrating: 2023_07_12_181423_create_matches_table
Migrated:  2023_07_12_181423_create_matches_table (108.48ms)

```


finalizadas la instalacion de dependencias, migraciones y seeders. Corra el servidor con el siguiente comando

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

## Persistir nueva Farmacia

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

## Consultar Farmacia por ID

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

## Consultar Farmacia proxima por coordenas ingresadas por get

* GET / http://localhost:8000/api/farmacia/?latitud=70&longitud=98

Resp
```
    {
        "data": {
            "exito": "Farmacia registrada mas proxima a 80 metros",
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

* **Adrian Sirianni** - *Analista Tecnico Programador* - [asprofactory.net](https://asprofactory.net)




