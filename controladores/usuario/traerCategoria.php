<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 10/12/17
 * Time: 22:29
 */

include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/CategoriaClass.php');

$data = json_decode(file_get_contents('php://input'));

$idCategoria = $data->categoria;

$conn = new ConexionBD();
$conexion = $conn->getConexion();

$categotria = new Categoria($idCategoria, null, null);
$resultado = $categotria->traerNombreCategoria($conexion);

echo json_encode($resultado);