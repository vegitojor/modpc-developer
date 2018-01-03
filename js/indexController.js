app.controller("indexController", function ($scope, $http) {
    $scope.listarCategorias = function () {
        $http.post('controladores/usuario/listarCategoriasController.php')
            .success(function (response) {
                $scope.categorias = response;
            })
    }
});