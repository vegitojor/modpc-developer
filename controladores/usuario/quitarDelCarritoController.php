<?php

include_once ('../../incluciones/verificacionUsuario.php');
include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/ProductoClass.php');

//TOMO LOS DATOS DEL AJAX DEL JS
$data = json_decode(file_get_contents('php://input'));

$usuario = strip_tags($data->usuario);
$usuario = (int)$usuario;

$producto = strip_tags($data->producto);
$producto = (int)$producto;

//CREO LA CONEXION A LA BASE DE DATOS
$conn = new ConexionBD();
$conexion = $conn->getConexion();


//SE QUITA EL PRODUCTO DEL CARRITO
$respuesta = Producto::quitarDelCarrito($conexion, $producto, $usuario);

//SE CIERRA LA CONEXION DE LA BASE DE DATOS
$conn->cerrarConexion();

//SE DEVUELVE LA RESPUESTA
if($respuesta > 0) {
    $mensaje = ['respuesta' => 1,];
    echo json_encode($mensaje);
}
elseif ($respuesta == 0) {
    $mensaje = ['respuesta' => 0,];
    echo json_encode($mensaje);
}
elseif ($respuesta < 0) {
    $mensaje = ['respuesta' => 2,];
    echo json_encode($mensaje);
}
else {
    $mensaje = ['respuesta' => 3,];
    echo json_encode($mensaje);
}


