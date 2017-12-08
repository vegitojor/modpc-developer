<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 5/12/17
 * Time: 22:49
 */

include_once ('../clases/ConexionBDClass.php');
include_once ('../clases/ProductoClass.php');

$conn = new ConexionBD();
$conexion = $conn->getConexion();

$output = array();
$output = Producto::cargarProductos($conexion);

echo json_encode($output);