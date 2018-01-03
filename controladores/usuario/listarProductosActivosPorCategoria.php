<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 13:53
 */

include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/ProductoClass.php');

$data = json_decode(file_get_contents('php://input'));

$idCategoria = strip_tags($data->idCategoria);

$conn = new ConexionBD();
$conexion = $conn->getConexion();

$resultado = Producto::listarProductosDisponiblesPorIdCategoria($conexion, $idCategoria);

echo json_encode($resultado);