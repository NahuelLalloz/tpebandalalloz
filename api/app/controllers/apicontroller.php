<?php
    require_once 'app/views/apiview.php';
    
    abstract class ApiController {
        protected $viewc;
        private $data;
        
        function __construct() {
            $this->viewc = new ApiView();
            $this->data = file_get_contents('php://input');
        }

        function getData() {
            return json_decode($this->data);
        }
    }
