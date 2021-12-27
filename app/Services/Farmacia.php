<?php

namespace App\Services;

class Farmacia{

    private $id;
    private $nombre;
    private $direccion;
    private $latitud;
    private $longitud;

    public function __construct($no,$di,$la,$lo) {
        $this->nombre = $no;
        $this->direccion = $di;
        $this->latitud = $la;
        $this->longitud = $lo;
        
    }
    
    //se generan un listado de validaciones de campo
    public function validar_campos(){
        //listado de validaciones
        $listado_validaciones=array();

        //cargamos 3 validaciones de campo
        array_push($listado_validaciones,self::campo_texto($this->nombre,"Campo Nombre Texto"));
        array_push($listado_validaciones,self::campo_numerico($this->latitud,"Campo Latitud Numerico"));
        array_push($listado_validaciones,self::campo_numerico($this->longitud,"Campo Longitud Numerico"));

        //devolvemos un array con el listado y el pase exitoso o no de las validaciones
        $validaciones["exito"]=self::pasa_validaciones($listado_validaciones);
        $validaciones["listado"]=$listado_validaciones;
        
        return $validaciones;
    }

    //si el listado de validaciones no producen error, se genera exito
    public function pasa_validaciones($listado){
        $fail=0;
        $exito=false;
        
        for($i=0;$i<count($listado);$i++){
            if(!$listado[$i]["validacion"]){$fail++;}
        }

        if($fail===0){
            $exito=true;
        }

        return $exito;

    }

    public function campo_numerico($campo,$mensaje){
        $validaciones["validacion"]=is_numeric($campo);
        $validaciones["mensaje"]=$mensaje;
        return $validaciones;
    }

    public function campo_texto($campo,$mensaje){
        $validaciones["validacion"]=is_string($campo);
        $validaciones["mensaje"]=$mensaje;
        return $validaciones;
    }

    //metodo estatico para calculo de distancia entre 2 puntos, los valores $d1 y $d2 son array con latitud y longitud 
    public static function calculo_distancia($d1,$d2){
        //calculamos las diferecias de longitud exponencial
        $diferecia1=self::calculo_diferecia_exponencial($d1["longitud"]-$d2["longitud"]);
        //calculamos las diferecias de latitud exponencial
        $diferecia2=self::calculo_diferecia_exponencial($d1["latitud"]-$d2["latitud"]);
        //sumamos las diferencias
        $total=$diferecia1+$diferecia2;
        //al total hacemos raiz cuadrada para obtener la distancia entre los pares de puntos
        $distancia=sqrt($total);
        //devolvemos la distancia
        return $distancia;
    }

    public function calculo_diferecia_exponencial($d1,$d2){
        $diferecia=($d1-$d2);
        $exponente=pow(2, $diferecia);
        return $exponente;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of latitud
     */ 
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set the value of latitud
     *
     * @return  self
     */ 
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get the value of longitud
     */ 
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set the value of longitud
     *
     * @return  self
     */ 
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }
}