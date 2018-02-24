app.controller("categoriaController", function ($scope, $http, $sce, $filter, $window) {
   $scope.desde = 0;
   $scope.limitie = 15;

   $scope.preguntas;

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

   $scope.videoPrueba = "https://www.youtube.com/embed/y910FVrywFU";
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

   $scope.agregarAlCarrito = function($idUsuario,$idProducto){
      $scope.fechaActual = new Date();
      $scope.fechaActual = $filter('date')($scope.fechaActual, 'yyyy-MM-dd HH:mm:ss');
      $http.post('../controladores/usuario/agregarAlCarritoController.php', {'usuario':$idUsuario, 'producto':$idProducto, 'fecha':$scope.fechaActual})
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


   /**************** PAGINACION ***********************/
   //SE BUSCA EL TOTAL DE PRODUCTOS PARA CALCULAR LA CANTIDAD DE PAGINAS
   $scope.cantidad = function($idCategoria){
      $http
   } 

   $scope.paginacion = function(categoria, desdePaginacion){

      $scope.listarproductosPorCategoria(categoria);
   }
   /****************** FIN PAGINACION */
});