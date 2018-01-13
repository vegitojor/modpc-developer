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
    <?php include_once ('../incluciones/headAdmin.php'); ?>
    <script type="text/javascript" src="../js/adminModule.js"></script>
    <!-- Controlador angular -->
    <script type="text/javascript" src="../js/adminPreguntaController.js"></script>
    <title>Preguntas</title>
</head>
<body ng-app="admin" class="w3-light-gray" ng-controller="adminPregunta">
    <div class="w3-row">
        <?php include_once('../incluciones/navegadorAdmin.php');  ?>
    </div>
    <div class="w3-row">
        <div class=" w3-padding-32 w3-blue-gray">
            <h1 class="w3-jumbo w3-margin-left">Preguntas</h1>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-content w3-white">
            <div class="w3-card-4 ">
                <header>
                    <h2 class="w3-margin-left">Preguntas sin respuesta <span></span></h2>
                </header>
                <div class="w3-white">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="w3-row">
        <div class="w3-content w3-white">
            <div class="w3-card-4 ">
                algo
            </div>
        </div>
    </div>

</body>
</html>
