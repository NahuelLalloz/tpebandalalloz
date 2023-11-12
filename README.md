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
- ```hola



