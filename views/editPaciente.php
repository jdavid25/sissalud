<?php 
include_once dirname(__FILE__).'./../layouts/header.php';
include_once dirname(__FILE__).'./../controllers/PacienteController.php';
include_once dirname(__FILE__).'./../controllers/TiposDocumentoController.php';
include_once dirname(__FILE__).'./../controllers/Validador.php';
$id = $_GET['id'];
$tipos_documento = TiposDocumentoController::getAll();
if (isset($_POST['btnEnviar'])){
    $res = PacienteController::update($_POST['id'], $_POST['nombres'], $_POST['apellidos'], $_POST['tipo_documento'], $_POST['num_documento'], $_POST['direccion'], $_POST['telefono']);
    echo $res;
    // if($res){
    //     header('Location: http://localhost/sissalud/views/listPacientes.php');
    // }
}
if (isset($id) == null){
    header('Location: http://localhost/sissalud/views/listPacientes.php');
}else{
    $paciente = PacienteController::getById($id);
}
?>
<a class="btn btn-primary" href="/sissalud/views/listPacientes.php">Volver</a>
    <div class="d-flex justify-content-center">
    <form method="post" action="">
        <div class="row">
        <div class="m-2 col-md-3">
            <label for="exampleInputEmail1" class="form-label">Tipo de documento</label>
            <select name="tipo_documento" value="<?=$paciente->getTipo_documento()?>" class="form-control" aria-label="Default select example" required>
                <option selected>Opciones</option>
                <?php 
                    for ($i = 0; $i < count($tipos_documento); $i++){
                        echo "<option value='".$tipos_documento[$i]->getId()."'>.".$tipos_documento[$i]->getDetalle()."</option>";
                    }
                ?>
            </select>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label"># Documento</label>
            <input disabled name="num_documento" type="text" class="form-control" value="<?=$paciente->getNum_documento()?>">
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Nombres</label>
            <input name="nombres" type="text" class="form-control" value="<?=$paciente->getNombres()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Apellidos</label>
            <input name="apellidos" type="text" class="form-control" value="<?=$paciente->getApellidos()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Dirección</label>
            <input name="direccion" type="text" class="form-control" value="<?=$paciente->getDireccion()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control" value="<?=$paciente->getTelefono()?>" required>
        </div>
        <div class="m-2 col-md-3">
            <label for="exampleInputPassword1" class="form-label">Fecha</label>
            <input disabled name="telefono" type="text" class="form-control" value="<?=$paciente->getFecha_registro()?>">
        </div>
        <div class="col-md-12 text-center my-3">
        <button type="submit" class="btn btn-primary" name="btnEnviar">Guardar</button>
        </div>    
        </div>
        <input name="id" type="hidden" class="form-control" value="<?=$paciente->getId()?>">
        </form>
        </div>
<?php include_once dirname(__FILE__).'./../layouts/footer.php' ?>