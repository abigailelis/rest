<?php

Class objetosModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'db_name=db_CleaningHouse;charset=utf-8', 'root', '');
    }
    public function getDatos(){
        $query = $this->db->prepare ("SELECT * FROM productos");
        $query->execute();
        $objetos = $query->fetchAll(PDO::FETCH_OBJ);
        return $objetos;
    }
}