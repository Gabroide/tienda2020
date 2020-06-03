<?php require_once('Connections/conexion.php');

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

switch ($_GET["op"]) {
    case 1:
		//SUMAR
        $updateSQL = sprintf("UPDATE tblcarritoreserva SET intCantidad=intCantidad+1 WHERE idContador=%s AND refUsuario=%s",
						GetSQLValueString($_GET["id"], "int"),
					    $usuariotempoactivo);

	
		$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
		$insertGoTo = "reserva.php";
	   header(sprintf("Location: %s", $insertGoTo));
	   mysqli_free_result($Result1);
        break;
    case 2:
		//RESTAR
		if ($_GET["actual"]==1)
		{
			$query_Delete = sprintf("DELETE FROM tblcarritoreserva WHERE idContador=%s AND refUsuario=%s AND intTransaccionEfectuada=0",
                       GetSQLValueString($_GET["id"], "int"),
					   $usuariotempoactivo);
			$Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error($con));			
		}
		else
		{
         	$updateSQL = sprintf("UPDATE tblcarritoreserva SET intCantidad=intCantidad-1 WHERE idContador=%s AND refUsuario=%s AND intTransaccionEfectuada=0",
						GetSQLValueString($_GET["id"], "int"),
					    $usuariotempoactivo);	
			$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));
		}
		
		$insertGoTo = "reserva.php";
	    header(sprintf("Location: %s", $insertGoTo));
	    mysqli_free_result($Result1);
        break;
    case 3:
		//ELIMINAR
       $query_Delete = sprintf("DELETE FROM tblcarritoreserva WHERE idContador=%s AND refUsuario=%s AND intTransaccionEfectuada=0",
                       GetSQLValueString($_GET["id"], "int"),
					   $usuariotempoactivo);
	   $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error($con));

	   $insertGoTo = "reserva.php";
	   header(sprintf("Location: %s", $insertGoTo));
	   mysqli_free_result($Result1);
        break;
		
		 case 4:
		//ELIMINAR TODO LA RESERVA
       $query_Delete = sprintf("DELETE FROM tblcarritoreserva WHERE  refUsuario=%s AND intTransaccionEfectuada=0",
                       $usuariotempoactivo);
	   $Result1 = mysqli_query($con, $query_Delete) or die(mysqli_error($con));

	   $insertGoTo = "reserva.php";
	   header(sprintf("Location: %s", $insertGoTo));
	   mysqli_free_result($Result1);
        break;
}
?>