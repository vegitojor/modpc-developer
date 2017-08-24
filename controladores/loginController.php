<?php 
require_once('../clases/ConexionBDClass.php');
require_once('../clases/ClienteClass.php');

//toma de datos desde llamado ajax
$data = json_decode(file_get_contents('php://input'));

$email = strip_tags($data->email);
$pass = md5($data->pass);

var_dump($email);
var_dump($pass);
//se crea objeto y se pide conexion a BD
$objetoConexion = new ConexionBD();
$conexion = $objetoConexion->getConexion();

//se consulta la existencia del usuario en la BD
$emailRegistrado = Cliente::consultarCliente($conexion, $email, $pass);

//se crea la sesion en base a la respuesta de la funcion anterior
$mensaje = array();
if($emailRegistrado){
	//configuración de la cokie
	ini_set('session.cookie_lifetime',);
	ini_set('session.hash_bits_per_character','4');
	ini_set('session.hash_function', 'sha256');
	session_name("sesionModPc");
	//inicio de sesion
	session_start();

	$mensaje['respuesta'=> 1,];
	//carga de datos a la sesion
	$_SESSION['usuario'] = Cliente::ObtenerCliente($conexion, $email, $pass);

	$mensaje['admin'] = $_SESSION['usuario']['admin'];
	echo json_encode($mensaje);
}else if($emailRegistrado == Null){
	$mensaje['respuesta'=> 0,];
	echo json_encode($mensaje);
}else{
	$mensaje['respuesta' = 2,];
	echo json_encode($mensaje);
}


?>