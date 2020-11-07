<?php 

require_once 'layout/layout.php';
require_once 'helpers/utilidades.php';
require_once 'estudiantes/estudiantes.php';
require_once 'Service/IServiceBase.php'; 
require_once 'estudiantes/cookies.php'; 

$layout = new Layout(false);
$utilities = new Utilidades();
$service = new EsCookies(); 


$listado = $service->GetList();


if(!empty($listado)){
if(isset($_GET['carreraId'])){

  $listado = $utilities->buscar($listado,'carreraId',$_GET['carreraId']);
}
}

?>

<?php $layout->printHeader();?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
        <a href="estudiantes/agregar.php" class="btn btn-primary my-2">Registrar estudiantes</a>
        
      
    </div>
  </section>

  
</main>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<div class="btn-group">
<a href="index.php" class= "btn btn-dark text-light">Todos</a>
<a href="index.php?carreraId=1" class= "btn btn-dark text-light">Redes</a>
<a href="index.php?carreraId=2" class= "btn btn-dark text-light">Software</a>
<a href="index.php?carreraId=3" class= "btn btn-dark text-light">Multimedia</a>
<a href="index.php?carreraId=4" class= "btn btn-dark text-light">Mecatronica </a>
<a href="index.php?carreraId=5" class= "btn btn-dark text-light">Seguridad informática</a>

</div>
</div>
</div>
<div class="col-md-4"></div>

<?php if(empty($listado)):?>
<p>No hay contactos registrados <p>


<?php else:?>
  <?php foreach($listado as $contact):?>
  
    <div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
  <div class="card">
<?php if($contact->foto=="" || $contact->foto== null):?>

  <img class="bd-placeholder-img card-img-top" src="<?php echo "assets/img/estudiante/no.png"; ?>" width="100%" height="225" aria-label="Placeholder: Thumbnail">
<?php else: ?>
  <img class="bd-placeholder-img card-img-top" src="<?php echo "assets/img/estudiante/" . $contact->foto; ?>" width="100%" height="225" aria-label="Placeholder: Thumbnail">

<?php endif; ?>
  <div class="card-body">
    <h5 class="card-title">Nombre: <?php echo$contact->nombre; ?></h5>
    <h5 class="card-subtitle mb-2 text-muted">Apellido: <?php echo $contact->apellido; ?></h5>
    <h5 class="card-title">Estado del estudiante: <?php echo$contact->state; ?></h5>
    <h5 class="card-subtitle mb-2 text-muted">Carrera: <?php echo $contact->getcarreraName();?></h5>
    <a href="estudiantes/delete.php?id=<?php echo $contact->id; ?>" class="card-link">Borrar </a>
    <a href="estudiantes/editar.php?id=<?php echo $contact->id; ?>" class="card-link">editar</a>
    <a href="detalle.php?id=<?php echo $contact->id; ?>" class="card-link">Detalle del estudiante</a>
  </div>
</div>
</div>
</div>


  <?php endforeach;?>

<?php endif;?>

<?php $layout->printFooter();?>
