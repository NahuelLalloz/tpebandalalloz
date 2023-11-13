<?php
    require_once 'app/controllers/apicontroller.php';
    require_once 'app/helpers/api.helper.php';
    require_once 'app/models/loginmodels.php';
    

    class UserApiController extends ApiController {
        private $model;
        private $authHelper;

        function __construct() {
            parent::__construct();
            $this->authHelper = new AuthHelper();
            $this->model = new loginModel();
        }

        function getToken($params = []) {
            $basic = $this->authHelper->getAuthHeaders();

            if(empty($basic)) {
                $this->viewc->response('No envió encabezados de autenticación.', 401);
                return;
            }

            $basic = explode(" ", $basic);

            if($basic[0]!="Basic") {
                $this->viewc->response('Los encabezados de autenticación son incorrectos.', 401);
                return;
            }

            $userpass = base64_decode($basic[1]);
            $userpass = explode(":", $userpass); 

            $username = $userpass[0];
            $password = $userpass[1];

            $user = $this->model->getUserByUsername($username);

            $userdata = [ "name" => $user];
       
            if($user && password_verify($password, $user->password)) {
                            
                $token = $this->authHelper->createToken($userdata);
                $this->viewc->response($token, 200);
                return;
            } else {
                $this->viewc->response('El usuario o contraseña son incorrectos.', 401);
                return;
            }
        }
    }