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

    $scope.nuevo = true;
    $scope.disponible = true;

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

    $scope.guardarProducto = function () {

        var formData = new FormData();
        formData.append("foto",$scope.foto);
        formData.append('modelo', $scope.modelo);
        formData.append('descripcion', $scope.descripcion);
        formData.append('precio', $scope.precio);
        formData.append('mesesGarantia', $scope.mesesGarantia);
        formData.append('codigoFabricante', $scope.codigoFabricante);
        formData.append('nuevo', $scope.nuevo);
        formData.append('disponible', $scope.disponible);
        formData.append('codigoProveedor', $scope.codigoProveedor);
        formData.append('sku', $scope.sku);
        formData.append('proveedor', $scope.proveedor);
        formData.append('video', $scope.video);
        formData.append('alto', $scope.alto);
        formData.append('ancho', $scope.ancho);
        formData.append('profundidad', $scope.profundidad);
        formData.append('peso', $scope.peso);
        formData.append('marca', $scope.marca);
        formData.append('categoria', $scope.categoria);
        formData.append('campo01', $scope.campoProducto01);
        formData.append('campo02', $scope.campoProducto02);
        formData.append('campo03', $scope.campoProducto03);
        formData.append('campo04', $scope.campoProducto04);
        formData.append('campo05', $scope.campoProducto05);
        formData.append('campo06', $scope.campoProducto06);
        formData.append('campo07', $scope.campoProducto07);
        formData.append('campo08', $scope.campoProducto08);
        formData.append('campo09', $scope.campoProducto09);
        formData.append('campo10', $scope.campoProducto10);
        formData.append('campo11', $scope.campoProducto11);
        formData.append('campo12', $scope.campoProducto12);
        formData.append('campo13', $scope.campoProducto13);
        formData.append('campo14', $scope.campoProducto14);
        formData.append('campo15', $scope.campoProducto15);
        formData.append('campo16', $scope.campoProducto16);
        formData.append('campo17', $scope.campoProducto17);
        formData.append('campo18', $scope.campoProducto18);
        formData.append('campo19', $scope.campoProducto19);
        formData.append('campo20', $scope.campoProducto20);


        $http.post("../controladores/guardarProductoController.php", formData,
            {headers: { 'Content-Type': undefined },
            transformRequest: angular.identity
        }).success(function (response) {
            $scope.mensaje = response;
            if($scope.mensaje.respuesta == 1)
                alert("El producto se cargo correctamente.");
            else
                alert("Ocurrio un error al guardar el producto.");
        })
    }

})