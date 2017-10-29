<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 12/10/17
 * Time: 22:59
 */

class Categoria
{
    private $id;
    private $descripcion;
    private $fichaTecnica;

    function __construct($id, $descripcion, $fichaTecnica)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->fichaTecnica = $fichaTecnica;
    }

    public function guardarCategoria($conexion){
        $consulta = "INSERT INTO categoria(descripcion, id_Ficha_tecnica) 
                        VALUES (? , ?)";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, 'si', $this->descripcion, $this->fichaTecnica);
        mysqli_stmt_execute($stmt);
    }

    public static function listarCategorias($conexion){
        $consulta = "SELECT id_categoria id,
                        descripcion
                        FROM categoria";
        $respuesta = mysqli_query($conexion, $consulta);
        $output = array();
        while($fila = mysqli_fetch_assoc($respuesta)){
            $fila['descripcion'] = utf8_encode($fila['descripcion']);
            $output[] = $fila;
        }
        return $output;
    }
}