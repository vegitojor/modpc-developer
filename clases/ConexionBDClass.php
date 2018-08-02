<?php 

Class ConexionBD {

	private $servidor = "mysql.hostinger.com.ar";
	private $usuario = "u771724353_mysql";
	private $pass = "Passw0rd6";
	private $bd = "u771724353_mysql";
	private $conexion;

	function __construct(){
		$this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->bd);
	}

	function getConexion(){
		return $this->conexion;
	}

	function ejecutarConsulta($sql){
		$query = mysqli_query($this->conexion, $sql);
		return $query;
	}

	function prepare($sql){
		$resultado = mysqli_prepare($this->conexion, $sql);
		return $resultado;
	}

	function cerrarConexion(){
        mysqli_close($this->conexion);
    }

}

?>
