app.controller("carritoController", function ($scope, $http, $sce, $filter) {


	$scope.productosDelCarrito = [];

	$scope.listarCategorias = function () {
       $http.post('../controladores/usuario/listarCategoriasController.php')
           .success(function (response) {
               $scope.categorias = response;
           })
   }

   $scope.cargarMoneda = function () {
       $http.post('../controladores/usuario/cargarMonedaController.php')
           .success(function (response) {
               $scope.moneda = response;
           })
   }

   $scope.cargarProductosCarrito = function($idUsuario){
   		$http.post('../controladores/usuario/cargarProductosCarritoController.php', {'usuario': $idUsuario})
   		.success(function(response){
   			$scope.productosDelCarrito = response;
   		});
   }

   $scope.quitarDelCarrito = function($idUsuario, $idProducto){
   		$scope.usuario = $idUsuario;
   		$http.post('../controladores/usuario/quitarDelCarritoController.php', {'usuario': $idUsuario, 'producto': $idProducto})
   		.success(function(response){

   			
   			if(response.respuesta == 1){
				$scope.cargarProductosCarrito($scope.usuario);	
			}
			else if(response.respuesta == 2){
				bootbox.alert('Su pregunta no pudo ser enviada! Por favor vuelva a intentarlo en unos momentos.');
			}
			else if (response.respuesta == 3) 
				bootbox.alert('Se introducieron valores erroneos!');
			else
				bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
   		});
   }

});