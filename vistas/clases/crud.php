<?php 

	class crud 
	{
		public function agregar($datos)
		{
			$obj = new conectar();
			$Conexion =$obj->Conexion();

			$sql="INSERT into t_gastos(concepto_gasto, cantidad_gasto, fecha) 
			values ('$datos[0]',
					 '$datos[1]',
					 '$datos[2]')";
			return mysqli_query($Conexion, $sql);
		}

		public function obtenDatos($idgastos)
		{
			$obj = new conectar();
			$Conexion =$obj->Conexion();

			$sql="SELECT id_gastos, 
                    concepto_gasto,    
                    cantidad_gasto, 
                    fecha from t_gastos
                    where id_gastos='$idgastos'";

             $result=mysqli_query($Conexion, $sql);
             $ver=mysqli_fetch_row($result);
             $datos=array(
             	'id_gastos' => $ver[0], 
                    'concepto_gasto' => $ver[1],    
                    'cantidad_gasto' => $ver[2], 
                    'fecha' => $ver[3]
             );

             return $datos;
		}

		public function actualizar($datos)
		{
			$obj = new conectar();
			$Conexion =$obj->Conexion();

			$sql = "UPDATE t_gastos set concepto_gasto = '$datos[0]',
				cantidad_gasto = '$datos[1]',
				fecha = '$datos[2]'
				where id_gastos='$datos[3]'";

			return mysqli_query($Conexion, $sql);
		}

		public function eliminar($idgastos)
		{
			$obj = new conectar();
			$Conexion =$obj->Conexion();

			$sql="DELETE from t_gastos where id_gastos='$idgastos'";
			return mysqli_query($Conexion,$sql);
		}
	}
 ?>