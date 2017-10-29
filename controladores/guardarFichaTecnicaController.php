<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 29/09/17
 * Time: 22:04
 */

include_once ('../incluciones/adminControlerVerificación.php');
include_once ('../clases/ConexionBDClass.php');
include_once('../clases/ProductoClass.php');

//CAPTURA DE DATOS DEL AJAX

$data = json_decode(file_get_contents('php://input'));

$nombre = strip_tags($data->nombreFicha);
$campo01 = strip_tags($data->campo01);
$campo02 = strip_tags($data->campo02);
$campo03 = strip_tags($data->campo03);
$campo04 = strip_tags($data->campo04);
$campo05 = strip_tags($data->campo05);
$campo06 = strip_tags($data->campo06);
$campo07 = strip_tags($data->campo07);
$campo08 = strip_tags($data->campo08);
$campo09 = strip_tags($data->campo09);
$campo10 = strip_tags($data->campo10);
$campo11 = strip_tags($data->campo11);
$campo12 = strip_tags($data->campo12);
$campo13 = strip_tags($data->campo13);
$campo14 = strip_tags($data->campo14);
$campo15 = strip_tags($data->campo15);

//esquema accediendo directo al controllador
/*
$nombre = strip_tags($_POST['nombre']);
$campo01 = strip_tags($_POST['campo01']);
$campo02 = strip_tags($_POST['campo02']);
$campo03 = strip_tags($_POST['campo03']);
$campo04 = strip_tags($_POST['campo04']);
$campo05 = strip_tags($_POST['campo05']);
$campo06 = strip_tags($_POST['campo06']);
$campo07 = strip_tags($_POST['campo07']);
$campo08 = strip_tags($_POST['campo08']);
$campo09 = strip_tags($_POST['campo09']);
$campo10 = strip_tags($_POST['campo10']);
$campo11 = strip_tags($_POST['campo11']);
$campo12 = strip_tags($_POST['campo12']);
$campo13 = strip_tags($_POST['campo13']);
$campo14 = strip_tags($_POST['campo14']);
$campo15 = strip_tags($_POST['campo15']);
*/

$cadena = ['01'=>$campo01,
    '02'=>$campo02,
    '03'=>$campo03,
    '04'=>$campo04,
    '05'=>$campo05,
    '06'=>$campo06,
    '07'=>$campo07,
    '08'=>$campo08,
    '09'=>$campo09,
    '10'=>$campo10,
    '11'=>$campo11,
    '12'=>$campo12,
    '13'=>$campo13,
    '14'=>$campo14,
    '15'=>$campo15,];


$cadenaJson = json_encode($cadena);

//CONEXION CON BASE DE DATOS
$conn = new ConexionBD();
$conexion = $conn->getConexion();

//PERSISTENCIA DE LA FICHA TECNICA
$listaNombresFichas = Producto::listarNombresFichas($conexion);
$fichaSinRegistrar = true;
foreach ($listaNombresFichas as $item) {
    if ($nombre == $item['nombre_ficha']){
        $fichaSinRegistrar = false;
        break;
    }
}

if ($fichaSinRegistrar){
    Producto::guardarFichaTecnica($conexion, $nombre, $cadenaJson);

    $respuesta = ['mensaje'=>2,];
    echo json_encode($respuesta);


}else{
    $respuesta = ['mensaje'=>1,];
    echo json_encode($respuesta);
}