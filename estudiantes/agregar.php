<?php 

require_once '..\layout\layout.php';
require_once '..\helpers\utilidades.php';
require_once 'estudiantes.php';
require_once '../Service/IServiceBase.php'; 
require_once 'cookies.php';

$layout = new Layout(true);
$service = new EsCookies();
$utilities = new Utilidades();


if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_FILES['foto'])&& isset($_POST['lista']) && isset($_POST['estado'])){

 $newEstudiante = new estudiantes();

 $newEstudiante->constructor(0, $_POST['nombre'],$_POST['apellido'],$_POST['carrera'],$_POST['lista'],$_POST['estado'] );
  
$service->Add($newEstudiante);
 


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
       <a href="../index.php" class="btn btn-secondary">Volver atras</a> Registro de estudiantes
  </div>
  <div class="card-body">

  <form enctype="multipart/form-data" action="agregar.php" method="POST">

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>

  <div class="form-group">
    <label for="apellido">Apellido</label>  
    <input type="text" class="form-control" id="apellido" name="apellido">
  </div>
    

  <div class="form-group">
        <label for="carrera">Carrera</label>
            <select class="form-control" id="carrera" name="carrera">

              <?php foreach($utilities->carrera as $id => $text): ?>
                <option value="<?php echo($id); ?>"> <?php echo $text; ?></option>

              <?php endforeach; ?>
            </select>

    
    </div>

    <div class="form-group">
    <label for="lista">Materias favoritas</label>
    <input type="text" class="form-control" id="lista" name="lista">
  </div>


  <div class="form-group">
    <label for="estado">Estado del estudiante</label>
  
  <div>
    <p><input type="checkbox"  id="estado" name="estado" value="Activo"> Activo</p>
  </div>
  </div>
    <div class="form-group">
    <label for="foto">Foto de perfil</label>  
    <input type="file" class="form-control" id="foto" name="foto">
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
