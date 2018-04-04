<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 9/12/17
 * Time: 11:32
 */

include_once ('../incluciones/verificacionUsuario.php');

$idCategoria = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es" >

<head>
    <?php include_once ('../incluciones/head.php'); ?>
    <script type="text/javascript" src="../js/indexModulo.js"></script>
    <script type="text/javascript" src="../js/categoriaController.js"></script>
    
    <!-- AngularVideo directive -->
    <script type="text/javascript" src="../librerias/angular-video/anguvideo.js"></script>
    <script type="text/javascript" src="../librerias/angular-video/controller.js"></script>
    

    <title>Categorias - MODPC</title>

</head>

<body ng-app="index" ng-controller="categoriaController">
<!-- Navigation -->
<?php include_once('../incluciones/navbarVistas.php'); ?>
<!-- FIN DEL NAV   -->

<!-- Page Content -->
<div class="container">

    <div class="row" ng-init="obtenerCategoria(<?= $idCategoria; ?>)">

        <div class="col-md-3" ng-init="cargarMoneda()">
            <div class="col-md-12">
                <p class="lead">Categorias:</p>
                <div class="list-group" ng-init="listarCategorias()" >
                    <a ng-repeat="categoria in categorias" href="categoria.php?id={{categoria.id}}" class="list-group-item" >{{categoria.descripcion}}</a>

                </div>
            </div>
            <div class="col-md-12" ng-init="cargarFichaTecnica(<?= $idCategoria; ?>); traerOpcionesDeFiltros()">
                <p class="lead">Filtros:</p>
                <form class="form-inline list-group" >
                    <div class="form-group list-group-item" ng-show="ficha.campo01 != 0">
                        <label for="campo01" >{{ficha.campo01}}</label>
                        <select class="form-control"  ng-model="campo01" ng-options="item.campo01 for item in opcionesFiltroCampo01">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo02 != 0">
                        <label for="campo02">{{ficha.campo02}}</label>
                        <select class="form-control" ng-model="campo02" ng-options="item.campo02 for item in opcionesFiltroCampo02">
                            <option value="">Seleccione un filtro</option>
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo03 != 0">
                        <label for="campo03">{{ficha.campo03}}</label>
                        <select class="form-control" ng-model="campo03" ng-options="item.campo03 for item in opcionesFiltroCampo03">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo04 != 0">
                        <label for="campo04">{{ficha.campo04}}</label>
                        <select class="form-control" ng-model="campo04" ng-options="item.campo04 for item in opcionesFiltroCampo04">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo05 != 0">
                        <label for="campo05">{{ficha.campo05}}</label>
                        <select class="form-control" ng-model="campo05" ng-options="item.campo05 for item in opcionesFiltroCampo05">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo06 != 0">
                        <label for="campo06">{{ficha.campo06}}</label>
                        <select class="form-control" ng-model="campo06" ng-options="item.campo06 for item in opcionesFiltroCampo06">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo07 != 0">
                        <label for="campo07">{{ficha.campo07}}</label>
                        <select class="form-control" ng-model="campo07" ng-options="item.campo07 for item in opcionesFiltroCampo07">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo08 != 0">
                        <label for="campo08">{{ficha.campo08}}</label>
                        <select class="form-control" ng-model="campo08" ng-options="item.campo08 for item in opcionesFiltroCampo08">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo09 != 0">
                        <label for="campo09">{{ficha.campo09}}</label>
                        <select class="form-control" ng-model="campo09" ng-options="item.campo09 for item in opcionesFiltroCampo09">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo10 != 0">
                        <label for="campo10">{{ficha.campo10}}</label>
                        <select class="form-control" ng-model="campo10" ng-options="item.campo10 for item in opcionesFiltroCampo10">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo11 != 0">
                        <label for="campo11">{{ficha.campo11}}</label>
                        <select class="form-control" ng-model="campo11" ng-options="item.campo011 for item in opcionesFiltroCampo11">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo12 != 0">
                        <label for="campo12">{{ficha.campo12}}</label>
                        <select class="form-control" ng-model="campo12" ng-options="item.campo12 for item in opcionesFiltroCampo12">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div><div class="form-group list-group-item" ng-show="ficha.campo13 != 0">
                        <label for="campo013">{{ficha.campo13}}</label>
                        <select class="form-control" ng-model="campo13" ng-options="item.campo13 for item in opcionesFiltroCampo13">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo14 != 0">
                        <label for="campo14">{{ficha.campo14}}</label>
                        <select class="form-control" ng-model="campo14" ng-options="item.campo14 for item in opcionesFiltroCampo14">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo15 != 0">
                        <label for="campo15">{{ficha.campo15}}</label>
                        <select class="form-control" ng-model="campo15" ng-options="item.campo15 for item in opcionesFiltroCampo15">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo16 != 0">
                        <label for="campo16">{{ficha.campo16}}</label>
                        <select class="form-control" ng-model="campo16" ng-options="item.campo16 for item in opcionesFiltroCampo16">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo17 != 0">
                        <label for="campo17">{{ficha.campo17}}</label>
                        <select class="form-control" ng-model="campo17" ng-options="item.campo17 for item in opcionesFiltroCampo17">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo18 != 0">
                        <label for="campo18">{{ficha.campo18}}</label>
                        <select class="form-control" ng-model="campo18" ng-options="item.campo18 for item in opcionesFiltroCampo18">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo19 != 0">
                        <label for="campo19">{{ficha.campo19}}</label>
                        <select class="form-control" ng-model="campo19" ng-options="item.campo19 for item in opcionesFiltroCampo19">
                            <option value="">Seleccione un filtro</option>
                            
                        </select>
                    </div>
                    <div class="form-group list-group-item" ng-show="ficha.campo20 != 0">
                        <label for="campo20">{{ficha.campo20}}</label>
                        <select class="form-control" ng-model="campo20" ng-options="item.campo20 for item in opcionesFiltroCampo20">
                            <option value="">Seleccione un filtro</option>
                            <option ng-repeat="campo in campos20" value="{{campo.descripcion}}">{{campo.descripcion}}</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="pull-right">
                        <input type="submit" class="btn btn-primary" ng-click="buscarProductosPorFiltro()">
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
        <!-- SECTION -->
        <div class="col-md-9" >
            <!-- SECTION DE LA VISTA CATEGORIA-->
            <div class="row" ng-init="listarproductosPorCategoria(idCategoriaModel); cantidadDePaginacion(idCategoriaModel)">

                <div class="jumbotron ">
                    <h1 ng-init="traerCategoria(idCategoriaModel)">{{categoria.descripcion}}</h1>
                </div>
                <!-- LISTADO DE PRODUCTOS-->
                <div class="col-sm-4 col-lg-4 col-md-4" ng-repeat="producto in productos">
                    <div class="thumbnail">
                        <a href="" data-toggle="modal" data-target="#id{{producto.id}}">
                            <img src="../resourses/imagen_producto/{{producto.imagen}}" class="foto320x150" alt="imagen-{{producto.modelo}}" ng-hide="producto.imagen == '<--NoFoto-->'" >
                            <img src="http://placehold.it/320x150" alt="" class="foto320x150" ng-show="producto.imagen == '<--NoFoto-->'">
                        </a>
                        <div class="caption">
                            <h4 class="pull-right">{{producto.precio * moneda.valor | currency}}</h4>
                            <p ng-show="producto.nuevo">Nuevo</p>
                            <p ng-hide="producto.nuevo">Usado</p>
                            <h4>
                                <a href="" data-toggle="modal" data-target="#id{{producto.id}}">{{producto.descripcion}}</a>
                            </h4>

                            <p>{{producto.modelo}}</p>
                            <p>Marca: {{producto.marca}}</p>
                        </div>
                        <div class="ratings">
                            <p class="pull-right">{{producto.valoracion}} <i class="glyphicon glyphicon-star"></i> </p>
                            <p>Valora este producto <a class="" href="" ng-click="valorarProducto(<?= $id; ?>, producto.id, <?= $idCategoria ?>)">aqui</a>.</p>
                        </div>
                    </div>



                    <!-- Modal para previzualizar productos -->
                    <div id="id{{producto.id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title">{{producto.descripcion}} <small>{{producto.modelo}}</small></h2>
                                    <h1 class="modal-title"></h1>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="thumbnail">
                                                <img src="../resourses/imagen_producto/{{producto.imagen}}" alt="{{producto.modelo}}" class="img-responsive foto640x300" ng-hide="producto.imagen == '<--NoFoto-->'">
                                                <img src="http://placehold.it/320x150" alt="{{producto.imagen}}" ng-show="producto.imagen == '<--NoFoto-->'">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3 class="">Precio: <strong>{{producto.precio * moneda.valor | currency}}</strong></h3>
                                            <p>marca: <strong>{{producto.marca}}</strong></p>
                                            <p ng-show="producto.nuevo"><strong>Nuevo</strong></p>
                                            <p ng-hide="producto.nuevo"><strong>Usado</strong></p>
                                            <p>C&oacute;digo SKU: <strong>{{producto.sku}}</strong></p>
                                            <p>Meses de garant&iacute;a: <strong>{{producto.mesesGarantia}}</strong></p>
                                            <div>
                                                <div>
                                                    <div class="btn" name="bajarCantidad" ng-click="restarCantidad()"><span class="glyphicon glyphicon-minus"></span></div>
                                                    <input value="1" name="cantidad" ng-model="cantidad" />
                                                    <div class="btn" name="subirCantidad" ng-click="sumarCantidad()"><span class="glyphicon glyphicon-plus"></span></div>
                                                </div>
                                                <button class="btn btn-warning btn-lg btn-block" ng-disabled="<?= $id ?> == 0" ng-click="agregarAlCarrito(<?= $id ?>, producto.id, cantidad)">Agregar al carrito</button>
                                                <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" title="Se requiere iniciar sesión para esta función."></span>
                                                <button class="btn btn-primary btn-lg btn-block" ng-click="enviarPregunta(<?= $id ?>, producto.id)"><i class="fa fa-send"></i> Preguntar al vendedor</button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="content">
                                        <ul class="nav nav-tabs dtabs-justified">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class="active"><a data-toggle="tab" href="#ficha{{producto.id}}" >Ficha T&eacute;cnica</a></li>
                                            <li><a  data-toggle="tab" href="#video{{producto.id}}" >Video</a></li>
                                            <li><a  data-toggle="tab" href="#pregunta{{producto.id}}" ng-click="listarPreguntas(producto.id)">Preguntas</a></li>
                                        </ul>
                                        <div class="tab-content" >
                                            <div class="tab-pane fade in active" id="ficha{{producto.id}}" role="tabpanel">
                                                <div class="col-md-6">
                                                    <table class="table table-striped table-hover">
                                                        <tr ng-show="ficha.campo01 != 0">
                                                            <td>{{ficha.campo01}}</td>
                                                            <td>{{producto.campo01}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo03 != 0">
                                                            <td>{{ficha.campo03}}</td>
                                                            <td>{{producto.campo03}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo05 != 0">
                                                            <td>{{ficha.campo05}}</td>
                                                            <td>{{producto.campo05}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo07 != 0">
                                                            <td>{{ficha.campo07}}</td>
                                                            <td>{{producto.campo07}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo09 != 0">
                                                            <td>{{ficha.campo09}}</td>
                                                            <td>{{producto.campo09}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo11 != 0">
                                                            <td>{{ficha.campo11}}</td>
                                                            <td>{{producto.campo11}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo13 != 0">
                                                            <td>{{ficha.campo13}}</td>
                                                            <td>{{producto.campo13}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo15 != 0">
                                                            <td>{{ficha.campo15}}</td>
                                                            <td>{{producto.campo15}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo17 != 0">
                                                            <td>{{ficha.campo17}}</td>
                                                            <td>{{producto.campo17}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo19 != 0">
                                                            <td>{{ficha.campo19}}</td>
                                                            <td>{{producto.campo19 }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-striped table-hover">
                                                        <tr ng-show="ficha.campo02 != 0">
                                                            <td>{{ficha.campo02}}</td>
                                                            <td>{{producto.campo02}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo04 != 0">
                                                            <td>{{ficha.campo04}}</td>
                                                            <td>{{producto.campo04}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo06 != 0">
                                                            <td>{{ficha.campo06}}</td>
                                                            <td>{{producto.campo06}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo08 != 0">
                                                            <td>{{ficha.campo08}}</td>
                                                            <td>{{producto.campo08}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo10 != 0">
                                                            <td>{{ficha.campo10}}</td>
                                                            <td>{{producto.campo10}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo12 != 0">
                                                            <td>{{ficha.campo12}}</td>
                                                            <td>{{producto.campo12}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo14 != 0">
                                                            <td>{{ficha.campo14}}</td>
                                                            <td>{{producto.campo14}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo16 != 0">
                                                            <td>{{ficha.campo16}}</td>
                                                            <td>{{producto.campo16}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo18 != 0">
                                                            <td>{{ficha.campo18}}</td>
                                                            <td>{{producto.campo18}}</td>
                                                        </tr>
                                                        <tr ng-show="ficha.campo20 != 0">
                                                            <td>{{ficha.campo20}}</td>
                                                            <td>{{producto.campo20 }}</td>
                                                        </tr>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="video{{producto.id}}" role="tabpanel">
                                                <div class="content embed-responsive embed-responsive-16by9" ng-show="{{producto.video != ''}}">
                                                    <anguvideo  ng-model="producto.video" width="100%" height="100%"></anguvideo>
                                                </div>
                                                <div ng-hide="{{producto.video != ''}}">
                                                    <br>
                                                    <p class="text-center">Este producto no cuenta con un video asignado.</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pregunta{{producto.id}}" role="tabpanel">
                                                <br>
                                                <br>
                                                <div>
                                                    <!-- Aca van las iteraciones con las preguntas y respuestas -->
                                                   <div class="panel panel-default" ng-repeat="preg in preguntas">
                                                     <div class="panel-body">{{preg.pregunta}} - ({{preg.fecha}})</div>
                                                     <div class="panel-footer" ng-show="preg.respuesta">
                                                         {{preg.respuesta}} - ({{preg.fechaRespuesta}})
                                                      </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- Fin del modal -->
                </div>
 
                <!-- FIN LISTADO PRODUCTOS-->
            </div>
            <!-- FIN SECTION DE LA VISTA -->
            <!-- PAGINACION DE PRODUCTOS-->
            <div class="text-center">
                <ul class="pagination pagination-lg">
                  <li  ><a href="" ng-click="cambiarPagina(0, idCategoriaModel)" >&laquo;</a></li>
                  <li ng-repeat="paginacion in paginaciones" ng-class="{active: (desde==(paginacion * limite - limite))}"><a href="" ng-click="buscarSegunPagina(idCategoriaModel, paginacion)">{{paginacion}}</a></li>
                  
                  <li><a href="" ng-click="cambiarPagina(1, idCategoriaModel)">&raquo;</a></li>
                </ul>
            </div>
            <!-- FIN PAGINACION -->

        </div>
        <!-- FIN SECTION -->
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
