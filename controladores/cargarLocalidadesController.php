<?php 
require_once('../clases/ConexionBDClass.php');
require_once('../clases/ClienteClass.php');

$conn = new ConexionBD();
$conexion = $conn->getConexion();

$data = json_decode(file_get_contents("php://input"));
$data->idProvincia = (int)$data->idProvincia;


$resultado = Cliente::cargarlocalidades($conexion, $data->idProvincia);

echo json_encode($resultado);

?>