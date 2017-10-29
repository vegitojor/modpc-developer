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
})