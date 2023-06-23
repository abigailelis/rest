<?php
require_once './app/models/objetos.model.php';
require_once './app/views/objetos.api.view.php';
Class objetosApiController{
    private $model;
    private $view;
    private $data;

    public function __construct(){
        $this->model = new objetosModel();
        $this->view = new objetosApiView();
        // lee el body del request
        $this->data = file_get_contents("php://input"); 
    }

    private function getData() {
        return json_decode($this->data);
    }

    public function obtenerObjetos() {
        $objetos = $this->model->getDatos(); 
        return $this->view->response($objetos, 200);
    }

    public function obtenerObjeto($params){
        if (isset($params[':ID'])){
            $objeto = $this->model->getObjeto($params[':ID']); 
            return $this->view->response($objeto, 200);
        } 
        else{
            return $this->view->response("El producto no existe", 404);
        }
    }

    public function agregarObjeto(){
        $producto = $this->getData();
        if (empty($producto->nombre) || empty($producto->descripcion) || empty($producto->precio)){
            return $this->view->response("Complete los datos", 400);
        }
        else{
            $id = $this->model->agregarObjeto($producto); 
            $objeto = $this->model->getObjeto($id);
            return $this->view->response($objeto, 201);
        }
    }

    public function eliminarObjeto($params){
        if ($params[':ID']){
            $id = $params[':ID'];
            $objeto = $this->model-> getObjeto($id);
            if($objeto){
                $this->model->eliminarObjeto($id); 
                return $this->view->response($objeto, 200);
            }
            else    
                return $this->view->response("El objeto no se pudo borrar porque no existe el id: ".$id, 404);
            
        }
    }

}