<?php

include_once dirname(__FILE__).'./../controllers/PacienteController.php';

PacienteController::changeState($_GET['id'],$_GET['state']);
header('Location: http://localhost/sissalud/views/listPacientes.php');
