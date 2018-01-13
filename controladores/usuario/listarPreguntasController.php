<?php

include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/ProductoClass.php');

//se obtienen datos del ajax
$data = json_decode(file_get_contents('php://input'));

//se setean variables locales
$idProducto = strip_tags($data->idProducto);

//Se inicializa la conexion a la base de datos
$conn = new ConexionBD();
$conexion = $conn->getConexion();

//Se ejecuta la funcion de la clase y se optienen los resultados
$output = Producto::listarPreguntasYRespuestas($conexion, $idProducto);

//se cierra la conexion
$conn->cerrarConexion();

//Se devuelven los resultados
echo json_encode($output);