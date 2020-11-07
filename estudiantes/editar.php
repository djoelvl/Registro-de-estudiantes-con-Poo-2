<?php 

require_once '..\layout\layout.php';
require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';

$layout = new Layout(true);
$service = new EsCookies();
$utilities = new Utilidades();


if(isset($_GET['id'])){

$editID=$_GET['id']; 

$element = $service->GetById($editID);

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_FILES['foto'])&& isset($_POST['lista']) && isset($_POST['estado1'])){

  
  $updateAlum = new estudiantes();
$updateAlum->constructor($editID,$_POST['nombre'],$_POST['apellido'],$_POST['carrera'],$_POST['lista'],$_POST['estado1'] );
  

  $service->Update($editID,$updateAlum);

  header("Location: ../index.php");
  exit();



}

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_FILES['foto'])&& isset($_POST['lista']) && isset($_POST['estado2'])){


  $updateAlum = new estudiantes();
$updateAlum->constructor($editID,$_POST['nombre'],$_POST['apellido'],$_POST['carrera'],$_POST['lista'],$_POST['estado2'] );
  

  $service->Update($editID,$updateAlum);

  header("Location: ../index.php");
  exit();


}

 
}

else{
  header("Location: ../index.php");
  exit(); 
}


?>

<?php $layout->printHeader();?>

<main role="main"> 
<div class="row margin-top">
<div class=" col-md-3"></div>

<div class=" col-md-6">
<div class="card">
  <div class="card-header">
       <a href="../index.php" class="btn btn-secondary">Volver atras</a> Editando a <?php echo $element->nombre ?>
  </div>
  <div class="card-body">

  <form enctype="multipart/form-data" action="editar.php?id=<?php echo $element->id ?>" method="POST">

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" value="<?php echo $element->nombre?>"class="form-control" id="nombre" name="nombre">
  </div>

  <div class="form-group">
    <label for="apellido">Apellido</label>  
    <input type="text" value="<?php echo $element->apellido?>" class="form-control" id="apellido" name="apellido">
  </div>

  <div class="form-group">
    <label for="apellido">Materias favoritas</label>  
    <input type="text" value="<?php echo $element->lista?>" class="form-control" id="lista" name="lista">
  </div>

  <div class="form-group">
    <label for="estado">Estado del estudiante</label>
  
  <div>
    <p><input type="checkbox"  id="estado" name="estado1" value="Activo"> Activo</p>
    <p><input type="checkbox"  id="estado" name="estado2" value="Inactivo"> Inactivo</p>

  </div>
  </div>

  <div class="form-group">
        <label for="carrera">Carrera</label>
            <select class="form-control" id="carrera" name="carrera">

              <?php foreach($utilities->carrera as $id => $text): ?>

              <?php if($id==$element->carreraId):   ?>
                <option selected value="<?php echo($id); ?>"> <?php echo $text; ?></option>
              <?php else:   ?>
                <option value="<?php echo($id); ?>"> <?php echo $text; ?></option>
              <?php endif;   ?>
              <?php endforeach; ?>
            </select>
    </div>


<div class="card">
<img class="bd-placeholder-img card-img-top" src="<?php echo "../assets/img/estudiante/" . $element->foto; ?>" width="100%" height="225" aria-label="Placeholder: Thumbnail">

<div class="form-body">
    <div class="form-group">
    <label for="apellido">Foto de perfil</label>  
    <input type="file" class="form-control" id="foto" name="foto">
  </div>
  </div>
  </div>
    <button type="submit" class="btn btn-secondary">Guardar</button>
</form>



  </div>
  
</div>

</div>




<div class=" col-md-3"></div> 

</div>





 
</main>

<?php $layout->printFooter();?>
