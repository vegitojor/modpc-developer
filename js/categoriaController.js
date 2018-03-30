app.controller("categoriaController", function ($scope, $http, $sce, $filter, $window) {
   

   $scope.preguntas;
   $scope.cantidad = 1;

   $scope.obtenerCategoria = function($id){
      $scope.idCategoriaModel = $id;
   }

   $scope.listarCategorias = function () {
       $http.post('../controladores/usuario/listarCategoriasController.php')
           .success(function (response) {
               $scope.categorias = response;
           })
   }

   $scope.listarproductosPorCategoria = function ($id) {
       $http.post('../controladores/usuario/listarProductosActivosPorCategoria.php', {'idCategoria': $id,'desde': $scope.desde,'limite':$scope.limite})
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

   //$scope.videoPrueba = "https://www.youtube.com/embed/y910FVrywFU";
   $scope.formularioPregunta = false;

   $scope.mostrarPregunta = function () {
       $scope.formularioPregunta = true;
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
               else if ($scope.valoracion.respuesta == 2)
                   bootbox.alert('Usted ya ha valorado este producto.');
               else if ($scope.valoracion.respuesta == 3)
                   bootbox.alert('Se introducieron valores erroneos!');
               else
                   bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
           });
   }

   $scope.enviarPregunta = function($idUsuario, $idProducto){
         $scope.preguntaBoootbox = "";
         $scope.idProducto = $idProducto;
         $scope.fechaActual = new Date();
         $scope.fechaActual = $filter('date')($scope.fechaActual, 'yyyy-MM-dd HH:mm:ss');
         bootbox.prompt({ 
           size: "medium",
           title: "Acerquenos su inquietud:",
           buttons: {
              confirm: {
                  label: 'Enviar',
                  className: 'btn-success'
              },
              cancel: {
                  label: 'Cancelar',
                  className: 'btn-danger'
              }
          }, 
           callback: function(result){ if(result != null){
                                          $scope.preguntaBoootbox = result;
                                          $http.post('../controladores/usuario/guardarPreguntaController.php', 
                                             {'idUsuario':$idUsuario, 'pregunta': $scope.preguntaBoootbox , 'idProducto':$idProducto, 'fecha': $scope.fechaActual})
                                          .success(function(response){
                                             if(response.respuesta == 1){
                                                bootbox.alert('Su pregunta se envió con éxito! El vendedor la respondera a la brevedad.',
                                                   function(){
                                                      $scope.listarPreguntas($scope.idProducto);
                                                   });
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
              }
         })
   }

   $scope.listarPreguntas = function($idProducto){
      $http.post('../controladores/usuario/listarPreguntasController.php', {'idProducto':$idProducto})
      .success(function(response){
         $scope.preguntas = response;
      });
   }

   $scope.agregarAlCarrito = function($idUsuario,$idProducto, $cantidad){
      $scope.fechaActual = new Date();
      $scope.fechaActual = $filter('date')($scope.fechaActual, 'yyyy-MM-dd HH:mm:ss');
      $http.post('../controladores/usuario/agregarAlCarritoController.php', {'usuario':$idUsuario, 'producto':$idProducto, 'fecha':$scope.fechaActual,'cantidad': $cantidad})
      .success(function(response){
        $scope.agregado = response;

               if ($scope.agregado.respuesta == 1) {
                   
                   $window.location.href = "carrito.php";  
               }
               else if ($scope.agregado.respuesta == 2)
                   bootbox.alert('Usted ya ha agregado este producto a su carrito de compras.');
               else if ($scope.agregado.respuesta == 3)
                   bootbox.alert('Se introducieron valores erroneos!');
               else
                   bootbox.alert('Ocurrio un error con la conexción. Vuelva a intentarlo en unos momentos.');
      });
   }

   $scope.restarCantidad = function(){
      if ($scope.cantidad > 1 )
         $scope.cantidad --;
   }

   $scope.sumarCantidad = function(){
      $scope.cantidad ++;
   }


   /**************** PAGINACION ***********************/
   $scope.desde = 0;
   $scope.limite = 15;
   $scope.claseActive = {active: true};

   //SE BUSCA EL TOTAL DE PRODUCTOS PARA CALCULAR LA CANTIDAD DE PAGINAS
   $scope.cantidadDePaginacion = function($idCategoria){
      $http.post('../controladores/usuario/contarCantidadDeProdutosController.php', {'idCategoria': $idCategoria})
      .success(function(response){
         $scope.cantidadProductos = response.cantidad;
         resto = $scope.cantidadProductos%$scope.limite;
         $scope.numeroDePaginas = ($scope.cantidadProductos - resto) / $scope.limite;
         if(resto > 0){
            $scope.numeroDePaginas++;
         }
         array = [];
         for(var i = 0; i<$scope.numeroDePaginas; i++){
            array.push((i+1));
         }
         $scope.paginaciones = array;
      });
   } 

   //BUSCA EL RESULTADO DE PRODUCTOS SEGUN LA PAGINA SELECCIONADA
   $scope.buscarSegunPagina = function(categoria, desdePaginacion){
      $scope.desde = desdePaginacion*$scope.limite - $scope.limite;
      $scope.listarproductosPorCategoria(categoria);
   }

   //BUSCA EL RESULTADO DE PRODUCTOS SEGUN LAS FLACHAS PULSADAS (ADELANTE O ATRAS)
   $scope.cambiarPagina = function(direccion, categoria){
      if(direccion == 0){
         if($scope.desde > 0)
            $scope.desde = $scope.desde - $scope.limite;
      }else{
         cantidadMaxima = $scope.numeroDePaginas * $scope.limite - $scope.limite;
         if($scope.desde < cantidadMaxima)
            $scope.desde = $scope.desde + $scope.limite;
      }
      $scope.listarproductosPorCategoria(categoria);
   }
   /****************** FIN PAGINACION */
});

