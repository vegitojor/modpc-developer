<?php 

require_once("../clases/ConexionBDClass.php");

$conn = new ConexionBD();

//array para almacenar resultados
$output = array();

//consulta a la base de datos
$sql = "SELECT id_provincia,
				provincia 
				 FROM provincia";

$resultado = $conn->ejecutarConsulta($sql);

while($fila = mysqli_fetch_assoc($resultado)){
	$fila['id_provincia'] = (int)$fila['id_provincia'];
	$fila['provincia'] = utf8_encode($fila['provincia']);
	$output[] = $fila;
}


//devolucion del resultado en json
echo json_encode($output); 

?>