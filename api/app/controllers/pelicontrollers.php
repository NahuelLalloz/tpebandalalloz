<?php
include_once "app/models/streamingmodels.php";
include_once 'app/models/pelimodels.php';
include_once 'app/views/peliview.php';
include_once 'app/views/apiview.php';
include_once 'app/controllers/apicontroller.php';
include_once 'app/helpers/api.helper.php';


class PeliController extends ApiController {
    private $modelc;
    private $model;
 
    protected $viewc;
    private $authHelper;  

    function __construct() {
        parent::__construct();
        $this->modelc = new StreamingModel();
        $this->model = new PeliModel();
        $this->viewc = new APIView();
        $this->authHelper = new AuthHelper();
    }
   
   //GET localhost/api/api/peliculas/
    function getPeli($params = null) {
        $peliculas = $this->model->getPeli();
        return $this->viewc->response($peliculas, 200);
    }
    //GET localhost/api/api/peliculas/[ID deseada]
    function getPeliById($params = []){
        if (empty($params)){
            $peliculas = $this ->model->getPeli();
           $this->viewc->response($peliculas, 200);
        }
        else{
            $pelicula=$this->model->getPeliById($params [':ID']);
            if (!empty($pelicula)){
                $this->viewc->response($pelicula, 200);
            }
            else{
                $this->viewc->response(['No existe una Pelicula o Serie con esa ID'], 404);
            }
        }
}

//POST localhost/api/api/peliculas/
/*
EJEMPLO DE INSERTAR
{
        
        "nombre": "nueva",
        "director": "aaa",
        "tipo": "Serie",
        "genero": "Drama",
        "servicio_fk": 1
    }
    */
function insertPeli($params = []) {
    {

        $user = $this->authHelper->currentUser();
        if (!$user) {
            $this->viewc->response('Unauthorized', 401);
            return;
        }
    }
    $body = $this->getData();
   
    $nombre = $body->nombre;
    $director = $body->director;
    $tipo = $body->tipo;
    $genero = $body->genero;
    $servicio_fk = $body->servicio_fk;

  $id=$this->model->insertPeli($nombre, $director, $tipo, $genero, $servicio_fk);
    $this->viewc->response("Se ingreso correctamente la consulta".$id, 201);
}
//PUT localhost/api/api/peliculas/[ID a editar]
/*{
        
    "nombre": "nueva",
    "director": "aaa",
    "tipo": "Serie",
    "genero": "Drama",
    "servicio_fk": 1
}
*/
function updatePeli($params = []){
    {

        $user = $this->authHelper->currentUser();
        if (!$user) {
            $this->viewc->response('Unauthorized', 401);
            return;
        }
    }
    if (is_numeric($params[':ID'])) {
        $id_pelicula = $params[':ID'];
        $peliculas = $this->model->getPeliById($id_pelicula);

        if($peliculas){
            $body = $this->getData();
   
            $nombre = $body->nombre;
            $director = $body->director;
            $tipo = $body->tipo;
            $genero = $body->genero;
            $servicio_fk = $body->servicio_fk;

            $this->model->editarPeliById($id_pelicula, $nombre,$director, $tipo , $genero, $servicio_fk);
            $this->viewc->response("Se actualizaron los datos del modelo con el id: " . $id_pelicula, 200);
        } else {
            $this->viewc->response("No se encontro un modelo con el id: " . $id_pelicula, 404);
        }
    } else {
        $this->viewc->response('Parametros desconocidos', 400);
    }
}
 // DELETE 
//localhost/api/api/peliculas/[id a borrar]
function deletePeli($params = []){
        {

            $user = $this->authHelper->currentUser();
            if (!$user) {
                $this->viewc->response('Unauthorized', 401);
                return;
            }
        }
        if (is_numeric($params[':ID'])) {
            $id_peliculas = $params[':ID'];
            $pelicula = $this->model->getPeliById($id_peliculas);
            if ($pelicula) {
                $this->model->BorrarPeli($id_peliculas);
                $this->viewc->response('Se elimino la pelicula/serie', 200);
            } else {
                $this->viewc->response('No existe la pelicula/serie', 404);
            }
        } else {
            $this->viewc->response('Parametros desconocidos', 400);
        }
    }
   
   //ORDENAR POR id_pelicula localhost/api/api/peliculas/orden/asc localhost/api/api/peliculas/orden/desc
    function getByOrder($params = []) {
        switch ($params[':ORDER']) {
            case 'asc':
                $peliculas = $this->model->getPeliOrdenada($params[':ORDER']);
                $this->viewc->response($peliculas, 200);
                break;
            case 'desc':
                $peliculas = $this->model->getPeliOrdenada($params[':ORDER']);
                $this->viewc->response($peliculas, 200);
                break;
            default:
                $this->viewc->response('Parametro desconocido', 400);
                break;
        }
    }
    
    //FILTRO POR SERVICIO_FK  ejemplo: localhost/api/api/peliculas/servicio_fk/2224
    function getByServicioFk($params = []) {
        if (!empty($params[':SERVICIO_FK'])) {
            $servicio_fk = $params[':SERVICIO_FK'];
            $peliculas = $this->model->getPeliByServicioFk($servicio_fk);
    
            if ($peliculas) {
                $this->viewc->response($peliculas, 200);
            } else {
                $this->viewc->response('No se encontraron películas con ese servicio_fk', 404);
            }
        } else {
            $this->viewc->response('Falta el parámetro de servicio_fk', 400);
        }
    }
   
    
    
}




