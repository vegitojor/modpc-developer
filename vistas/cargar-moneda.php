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
    <script type="text/javascript" src="../js/adminMonedaController.js"></script>
    <title>Monedas</title>
</head>
<body ng-app="admin" class="w3-light-gray" ng-controller="adminMoneda">
    <div class="w3-row">
        <?php include_once('../incluciones/navegadorAdmin.php');  ?>
    </div>
    <div class="w3-row">
        <div class=" w3-padding-32 w3-blue-gray">
            <h1 class="w3-jumbo w3-margin-left">Cargar Moneda</h1>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-content w3-white">
            <div class="w3-card-4 w3-blue-gray">
                <header>
                    <h2 class="w3-margin-left">Nueva Moneda</h2>
                </header>
                <div class="w3-white">
                    <!-- FORMULARIO PARA AGREGAR MONEDAS-->
                    <form name="formularioMoneda">
                        <div class="w3-padding">
                            <input type="text" class="w3-input w3-hover-orange" name="descripcion" placeholder="Introduce el nombre de la nueva moneda" ng-model="descripcion" ng-model-option="{updateOn: 'blur'} " required >
                            <label for="">Descripción</label>
                            <div  ng-show="formularioMoneda.$submitted || formularioMoneda.descripcion.$touched">
                                <span class="w3-red" ng-show="formularioMoneda.descripcion.$error.required">El campo es obligatorio.</span>
                            </div>
                            <input type="number" class="w3-input w3-hover-orange" name="valor" step="any" placeholder="Introduce el valor de la nueva moneda" ng-model="valor" ng-model-option="{updateOn: 'blur'} " required >
                            <label for="">Valor (en pesos argentinos)</label>
                            <div  ng-show="formularioMoneda.$submitted || formularioMoneda.valor.$touched">
                                <span class="w3-red" ng-show="formularioMoneda.valor.$error.required">El campo es obligatorio.</span>
                            </div>
                        </div>

                        <div class="w3-panel">
                            <input type="submit" class="w3-btn w3-green w3-right w3-padding w3-margin-bottom" value="Guardar Moneda" ng-click="guardarMoneda()" ng-disabled="formularioMoneda.$invalid">
                        </div>
                    </form>
                    <!-- FIN DE FORMULARIO -->
                </div>
            </div>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-content w3-white">
            <div class="w3-card-4 ">
                <a href="" class="w3-btn w3-blue" ng-click="listarMonedas()">Ver Monedas</a>
                <br>
                <div ng-show="monedas">
                    <!-- TABLA QUE LISTA LAS MONEDAS ALMACENADAS -->
                    <table class="w3-table w3-striped w3-bordered w3-hoverable">
                        <thead>
                            <tr class="w3-green">
                                <th>Nombre</th>
                                <th>valor</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="moneda in monedas">
                                <td>{{moneda.descripcion}}</td>
                                <td>${{moneda.valor}}</td>
                                <td><a href="editar-moneda.php?var={{moneda.id}}" class="w3-btn w3-blue">Editar</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
