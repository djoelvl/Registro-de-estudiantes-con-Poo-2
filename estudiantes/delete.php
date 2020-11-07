<?php 


require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';


$service = new EsCookies();

$idContaint = isset($_GET['id']);



if($idContaint){

    $estudianteId = $_GET['id'];

    $service->Delete($estudianteId);
}

header("Location: ../index.php");
exit();

?>