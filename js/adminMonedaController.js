app.controller('adminMoneda', function ($scope, $http, $window) {
    $scope.guardarMoneda = function () {
        $http.post('../controladores/guardarMonedaController.php',{
            'descripcion': $scope.descripcion,
            'valor': $scope.valor
        })
            .success(function (response) {
                $scope.respuesta = response;

                if($scope.respuesta.mensaje == 1)
                    alert('La Nueva moneda se guardo correctamente.');
                else
                    alert('Ocurrió un inconveniente al intentar guardar la moneda.');
            })
    }

    $scope.listarMonedas = function () {
        $http.post('../controladores/listarMonedasController.php')
            .success(function (response) {
                $scope.monedas = response;
            })
    }

    $scope.obtenerMoneda = function (id) {
        $http.post('../controladores/obtenerUnaMonedaController.php', {
            'idMoneda': id
        }).success(function (response) {
            $scope.respuesta = response;

            $scope.descripcionEditar = $scope.respuesta.descripcion;
            $scope.valorEditar = $scope.respuesta.valor;
            $scope.idMoneda = $scope.respuesta.id;
        })
    }

    $scope.editarMoneda = function () {
        $http.post('../controladores/editarMonedaController.php', {
            'idMoneda': $scope.idMoneda,
            'descripcion': $scope.descripcionEditar,
            'valor': $scope.valorEditar
        }).success(function (response) {
            $scope.respuestaEditar = response;

            if($scope.respuestaEditar.mensaje == 1){
                alert('La moneda se edito correctamente');
                $window.location.href = '../vistas/cargar-moneda.php';
            }else
                alert('Ocurrio un inconveniente al editar la moneda.');
        })
    }
})