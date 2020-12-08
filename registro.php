<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
	<?php require_once "dependencias.php"; ?>
</head>
<body background="fondo/fondo2.jpg">
	<div class="container">
		<h1 style="font-family: candara;" class="text-white" align="center">Registro de usuarios</h1>
		<form action="procesos/registro.php" method="post">
			<div class="form-group">
				<label for="nombre" style="font-family: candara; font-weight: bold;" class="bg-dark text-white">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Jesus" required="">
			</div>
			<div class="form-group">
				<label for="apellido_materno" style="font-family: candara; font-weight: bold;" class="bg-dark text-white">Apellido Materno</label>
				<input type="text" class="form-control" name="apellido_materno" placeholder="Juarez" required="">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="email" style="font-family: candara; font-weight: bold;" class="bg-dark text-white">Email</label>
					<input type="text" class="form-control" name="email" placeholder="Email" required="">
				</div>
				<div class="form-group col-md-6">
					<label for="usuario" style="font-family: candara; font-weight: bold;" class="bg-dark text-white">Usuario</label>
					<input type="text" class="form-control" name="usuario" placeholder="usuario" required="">
				</div>
				<div class="form-group col-md-6">
					<label for="password" style="font-family: candara; font-weight: bold;" class="bg-dark text-white">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password" required="">
				</div>
			</div>
			<button type="submit" class="btn btn-primary" style="font-family: arial; font-weight: bold;" >Registrar</button>
			<a href="index.php" >Logear</a>
		</form>
	</div>
</body>
</html>