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
    <body ng-app="admin" class="w3-light-gray" ng-controller="adminProducto">
        <?php include_once ("../incluciones/navegadorAdmin.php"); ?>
        <div class="w3-container w3-padding-32 w3-blue-gray" >
            <h1 class="w3-jumbo w3-margin-left">Productos</h1>
            <button class="w3-btn w3-orange w3-hover-blue-gray w3-margin-left" ng-click="mostrarCargaProducto()"><span class="fa fa-plus"></span> Agregar un producto</button>
        </div>

        <!-- CARGA DE PRODUCTO -->
        <div class="w3-content  w3-gray" ng-show="cargaProducto">
            <div class="w3-card-4 w3-blue-gray " >
                <header>
                    <a href="" class="w3-button w3-right w3-margin" ng-click="cerrarCargaProducto()"><span class="fa fa-remove"></span> </a>
                    <a  class="w3-btn w3-orange w3-right w3-margin"  ><span class="fa fa-upload"></span> Cargar desde archivo</a>
                    <h1 class="w3-margin-left">Carga de producto</h1>

                </header>
                <div class="w3-container w3-center w3-white" >
                    <form name="formularioProducto" action="../controladores/guardarProductoController.php" enctype="multipart/form-data" method="post">
                        <!-- Primer columna del formulario -->
                        <div class="w3-col l6 w3-padding">
                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange" name="modelo" ng-model="modelo" value="" required>
                                <div ng-show="formularioProducto.$submitted || formularioProducto.modelo.$touched">
                                    <span class="w3-red" ng-show="formularioProducto.modelo.$error.required">El campo es obligatorio.</span>
                                </div>
                                <label for="">Modelo*</label>
                            </div>
                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange" name="descripcion" ng-model="descripcion" value="" required>
                                <div ng-show="formularioProducto.$submitted || formularioProducto.descripcion.$touched">
                                    <span class="w3-red" ng-show="formularioProducto.descripcion.$error.required">El campo es obligatorio.</span>
                                </div>
                                <label for="">Descripcion*</label>
                            </div>
                            <div class="w3-content  ">
                                <div class="w3-col l4 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange" name="precio" ng-model="precio" value="" required>
                                    <div ng-show="formularioProducto.$submitted || formularioProducto.precio.$touched">
                                        <span class="w3-red" ng-show="formularioProducto.precio.$error.required">El campo es obligatorio.</span>
                                    </div>
                                    <label for="">Precio* (en dolar)</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="number" class="w3-input w3-hover-orange" min="1" max="12" name="mesesGarantia" >
                                    <label for="">Meses de garantia</label>
                                </div>
                                <div class="w3-col l4 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange" name="codigoFabricante" >
                                    <label for="">Código del fabricante</label>
                                </div>
                            </div>
                            <div>
                                <div class="w3-col l6 w3-padding">
                                    <input type="checkbox" class="w3-check"  name="nuevo"  value="1" checked>
                                    <label>Producto nuevo</label>
                                </div>
                                <div class="w3-col l6 w3-padding">
                                    <input type="checkbox" class="w3-check"  name="disponible" value="1" checked>
                                    <label>Producto disponible para la venta</label>
                                </div>
                            </div>
                            <div class="w3-content">
                                <div class="w3-col l4 w3-padding">
                                    <input type="number" class="w3-input w3-hover-orange" name="codigoProveedor" ng-model="codigoProveedor">
                                    <label for="">Código del proveedor</label>
                                </div>
                                <div class="w3-col l8 w3-padding">
                                    <input type="text" class="w3-input w3-hover-orange" name="sku" ng-model="sku" required>
                                    <div ng-show="formularioProducto.$submitted || formularioProducto.sku.$touched">
                                        <span class="w3-red" ng-show="formularioProducto.sku.$error.required">El campo es obligatorio.</span>
                                    </div>
                                    <label for="">Código SKU*</label>
                                </div>
                            </div>
                            <div class="w3-content w3-center" ng-init="cargarProveedores()">

                                <select class="w3-select" name="proveedor" id="proveedor" ng-model="proveedor" required>
                                    <option value="" disabled>Seleccione un proveedor</option>
                                    <option ng-repeat="proveedor in proveedores" value="{{proveedor.id}}">{{proveedor.nombre}}</option>
                                </select>
                                <div ng-show="formularioProducto.$submitted || formularioProducto.proveedor.$touched">
                                    <span class="w3-red" ng-show="formularioProducto.proveedor.$error.required">El campo es obligatorio.</span>
                                </div>
                                <label for="proveedor">Proveedor*</label>

                            </div>


                        </div>
                        <!-- Segunda columna del formulario -->
                        <div class="w3-col l6 w3-padding ">
                            <div class="w3-content">
                                <input type="file" class="w3-input" name="foto" ng-model="foto">
                                <label for="">Seleccionar imagen del producto</label>
                            </div>
                            <br>

                            <div class="w3-content">
                                <input type="text" class="w3-input w3-hover-orange" name="video" ng-model="video">
                                <label for="">URL del Video</label>
                            </div>
                            <br>
                            <div class="w3-content">
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange" name="alto" ng-model="alto">
                                    <label for="">Alto de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange" name="ancho" ng-model="ancho">
                                    <label for="">Ancho de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange" name="profundidad" ng-model="profundidad">
                                    <label for="">Profundidad de caja</label>
                                </div>
                                <div class="w3-col l3 w3-padding">
                                    <input type="number" step="0.01" class="w3-input w3-hover-orange" name="peso" ng-model="peso">
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
                                        <option ng-repeat="marcaPro in marcas" value="{{marcaPro.id}}">{{marcaPro.descripcion}}</option>
                                    </select>
                                    <div ng-show="formularioProducto.$submitted || formularioProducto.marca.$touched">
                                        <span class="w3-red" ng-show="formularioProducto.marca.$error.required">El campo es obligatorio.</span>
                                    </div>
                                    <label for="marca">Marca*</label>

                                </div>
                                <div class="w3-content w3-center" ng-init="cargarCategoria()">

                                    <select class="w3-select" name="categoria" id="categoria" ng-model="categoria" ng-change="cargarFichaTecnica()" required>
                                        <option value="" disabled>Seleccione una Categoria</option>
                                        <option ng-repeat="categoriaPro in categorias" value="{{categoriaPro.id}}">{{categoriaPro.descripcion}}</option>
                                    </select>
                                    <div ng-show="formularioProducto.$submitted || formularioProducto.categoria.$touched">
                                        <span class="w3-red" ng-show="formularioProducto.categoria.$error.required">El campo es obligatorio.</span>
                                    </div>
                                    <label for="proveedor">Categoria*</label>

                                </div>

                                <div ng-show="fichaParaElProducto">
                                    <div ng-hide="fichaParaElProducto.campo01 == 0 ">
                                        <label class="w3-col l4">{{fichaParaElProducto.campo01}}:</label>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo01" ng-model="campoProducto01">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo02 == '0'">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo02}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo02" ng-model="campoProducto02">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo03 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo03}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo03" ng-model="campoProducto03">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo04 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo04}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo04" ng-model="campoProducto04">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo05 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo05}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo05" ng-model="campoProducto05">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo06 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo06}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo06" ng-model="campoProducto06">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo07 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo07}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo07" ng-model="campoProducto07">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo08 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo08}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo08" ng-model="campoProducto08">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo09 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo09}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo09" ng-model="campoProducto09">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo10 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo10}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo10" ng-model="campoProducto10">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo11 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo11}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo11" ng-model="campoProducto11">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo12 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo12}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo12" ng-model="campoProducto12">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo13 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo13}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo13" ng-model="campoProducto13">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo14 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo14}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo14" ng-model="campoProducto14">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo15 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo15}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo15" ng-model="campoProducto15">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo16 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo16}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo16" ng-model="campoProducto16">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo17 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo17}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo17" ng-model="campoProducto17">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo18 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo18}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo18" ng-model="campoProducto18">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo19 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo19}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo19" ng-model="campoProducto19">
                                    </div>
                                    <div ng-hide="fichaParaElProducto.campo20 == 0">
                                        <span class="w3-col l4 ">{{fichaParaElProducto.campo20}}:</span>
                                        <input type="text" class="w3-input w3-hover-border-red w3-col l8" name="campo20" ng-model="campoProducto20">
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="w3-content w3-padding">
                            <input type="submit" class="w3-margin-bottom w3-button w3-green w3-col l12 w3-center" >
<!--                                   ng-click="guardarProducto()" ng-disabled="formularioProducto.$invalid">-->
                            <br>
                            <br>
                        </div>
                        <br>
                    </form>
                </div>
            </div>

        </div><!-- fin de carga de producto -->
        <br>
        <br>
        <div class="w3-container" ng-init="listarProductos()">
            <table class="w3-table w3-striped w3-bordered w3">
                <thead>
                    <tr class="w3-green">
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Código proveedor</th>
                        <th>Proveedor</th>
                        <th>Categoría</th>
                        <th>Nuevo</th>
                        <th>Disponible</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="producto in productos">
                        <td>{{producto.modelo}}</td>
                        <td>{{producto.marca}}</td>
                        <td>{{producto.descripcion}}</td>
                        <td>{{producto.precio}}</td>
                        <td>{{producto.codProveedor}}</td>
                        <td>{{producto.proveedor}}</td>
                        <td>{{producto.categoria}}</td>
                        <td>
                            <span ng-show="{{producto.nuevo}}">Si</span>
                            <span ng-hide="{{producto.nuevo}}">No</span>
                        </td>
                        <td>
                            <span class="fa fa-check-circle w3-green w3-xlarge" ng-show="{{producto.disponible}}"></span>
                            <span class="fa fa-warning w3-red w3-xlarge" ng-hide="{{producto.disponible}}"></span>
                        </td >
                        <td>

                        </td>

                    </tr>
                </tbody>
            </table>
            <div class="w3-bar w3-border w3-round  ">
                <a href="" class="w3-button" >&#10094; Previous</a>
                <a href="" class="w3-button w3-right">Next &#10095;</a>
            </div>
        </div>
    </body>
</html>
