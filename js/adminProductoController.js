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

    $scope.cargaProducto = false;
    $scope.mostrarCargaProducto = function () {
        $scope.cargaProducto = true;
    }

    $scope.cerrarCargaProducto = function () {
        $scope.cargaProducto = false;
        console.log($scope.cargaProducto);
    }

    $scope.listarProductos = function () {
        $http.post('../controladores/listarProductosController.php', {'desde': $scope.desde, 'limite': $scope.limite})
            .success(function (response) {
                $scope.productos = response;
        })
    }

    $scope.editarProducto = function($id){
        
    }

       /**************** PAGINACION ***********************/
       $scope.desde = 0;
       $scope.limite = 5;
       $scope.claseActive = {'w3-green': true};

       //SE BUSCA EL TOTAL DE PRODUCTOS PARA CALCULAR LA CANTIDAD DE PAGINAS
       $scope.cantidadDePaginacion = function(){
          $http.post('../controladores/contarCantidadProductosAdminController.php', {})
          .success(function(response){
             $scope.cantidadProductos = response.cantidad;
             resto = $scope.cantidadProductos % $scope.limite;
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
       $scope.buscarSegunPagina = function( desdePaginacion){
          $scope.desde = desdePaginacion*$scope.limite - $scope.limite;
          $scope.listarProductos();
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
          $scope.listarProductos();
       }
       /****************** FIN PAGINACION */


});