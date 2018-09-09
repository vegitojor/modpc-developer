app.controller("carritoController", function ($scope, $http, $sce, $filter) {


	/*$scope.productosDelCarrito = [];*/
  $scope.totalDelCarrito = 0;

  $scope.preloader = false;
  // $scope.tabPaso1 = true;

  $scope.tab1 = true;
  $scope.tab2 = false;
  $scope.tab3 = false;

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
      $scope.usuario = $idUsuario;
   		$http.post('../controladores/usuario/cargarProductosCarritoController.php', {'usuario': $idUsuario})
   		.success(function(response){
   			$scope.productosDelCarrito = response;

        $scope.totalDelCarrito = 0;
        angular.forEach($scope.productosDelCarrito, function(value, key){
            $scope.totalDelCarrito = $scope.totalDelCarrito + (value.cantidad * (value.precio * $scope.moneda.valor));
        });

        //generarCheckoutBasicoMP($scope.usuario);
   		});
   }

   $scope.generarCheckoutBasicoMP = function($idUsuario){
      $http.post('../controladores/usuario/generarCheckoutBasicoMPController.php', {'usuario': $idUsuario})
      .success(function(response){
        $scope.linkPagoMercadoPago = response;
      });
   }

   $scope.quitarDelCarrito = function($idUsuario, $idProducto, cantidad){
   		$scope.usuario = $idUsuario;
   		$http.post('../controladores/usuario/quitarDelCarritoController.php', {'usuario': $idUsuario, 'producto': $idProducto, 'cantidad': cantidad})
   		.success(function(response){

   			
 			if(response.respuesta == 1){
				$scope.cargarProductosCarrito($scope.usuario);	
        $scope.totalDelCarrito = 0;
        angular.forEach($scope.productosDelCarrito, function(value, key){
            $scope.totalDelCarrito = $scope.totalDelCarrito + (value.cantidad * (value.precio * $scope.moneda.valor));
        });
			}
			else if(response.respuesta == 2){
				bootbox.alert('No fue posible eliminar este producto del carrito! Por favor vuelva a intentarlo en unos momentos.');
			}
			else if (response.respuesta == 3) 
				bootbox.alert('Se introducieron valores erroneos!');
			else
				bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
   		});
   }

   $scope.setearProductoCambioCantidad = function(idUsuario, idProducto, cantidad){
      $scope.usuario = idUsuario;
      $scope.productoParamodificarCantidad = idProducto;
      $scope.viejaCantidad = cantidad;
   }

   $scope.modificarCantidadDesdeModal = function(){
      $http.post("../controladores/usuario/cambiarCantidadProductoEncarritoController.php", 
        {'usuario': $scope.usuario, 'producto': $scope.productoParamodificarCantidad, 'cantidad': $scope.nuevaCantidad, 'viejaCantidad': $scope.viejaCantidad})
      .success( function( response ){
          $("#modificarCantidadModal").modal('hide');
          $scope.nuevaCantidad = null;

          if(response.respuesta == 1){
            $scope.cargarProductosCarrito($scope.usuario);
          }
          else if(response.respuesta == 2){
            bootbox.alert('No fue posible modificar la cantidad a este producto! Por favor vuelva a intentarlo en unos momentos.');
          }
          else if (response.respuesta == 3) 
            bootbox.alert('Se introducieron valores erroneos!');
          else
            bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
          
          
      } );
   }

   $scope.pasarAlSiguente = function( tab ){
      if ( tab == 2 ){
        $scope.tab1 = false;
        $scope.tab2 = true;
      }else if( tab == 3 ){
        $scope.tab1 = false;
        $scope.tab2 = false;
        $scope.tab3 = true;
      }
   }
});