<?php require_once('Connections/conexion.php'); ?>
<?php

$totalRows_DatosConsulta = "";	

if ((isset($_SESSION['tienda2017Front_UserId'])) || (isset($_SESSION['MM2_Temporal'])))
{
	
	if ($_SESSION['MM2_Temporal']=="ELEVADO")
	{
		$usuariotempoactivo=$_SESSION['tienda2017Front_UserId'];
		$_SESSION["usuariotempoactivo"]=$_SESSION['tienda2017Front_UserId'];
		$insertGoTo = "index.php";
	}
	else
	{
		$usuariotempoactivo=$_SESSION['MM2_Temporal'];
		$_SESSION["usuariotempoactivo"]=$_SESSION['MM2_Temporal'];
		$insertGoTo = "index.php";
	}
	
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) 
	{
  		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) 
	{
		$updateSQL = sprintf("UPDATE tblusuario SET strNombre=%s, strApellidos=%s, strDireccion=%s, strProvincia=%s, strPais=%s, strCP=%s, strEmail=%s, strTelefono=%s WHERE idUsuario=%s",
                       GetSQLValueString($_POST["strNombre"], "text"),
					   GetSQLValueString($_POST["strApellidos"], "text"),
					   GetSQLValueString($_POST["strDireccion"], "text"),
					   GetSQLValueString($_POST["strProvincia"], "text"),
					   GetSQLValueString($_POST["strPais"], "text"),
					   GetSQLValueString($_POST["strCP"], "text"),
					   GetSQLValueString($_POST["strEmail"], "text"),
					   GetSQLValueString($_POST["strTelefono"], "text"),
					   GetSQLValueString($usuariotempoactivo, "int"));

		//echo $updateSQL;
		$Result1 = mysqli_query($con, $updateSQL) or die(mysqli_error($con));

		$updateGoTo = "usuario.php";
		
		if (isset($_SERVER['QUERY_STRING'])) 
		{
			$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
			$updateGoTo .= $_SERVER['QUERY_STRING'];
  		}
  		header(sprintf("Location: %s", $updateGoTo));
	}

	$query_DatosConsulta = sprintf("SELECT * FROM tblusuario WHERE idUsuario=%s", GetSQLValueString($_GET["id"], "int"));

	$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
	$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
	$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
}
?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>PCi Express | <?php echo _T140;?></title>
    <meta name="description" content="">
    <meta name="author" content="">
<!-- InstanceEndEditable -->
    <?php include("includes/cabecera.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head><!--/head-->

<body>
<!-- InstanceBeginEditable name="Contenido" -->

<?php include("includes/header.php"); ?>

	<section id="cart_items">
		<h1 style="text-align: center"><?php echo _T142;?></h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include("usuario-menu.php"); ?>
				</div>
				<div class="col-sm-8">				
					<div class="table-responsive cart_info">				
						<form action="direccion-edit.php" method="post" id="forminsertar" name="forminsertar" role="form" >
						   <div class="form-group">
								<label for="strNombre">Nombre</label>
								<input class="form-control" name="strNombre" id="strNombre" value="<?php echo $row_DatosConsulta["strNombre"];?>" required>
							</div>
							<div class="form-group">
								<label for="strApellidos">Apellidos</label>
								<input class="form-control" name="strApellidos" id="strApellidos" value="<?php echo $row_DatosConsulta["strApellidos"];?>" required>
							</div>
							<div class="form-group">
								<label for="strDireccion">Dirección</label>
								<input class="form-control" name="strDireccion" id="strDireccion" value="<?php echo $row_DatosConsulta["strDireccion"];?>" required>
							</div>
							<div class="form-group">
								<label for="strProvincia">Provincia</label>
								<input class="form-control" name="strProvincia" id="strProvincia" value="<?php echo $row_DatosConsulta["strProvincia"];?>">
							</div>
							<div class="form-group">
								<label for="strPais">País</label>
								<input class="form-control" name="strPais" id="strPais" value="<?php echo $row_DatosConsulta["strPais"];?>" required>
							</div>
							<div class="form-group">
								<label for="strCP">Código Postal</label>
								<input class="form-control" name="strCP" id="strCP" value="<?php echo $row_DatosConsulta["strCP"];?>" required>
							</div>
							<div class="form-group">
								<label for="strEmail">Correo Electrónico</label>
								<input class="form-control" name="strEmail" id="strEmail" value="<?php echo $row_DatosConsulta["strEmail"];?>">
							</div>						
							<div class="form-group">
								<label for="strTelefono">Teléfono</label>
								<input class="form-control" name="strTelefono" id="strTelefono" value="<?php echo $row_DatosConsulta["strTelefono"];?>">
							</div>							  
							<button type="submit" class="btn btn-success">Actualizar</button>
							<input name="idUsuario" type="hidden" id="idUsuario" value="<?php echo $row_DatosConsulta["idUsuario"];?>">
						  	<input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">                                       
                    	</form>					
					</div>
				</div>
			</div>
			<?php include("includes/recomendados.php"); ?>
		</div>
	</section>

	<?php include("includes/pie.php"); ?>
	<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>