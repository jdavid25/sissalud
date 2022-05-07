<?php 
include_once dirname(__FILE__).'./../layouts/header.php';
include_once dirname(__FILE__).'./../controllers/PacientesDiagnosticosController.php'; 
include_once dirname(__FILE__).'./../controllers/PacienteController.php'; 
include_once dirname(__FILE__).'./../controllers/DiagnosticoController.php'; 

$pacientes_diagnosticos = PacientesDiagnosticosController::getAll();
for($i = 0; $i < count($pacientes_diagnosticos); $i++){
  $pacientes[] = PacienteController::getById($pacientes_diagnosticos[$i]->getPaciente_id());
  $diagnosticos[] = DiagnosticoController::getById($pacientes_diagnosticos[$i]->getDiagnostico_id());
}
// print_r($res);
?>
<a class="btn btn-primary" href="/sissalud">Volver</a>
<h1 class="my-3">Listado de Ingresos</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Paciente</th>
      <th scope="col">Diagnostico</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($pacientes_diagnosticos); $i++) { ?>  
    <tr>
      <th scope="row"><?php echo $pacientes_diagnosticos[$i]->getId();?></th>
      <td><?php echo $pacientes[$i]->getNombres()." ".$pacientes[$i]->getApellidos();?></td>
      <td><?php echo $diagnosticos[$i]->getCodigo()."-".$diagnosticos[$i]->getDetalle();?></td>
      <td><?php echo $pacientes_diagnosticos[$i]->getFecha_registro();?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once 'C:\projects\xampp\htdocs\sissalud\layouts\footer.php' ?>