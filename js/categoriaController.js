app.controller("categoriaController", function ($scope, $http, $sce) {
   $scope.listarCategorias = function () {
       $http.post('../controladores/usuario/listarCategoriasController.php')
           .success(function (response) {
               $scope.categorias = response;
           })
   }

   $scope.listarproductosPorCategoria = function ($id) {
       $http.post('../controladores/usuario/listarProductosActivosPorCategoria.php', {idCategoria: $id})
           .success(function (response) {
               $scope.productos = response;
           })
   }

   $scope.traerCategoria = function ($id) {
       $http.post('../controladores/usuario/traerCategoria.php', {categoria: $id})
           .success(function (response) {
               $scope.categoria = response;
           })
   }

   $scope.cargarMoneda = function () {
       $http.post('../controladores/usuario/cargarMonedaController.php')
           .success(function (response) {
               $scope.moneda = response;
           })
   }


   $scope.cargarFichaTecnica = function ($id) {
       $http.post('../controladores/cargarFichaTecnicaController.php', {idCategoria: $id})
           .success(function (response) {
               $scope.ficha = response;
           })
   }


   $scope.cargarVideo = function ($producto) {
       $scope.link = $sce.trustAsResourceUrl($producto.video);
       return $scope.link;
   }

   $scope.urlVideo;
   $scope.asignarVideoAlModelo = function ($productoIterado) {
       $scope.urlVideo = $productoIterado.video;
   }

   $scope.videoPrueba = "https://www.youtube.com/embed/y910FVrywFU";
   $scope.formularioPregunta = false;

   $scope.mostrarPregunta = function () {
       $scope.formularioPregunta = true;
       console.log($scope.formularioPregunta);
   }

   $scope.ocultarPregunta = function () {
       $scope.formularioPregunta = false;
   }
   
   $scope.valorarProducto = function ($idUsuario, $idProducto) {
       if ($idUsuario == 0)
           bootbox.alert('Debe iniciar seción para poder valorar el producto. Gracias');
       else $http.post('../controladores/usuario/valorarProductoController.php', {
           usuario: $idUsuario,
           producto: $idProducto
            }).success(function (response) {
               $scope.valoracion = response;

               if ($scope.valoracion.respuesta == 1) {
                   bootbox.alert('Ha valorado un producto. Gracias por su colaboración!');

               }
               else  if ($scope.valoracion.respuesta == 2)
                   bootbox.alert('Usted ya ha valorado este producto.');
               else if ($scope.valoracion.respuesta == 3)
                   bootbox.alert('Se introducieron valores erroneos!');
               else
                   bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
           });
   }
});