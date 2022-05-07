<?php 
include_once './layouts/header.php';
include_once './controllers/PacienteController.php';
include_once './controllers/DiagnosticoController.php';
include_once './controllers/TiposDocumentoController.php';
include_once './controllers/PacientesDiagnosticosController.php';
include_once './controllers/Validador.php';

$diagnosticos = DiagnosticoController::getAll();
$tipos_documento = TiposDocumentoController::getAll();
// echo count($diagnosticos);
// echo count($tipos_documento);
if (isset($_POST['btnEnviar'])){
    $paciente = PacienteController::create($_POST['nombres'], $_POST['apellidos'], $_POST['tipo_documento'], $_POST['num_documento'], $_POST['direccion'], $_POST['telefono']);
    if ($paciente != 0 && $paciente !=null)
        $paciente_diagnostico = PacientesDiagnosticosController::create($paciente, $_POST['diagnostico']);
    if($paciente_diagnostico){
        echo '<p class="mb-3 alert alert-success">Se hecho el registro correctamente!</p>';
    }else{
        echo '<p class="mb-3 alert alert-danger">Ha ocurrido un error por favor vuelva a intentarlo!</p>';
        echo '<p class="mb-3 alert alert-danger">Asegurese de ingresar todos lo datos que se le solicitan</p>';
    }
}
?>
    <div class="d-flex justify-content-center">
    <form method="post" action="">
        <div class="row">
        <div class="m-2 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de documento</label>
            <select name="tipo_documento" class="form-control" aria-label="Default select example" required>
                <option selected>Opciones</option>
                <?php 
                    for ($i = 0; $i < count($tipos_documento); $i++){
                        echo "<option value='".$tipos_documento[$i]->getId()."'>.".$tipos_documento[$i]->getDetalle()."</option>";
                    }
                ?>
                <!-- <option value="cedula ciudadania">Cedula Ciudadania</option>
                <option value="cedula extranjeria">Cedula Extranjeria</option>
                <option value="tarjeta de identidad">Tarjeta de identidad</option> -->
            </select>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label"># Documento</label>
            <input name="num_documento" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Nombres</label>
            <input name="nombres" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Apellidos</label>
            <input name="apellidos" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input name="direccion" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Diagnostico</label>
            <select name="diagnostico" class="form-control" aria-label="Default select example" required>
                <option selected>Opciones</option>
                <?php 
                    for ($i = 0; $i < count($diagnosticos); $i++){
                        echo "<option value='".$diagnosticos[$i]->getId()."'>.".$diagnosticos[$i]->getCodigo()." - ".$diagnosticos[$i]->getDetalle()."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="col-md-12 text-center my-3">
        <button type="submit" class="btn btn-primary" name="btnEnviar">Guardar</button>
        </div>    
        </div>
        
        </form>
        </div>
<?php include_once './layouts/footer.php' ?>