<?php require_once('Connections/conexion.php');

if ((isset($_SESSION['MM2_Temporal'])) && ($_SESSION['MM2_Temporal'] != ""))
	{
	//La variable temporal ya está asignada, puedo agregar el producto
	}
else
{
	$_SESSION['MM2_Temporal'] = InsertarUsuarioTemporal();
}

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//GENERAR SESION PARA EL USUARIO, SE HAYA REGISTRADO O NO
	if ($_SESSION['MM2_Temporal']=="ELEVADO")
	{
		$usuariotempoactivo=$_SESSION['tienda2017Front_UserId'];
		$insertGoTo = "index.php";
	}
	else
	{
		$usuariotempoactivo=$_SESSION['MM2_Temporal'];
		$insertGoTo = "index.php";	
	}

$valorrespuesta = comprobarexistencia($_POST['refProducto'],$usuariotempoactivo );

//$valorrespuesta = 0;
if ($valorrespuesta!=0){
	//UPDATE
  $insertSQL = sprintf("UPDATE tblcarritoreserva SET intCantidad = intCantidad + %s WHERE idContador = %s",$_POST['intCantidad'],
					   $valorrespuesta);
	
	 $Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  $ultimoidinsertadodereserva = mysqli_insert_id($con);
}
else
{
  $insertSQL = sprintf("INSERT INTO tblcarritoreserva (refUsuario, refProducto, intCantidad) VALUES (%s, %s, %s)",
                       GetSQLValueString($usuariotempoactivo, "int"),
                       GetSQLValueString($_POST['refProducto'], "int"),
					   GetSQLValueString($_POST['intCantidad'], "int"));
	
	$Result1 = mysqli_query($con, $insertSQL) or die(mysqli_error($con));
  	$ultimoidinsertadodereserva = mysqli_insert_id($con);

  	AgregarOpcionesaCarrito($ultimoidinsertadodereserva, $_POST['refProducto']);
}
  
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }

  if (_destinocompra==1)
  	header(sprintf("Location: reserva.php"));
  else
  	header(sprintf("Location: %s", $insertGoTo));
?>