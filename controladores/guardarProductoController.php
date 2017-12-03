<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 23/11/17
 * Time: 23:35
 */

include_once ('../incluciones/adminControlerVerificación.php');
include_once ('../clases/ConexionBDClass.php');
include_once('../clases/ProductoClass.php');


//SE CAPTURAN LOS DATOS DEL AJAX
$modelo = strip_tags($_POST['modelo']);
$descripcion = strip_tags($_POST['descripcion']);
$precio = strip_tags($_POST['precio']);
$mesesGarantia = strip_tags($_POST['mesesGarantia']);
$sku = strip_tags($_POST['sku']);
$proveedor = strip_tags($_POST['proveedor']);
$marca = strip_tags($_POST['marca']);
$categoria = strip_tags($_POST['categoria']);
$codigoFabricante = strip_tags($_POST['codigoFabricante']);
$nuevo = $_POST['nuevo'];
$disponible = $_POST['disponible'];
$codigoProveedor = strip_tags($_POST['codigoProveedor']);
$video = strip_tags($_POST['video']);
$alto = $_POST['alto'];
$ancho = $_POST['ancho'];
$profundidad = $_POST['profundidad'];
$peso = $_POST['peso'];
$campo01 = $_POST['campo01'];
$campo02 = $_POST['campo02'];
$campo03 = $_POST['campo03'];
$campo04 = $_POST['campo04'];
$campo05 = $_POST['campo05'];
$campo06 = $_POST['campo06'];
$campo07 = $_POST['campo07'];
$campo08 = $_POST['campo08'];
$campo09 = $_POST['campo09'];
$campo10 = $_POST['campo10'];
$campo11 = $_POST['campo11'];
$campo12 = $_POST['campo12'];
$campo13 = $_POST['campo13'];
$campo14 = $_POST['campo14'];
$campo15 = $_POST['campo15'];
$campo16 = $_POST['campo16'];
$campo17 = $_POST['campo17'];
$campo18 = $_POST['campo18'];
$campo19 = $_POST['campo19'];
$campo20 = $_POST['campo20'];

if(isset($_FILES['foto'])) {
    echo "llego la foto";
    die();
}
if(isset($_FILES['foto'])){
    $foto = $_FILES['foto'];
    //********SE PROCESA LA IMAGEN********************************
    //se obtiene el nombre y extencion
    $nombreFoto = $foto['name'];
    $extencion = pathinfo($foto, PATHINFO_EXTENSION);

    //defino la ruta de almacenamiento y muevo la imagen
    $ruta = "resourses/imagen_producto/".$modelo."-".$nombreFoto.".".$extencion;
    move_uploaded_file($foto['tmp_name'], "../".$ruta);
}else{
    $nombreFoto = null;
}

//$valor = number_format($valor, 2, '.','');
    $precio = number_format($precio, 2, '.','');
    $alto = number_format($alto, 2, '.','');
    $ancho = number_format($ancho, 2, '.','');
    $profundidad = number_format($profundidad, 2, '.','');
    $peso = number_format($peso, 2, '.','');


//************************************************************

//********SE INICIA CONEXCION A BD*****************************
$conn = new ConexionBD();
$conexion = $conn->getConexion();

//********SE GUARDAN LOS DATOS DE FICHA TECNICA*****************
$idProductoFichaTecnica = Producto::guardarFichaTecnicaDelProducto(
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
                                        $campo20, $conexion);
//***************************************************************************
//************SE INICIALIZA EL PRODUCTO Y SE PERSISTE*********************
$id = null;
$nuevoProducto = new Producto($id, $descripcion, $precio, $mesesGarantia, $nuevo, $codigoFabricante, $modelo,
                            $disponible, $codigoProveedor, $nombreFoto, $video, $categoria, $proveedor,
                            $marca, $sku, $peso, $alto, $ancho, $profundidad, $idProductoFichaTecnica);
$nuevoProducto->persistirse($conexion);
//**************************************************************************

//**********RETORNAMOS UN MENSAJE************************
$mensaje = ['respuesta'=>1,];
echo json_encode($mensaje);
