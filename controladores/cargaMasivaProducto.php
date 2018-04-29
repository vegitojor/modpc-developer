<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 24/10/17
 * Time: 23:54
 */

include_once('../incluciones/adminControlerVerificacion.php');
include_once ('../clases/ConexionBDClass.php');
include_once ('../clases/ProductoClass.php');

//DATOS DEL AJAX
$archivoCarga = $_FILES['archivoCarga'];


if($archivoCarga["size"]>2000000){
    echo 'hola';
}else{
    // sacamos todas las propiedades del archivo
    $nombre_archivo = $archivoCarga['name'];
    $tipo_archivo= $archivoCarga['type'];
    $tamano_archivo = $archivoCarga['size'];
    $direccion_temporal = $archivoCarga['tmp_name'];
    // movemos el archivo a la capeta de nuestro servidor 
    move_uploaded_file($archivoCarga['tmp_name'],"../resourses/cargaMasiva/". "'" .$archivoCarga['name'] . "'");
}

var_dump($nombre_archivo);
die();