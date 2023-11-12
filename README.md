API de Películas
Esta API proporciona acceso a una colección de datos de películas, ofreciendo una serie de endpoints para consultar información sobre las películas disponibles.

Endpoints Disponibles
Obtener todas las películas
Endpoint: GET /api/peliculas

Este endpoint devuelve todas las películas disponibles en la base de datos.

Obtener una película por ID
Endpoint: GET /api/peliculas/{id}

Permite obtener información detallada sobre una película específica identificada por su ID.

Obtener películas ordenadas
Endpoint:

GET /api/peliculas/orden/asc
GET /api/peliculas/orden/desc
Estos endpoints proporcionan películas ordenadas ya sea de forma ascendente (asc) o descendente (desc) basándose, probablemente, en un criterio específico (como el nombre, fecha de lanzamiento, etc.).

Obtener películas por servicio_fk
Endpoint: GET /api/peliculas/servicio_fk/{id}

Permite filtrar películas según el campo servicio_fk, proporcionando las películas asociadas a un servicio específico identificado por su ID.

Uso
GET request: Realiza solicitudes a los endpoints mencionados con los métodos GET para acceder a la información.
Revisa las rutas detalladas para acceder a películas específicas, ordenadas o filtradas por servicio.
Cómo Usar
Base URL: localhost/api/api/peliculas/
Selecciona el endpoint deseado y realiza solicitudes con un cliente REST (ejemplo: Postman) utilizando los métodos GET.
Asegúrate de seguir las convenciones y parámetros correctos para cada endpoint según lo especificado.


