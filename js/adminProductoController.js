app.controller("adminProducto", function ($scope, $http) {
    $scope.cargarProveedores = function () {
        $http.post("../controladores/listarProveedoresController.php")
            .success(function (response) {
                $scope.proveedores = response;
            })
    }

    $scope.cargarMarca = function () {
        $http.post('../controladores/listarMarcasController.php')
            .success(function (response) {
                $scope.marcas = response;
            })
    }

    $scope.cargarCategoria = function () {
        $http.post('../controladores/listarCategoriasController.php')
            .success(function (response) {
                $scope.categorias = response;
            })
    }

    $scope.cargarFichaTecnica = function () {
        $http.post('../controladores/cargarFichaTecnicaController.php', {'idCategoria': $scope.categoria})
            .success(function (response) {
                $scope.fichaParaElProducto = response;
            })
    }



    $scope.alto = 0;
    $scope.ancho = 0;
    $scope.peso = 0;
    $scope.profundidad = 0;

    $scope.campoProducto01 = 0;
    $scope.campoProducto02 = 0;
    $scope.campoProducto03 = 0;
    $scope.campoProducto04 = 0;
    $scope.campoProducto05 = 0;
    $scope.campoProducto06 = 0;
    $scope.campoProducto07 = 0;
    $scope.campoProducto08 = 0;
    $scope.campoProducto09 = 0;
    $scope.campoProducto10 = 0;
    $scope.campoProducto11 = 0;
    $scope.campoProducto12 = 0;
    $scope.campoProducto13 = 0;
    $scope.campoProducto14 = 0;
    $scope.campoProducto15 = 0;
    $scope.campoProducto16 = 0;
    $scope.campoProducto17 = 0;
    $scope.campoProducto18 = 0;
    $scope.campoProducto19 = 0;
    $scope.campoProducto20 = 0;

    $scope.cargaProducto = false;
    $scope.mostrarCargaProducto = function () {
        $scope.cargaProducto = true;
    }

    $scope.cerrarCargaProducto = function () {
        $scope.cargaProducto = false;
        console.log($scope.cargaProducto);
    }

    $scope.listarProductos = function () {
        $http.post('../controladores/listarProductosController.php')
            .success(function (response) {
                $scope.productos = response;
        })
    }

})