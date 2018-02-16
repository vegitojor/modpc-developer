<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 17/12/17
 * Time: 19:02
 */


include_once ('../../clases/ConexionBDClass.php');
include_once ('../../clases/ProductoClass.php');

//TOMO LOS DATOS DEL AJAX DEL JS
$data = json_decode(file_get_contents('php://input'));

$usuario = strip_tags($data->usuario);
$usuario = (int)$usuario;

$producto = strip_tags($data->producto);
$producto = (int)$producto;

$fecha = strip_tags($data->fecha);

//CREO LA CONEXION A LA BASE DE DATOS
$conn = new ConexionBD();
$conexion = $conn->getConexion();

//CONSULTO SI EL USUARIO AGREGO EL PRODUCTO AL CARRITO
$verificacion = Producto::verificarExistenciaDeProductoEnCarrito($conexion, $producto, $usuario);

if($verificacion['existe'] > 0 ){
	$mensaje = ['respuesta'=>2,];
	echo json_encode($mensaje);
}else{
	//SI EL PRODUCTO NO SE AGREGO, SE AGREGA
	$respuesta = Producto::agregarAlCarrito($conexion, $producto, $usuario, $fecha);

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

}

