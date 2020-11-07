<?php 
class Utilidades{

  public $carrera = [1 => "Redes", 2 => "Software", 3 => "Multimedia", 4 => "Mecatronica", 5 => "Seguridad informática"];
    
    
  public function getLastElement($list){
    
        $countList = count($list);
        $lastElement = $list[$countList - 1];
    
        return $lastElement;
    
        
    }
    
    
    
    
    
    public function buscar($list,$property,$value){
    $filter = [];
    
    foreach($list as $item){
        if($item->$property == $value){
            array_push($filter, $item);
        }
    
    }
    
    return $filter;
    }
    
    public function GetCookieTime(){
    return time() + 60*60*24*30;
}

public function getIndexElement($list,$property,$value){
        $index = 0;
        
        foreach($list as $key => $item){
            if($item->$property == $value){
               $index = $key;
        }
    }   
    return $index;
    } 

    public function uploadImage($directory,$name,$tmpFile,$type,$size){

        $isSucces = false;

        if(($type == "image/gif") || ($type == "image/jpeg") 
        || ($type == "image/png") || ($type == "image/jpg") 
        || ($type == "image/JPG") || ($type == "image/pjpeg") && ($size <1000000)){

            if(!file_exists($directory)){
                
                mkdir($directory,0777,true);

                if(file_exists($directory)){
              
                $this->uploadFile($directory . $name,$tmpFile);
             
                $isSucces = true;
            }
        }
    else{
        $this->uploadFile($directory . $name,$tmpFile);
             
        $isSucces = true;
    }
}
else{
    $isSucces = false;

}
    return $isSucces;
}
    


    private function uploadFile($name,$tmpFile){
        if(!file_exists($name)){
            unlink($name);

        }

        move_uploaded_file($tmpFile, $name);
        

    }


    
}

?>