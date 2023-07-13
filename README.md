# TP GEOPAGOS
API REST - Simulador de torneos


## Getting Started

Servicio Desarrollado en Laravel 8
Se provee de un servicio para generar Torneos a partir de tipo y cantidad de partidos.
Mediante el Modelo MVC de Laravel y practicas SOLID
Se dispone de
1 Request (para validar los datos de la peticion Postman)
[TournamentRequest](https://www.ejemplo.com)
1 Controlador (para accesar al servicio)
[TournamentController](https://www.ejemplo.com)
2 Servicios (generan la logica de negocio)
[MatchService](https://www.ejemplo.com)
[TournamentService](https://www.ejemplo.com)
3 Modelos (que persisten la informacion generada)
[Match](https://www.ejemplo.com)
[Player](https://www.ejemplo.com)
[Tournament](https://www.ejemplo.com)
3 Resources (que muestran los datos como devolucion)
[MatchResource](https://www.ejemplo.com)
[PlayerResource](https://www.ejemplo.com)
[TournamentResource](https://www.ejemplo.com)
2 TestUnitarios (que validan 2 funcionalidades especificas)
[Haz clic aquí](https://www.ejemplo.com)
[Haz clic aquí](https://www.ejemplo.com)



### Pre-requisitos para ejecutar en local el proyecto

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

En una consola correr el siguiente comando para cargar automaticamente random 8 jugadores hombres y mujeres con distintos valores random 

```
php artisan db:seed
```

Si se revisa la tabla players en la base de datos vera los jugadores cargados aleatoriamente


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

## Persistir nuevo Torneo

* POST / http://localhost:8000/api/tournament

Body
```
    {
        "tipo": 1,
        "partidos":3
    }
```
Resp
```
    {
    "data": {
        "torneo num": 36,
        "tipo": "femenino",
        "cant partidos": 3,
        "cant jugadores": 3,
        "matches": [
            {
                "id": 40,
                "playerPlay": {
                    "id": 1,
                    "name": "Easter Blanda",
                    "ability": 2,
                    "force": 2,
                    "speed": 10
                },
                "opponentPlay": {
                    "id": 5,
                    "name": "Sedrick Koepp",
                    "ability": 9,
                    "force": 10,
                    "speed": 1
                },
                "winnerPlay": "Sedrick Koepp"
            },
            {
                "id": 41,
                "playerPlay": {
                    "id": 5,
                    "name": "Sedrick Koepp",
                    "ability": 9,
                    "force": 10,
                    "speed": 1
                },
                "opponentPlay": {
                    "id": 1,
                    "name": "Easter Blanda",
                    "ability": 2,
                    "force": 2,
                    "speed": 10
                },
                "winnerPlay": "Sedrick Koepp"
            },
            {
                "id": 42,
                "playerPlay": {
                    "id": 5,
                    "name": "Sedrick Koepp",
                    "ability": 9,
                    "force": 10,
                    "speed": 1
                },
                "opponentPlay": {
                    "id": 2,
                    "name": "Macey Dibbert",
                    "ability": 3,
                    "force": 1,
                    "speed": 9
                },
                "winnerPlay": "Sedrick Koepp"
            }
        ]
    }
}
```


## Authors

* **Adrian Sirianni** - *Analista Tecnico Programador* - [asprofactory.net](https://asprofactory.net)




