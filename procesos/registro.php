<?php 
	require_once "../clases/usuarios.php";
	$usuarios = new usuarios();

	$nombre = $_POST['nombre']; 
	$apellido_materno = $_POST['apellido_materno']; 
	$email = $_POST['email'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];


	$respuesta = $usuarios->agregarUsuario($nombre, $apellido_materno, $email, $usuario, $password);

	if ($respuesta) {
?>
	<script>
		alert("Registro exitoso!");
		window.location.href = '../registro.php';
	</script>	

<?php
		  		
	} else {
?>
		<script>
			alert("Fallo!");
			window.location.href ='../registro.php';
		</script>	
<?php 
		
	}

 ?>