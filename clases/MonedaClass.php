<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 21/10/17
 * Time: 11:03
 */

class Moneda
{
    private $id;
    private $descripcion;
    private $valor;

    function __construct($id, $descripcion, $valor)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->valor = $valor;
    }

    public static function listarMonedas($conexion){
        $consulta = "SELECT id_moneda id,
                    descripcion,
                    valor_en_peso valor
                    FROM moneda";

        $respuesta = mysqli_query($conexion, $consulta);

        $output = array();
        while ($fila = mysqli_fetch_assoc($respuesta)){
            $fila['descripcion'] = utf8_encode($fila['descripcion']);
            $output[] = $fila;
        }

        return $output;
    }

    public function persistirMoneda($conexion){
        $consulta = "INSERT INTO moneda (descripcion, valor_en_peso)
                      VALUES (?, ?)";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "sd", $this->descripcion, $this->valor);
        mysqli_stmt_execute($stmt);
    }

    public static function obtenerUnaMonedaPorId($conexion, $id){
        $consulta = "SELECT id_moneda id,
                    descripcion,
                    valor_en_peso valor
                    FROM  moneda
                    WHERE id_moneda = ?";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);
        $fila = mysqli_fetch_assoc($resultado);
        $fila['valor'] = (float)$fila['valor'];
        return $fila;
    }

    public function editarMoneda($conexion){
        $consulta = "UPDATE moneda
                    SET descripcion = ?,
                    valor_en_peso = ?
                    WHERE id_moneda = ?";

        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, 'sdi', $this->descripcion,
                                                    $this->valor,
                                                    $this->id);
        mysqli_stmt_execute($stmt);
    }

    public static function traerMonedaActiva($conexion){
        $consulta = "SELECT  id_moneda AS id,
                        descripcion,
                        valor_en_peso AS valor
                    FROM moneda 
                    WHERE activo = 1";
        $respuesta = mysqli_query($conexion, $consulta);
        $output = mysqli_fetch_assoc($respuesta);
        return $output;
    }
}