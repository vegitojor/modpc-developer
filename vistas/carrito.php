<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 11:32
 */

include_once ('../incluciones/verificacionUsuario.php');

// if(!isset($_SESSION['usuario'])){
//     header('location: ../index.php');
// }

?>
<!DOCTYPE html>
<html lang="es" >

<head>
    <?php include_once ('../incluciones/head.php'); ?>
    <script type="text/javascript" src="../js/indexModulo.js"></script>
    <script type="text/javascript" src="../js/carritoController.js"></script>
    <!-- AngularVideo directive -->
    <script type="text/javascript" src="../librerias/angular-video/anguvideo.js"></script>
    <script type="text/javascript" src="../librerias/angular-video/controller.js"></script>

    <title>Carrito - MODPC</title>

</head>

<body ng-app="index" ng-controller="carritoController">
<!-- Navigation -->
<?php include_once('../incluciones/navbarVistas.php'); ?>
<!-- FIN DEL NAV   -->

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- ASIDE - COLUMNA LATERAL -->
        <div class="col-md-3" ng-init="cargarMoneda()" >
            <div class="col-md-12" ng-init="generarCheckoutBasicoMP(<?= $id ?>)">
                <p class="lead">Categorias:</p>
                <div class="list-group" ng-init="listarCategorias()" >
                    <a ng-repeat="categoria in categorias" href="categoria.php?id={{categoria.id}}" class="list-group-item" >{{categoria.descripcion}}</a>

                </div>
            </div>
            
        </div>
        <!-- fin ASIDE -->
        <!--SECTION -->
        <div class="col-md-9">

            <div class="row" >
                <div class="jumbotron" ng-init="cargarProductosCarrito(<?= $id ?>)">
                    <h1 >Carrito de compras</h1>
                </div>
                <div id="preloader" ng-show="preloader">
                    <div class="sk-cube-grid">
                      <div class="sk-cube sk-cube1"></div>
                      <div class="sk-cube sk-cube2"></div>
                      <div class="sk-cube sk-cube3"></div>
                      <div class="sk-cube sk-cube4"></div>
                      <div class="sk-cube sk-cube5"></div>
                      <div class="sk-cube sk-cube6"></div>
                      <div class="sk-cube sk-cube7"></div>
                      <div class="sk-cube sk-cube8"></div>
                      <div class="sk-cube sk-cube9"></div>
                    </div>
                </div>
                
                <div class="content">
                    <ul class="nav nav-tabs dtabs-justified">
                        <ul class="nav nav-tabs nav-justified">
                            <li  ng-class="{'active' : tab1}"><a data-toggle="tab" href="#paso1">Mi compra</a></li>
                            <li ng-class="{'active' : tab2}"><a data-toggle="tab" href="#paso2" >Datos de envio</a></li>
                            <li ng-class="{'active' : tab3}"><a data-toggle="tab" href="#paso3" >Confirmaci&oacute;n de compra</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="paso1">
                                <br>
                                <!-- CADA UNO DE LOS PRODUCTOS EN EL CARRITO -->
                                <div class="col-sm-12 col-lg-12 col-md-12 panel-group" >
                                    <div class="panel panel-default" ng-repeat="productoCarrito in productosDelCarrito"> 
                                        <div class="panel-heading"></div>
                                        <div class="panel-body">
                                            <div class="col-md-3">
                                                <img src="../resourses/imagen_producto/{{productoCarrito.imagen}}" class="foto320x100" alt="imagen-{{productoCarrito.modelo}}" ng-hide="productoCarrito.imagen == '<--NoFoto-->'" >
                                                <img src="http://placehold.it/320x150" alt="{{productoCarrito.modelo}}" class="foto320x100" ng-show="productoCarrito.imagen == '<--NoFoto-->'">
                                            </div>
                                            <div class="col-md-4">
                                                <br>
                                                <p><label>Producto:</label> {{productoCarrito.descripcion}}</p>
                                                <p>cantidad: <span><strong>{{productoCarrito.cantidad}}</strong></span></p>
                                                <a href="" id="modificarCantidad" ng-model="modificarCantidad" data-toggle="modal" data-target="#modificarCantidadModal" ng-click="setearProductoCambioCantidad(<?= $id ?>, productoCarrito.idProducto, productoCarrito.cantidad)">Modificar cantidad</a>
                                            </div>
                                            <div class="col-md-3">
                                                <h3 class="pull-right">{{productoCarrito.precio * moneda.valor * productoCarrito.cantidad | currency}}</h3>
                                                <h5>Subtotal:</h5>
                                                <br>
                                                
                                                
                                            </div>
                                            <div class="col-md-2">
                                                <div class=" pull-right">
                                                    <a href="" class="btn btn-danger" ng-click="quitarDelCarrito(<?= $id ?>, productoCarrito.idProducto, productoCarrito.cantidad)" " data-tooltip="tooltip" title="Quitar del carrito" onmouseenter="$(this).tooltip('show')"><span class="fa fa-times"></span></a>    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- FIN PRODUCTOS DEL CARRITO -->
                                <div class="col-lg-12" ng-show="productosDelCarrito.length == 0">
                                    <p>No hay productos agregados al carrito. Naveg&aacute; por las categorias para agregar el producto que busc&aacute;s.</p>
                                </div>
                                <!-- TOTAL DE COMPRA -->
                                <div class="col-sm-12 col-lg-12 col-md-12">
                                    <div class="col-md-4 text-center">
                                        <h2 >TOTAL:</h2>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <h3>{{totalDelCarrito | currency}}</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- {{linkPagoMercadoPago}} -->
                                        <a data-toggle="tab" href="#paso2" class="btn btn-warning" ng-disabled="totalDelCarrito == 0" ng-click="pasarAlSiguente(2)">Siguiente</a>
                                    </div>
                                </div>
                                <!-- FIN TOTAL -->
                            </div>
                            <div class="tab-pane fade" id="paso2">
                                <div class="col-md-4">
                                        <!-- {{linkPagoMercadoPago}} -->
                                        <a data-toggle="tab" href="#paso3" class="btn btn-warning" ng-disabled="totalDelCarrito == 0" ng-click="pasarAlSiguente(3)">Siguiente</a>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="paso3">
                                
                            </div>
                        </div>
                    </ul>
                </div>


                
                
            </div>

        </div>
        <!-- fin SECTION -->
    </div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; ModPC 2017</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- modal modicar cantidad -->
<div id="modificarCantidadModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar cantidad</h4>
      </div>
      <div class="modal-body">
        <form name="cambiarCantidad">
            <div class="form-group">
                <label for="cantidad">Ingresar la nueva cantidad</label>
                <input type="number" class="form-control" ng-model="nuevaCantidad" min=0 required>
            </div>
            <div>
                <button type="button" class="btn btn-success" ng-disabled="cambiarCantidad.$invalid" ng-click="modificarCantidadDesdeModal()" >Cambiar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>






<!-- jQuery -->
<script src="../librerias/template/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../librerias/template/js/bootstrap.min.js"></script>

<!-- Bootbox js -->
<script type="text/javascript" src="../librerias/bootbox/bootbox.min.js"></script>

<!-- modal de contacto -->
<?php include_once('../incluciones/formularioContacto.php'); ?>
<script src="../librerias/formulario_contacto/jqBootstrapValidation.js"></script>
<script src="../librerias/formulario_contacto/contact_me.js"></script>

</body>

</html>
