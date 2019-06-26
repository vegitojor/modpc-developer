<?php 

Class ConexionBD {
	// un comentario
	private $servidor = "mysql.hostinger.com.ar";
	private $usuario = "u806568264_root";
	private $pass = "abeh++11";
	private $bd = "u806568264_modpc";

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
