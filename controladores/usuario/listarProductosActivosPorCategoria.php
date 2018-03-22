<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 13:53
 */

include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/ProductoClass.php');

//se toman los datos del ajax
$data = json_decode(file_get_contents('php://input'));

$idCategoria = strip_tags($data->idCategoria);

$desde = strip_tags($data->desde);
$desde = (int)$desde;


$limite = strip_tags($data->limite);
$limite = (int)$limite;

//SE CREA CONEXION A BASE DE DATOS
$conn = new ConexionBD();
$conexion = $conn->getConexion();

//SE BUSCA LA INFORMACION NECESARIA
$resultado = Producto::listarProductosDisponiblesPorIdCategoria($conexion, $idCategoria, $desde, $limite);

//SE DEVUELVE LA INFO OBTENIDA
echo json_encode($resultado);