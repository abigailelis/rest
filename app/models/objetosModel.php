<?php
require_once './img';
Class objetosModel{
    public function getDatos(){
        $objects = new stdClass();
        $objects->flower = [ "images" => [ "./img/flower_0.jpg","./img/flower_1.jpg","./img/flower_2.jpg","./img/flower_3.jpg","./img/flower_4.jpg"], 
                             "name" => "Flores"];

        $objects->tree = [ "images" => ["./img/tree_0.jpg",
                                        "./img/tree_1.jpg",
                                        "./img/tree_2.jpg",
                                        "./img/tree_3.jpg",
                                        "./img/tree_4.jpg"], 
                            "name" => "Arboles"];
        
        $objects->duck = [ "images" => ["./img/duck_0.jpg",
                                        "./img/duck_1.jpg",
                                        "./img/duck_2.jpg",
                                        "./img/duck_3.jpg",
                                        "./img/duck_4.jpg"], 
                                "name" => "Patos"];
        return $objects;
    }
}