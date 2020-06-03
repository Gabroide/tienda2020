<?php require_once('Connections/conexion.php'); ?>
<?php
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING']))
	 	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) 
	{
		$updateSQL = sprintf("UPDATE tblusuario SET strNumCuenta=%s, intPago=%s WHERE idUsuario=%s",
					   GetSQLValueString(md5($_POST["strNumCuenta"]), "text"),
					   GetSQLValueString($_POST["intPago"], "int"),
					   GetSQLValueString($_POST["idUsuario"], "int"));

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
    <title>PCi Express | <?php echo _T143;?></title>
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
		<h1 style="text-align: center"><?php echo _T143;?></h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include("usuario-menu.php"); ?>
				</div>
				<div class="col-sm-8">
					<p><?php echo _T183;?></p>
					
					<?php
						if($row_DatosConsulta["strNumCuenta"]=="")
						{?>
						<h4><?php _T182;?></h4>
					<?php		
						}
						else
						{?>
						<p><?php echo _T184;?></p>
						<?php }?>
					<form action="metodos-pago.php" method="post" id="forminsertar" name="forminsertar" role="form">
						<div class="form-group">
							<label for="strNumCuenta"><?php echo _T186;?></label>
							<input class="form-control" placeholder="ES00123456789" name="strNumCuenta" id="strNumCuenta">
							<p><?php echo _T185;?></p>
						</div>
						<div class="form-group">
							<label for="intPago"><?php echo _T187;?></label><br>
							<?php 
							switch($row_DatosConsulta["intPago"])
							{
								case 1:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1" checked="checked"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> Paypal<br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
								
								case 2:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2" checked="checked"> <?php echo _T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 3:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1" checked="checked"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <?php echo _T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"checked="checked"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 4:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1" checked="checked"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <?php echo_T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4" checked="checked"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 5:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1" checked="checked"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <=php acho _T10023;?></php><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5" checked="checked"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 6:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <?php echo _T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6" checked="checked"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 7:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <?php echo _T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7" checked="checked"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 8:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> <?php echo _T10023;?><br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8" checked="checked"> <?php echo _T134;?><br>
									<?php }
								break;
									
								case 9:
									if (_intTransferencia=="1"){?>
										<input name="intPago" type="radio" value="1"> <?php echo _T59;?><br>
									<?php }?>								
									<?php if (_contrareembolso=="1"){?>
										<input name="intPago" type="radio" value="9" checked="checked"> <?php echo _T172;?><br>
									<?php }?>
									<?php if (_intPaypal=="1"){?>
										<input name="intPago" type="radio" value="2"> Paypal<br>
									<?php }?>
									<?php if (_intCaixa=="1"){?>
										<input name="intPago" type="radio" value="3"> <?php echo _T60;?><br>
									<?php }?>
									<?php if (_intSantander=="1"){?>
										<input name="intPago" type="radio" value="4"> <?php echo _T61;?><br>
									<?php }?>
									<?php if (_western=="1"){?>
										<input name="intPago" type="radio" value="5"> <?php echo _T10001;?><br>
									<?php }?>
									<?php if (_money=="1"){?>
										<input name="intPago" type="radio" value="6"> <?php echo _T10002;?><br>
									<?php }?>
									<?php if (_googlepay=="1"){?>
										<input name="intPago" type="radio" value="7"> <?php echo _T133;?><br>
									<?php }?>
									<?php if (_applepay=="1"){?>
										<input name="intPago" type="radio" value="8"> <?php echo _T134;?><br>
									<?php }
								break;
							}?>
						</div>						
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
mysqli_free_result($DatosConsulta);
?>