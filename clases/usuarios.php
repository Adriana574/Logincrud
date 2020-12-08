<?php 
	
	require_once "conexion.php";

	class usuarios extends conexion {
		public function agregarUsuario($nombre, $apellido_materno, $email, $usuario, $password) {
			$conexion = conexion::conectar();

			$password = sha1($password);

			$sql = "INSERT INTO t_usuarios (nombre, apellido_materno, email, usuario, password) 
					VALUES ('$nombre', '$apellido_materno', '$email','$usuario','$password')";
			$result =  mysqli_query($conexion, $sql);

			return $result;
		}

		public function login($usuario, $password) {

			$conexion = conexion::conectar();
			$password = sha1($password);
			$sql = "SELECT count(*) as total FROM t_usuarios 
					WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion, $sql);
			$datos = mysqli_fetch_array($result);

			if ($datos['total'] > 0) {
				//encontro el usuario
				$_SESSION['usuario'] = $usuario;
				header("location:../vistas/inicio.php");
			} else {
				//no encontro el usuario
				header("location:../index.php");
			}	

		}
	}
 ?>