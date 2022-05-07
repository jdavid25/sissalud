<?php 
include_once dirname(__FILE__).'./../layouts/header.php';
include_once dirname(__FILE__).'./../controllers/DiagnosticoController.php';
include_once dirname(__FILE__).'./../controllers/Validador.php';

if (isset($_POST['btnEnviar'])){
    $res = DiagnosticoController::create($_POST['codigo'], $_POST['detalle']);
    if($res){
        header('Location: listDiagnostico.php');
    }else{
        echo '<p class="mb-3 alert alert-danger">Ha ocurrido un error por favor vuelva a intentarlo!</p>';
        echo '<p class="mb-3 alert alert-danger">Asegurese de ingresar todos lo datos que se le solicitan</p>';
    }
}
?>
<a class="btn btn-primary" href="/sissalud/views/listDiagnostico.php">Volver</a>
    <div class="d-flex justify-content-center">
    <form method="post" action="">
        <div class="row">
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Código</label>
            <input name="codigo" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Descripción</label>
            <input name="detalle" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <button type="submit" class="btn btn-primary" name="btnEnviar">Guardar</button>
        </div>    
        </div>
        
        </form>
        </div>
<?php include_once dirname(__FILE__).'./../layouts/footer.php' ?>