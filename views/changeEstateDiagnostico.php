<?php

include_once dirname(__FILE__).'./../controllers/DiagnosticoController.php';

DiagnosticoController::changeState($_GET['id'],$_GET['state']);
header('Location: http://localhost/sissalud/views/listDiagnostico.php');
