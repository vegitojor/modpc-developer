<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 30/08/17
 * Time: 0:29
 */

include_once ("../incluciones/verificacionAdmin.php");

?>

<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="../css/w3.css">

        <!-- w3 javascript -->
        <script type="text/javascript" src="../js/w3.js"></script>

        <!-- Angular -->
        <script type="text/javascript" src="../librerias/angularjs/angular.min.js"></script>

        <title>Carga de productos</title>
    </head>
    <body ng-app="">
        <div class="w3-container w3-card-4">
            <h1>Reservado para cargas masivas</h1>
        </div>
        <br>
        <div class="w3-container w3-card-4 w3 -gray">
            <div class="w3-card-4">
                <header>
                    <h1>Carga de producto</h1>
                </header>
                <div class="w3-container w3-center w3-light-gray">
                    <form action="">
                        <!-- Promer columna del formulario -->
                        <div class="w3-col l6 w3-padding">
                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-red">
                                <label for="">Modelo</label>
                            </div>
                            <div class="w3-content">
                                <input type="text" class="w3-input">
                                <label for="">Descripcion</label>
                            </div>
                            <div class="w3-content  ">
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input ">
                                    <label for="">Precio</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input ">
                                    <label for="">Meses de garantia</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input ">
                                    <label for="">Código del fabricante</label>
                                </div>
                            </div>
                            <div>
                                <div class="w3-col l6 w3-padding">
                                    <input type="checkbox" class="w3-check" checked="checked">
                                    <label>Producto nuevo</label>
                                </div>
                                <div class="w3-col l6 w3-padding">
                                    <input type="checkbox" class="w3-check" checked="checked">
                                    <label>Producto disponible para la venta</label>
                                </div>
                            </div>


                        </div>
                        <!-- Segunda columna del formulario -->
                        <div class="w3-col l6 w3-padding ">
                            <div class="w3-content">
                                <input type="text" class="w3-input">
                                <label for="">Modelo</label>
                            </div>
                            <div class="w3-content">
                                <input type="text" class="w3-input">
                                <label for="">Descripcion</label>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
