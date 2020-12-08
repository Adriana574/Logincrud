<?php 

	class conexion
	{
		public function conectar()
		{
			$conexion=mysqli_connect('localhost',
										'root',
										'', 
										'logincrud');
			$conexion->set_charset("utf8");
			return $conexion;
		}
		
	}
 ?>