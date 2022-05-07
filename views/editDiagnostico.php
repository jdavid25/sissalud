<?php 
include_once dirname(__FILE__).'./../layouts/header.php';
include_once dirname(__FILE__).'./../controllers/DiagnosticoController.php';
include_once dirname(__FILE__).'./../controllers/Validador.php';
$id = $_GET['id'];
if (isset($_POST['btnEnviar'])){
    $res = DiagnosticoController::update($_POST['id'], $_POST['codigo'], $_POST['detalle']);
    if($res){
        header('Location: http://localhost/sissalud/views/listDiagnostico.php');
    }
}
if (isset($id) == null){
    header('Location: http://localhost/sissalud/views/listDiagnostico.php');
}else{
    $diagnostico = DiagnosticoController::getById($id);
}
?>
<a class="btn btn-primary" href="/sissalud/views/listDiagnostico.php">Volver</a>
    <div class="d-flex justify-content-center">
    <form method="post" action="">
        <div class="row">
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Código</label>
            <input name="codigo" type="text" class="form-control" value="<?=$diagnostico->getCodigo()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Descripción</label>
            <input name="detalle" type="text" class="form-control" value="<?=$diagnostico->getDetalle()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Fecha</label>
            <input disabled name="detalle" type="text" class="form-control" value="<?=$diagnostico->getFecha_registro()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <button type="submit" class="btn btn-primary" name="btnEnviar">Guardar</button>
        </div>    
        </div>
        <input name="id" type="hidden" class="form-control" value="<?=$diagnostico->getId()?>">
        </form>
        </div>
<?php include_once dirname(__FILE__).'./../layouts/footer.php' ?>