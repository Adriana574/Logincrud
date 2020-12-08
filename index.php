<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php 
	require_once "dependencias.php"; 
	session_start();
	if (isset($_SESSION['usuario'])) {
		header("location:vistas/inicio.php");
	}
	?>
</head>
<body background="fondo/fondo.jpg">
	<div id="login">
		<h3 class="text-center text-white pt-5">INICIAR SESION</h3>
		<div class="container">
			<div id="login-row" class="row justify-content-center align-items-center">
				<div id="login-column" class="col-md-6">
					<div id="login-box" class="col-md-12">
						<form id="login-form" action="procesos/login.php" method="post">
							<div class="form-group">
								<label for="usuario" class="text-white" style="font-family: candara; font-weight: bold;">USUARIO:</label>
								<br>
								<input type="text" name="usuario" class="form-control" id="usuario">
							</div>
							<div class="form-group">
								<label for="password" class="text-white" style="font-family: candara; font-weight: bold;">PASSWORD:</label>
								<br>
								<input type="password" name="password" class="form-control" id="password">
							</div>
							<div class="form-group">
								<button class="btn btn-primary">INGRESAR</button>
							</div>
							<div id="register-link" class="text-right">
								<a href="registro.php" class="text-primary" style="font-family: arial; font-weight: bold;">REGISTRARSE</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

