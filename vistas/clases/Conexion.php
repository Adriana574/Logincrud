<?php 

	class conectar
	{
		public function Conexion()
		{
			$Conexion=mysqli_connect('localhost',
										'root',
										'', 
										'logincrud');
			$Conexion->set_charset("utf8");
			return $Conexion;
		}
		
	}
 ?>