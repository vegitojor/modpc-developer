app.controller("formularioRegistro", function($scope, $http){
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
		if (isValid){	
			$http.post("../controladores/pruebaRegistroUsuario.php", 
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
					$scope.respuesta = response;

					if($scope.respuesta){
						$location.url("../index.php");
					}else {
						alert("El email ingresado ya esta en uso. Por favor ingrese un email diferente.");
					}
				})
		}else{
			alert("El formulario no es valido.");
		}
	}
});