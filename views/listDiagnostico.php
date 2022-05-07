<?php 
include_once dirname(__FILE__).'./../layouts/header.php';
include_once dirname(__FILE__).'./../controllers/DiagnosticoController.php'; 

$diagnosticos = DiagnosticoController::getAll();
// print_r($res);
?>
<a class="btn btn-primary" href="/sissalud">Volver</a>
<a class="btn btn-success" href="/sissalud/views/formDiagnostico.php">Crear Nuevo</a>
<h1 class="my-3">Listado de Diagnosticos</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Fecha</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($diagnosticos as $diagnostico) { ?>  
    <tr>
      <th scope="row"><?php echo $diagnostico->getId();?></th>
      <td><?php echo $diagnostico->getCodigo();?></td>
      <td><?php echo $diagnostico->getDetalle();?></td>
      <td><?php echo $diagnostico->getFecha_registro();?></td>
      <td><a class="btn btn-sm btn-success" href="editDiagnostico.php?id=<?php echo $diagnostico->getId();?>" >Ver</a>
      <a class="btn btn-sm btn-danger" href="changeEstateDiagnostico.php?id=<?php echo $diagnostico->getId();?>&state=2" onclick="return confirm('Está seguro que desea rechazar el Diagnostico')">Eliminar</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once 'C:\projects\xampp\htdocs\sissalud\layouts\footer.php' ?>