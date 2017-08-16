app.controller("formularioRegistro", function($scope, $http, $window, $filter){
	$scope.cargarProvincias = function(){
		$http.get("../controladores/cargarProvinciasController.php")
			.success(function(data){
				$scope.provincias =  data;
			})
	}

	$scope.cargarLocalidades = function(){
		$http.post("../controladores/cargarLocalidadesController.php", {'idProvincia': $scope.provincia})
			.success(function(data){
				$scope.localidades = data;
			})
	}
	
	
	$scope.submitFormulario = function(isValid){
		//item.dateAsString = $filter('date')(item.date, "yyyy-MM-dd");
		$scope.fechaNacimiento = $filter('date')($scope.fechaNacimiento, "yyyy-MM-dd");
		if (isValid){	
			$http.post("../controladores/registrarUsuarioController.php", 
					{'usuario': $scope.usuario, 
					'nombre': $scope.nombre,
					'apellido': $scope.apellido,
					'telefono': $scope.telefono,
					'fechaNacimiento': $scope.fechaNacimiento,
					'email': $scope.email,
					'direccion': $scope.direccion,
					'codPostal': $scope.codPostal,
					'localidad': $scope.localidad,
					'pass': $scope.passValid,
					'admin': $scope.admin})
				.success(function(response){
					$scope.data = response;

					if($scope.data.respuesta == 1){
						$window.location.href = "../index.php";
					}else if ($scope.data.respuesta == 0){
						alert("El email ingresado ya esta en uso. Por favor ingrese un email diferente.");
					}else {
						alert("Error en la conexion a la base de datos.");
					}
				})
		}else{
			alert("El formulario no es valido.");
		}
	}
});