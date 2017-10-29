<?php
/**
 * Created by PhpStorm.
 * User: vegitojor
 * Date: 28/09/17
 * Time: 20:55
 */

include_once ('../incluciones/verificacionAdmin.php');
?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once ('../incluciones/head.php'); ?>
    <script type="text/javascript" src="../js/adminModule.js"></script>
    <!-- Controlador angular -->
    <script type="text/javascript" src="../js/adminCategoriaController.js"></script>
    <title>Categorias</title>
</head>
<body ng-app="admin" class="w3-light-gray" ng-controller="adminCategoriaController">
    <div class="w3-row">
        <?php include_once('../incluciones/navegadorAdmin.php');  ?>
    </div>
    <div class="w3-row">
        <div class=" w3-padding-32 w3-blue-gray">
            <h1 class="w3-jumbo w3-margin-left">Cargar categoria</h1>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-content w3-white">
            <div ng-show="respuesta.mensaje == 1">Se guardo la categoria!</div>
            <div class="w3-card-4 w3-blue-gray">
                <header>
                    <h2 class="w3-margin-left">Nueva categoria</h2>
                </header>
                <div class="w3-white">

                    <form>
                        <div class="w3-padding">
                            <input type="text" class="w3-input w3-hover-orange" placeholder="Introduce el nombre de la nueva categoria" ng-model="descripcion" >
                            <label for="">Descripción</label>
                        </div>
                        <div class="w3-panel">
                            <div class="w3-row">
                                <a href="javascript:void(0)" onclick="openTab(event, 'fichasCargadas');">
                                    <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding w3-center">Seleccionar ficha técnica</div>
                                </a>
                                <a href="javascript:void(0)" onclick="openTab(event, 'nuevaFicha');">
                                    <div class="w3-half tablink w3-bottombar w3-hover-light-grey w3-padding w3-center">Agregar ficha técnica</div>
                                </a>
                            </div>
                            <div id="fichasCargadas" class="w3-container w3-padding productos w3-center" style="display: none" ng-init="cargarFichasTecnicas()">
                                <select name="fichaTecnica" id="fichaTecnica" class="w3-select" ng-model="fichaTecnica">
                                    <option value="" disabled selected>Seleccione una ficha técnica</option>
                                    <option ng-repeat="ficha in fichas" value="{{ficha.id}}">{{ficha.nombreFicha}}</option>
                                </select>
                            </div>
                            <div id="nuevaFicha" class="w3-container w3-padding productos w3-center" style="display: none">
                                <a href="cargar-fichatecnica.php" class="w3-btn w3-blue-gray " >Nueva ficha técnica</a>
                            </div>
                        </div>
                        <div class="w3-panel">
                            <input type="submit" class="w3-btn w3-green w3-right w3-padding w3-margin-bottom" value="Guardar categoria" ng-click="guardarCategoria()">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
