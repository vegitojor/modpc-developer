<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 11:32
 */

include_once ('../incluciones/verificacionUsuario.php');

if(!isset($_SESSION['usuario'])){
    header('location: ../index.php');
}

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
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.php">Mod PC</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li >
                    <a href="#">About</a>
                </li>
                <li >
                    <a href="#">Services</a>
                </li>
                <li >
                    <a href="#">Contact</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right " ng-hide="<?= $id ?>">

                <li >
                    <a href="registro-de-usuario.php">registrarse</a>
                </li>
                <li>
                    <a href="login.php">Ingresar</a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right " ng-show="<?= $id ?>">
                <li>
                    <a href="carrito.php" data-toggle="tooltip" data-placement="bottom" title="Mis compras"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                </li>
                <li class="dropdown">
                    <a href="" id="usuario" data-toggle="dropdown"><?= $username ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="usuario">
                        <li role="presentation"><a href="../controladores/cerrarSesionController.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">
        <!-- ASIDE - COLUMNA LATERAL -->
        <div class="col-md-3" ng-init="cargarMoneda()">
            <div class="col-md-12">
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
                    <h1 >Mis compras</h1>
                </div>
                <!-- CADA UNO DE LOS PRODUCTOS EN EL CARRITO -->
                <!-- ng-repeat="productoCarrito in productosDelCarrito" -->
                <div class="col-sm-12 col-lg-12 col-md-12 panel-group" >
                    <div class="panel panel-default" ng-repeat="productoCarrito in productosDelCarrito"> 
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <img src="../resourses/imagen_producto/{{productoCarrito.imagen}}" class="foto320x100" alt="imagen-{{productoCarrito.modelo}}" ng-hide="productoCarrito.imagen == '<--NoFoto-->'" >
                                <img src="http://placehold.it/320x150" alt="{{productoCarrito.modelo}}" class="foto320x100" ng-show="productoCarrito.imagen == '<--NoFoto-->'">
                            </div>
                            <div class="col-md-4">
                                <p><label>Producto:</label> {{productoCarrito.descripcion}}</p>
                                <label for="cantidad">cantidad:</label>
                                <select class="form-control" name="cantidad" id="cantidad" ng-model="cantidad" required>
                                    <option value="" disabled="">Seleccione una opcion</option>
                                    <option value="1" selected="">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <h3 class="pull-right">{{productoCarrito.precio * moneda.valor * cantidad | currency}}</h3>
                                <h5>Subtotal:</h5>
                                <br><br>
                                <div class="btn-group pull-right">
                                    <a href="" class="btn btn-default" ng-click="quitarDelCarrito(<?= $id ?>, productoCarrito.idProducto)">Quitar del carrito</a>    
                                    <a href="" class="btn btn-warning " ng-disabled="cantidad == null">Comprar</a>
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
                    
                </div>
                <!-- FIN TOTAL -->
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

<!-- jQuery -->
<script src="../librerias/template/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../librerias/template/js/bootstrap.min.js"></script>

<!-- Bootbox js -->
<script type="text/javascript" src="../librerias/bootbox/bootbox.min.js"></script>

</body>

</html>
