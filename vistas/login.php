<?php ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="stylesheet" href="../css/w3.css">

	<!-- Angular -->
	<script type="text/javascript" src="../librerias/angularjs/angular.min.js"></script>
	<!-- modulo angular -->
	<script type="text/javascript" src="../js/loginValidacion.js"></script>
	<!-- controlador angular -->
	<script type="text/javascript" src="../js/loginValidacionController.js"></script>
	<!-- directiva angular -->
	
	
    <title>login - MODPC</title>
	<title></title>
</head>
<body ng-app="login">
	<div class="">
		<div class=" w3-padding-32 w3-blue-gray">
			<h1 class="w3-jumbo w3-margin-left">Inicio de Sesión</h1>
		</div>
        <br>
		<div class="w3-card-4 w3-content" style="width: 50%" ng-controller="formularioLogin">
			<header class="w3-container w3-blue-gray">
				<h3>Por favor ingrese sus datos para continuar</h3>
			</header>
			<!-- <form action="../controladores/loginController.php" class="w3-container w3-content" method="POST">-->
			<form action="" class="w3-container w3-content" method="post">
				<label for="">E-mail</label>
				<input type="text" class="w3-input" placeholder="Ingrese su dirección de email" name="emailLogin" ng-model="emailLogin" ng-model-option="{updateOn: 'blur'} " required="">
				<label for="">Contrasaña</label>
				<input type="password" class="w3-input" name="passLogin" placeholder="Ingrese su contraseña" ng-model="passLogin" ng-model-option="{updateOn: 'blur'} ">
				<br>
				<input type="submit" class="w3-btn w3-green w3-right" value="Ingresar" ng-click="iniciarSesion()">
				<br>
				<p>Si no posee cuenta de inicio puede registrarse <a href="registro-de-usuario.php" class="w3-text-indigo">aquí</a>.</p>
			</form>					
		</div>
	</div>
</body>
</html>