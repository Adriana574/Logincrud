<?php 

	require_once "../clases/Conexion.php";
	require_once "../clases/crud.php";
	$obj = new crud();

	$datos=array(
	$_POST['concepto_gastoU'],
	$_POST['cantidad_gastoU'],
	$_POST['fechaU'],
	$_POST['idgastos']
				);

	echo $obj->actualizar($datos);

 ?>