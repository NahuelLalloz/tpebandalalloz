<?php
include_once "app/models/streamingmodels.php";
include_once "app/views/streamingview.php";
include_once 'app/controllers/apicontroller.php';

include_once 'app/helpers/api.helper.php';

class StreamingController extends ApiController {
    private $modelc;
    private $model;
    private $view;
    protected $viewc;
    private $authHelper;  

    function __construct() {
        parent::__construct();
        $this->modelc = new StreamingModel();
      
        $this->view = new PeliView();
        $this->viewc = new APIView();
        $this->authHelper = new AuthHelper();
    }
   //localhost/api/api/servicios/
    function getStreaming($params = null) {
        $servicios = $this->modelc->getStreaming();
        return $this->viewc->response($servicios, 200);
    }

   // localhost/api/api/servicios/[id deseada]
    function getStreamingById($params = []){
        if (empty($params)){
            $servicios = $this ->modelc->getStreaming();
           $this->viewc->response($servicios, 200);
        }
        else{
            $servicios=$this->modelc->getStreamById($params [':ID']);
            if (!empty($servicios)){
                $this->viewc->response( $servicios, 200);
            }
            else{
                $this->viewc->response(['No existe una Pelicula o Serie con esa ID'], 404);
            }
        }
}

/*POST localhost/api/api/servicios/
EJEMPLO
{
       
        "nombre": "Cuevana"
    }

*/
function insertServicio($params = []) {
    {

        $user = $this->authHelper->currentUser();
        if (!$user) {
            $this->viewc->response('Unauthorized', 401);
            return;
        }
    }
    $body = $this->getData();
   
    $nombre = $body->nombre;
    

  $id=$this->modelc->insertServicio($nombre);
    $this->viewc->response("Se ingreso correctamente la consulta".$id, 201);
}

/* PUT localhost/api/api/servicios/
{
       
        "nombre": "Pelis"
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
        $id_servicio_streaming = $params[':ID'];
        $servicios = $this->modelc->getStreamById($id_servicio_streaming);

        if($servicios){
            $body = $this->getData();
   
            $nombre = $body->nombre;
          

            $this->modelc->editarStream($id_servicio_streaming, $nombre);
            $this->viewc->response("Se actualizaron los datos del modelo con el id: " . $id_servicio_streaming, 200);
        } else {
            $this->viewc->response("No se encontro un modelo con el id: " . $id_servicio_streaming, 404);
        }
    } else {
        $this->viewc->response('Parametros desconocidos', 400);
    }
}
    


//DELETE localhost/api/api/servicios/[id deseada]

    function deleteStream($params = []){
        {

            $user = $this->authHelper->currentUser();
            if (!$user) {
                $this->viewc->response('Unauthorized', 401);
                return;
            }
        }
        if (is_numeric($params[':ID'])) {
            $id_servicio_streaming = $params[':ID'];
            $servicio = $this->modelc->getStreamById($id_servicio_streaming);
            if ($servicio) {
                $this->modelc->borrarStream($id_servicio_streaming);
                $this->viewc->response('Se elimino la pelicula/serie', 200);
            } else {
                $this->viewc->response('No existe la pelicula/serie', 404);
            }
        } else {
            $this->viewc->response('Parametros desconocidos', 400);
        }
    }
}
 






































    
       
        
        
        
        
        
        
        
        
        

