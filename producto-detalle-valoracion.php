<?php require_once('Connections/conexion.php');

$insertSQL = sprintf("INSERT INTO tblproductovaloracion (refProducto, intRate) VALUES (%s, %s)",
				   GetSQLValueString($_POST['refProducto'], "int"), 
				   GetSQLValueString($_POST['intRate'], "int"));

$Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));

//echo $insertSQL;
header(sprintf("Location: ".$_POST['refURL']));
?>