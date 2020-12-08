<?php 
	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";
	$obj = new crud();

	$datos=array(
	$_POST['concepto_gasto'],
	$_POST['cantidad_gasto'],
	$_POST['fecha']
				);

	echo $obj->agregar($datos);
 ?>