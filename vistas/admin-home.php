<?php  

include_once ("../incluciones/verificacionAdmin.php");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="stylesheet" href="../css/w3.css">

	<!-- w3 javascript -->
	<script type="text/javascript" src="../js/w3.js"></script>

	<!-- Angular -->
	<script type="text/javascript" src="../librerias/angularjs/angular.min.js"></script>

	<title>Control administrador</title>
</head>
<body>
	<div class="w3-container">
		<div class="w3-bar w3-black">
			<a href="cargar-producto.php" class="w3-bar-item w3-hover-indigo">Producto</a>
			<a href="" class="w3-bar-item w3-hover-indigo">Categoria</a>
			<a href="" class="w3-bar-item w3-hover-indigo">Proveedor</a>
            <a href="" class="w3-bar-item w3-hover-indigo">Marca</a>
            <a href="" class="w3-bar-item w3-hover-indigo">Monedas</a>
			<a href="../controladores/cerrarSesionController.php" class="w3-bar-item w3-hover-red w3-right">Salir</a>
		</div>
	</div>
	<br>

    <!-- seccion de busqueda de producto -->
	<div class="w3-row w3-container ">
		<div class="w3-card-4">
			<div class="w3-row ">
				<h1>Buscar productos segun los criterios de busqueda:</h1>
			</div>
			<div class="w3-row">
			    <a href="javascript:void(0)" onclick="openTab(event, 'producto');">
			      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-center">Producto</div>
			    </a>
			    <a href="javascript:void(0)" onclick="openTab(event, 'categoria');">
			      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-center">Categoria</div>
			    </a>
			    <a href="javascript:void(0)" onclick="openTab(event, 'proveedor');">
			      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding w3-center">Proveedor</div>
			    </a>
		    </div>

			<div id="producto" class="w3-container productos" style="display:none">
				<h3>Por nombre de producto</h3>
				<form action="" class="w3-content">
					<input 	type="text" class="w3-input" name="buscarPorProducto" placeholder="Introduce un producto">
					<br>
					<input type="submit" class="w3-btn w3-green w3-right" name="">
				</form>
			</div>

			<div id="categoria" class="w3-container productos" style="display:none">
				<h3>Por nombre de categoria</h3>
				<form action="" class="w3-content">
					<input 	type="text" class="w3-input" name="buscarPorProducto" placeholder="Introduce un producto">
					<br>
					<input type="submit" class="w3-btn w3-green w3-right" name="">
				</form>
			</div>

			<div id="proveedor" class="w3-container productos" style="display:none">
				<h3>Por nombre de proveedor</h3>
				<form action="" class="w3-content">
					<input 	type="text" class="w3-input" name="buscarPorProducto" placeholder="Introduce un producto">
					<br>
					<input type="submit" class="w3-btn w3-green w3-right" name="">
				</form>
			</div>
			
	    </div>
	</div>
	<br>

    <!-- tabla resultado de busqueda -->
	<div class="w3-container ">
		<table class="w3-table w3-striped w3-hoverable w3-card-4">
			<tr>
				<th>id</th>
                <th>descripción</th>
                <th>estado</th>
                <th>precio</th>
				<th>categoria</th>
			</tr>
		</table>
	</div>
</body>
</html>