<?php

Class objetosModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_CleaningHouse;charset=utf8', 'root', '');
    }
    public function getDatos(){
        $query = $this->db->prepare ("SELECT * FROM productos");
        $query->execute();
        $objetos = $query->fetchAll(PDO::FETCH_OBJ);
        return $objetos;
    }
    public function getObjeto($id){
        $query = $this->db->prepare ("SELECT * FROM productos WHERE (id) = :id");
        $query->execute([':id'=>$id]);
        $objeto = $query->fetchAll(PDO::FETCH_OBJ);
        return $objeto;
    }

    public function agregarObjeto($objeto){
        $query = $this->db->prepare("INSERT INTO productos (nombre, descripcion, precio) 
                                     VALUES (:nombre, :descripcion, :precio)");
        $query->execute([':nombre' => $objeto->nombre, 
                         ':descripcion' => $objeto->descripcion, 
                         ':precio' => $objeto->precio]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function eliminarObjeto($id){
        $query = $this->db->prepare("DELETE FROM productos WHERE (id) = (:id)");
        $query->execute([':id' => $id]);
    }
}