<h1 align="center"> PELISPA API </h1>
<h2 align="center">Endpoint= localhost/api/api/peliculas || localhost/api/api/servicios</h2>

<h1>SERVICIOS GET (peliculas)</h1>
GET /peliculas: Este endpoint devuelve todas las películas disponibles en la base de datos.
GET /peliculas/{id}: Permite obtener información detallada sobre una película específica mediante por su ID.
GET /peliculas/orden/asc || /peliculas/orden/desc: Estos endpoints permiten ordenar por ID de manera ascendente (asc) o descendente (desc).
GET /peliculas/servicio_fk/{id}: Permite filtrar peliculas por la id del servicio de stream.


