<?php

Class Producto{
	private $id;
    private $descripcion;
    private $precio;
    private $mesesGarantia;
    private $nuevo;
    private $codFabricante;
    private $modelo;
    private $disponible;
    private $codProveedor;
    private $fotoProducto;
    private $videoProducto;
    private $categoria;
    private $proveedor;
    private $marca;
    private $sku;
    private $peso;
    private $alto;
    private $ancho;
    private $profundidad;
    private $idProductoFichaTecnica;

    /**
     * Producto constructor.
     * @param $id
     * @param $descripcion
     * @param $precio
     * @param $mesesGarantia
     * @param $nuevo
     * @param $codFabricante
     * @param $modelo
     * @param $disponible
     * @param $codProveedor
     * @param $fotoProducto
     * @param $videoProducto
     * @param $categoria
     * @param $proveedor
     * @param $marca
     * @param $sku
     * @param $peso
     * @param $alto
     * @param $ancho
     * @param $profundidad
     * @param $idProductoFichaTecnica
     */
    function __construct($id, $descripcion, $precio, $mesesGarantia, $nuevo, $codFabricante, $modelo, $disponible,
                         $codProveedor, $fotoProducto, $videoProducto, $categoria, $proveedor, $marca, $sku,
                         $peso, $alto, $ancho, $profundidad, $idProductoFichaTecnica){
		$this->id = $id;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->mesesGarantia = $mesesGarantia;
        $this->nuevo = $nuevo;
        $this->codFabricante = $codFabricante;
        $this->modelo = $modelo;
        $this->disponible = $disponible;
        $this->codProveedor = $codProveedor;
        $this->fotoProducto = $fotoProducto;
        $this->videoProducto = $videoProducto;
        $this->categoria = $categoria;
        $this->proveedor = $proveedor;
        $this->marca = $marca;
        $this->sku = $sku;
        $this->peso = $peso;
        $this->alto = $alto;
        $this->ancho = $ancho;
        $this->profundidad = $profundidad;
        $this->idProductoFichaTecnica = $idProductoFichaTecnica;
    }

    public function persistirse($conexion){
	    $consulta = "INSERT INTO producto (descripcion, precio, meses_garantia, nuevo, cod_fabricante, modelo, disponible,
                    cod_proveedor, path_imagen, path_video, id_categoria, id_proveedor, id_marca, codigo_sku, peso_caja,
                    alto_caja, ancho_caja, profundidad_caja, id_producto_ficha_tecnica)
                    VALUES (?,?,?,?,?, ?,?,?,?,?, ?,?,?,?,?, ?,?,?,?)";
	    $stmt = mysqli_prepare($conexion, $consulta);
	    mysqli_stmt_bind_param($stmt, "sdiissiissiiisddddi",
            $this->descripcion,
            $this->precio,
            $this->mesesGarantia,
            $this->nuevo,
            $this->codFabricante,

            $this->modelo,
            $this->disponible,
            $this->codProveedor,
            $this->fotoProducto,
            $this->videoProducto,

            $this->categoria,
            $this->proveedor,
            $this->marca,
            $this->sku,
            $this->peso,

            $this->alto,
            $this->ancho,
            $this->profundidad,
            $this->idProductoFichaTecnica);
	    mysqli_stmt_execute($stmt);


    }

	public static function guardarFichaTecnica($conexion, $nombre,
                                               $campo01,
                                               $campo02,
                                               $campo03 ,
                                               $campo04 ,
                                               $campo05 ,
                                               $campo06 ,
                                               $campo07 ,
                                               $campo08 ,
                                               $campo09 ,
                                               $campo10,
                                               $campo11,
                                               $campo12 ,
                                               $campo13,
                                               $campo14,
                                               $campo15,
                                               $campo16,
                                               $campo17,
                                               $campo18,
                                               $campo19,
                                               $campo20){
	    $consulta = "INSERT INTO ficha_tecnica (nombre_ficha,
                                    campo01,
                                    campo02,
                                    campo03 ,
                                    campo04 ,
                                    campo05 ,
                                    campo06 ,
                                    campo07 ,
                                    campo08 ,
                                    campo09 ,
                                    campo10,
                                    campo11,
                                    campo12 ,
                                    campo13,
                                    campo14,
                                    campo15,
                                    campo16,
                                    campo17,
                                    campo18,
                                    campo19,
                                    campo20)
                      VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	    $stmt = mysqli_prepare($conexion, $consulta);
	    mysqli_stmt_bind_param($stmt, 'sssssssssssssssssssss', $nombre,
                                                        $campo01,
                                                        $campo02,
                                                        $campo03,
                                                        $campo04,
                                                        $campo05,
                                                        $campo06,
                                                        $campo07,
                                                        $campo08,
                                                        $campo09,
                                                        $campo10,
                                                        $campo11,
                                                        $campo12,
                                                        $campo13,
                                                        $campo14,
                                                        $campo15,
                                                        $campo16,
                                                        $campo17,
                                                        $campo18,
                                                        $campo19,
                                                        $campo20);
	    mysqli_stmt_execute($stmt);
    }

    public static function listarNombresFichas($conexion){
        $consulta = "SELECT nombre_ficha
					FROM ficha_tecnica";

        $resultado = mysqli_query($conexion, $consulta);
        $output = array();
        while($fila = mysqli_fetch_assoc($resultado)){
            $output[] = $fila;
        }
        return $output;
    }

    public static function cargarFichasTecnicas($conexion){
        $consulta = "SELECT id_ficha_tecnica id,
                            nombre_ficha nombreFicha
                    FROM ficha_tecnica";

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
        $consulta = "SELECT F.nombre_ficha ficha,
                      campo01,
                      campo02,
                      campo03,
                      campo04,
                      campo05,
                      campo06,
                      campo07,
                      campo08,
                      campo09,
                      campo10,
                      campo11,
                      campo12,
                      campo13,
                      campo14,
                      campo15,
                      campo16,
                      campo17,
                      campo18,
                      campo19,
                      campo20                      
                    FROM categoria C JOIN ficha_tecnica F ON C.id_ficha_tecnica = F.id_ficha_tecnica
                    WHERE C.id_categoria = ?";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $idCategoria);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        $output = mysqli_fetch_assoc($resultado);

        return $output;
    }

    public static function guardarFichaTecnicaDelProducto($campo01,
                      $campo02,
                      $campo03,
                      $campo04,
                      $campo05,
                      $campo06,
                      $campo07,
                      $campo08,
                      $campo09,
                      $campo10,
                      $campo11,
                      $campo12,
                      $campo13,
                      $campo14,
                      $campo15,
                      $campo16,
                      $campo17,
                      $campo18,
                      $campo19,
                      $campo20, $conexion){
        $consulta = "INSERT INTO producto_ficha_tecnica (campo01, campo02,campo03,campo04,campo05,campo06,
                                  campo07,campo08,campo09,campo10,campo11,campo12,campo13,campo14,campo15,
                                  campo16,campo17,campo18,campo19,campo20)
                                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss",
            $campo01,
            $campo02,
            $campo03,
            $campo04,
            $campo05,
            $campo06,
            $campo07,
            $campo08,
            $campo09,
            $campo10,
            $campo11,
            $campo12,
            $campo13,
            $campo14,
            $campo15,
            $campo16,
            $campo17,
            $campo18,
            $campo19,
            $campo20);
        mysqli_stmt_execute($stmt);
        //se obtiene el id autogenerado yse retorna el valor
        $id = mysqli_insert_id($conexion);
        return $id;
    }

    public static function cargarProductos($conexion){
        $consulta = "SELECT p.id_producto AS id,
                            p.descripcion,
                            p.precio,
                            p.meses_garantia AS mesesGarantia,
                            p.nuevo,
                            p.cod_fabricante AS codFabricante,
                            p.modelo,
                            p.disponible,
                            p.cod_proveedor AS codProveedor,
                            p.path_imagen AS imagen,
                            p.path_video AS video,
                            c.descripcion AS categoria,
                            pr.nombre AS proveedor,
                            m.descripcion AS  marca,
                            p.peso_caja AS peso,
                            p.alto_caja AS alto,
                            p.ancho_caja AS ancho,
                            p.profundidad_caja AS profundidad,
                            p.id_producto_ficha_tecnica AS idProductoFichaTecnica
                    FROM producto p 
                    JOIN categoria c ON c.id_categoria = p.id_categoria
                    JOIN proveedor pr ON pr.id_proveedor = p.id_proveedor
                    JOIN marca m ON m.id_marca = p.id_marca";

        $resultado = mysqli_query($conexion,$consulta);

        $output = array();
        while ($fila = mysqli_fetch_assoc($resultado)){
            $output[] = $fila;
        }

        return $output;
    }
}
?>