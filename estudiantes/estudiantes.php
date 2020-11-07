<?php 
class estudiantes{

    public $id;
    public $nombre;
    public $apellido;
    public $carreraId;
    public $fotoP;
    public $state;
    public $lista;
    private $utilities;


    public function __construct (){

        $this->utilities = new Utilidades();
    }

    public function constructor($id,$nombre,$apellido,$carreraId,$lista,$state){


        $this ->id = $id;
        $this ->nombre = $nombre;
        $this ->apellido = $apellido;
        $this ->carreraId = $carreraId;
        $this ->lista = $lista;
        $this ->state = $state;

    }

    public function set($data){
        foreach($data as $key => $value) $this->{$key}= $value;
    }

    public function getcarreraName(){
if($this->carreraId !=0 && $this->carreraId != null)
{
    return $this->utilities->carrera[$this->carreraId];
}

        
    
    }

}
?>