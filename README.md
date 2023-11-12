# PELISPA API
## Endpoint= localhost/api/api/peliculas || localhost/api/api/servicios

# SERVICIOS GET (peliculas)
- GET /peliculas: Este endpoint devuelve todas las peliculas/series disponibles en la base de datos.
- GET /peliculas/{id}: Permite obtener información detallada sobre una pelicula/serie específica mediante su ID.
- GET /peliculas/orden/asc || /peliculas/orden/desc: Estos endpoints permiten ordenar por ID de manera ascendente (asc) o descendente (desc).
- GET /peliculas/servicio_fk/{id}: Permite filtrar peliculas/series por la id del servicio de stream, lo cual facilita encontrar plataforma para poder ver dicha pelicula o serie.


# SERVICIOS GET (servicios)
- GET /servicios: Este endpoint devuelve todos los servicios de stream disponibles en la base de datos.
- GET /servicios/{id}: Permite obtener información detallada sobre un servicio de stream especifico mediante su ID.


# SERVICIO POST (peliculas)
- POST /peliculas: Este endpoint permite agregar una pelicula a la base de datos, un ejemplo:
  ```
    {
        "nombre": "NuevaPeli",
        "director": "Directordelapelicula",
        "tipo": "Serie",
        "genero": "Drama",
        "servicio_fk": 1
    }


# SERVICIO POST (servicios)
- POST /servicios: Este endpoint permite agregar un servicio de stream a la base de datos, un ejemplo:
```
    {
        "nombre": "Netflix"
    }

```

# SERVICIO DELETE (peliculas)
- DELETE /peliculas/{id}: Este endpoint permite eliminar una pelicula a traves de su ID.


# SERVICIO DELETE (servicios)
- DELETE /servicios/{id}: Este endpoint permite eliminar un servicio de stream a traves de su ID, en el caso de que el servicio este asociado a una pelicula y/o serie, se mostrara un error.


# SERVICIO PUT (peliculas)
- PUT /peliculas/{id}: Este endpoint permite editar una pelicula a traves de su ID, un ejemplo:
```
 {
        "nombre": "NuevaPeliEditada",
        "director": "DirectorNuevodelapelicula",
        "tipo": "Pelicula",
        "genero": "Ficcion",
        "servicio_fk": 1
    }

```
# SERVICIO PUT (servicios)
- PUT /servicios/{id}: Este endpoint permite editar un servicio de streaming a traves de su id, un ejemplo:
```
    {
        "nombre": "ServicioEditado"
    }
```

