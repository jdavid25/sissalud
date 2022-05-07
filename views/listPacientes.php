<?php 
include_once 'C:\projects\xampp\htdocs\sissalud\layouts\header.php';
include_once 'C:\projects\xampp\htdocs\sissalud\controllers\PacienteController.php'; 

$pacientes = PacienteController::getAll();
// print_r($res);
?>
<a class="btn btn-primary" href="/sissalud">Volver</a>
<h1 class="my-3">Listado de Pacientes</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pacientes as $paciente) { ?>  
    <tr>
      <th scope="row"><?php echo $paciente->getId();?></th>
      <td><?php echo $paciente->getNombres() . " " . $paciente->getApellidos();?></td>
      <td><?php echo $paciente->getDireccion();?></td>
      <td><?php echo $paciente->getTelefono();?></td>
      <td><a class="btn btn-sm btn-success" href="editPaciente.php?id=<?php echo $paciente->getId();?>" >Ver</a>
      <a class="btn btn-sm btn-danger" href="changeEstatePaciente.php?id=<?php echo $paciente->getId();?>&state=2" onclick="return confirm('Está seguro que desea rechazar el Paciente')">Eliminar</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once 'C:\projects\xampp\htdocs\sissalud\layouts\footer.php' ?>