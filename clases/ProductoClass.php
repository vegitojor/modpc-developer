<?php

Class Producto{
	private $id;
	private $descripcion;
	private $precio;
	private $valoracion;
	private $mesesGarantia;
	private $nuevo;
	private $codFabricante;
	private $modelo;
	private $disponible;
	private $codProveedor;
	private $fotoProducto;
	private $videoProducto;
	private $proveedor;
	private $categoria;
	private $marca;

	function __construct(){
		
	}

	public static function guardarFichaTecnica($conexion, $nombre, $cadena){
	    $consulta = "INSERT INTO Ficha_tecnica (nombre_ficha, cadena_campos)
                      VALUES (?,?)";

	    $stmt = mysqli_prepare($conexion, $consulta);
	    mysqli_stmt_bind_param($stmt, 'ss', $nombre, $cadena);
	    mysqli_stmt_execute($stmt);
    }

    public static function listarNombresFichas($conexion){
        $consulta = "SELECT nombre_ficha
					FROM Ficha_tecnica";

        $resultado = mysqli_query($conexion, $consulta);
        $output = array();
        while($fila = mysqli_fetch_assoc($resultado)){
            $output[] = $fila;
        }
        return $output;
    }

    public static function cargarFichasTecnicas($conexion){
        $consulta = "SELECT id_Ficha_tecnica id,
                            nombre_Ficha nombreFicha
                    FROM Ficha_tecnica";

        $resultado = mysqli_query($conexion, $consulta);
        $output = array();
        while($fila = mysqli_fetch_assoc($resultado)){
            $fila['id'] = (int)$fila['id'];
            $fila['nombreFicha'] = utf8_encode($fila['nombreFicha']);
            $output[] = $fila;
        }
        return $output;
    }

    public static function cargarFichaTecnicaPorIdCategoria($conexion, $idCategoria){
        $consulta = "SELECT F.cadena_campos ficha
                    FROM categoria C JOIN Ficha_tecnica F ON C.id_Ficha_tecnica = F.id_Ficha_tecnica
                    WHERE C.id_categoria = ?";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $idCategoria);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        $output = mysqli_fetch_assoc($resultado);

        return $output;
    }
}
?>