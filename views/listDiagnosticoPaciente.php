<?php 
include_once 'C:\projects\xampp\htdocs\sissalud\layouts\header.php';
include_once 'C:\projects\xampp\htdocs\sissalud\controllers\DiagnosticoController.php'; 

$diagnosticos = DiagnosticoController::getByPacienteId($_GET['id']);
// print_r($res);
?>
<a class="btn btn-primary" href="/sissalud">Volver</a>
<h1 class="my-3">Listado de Diagnosticos</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Detalle</th>
      <th scope="col">Fecha</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($diagnosticos as $diagnostico) { ?>  
    <tr>
      <th scope="row"><?php echo $diagnostico->getId();?></th>
      <th><?php echo $diagnostico->getDetalle();?></th>
      <td><?php echo $diagnostico->getFecha_registro();?></td>
      <td><a class="btn btn-sm btn-success" href="change_state.php?id=id&state=6" >Ver</a>
      <a class="btn btn-sm btn-danger" href="change_state.php?id=id&state=5" onclick="return confirm('Está seguro que desea rechazar la Solicitud')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once 'C:\projects\xampp\htdocs\sissalud\layouts\footer.php' ?>