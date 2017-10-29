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
        <?php include_once ('../incluciones/head.php'); ?>

        <!-- modulo Angular -->
        <script type="text/javascript" src="../js/adminModule.js"></script>
        <!-- Controlador Angular -->
        <script type="text/javascript" src="../js/adminProductoController.js"></script>

        <title>Productos</title>
    </head>
    <body ng-app="admin" ng-controller="adminProducto">
        <?php include_once ("../incluciones/navegadorAdmin.php"); ?>
        <div class="w3-container w3-padding-32 w3-blue-gray" >
            <h1 class="w3-jumbo w3-margin-left">Productos</h1>
        </div>
        <div class="w3-container w3-card-4">
            <h1>Reservado para cargas masivas</h1>
        </div>
        <br>
        <div class="w3-content  w3-gray">
            <div class="w3-card-4 w3-blue-gray w3-center">
                <header>
                    <h1>Carga de producto</h1>
                </header>
                <div class="w3-container w3-center w3-light-gray">
                    <form enctype="multipart/form-data">
                        <!-- Primer columna del formulario -->
                        <div class="w3-col l6 w3-padding">
                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange">
                                <label for="">Modelo</label>
                            </div>
                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange">
                                <label for="">Descripcion</label>
                            </div>
                            <div class="w3-content  ">
                                <div class="w3-col l4 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange">
                                    <label for="">Precio</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange">
                                    <label for="">Meses de garantia</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange">
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
                            <div class="w3-content">
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange">
                                    <label for="">Código del proveedor</label>
                                </div>
                                <div class="w3-col l8 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange">
                                    <label for="">Código SKU</label>
                                </div>
                            </div>
                            <div class="w3-content w3-center" ng-init="cargarProveedores()">

                                <select class="w3-select" name="proveedor" id="proveedor" ng-model="proveedor" required>
                                    <option value="" disabled>Seleccione un proveedor</option>
                                    <option ng-repeat="proveedor in proveedores" value="{{proveedor.id}}">{{proveedor.nombre}}</option>
                                </select>
                                <label for="proveedor">Proveedor</label>

                            </div>


                        </div>
                        <!-- Segunda columna del formulario -->
                        <div class="w3-col l6 w3-padding ">
                            <div class="w3-content">
                                <input type="file" class="w3-input">
                                <label for="">Seleccionar imagen del producto</label>
                            </div>
                            <br>

                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange">
                                <label for="">URL del Video</label>
                            </div>
                            <br>
                            <div class="w3-content">
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange">
                                    <label for="">Alto de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange">
                                    <label for="">Ancho de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange">
                                    <label for="">Profundidad de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange">
                                    <label for="">Peso de caja</label>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                            <div class="w3-content">
                                <div class="w3-content w3-center" ng-init="cargarMarca()">

                                    <select class="w3-select" name="marca" id="marca" ng-model="marca" required>
                                        <option value="" disabled>Seleccione una Marca</option>
                                        <option ng-repeat="marca in marcas" value="{{marca.id}}">{{marca.descripcion}}</option>
                                    </select>
                                    <label for="marca">Marca</label>

                                </div>
                                <div class="w3-content w3-center" ng-init="cargarCategoria()">

                                    <select class="w3-select" name="categoria" id="categoria" ng-model="categoria" ng-change="cargarFichaTecnica()" required>
                                        <option value="" disabled>Seleccione una Categoria</option>
                                        <option ng-repeat="categoria in categorias" value="{{categoria.id}}">{{categoria.descripcion}}</option>
                                    </select>
                                    <label for="proveedor">Categoria</label>

                                </div>

                                <div>
                                    <div ng-repeat="ficha in fichaParaElProducto">
                                        <div >
                                            <span class="w3-col l4">{{ficha.'01'}}:</span>
                                            <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="{{ficha}}" ng-model="{{$index+1}}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="w3-content w3-padding">
                            <input type="submit" class="w3-margin-bottom w3-button w3-green w3-col l12 w3-center ">
                            <br>
                            <br>
                        </div>
                        <br>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <br>

    </body>
</html>
