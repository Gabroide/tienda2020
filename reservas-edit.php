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
	
	$query_DatosConsulta = sprintf("SELECT * FROM tblcarritoreserva WHERE refUsuario=%s",
						$usuariotempoactivo);

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
    <title>PCi Express | <?php echo _T168;?></title>
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
		<h1 style="text-align: center"><?php echo _T168;?></h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include("usuario-menu.php"); ?>
				</div>
				<div class="col-sm-8">
				<?php if ($totalRows_DatosConsulta>0)
				{
				?>
					<div class="table-responsive cart_info">				
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image"><?php echo _T44;?></td>
									<td class="description"></td>
									<td class="price"><?php echo _T173;?></td>
									<td class="price"><?php echo _T45;?>*</td>
									<td class="description"><?php echo _T178;?></td>
								</tr>
							</thead>
							<tbody>
							<?php 
								do {

									$query_DatosConsultaProducto = sprintf("SELECT * FROM tblproducto WHERE idProducto=%s ",
													$row_DatosConsulta["refProducto"]);

									$DatosConsultaProducto = mysqli_query($con,  $query_DatosConsultaProducto) or die(mysqli_error($con));
									$row_DatosConsultaProducto = mysqli_fetch_assoc($DatosConsultaProducto);
									$totalRows_DatosConsultaProducto = mysqli_num_rows($DatosConsultaProducto);

									$linkProducto=GenerarRutaCategoria($row_DatosConsultaProducto["refCategoria1"]).$row_DatosConsultaProducto["strSEO_"._idiomaactual].".html";				
								?>
									<tr>
										<td width="20%">
											<?php if ($row_DatosConsultaProducto["strImagen1"]!=""){?>
												<a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>">
												<img src="images/productos/<?php echo $row_DatosConsultaProducto["strImagen1"];?>" alt="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>" id="imagenproducto<?php echo $row_DatosConsultaProducto["idProducto"];?>" width="70%"></a>
											<?php }
												else
											{?>
												<a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>"><img src="images/productos/nodisponible.jpg" alt="<?php _T118;?>" id="imagenproducto<?php echo $row_DatosConsultaProducto["idProducto"];?>"></a>
											<?php }?>
										</td>
										<td width="35%">
											<h4><a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>"><?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?></a></h4>
											<p><?php echo MostrarOpcionesProductoCarrito($row_DatosConsulta["idContador"]);?></p>
										</td>
										<td width="10%">
										<?php
											if($row_DatosConsulta["intTransaccionEfectuada"]==0)
												{?>
												<p>No Pagado</p>
												<?php }
											else
											{?>
											<p><?php echo number_format(20, 2, ",", "").$_SESSION["monedasimbolo"];?></p>
											<?php }?>
										</td>
										<td width="20%">
											<p class="cart_total_price">
											<?php echo number_format($row_DatosConsultaProducto["dblPrecio"], 2, ",", "").$_SESSION["monedasimbolo"];?>
										</td>
										<td width="15%">
											<?php if($row_DatosConsultaProducto["strFecha"]!=""){?>
											<p>
												<?php echo $row_DatosConsultaProducto["strFecha"];?>
											</p>
											<?php
											}
											else
											{?>
											<p><?php echo _T175;?></p>
											<?php }?>
										</td>
									</tr>
								<?php 
									} while ($row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta));
								?>						
							</tbody>
						</table>						
						<div>
							<p><?php echo _T174;?></p>
							<br>
							<p class="atencion"><?php echo _T176;?></p>
							<p><?php echo _T177;?></p>
						</div>					
					</div>					
				<?php
					} else 	echo _T10022."<br><br>";?>
				</div>
			</div>
			<?php include("includes/recomendados.php"); ?>
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