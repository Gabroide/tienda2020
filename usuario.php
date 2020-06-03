<?php require_once('Connections/conexion.php'); ?>
<?php
	global $con;
	
	$query_Consulta = sprintf("SELECT * FROM tblusuario WHERE idUsuario = %s ",
		 GetSQLValueString($_SESSION['tienda2017Front_UserId'], "int"));
	//echo $query_Consulta;
	$Consulta = mysqli_query($con,  $query_Consulta) or die(mysqli_error($con));
	$row_Consulta = mysqli_fetch_assoc($Consulta);
	$totalRows_Consulta = mysqli_num_rows($Consulta);
	
?>
             
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>PCi Express | <?php echo _T137;?></title>
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
		<link href="css/user.css" rel="stylesheet">
		<section>
			<h1 style="text-align: center"><?php echo _T137;?></h1>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="users-box">
							<a href="pedido.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T140;?>">
								<div class="row">
									<div class="col-sm-4">
										<img src="images/cuenta/001-icono-pedido-express.png" alt="#">
									</div>
									<div class="col-sm-8">
										<h3><?php echo _T140;?></h3>
										<p><?php echo _T161;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="users-box">
							<a href="reservas-edit.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T168;?>">
								<div class="row">
									<div class="col-sm-3">
										<img src="" alt="NO ICON">
									</div>
									<div class="col-sm-9">
										<h3><?php echo _T168;?></h3>
										<p><?php echo _T169;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="users-box">
							<a href="descargas.php" title="<?php echo _T110;?> <?php echo _T141;?>">
								<div class="row">
									<div class="col-sm-4">
										<img src="" alt="#">
									</div>
									<div class="col-sm-8">
										<h3><?php echo _T141;?></h3>
										<p><?php echo _T162;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>																				
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="users-box">
							<a href="direccion-edit.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T142;?>">
								<div class="row">
									<div class="col-sm-4">
										<img src="images/cuenta/004-icono-direcciones-express.png">
									</div>
									<div class="col-sm-8">
										<h3><?php echo _T142;?></h3>
										<p><?php echo _T163;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				
					<div class="col-sm-4">
						<div class="users-box">
							<a href="metodos-pago.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T143;?>">
								<div class="row">
									<div class="col-sm-5">
										<img src="images/cuenta/005-Iicono-metodos-de-pago-express.png" title="<?php echo _T110;?> <?php echo _T164;?>">
									</div>
									<div class="col-sm-7">
										<h3><?php echo _T143;?></h3>
										<p><?php echo _T164;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="users-box">
							<a href="cuenta.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T144;?>">
								<div class="row">
									<div class="col-sm-4">
										<img src="images/cuenta/002-icono-inicio-y-seguridad-de-tu-cuenta-express.png">
									</div>
									<div class="col-sm-8">
										<h3><?php echo _T144;?></h3>
										<p><?php echo _T165;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">
						<div class="users-box">
							<a href="edit-refund.php" title="<?php echo _T110;?> <?php echo _T166;?>">
								<div class="row">
									<div class="col-sm-3">
										<img src="" alt="NO ICON">
									</div>
									<div class="col-sm-9">
										<h3><?php echo _T166;?></h3>
										<p><?php echo _T167;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
										
					<div class="col-sm-4">
						<div class="users-box">
							<a href="facturas.php" title="<?php echo _T110;?> <?php echo _T146;?>">
								<div class="row">
									<div class="col-sm-3">
										<img src="images/cuenta/003-icono-mis-facturas-express.png">
									</div>
									<div class="col-sm-9">
										<h3><?php echo _T146;?></h3>
										<p><?php echo _T170;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="users-box">
							<a href="ayuda.php" title="<?php echo _T110;?> <?php echo _T147;?>">
								<div class="row">
									<div class="col-sm-3">
										<img src="images/cuenta/008-icono-ayuda-express.png">
									</div>
									<div class="col-sm-9">
										<h3><?php echo _T147;?></h3>
										<p><?php echo _T171;?></p>
									</div>
								</div>
							</a>
						</div>
					</div>															
				</div>
				
				<div>
					<h3>¡<?php echo _T159;?> <?php echo $row_Consulta["strNickName"];?>!</h3>
					<p><?php echo _T160;?></p>
				</div>	
			</div>						
		</section>
		<?php include("includes/pie.php"); ?>
		<?php include("includes/piejs.php"); ?>
		<!-- InstanceEndEditable -->
	</body>
	<!-- InstanceEnd --></html>