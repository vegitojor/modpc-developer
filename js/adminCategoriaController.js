app.controller("adminCategoriaController", function ($scope, $http) {
    $scope.cargarFichasTecnicas = function () {
        $http.post("../controladores/cargarFichasTecnicasController.php")
            .success(function (response) {
                $scope.fichas = response;
        })
    }

    $scope.guardarCategoria = function () {
        $http.post('../controladores/guardarCategoriaController.php', {'descripcion': $scope.descripcion,
            'fichaTecnica': $scope.fichaTecnica})
            .success(function (response) {
                $scope.respuesta = response;

                if($scope.respuesta.mensaje == 1)
                    alert('La categoria se guardo correctamente.');
                else
                    alert('Ocurrio un error al guardar la categoria.');
            })
    }
})