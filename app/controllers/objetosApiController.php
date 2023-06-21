<?php
require_once './app/models/objetosModel.php';
require_once './app/views/objetosApiView.php';
Class objetosApiController{
    private $model;
    private $apiView;
    //private $data;

    public function __construct(){
        $this->model = new objetosModel();
        $this->apiView = new objetosApiView();
        // lee el body del request
        //$this->data = file_get_contents("php://input"); 
    }

    /*private function getData() {
        return json_decode($this->data);
    }*/

    public function obtenerObjetos() {
        $objetos = $this->model->getDatos();
        
        if($objetos)
            return $this->apiView->response($objetos, 200);
        else
            return $this->apiView->response("No se encontraron los objetos", 404);
    }

}