<?php require_once('Connections/conexion.php'); ?>
<?php
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING']))
	 	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) 
	{
		if (comprobaremailunico($_POST["idUsuario"], $_POST["strEmail"]))
		{
			if ($_POST["strPassword"]!="")
			{
				$updateSQL = sprintf("UPDATE tblusuario SET strEmail=%s, strNombre=%s, strApelidos=%s, strNickName=%s, intNivel=%s, intEstado=%s, strPassword=%s, strImagen=%s WHERE idUsuario=%s",
							   GetSQLValueString($_POST["strEmail"], "text"),
							   GetSQLValueString($_POST["strNombre"], "text"),
							   GetSQLValueString($_POST["strApellidos"], "text"),
							   GetSQLValueString($_POST["strNickName"], "text"),
							   GetSQLValueString($_POST["intNivel"], "int"),
							   GetSQLValueString($_POST["intEstado"], "int"),
							   GetSQLValueString(md5($_POST["strPassword"]), "text"),
							   GetSQLValueString($_POST["strImagen"], "text"),
							   GetSQLValueString($_POST["idUsuario"], "int"));

			}
			else
			{
			  $updateSQL = sprintf("UPDATE tblusuario SET strEmail=%s, strNombre=%s, strApellidos=%s, strNickName=%s, intNivel=%s, intEstado=%s, strImagen=%s WHERE idUsuario=%s",
								   GetSQLValueString($_POST["strEmail"], "text"),
								   GetSQLValueString($_POST["strNombre"], "text"),
								   GetSQLValueString($_POST["strApellidos"], "text"),
							   	   GetSQLValueString($_POST["strNickName"], "text"),
								   GetSQLValueString($_POST["intNivel"], "int"),
								   GetSQLValueString($_POST["intEstado"], "int"),
								   GetSQLValueString($_POST["strImagen"], "text"),
								   GetSQLValueString($_POST["idUsuario"], "int"));
			}
			
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
		else
		{
			//EL EMAIL ESTÁREPETIDO
			 $insertGoTo = "error.php?error=2&id=".$_POST["idUsuario"];
			 header(sprintf("Location: %s", $insertGoTo));
		}
	}
?>
<?php
	$query_DatosConsulta = sprintf("SELECT * FROM tblusuario WHERE idUsuario=%s", GetSQLValueString($_GET["id"], "int"));

	$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
	$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
	$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);
?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>PCi Express | <?php echo $row_DatosConsulta["strNickName"];?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/extraadmin.css" rel="stylesheet" type="text/css">
<!-- InstanceEndEditable -->
    <?php include("includes/cabecera.php"); ?>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head><!--/head-->

<body>
<!-- InstanceBeginEditable name="Contenido" -->
<script src="js/scriptadmin.js"></script>
<?php include("includes/header.php"); ?>

	<section id="cart_items">
		<h1 style="text-align: center"><?php echo $row_DatosConsulta["strNickName"];?></h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include("usuario-menu.php"); ?>
				</div>
				<div class="col-sm-8">
					<form action="cuenta.php" method="post" id="forminsertar" name="forminsertar" role="form" onSubmit="javascript:return validarusuarioeditar();">
							<div class="form-group">
								<label for="strEmail"><?php echo _T41;?></label>
								<input class="form-control" placeholder="usar@correo.net" name="strEmail" id="strEmail" value="<?php echo $row_DatosConsulta["strEmail"];?>">
							</div>
							<div class="alert alert-danger oculto" id="erroremail"><?php echo _T148;?></div>
							<div class="form-group">
								<label for="strPassword"><?php echo _T35;?></label>
								<input class="form-control" placeholder="" name="strPassword" id="strPassword">
								<p><?php echo _T149;?></p>
							</div>							
							<div class="form-group">
								<label for="strNombre"><?php echo _T10008;?></label>
								<input class="form-control" placeholder="<?php echo _T31;?>" name="strNombre" id="strNombre" value="<?php echo $row_DatosConsulta["strNombre"];?>" required>
							</div>
							<div class="alert alert-danger oculto" id="errornombre"><?php echo _T31;?></div>
							<div class="form-group">
								<label for="strApellidos"><?php echo _T150;?></label>
								<input class="form-control" placeholder="Moreno Moreno" name="strApellidos" id="strApellidos" value="<?php echo $row_DatosConsulta["strApellidos"];?>" required>
							</div>
							<div class="alert alert-danger oculto" id="errorapellidos"><?php echo _T151;?></div>
							<div class="form-group">
								<label for="strNickName"><?php echo _T152;?></label>
								<input class="form-control" placeholder="Username" name="strNickName" id="strNickName" value="<?php echo $row_DatosConsulta["strNickName"];?>" required>
							</div>
							<div class="alert alert-danger oculto" id="errornickname"><?php echo _T153;?></div>                                     
							<?php 
							//BLOQUE INSERCION IMAGEN
							//***********************
							//***********************
							//***********************									  //***********************
							//PARÁMETROS DE IMAGEN
							$nombrecampoimagen="strImagen";
							$nombrecampoimagenmostrar="strImagenpic";
							$nombrecarpetadestino="../images/usuarios/"; //carpeta destino con barra al final
							$nombrecampofichero="file1";
							$nombrecampostatus="status1";
							$nombrebarraprogreso="progressBar1";
							$maximotamanofichero="500000"; //en Bytes, "0" para ilimitado. 1000000 Bytes = 1000Kb = 1Mb
							$tiposficheropermitidos="png"; //  Por ejemplo "jpg,doc,png", separados por comas y poner "0" para permitir todos los tipos
							$limiteancho="200"; // En píxels, "0" significa cualquier tamaño permitido
							$limitealto="200"; // En píxels, "0" significa cualquier tamaño permitido
							$cadenadeparametros="'".$nombrecampoimagen."','".$nombrecampoimagenmostrar."','".$nombrecarpetadestino."','".$nombrecampofichero."','".$nombrecampostatus."','".$nombrebarraprogreso."','".$maximotamanofichero."','".$tiposficheropermitidos."','".$limiteancho."','".$limitealto."'";

							//$cadenadeparametros="";
							?>
							<div class="form-group">
								<label for="<?php echo $nombrecampoimagen;?>"><?php echo _T155;?></label>
								<input class="form-control"  name="<?php echo $nombrecampoimagen;?>" id="<?php echo $nombrecampoimagen;?>" value="<?php echo $row_DatosConsulta["strImagen"];?>">
							</div> 
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<input type="file" name="<?php echo $nombrecampofichero;?>" id="<?php echo $nombrecampofichero;?>"><br>
									</div>
									<div class="col-lg-6">
										<input class="form-control" type="button" value="<?php echo _T156;?>" title="<?php echo _T156;?>" onclick="uploadFile(<?php echo $cadenadeparametros;?>)">
									</div>
								</div>
								<progress id="<?php echo $nombrebarraprogreso;?>" value="0" max="100" style="width:100%;"></progress>
								<h5 id="<?php echo $nombrecampostatus;?>"></h5>
								<?php if ($row_DatosConsulta["strImagen"]!=""){?>
								<img src="<?php echo $nombrecarpetadestino.$row_DatosConsulta["strImagen"];?>" alt="" id="<?php echo $nombrecampoimagenmostrar;?>">
								<?php }
								else
								{?>
								<img src="../images/usuarios/sinfoto.jpg" alt="" width="200" height="200" id="<?php echo $nombrecampoimagenmostrar;?>">
								<?php }?>
							</div>
							<p><?php echo _T154;?></p>   
							<?php /*?>
							//***********************
							//***********************
							//***********************									  //***********************
							// FIN BLOQUE INSERCION IMAGEN
							<?php */?>     

						  <button type="submit" class="btn btn-success" title="<?php echo _T157;?>"><?php echo _T157;?></button>
						  <input name="idUsuario" type="hidden" id="idUsuario" value="<?php echo $row_DatosConsulta["idUsuario"];?>">
						  <input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">                                       
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php include("includes/pie.php"); ?>
	<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
//mysqli_free_result($DatosConsulta);
?>