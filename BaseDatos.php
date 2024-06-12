<?php
    class BaseDatos{
        private $conexion;
        
        public function __construct(){
            $this->conexion = new PDO("mysql:host=localhost;dbname=restaurante;","root","12345");

        }
        public function consulta($sql){
            $query = $this->conexion->prepare($sql);
            $query -> execute();
            return $query->fetchAll();
        }
        public function lastInsertId() {
            return $this->conexion->lastInsertId();
        }
        public function cerrar(){
            $this->conexion=null;
        }
    }