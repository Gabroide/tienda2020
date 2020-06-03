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
	
	if (!isset($_SESSION["zonaactiva"]))
		$_SESSION["zonaactiva"]=0;

	if (isset($_GET["zona"]))
		$_SESSION["zonaactiva"]=$_GET["zona"];
	//echo $_SESSION["zonaactiva"];

	if (!isset($_SESSION["zonaimpuestoactiva"]))
		$_SESSION["zonaimpuestoactiva"]=0;

	if (isset($_GET["impuesto"]))
		$_SESSION["zonaimpuestoactiva"]=$_GET["impuesto"];
		
	$query_DatosConsulta = sprintf("SELECT * FROM tblcarrito WHERE refUsuario=%s AND intTransaccionEfectuada=0 ",
						$usuariotempoactivo);

	$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
	$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
	$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);	
}

$query_DatosZona = sprintf("SELECT * FROM tblzona WHERE intEstado=1 AND refPadre=0 ORDER BY strNombre_"._idiomaactual);
$DatosZona = mysqli_query($con,  $query_DatosZona) or die(mysqli_error($con));
$row_DatosZona = mysqli_fetch_assoc($DatosZona);
$totalRows_DatosZona = mysqli_num_rows($DatosZona);

$query_DatosZonaImpuesto = sprintf("SELECT * FROM tblzonaimpuesto WHERE intEstado=1 ORDER BY strNombre");
$DatosZonaImpuesto = mysqli_query($con,  $query_DatosZonaImpuesto) or die(mysqli_error($con));
$row_DatosZonaImpuesto = mysqli_fetch_assoc($DatosZonaImpuesto);
$totalRows_DatosZonaImpuesto = mysqli_num_rows($DatosZonaImpuesto);

?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>PCi Express | <?php echo _T43;?></title>
    <meta name="description" content="">
    <meta name="author" content="">
<!-- InstanceEndEditable -->
    <?php include("includes/cabecera.php"); ?>
<!-- InstanceBeginEditable name="head" -->
    <script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='carrito.php?zona="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function MM_jumpMenuImpuesto(targ,selObj,restore){ //v3.0
  eval(targ+".location='carrito.php?impuesto="+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
    </script>
<!-- InstanceEndEditable -->
</head><!--/head-->

<body>
<!-- InstanceBeginEditable name="Contenido" -->

<?php include("includes/header.php"); ?>
<?php //include("includes/slider.php"); ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php" title="<?php echo _T110;?> <?php echo _T1;?>"> <?php echo _T1;?></a></li>
				  <li class="active" ><?php echo _T43;?></li>
				</ol>
			</div>
			<?php if ($totalRows_DatosConsulta>0)
			{
				?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image"><?php echo _T44;?></td>
							<td class="description"></td>
							<td class="price"><?php echo _T45;?></td>
							<td class="price"><?php echo _T46;?></td>
							<td class="quantity"><?php echo _T47;?></td>
							<td class="total"><?php echo _T48;?></td>
							<td></td>
						</tr>
					</thead>
					<tbody>
										
					<?php
					$stockadmisible=1;
					$totalcarrito=0;
					$totalimpuestos=0;
					$totalsinimpuestos=0;
					$totalpeso=0;
					do {

						$query_DatosConsultaProducto = sprintf("SELECT * FROM tblproducto WHERE idProducto=%s ",
										$row_DatosConsulta["refProducto"]);

				$DatosConsultaProducto = mysqli_query($con,  $query_DatosConsultaProducto) or die(mysqli_error($con));
				$row_DatosConsultaProducto = mysqli_fetch_assoc($DatosConsultaProducto);
				$totalRows_DatosConsultaProducto = mysqli_num_rows($DatosConsultaProducto);

				$linkProducto=GenerarRutaCategoria($row_DatosConsultaProducto["refCategoria1"]).$row_DatosConsultaProducto["strSEO_"._idiomaactual].".html";				
						?>
						<tr>
							<td width="10%" >
								<?php if ($row_DatosConsultaProducto["strImagen1"]!=""){?>
								<a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>">
									<img src="images/productos/<?php echo $row_DatosConsultaProducto["strImagen1"];?>" alt="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>" id="imagenproducto<?php echo $row_DatosConsultaProducto["idProducto"];?>" width="70%"></a>
								<?php }
									else
									{?>
								<a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>"><img src="images/productos/nodisponible.jpg" alt="<?php _T118;?>" id="imagenproducto<?php echo $row_DatosConsultaProducto["idProducto"];?>"></a>
								<?php }?>
							</td>
							<td width="30%">
							  <h4><a href="<?php echo $linkProducto;?>" title="<?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?>"><?php echo $row_DatosConsultaProducto["strNombre_"._idiomaactual];?></a></h4>
								<p><?php echo MostrarOpcionesProductoCarrito($row_DatosConsulta["idContador"]);?></p>
							</td>
							<td width="10%">
								<p><?php 
									$pesoproducto=$row_DatosConsultaProducto["dblPeso"];
									$pesoproducto=$pesoproducto*$row_DatosConsulta["intCantidad"];
									$precioproducto=CalcularPrecioProducto($row_DatosConsultaProducto["idProducto"], 1);

									// _DESCUENTO POR CANTIDAD
									$descuentoporcantidad=0;
									if ($row_DatosConsultaProducto["refGrupo"]!=0){
										$descuentoporcantidad=CalcularDescuentoCantidad($row_DatosConsulta["refProducto"], $row_DatosConsulta["intCantidad"], $row_DatosConsultaProducto["refGrupo"]);
									}
									if ($descuentoporcantidad!=0){
										$factor=1-($descuentoporcantidad/100);	
										$precioproducto=$precioproducto*$factor;	
									}
									echo number_format($precioproducto, 2, ",", "").$_SESSION["monedasimbolo"];?></p>
							</td>
							<td width="10%">
								<p><?php 
								$impuestoproducto=CalcularImpuestoProducto($row_DatosConsultaProducto["idProducto"], 1);
								if ($descuentoporcantidad!=0){
									$factor=1-($descuentoporcantidad/100);
									$impuestoproducto=$impuestoproducto*$factor;	
								}
								$totalimpuestos=$totalimpuestos+($impuestoproducto*$row_DatosConsulta["intCantidad"]);
								echo number_format($impuestoproducto, 2, ',', '').$_SESSION["monedasimbolo"];
								?></p>
							</td>
							<td width="15%">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="carrito-operar.php?id=<?php echo $row_DatosConsulta["idContador"]?>&op=1" title="<?php echo _T119;?>"> + </a>
									<label for="quantity" style="display: none"><?php echo _T121;?></label>
									<input readonly class="cart_quantity_input"  type="text" name="quantity" value="<?php echo $row_DatosConsulta["intCantidad"];?>" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="carrito-operar.php?id=<?php echo $row_DatosConsulta["idContador"]?>&op=2&actual=<?php echo $row_DatosConsulta["intCantidad"];?>" title="<?php echo _T120;?>"> - </a>
									<?php if ($row_DatosConsulta["intCantidad"]>$row_DatosConsultaProducto["intStock"]) {
										echo "<br><br><span style='color:#FF0000'>"._T107."</span>";
										$stockadmisible=0;
									}?>									
								</div>
							</td>
							<td width="20%">
								<p class="cart_total_price"><?php 
									//AÑADIR VALOR DE OPCIONES
									$extraopciones=MostrarValorOpciones($row_DatosConsulta["idContador"]);
									$precioproductounidades= ($precioproducto+$extraopciones+$impuestoproducto)*$row_DatosConsulta["intCantidad"];
									$totalsinimpuestos=$totalsinimpuestos +  (($precioproducto+$extraopciones)*$row_DatosConsulta["intCantidad"]);				
									echo number_format($precioproductounidades, 2, ",", "").$_SESSION["monedasimbolo"];
						
									//ASIGNAMOS EN VARIABLES DE SESION DINÁMICAS LOS VALORES FINALES DE CADA PRODUCTO DEL CARRITO
									$_SESSION["carrito_producto_".$row_DatosConsulta["idContador"]]=$precioproductounidades;
		
									//ASI LUEGO PODEMOS PONER ESTE VALOR EN LA BBDD
									$totalcarrito= $totalcarrito + $precioproductounidades;?></p>
							</td>
							<td width="5%">
								<a class="cart_quantity_delete" href="carrito-operar.php?id=<?php echo $row_DatosConsulta["idContador"]?>&op=3" title="<?php echo _T122;?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php 
							$totalpeso=$totalpeso+$pesoproducto;
							 } while ($row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta));
							?>						
						
					</tbody>
				</table>
				
			</div>
			<a class="btn btn-default update" href="carrito-operar.php?id=<?php echo $row_DatosConsulta["idContador"]?>&op=4" title="<?php echo _T49;?>"><?php echo _T49;?></a>&nbsp;			
			<a class="btn btn-default update" href="index.php" title="<?php echo _T10016;?>"><?php echo _T10016;?></a>			
			<?php
				} else 	echo _T10017."<br><br>";?>

		</div>
	</section>

	<?php if ($totalRows_DatosConsulta>0)
	{
	?>
	
	<section id="do_action">
		<div class="container">
			<div class="heading">								
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">					
						<form action="pagar.php" method="post">
							<ul class="user_option">
							<?php if (_zonas==1){?>
												
								<li>								
									<label for="intZona"><?php echo _T50;?></label>
								</li>
								<li>
									<select name="intZona" class="form-control" id="intZona" onChange="MM_jumpMenu('parent',this,0)">
										<option value="0" <?php if ($_SESSION["zonaactiva"]==0) echo "selected";?> ><?php echo _T50;?></option>
										<?php if ($totalRows_DatosZona>0){
										do { 
										?>
										<option value="<?php echo $row_DatosZona["idZona"]?>" <?php if ($row_DatosZona["idZona"]==$_SESSION["zonaactiva"]) echo "selected"; ?>><?php echo $row_DatosZona["strNombre_"._idiomaactual]?></option>
										<?php } while ($row_DatosZona = mysqli_fetch_assoc($DatosZona));
										} ?>
									</select>
								</li>
								<?php }
								else
								 {?>
							 	<input type="hidden"  name="intZona" value="-1">
							 	<?php }?>						
							</ul>
							<ul class="user_option">
								<?php if (_impuestos==1){?>					
								<li>								
									<label for="intZonaImpuesto"><?php echo _T10000;?></label>
								</li>
								<li>
									<select name="intZonaImpuesto" class="form-control" id="intZonaImpuesto" onChange="MM_jumpMenuImpuesto('parent',this,0)">
										<option value="0" <?php if ($_SESSION["zonaimpuestoactiva"]==0) echo "selected";?> ><?php echo _T10000;?></option>
										<?php if ($totalRows_DatosZonaImpuesto>0){
										do { 																?>
											<option value="<?php echo $row_DatosZonaImpuesto["idZonaImpuesto"]?>" <?php if ($row_DatosZonaImpuesto["idZonaImpuesto"]==$_SESSION["zonaimpuestoactiva"]) echo "selected"; ?>><?php echo $row_DatosZonaImpuesto["strNombre"]?></option>
											<?php echo $_SESSION["zonaimpuestoactiva"];?>
											<?php } while ($row_DatosZonaImpuesto = mysqli_fetch_assoc($DatosZonaImpuesto));
											} ?>
										</select>
									</li>
									<?php }
									else
									 {?>
							 		<input type="hidden"  name="intZonaImpuesto" value="-1">
							 		<?php }?>						
								</ul>
									
								<?php											
									$strNombre="";
									$strApellidos="";
									$strDireccion="";
									$strProvincia="";
									$strPais="";
									$strCP="";
									$strEmail="";
									$strTelefono="";
									$intMetPago="";

									$query_DatosUsuario = sprintf("SELECT * FROM tblusuario WHERE idUsuario=%s ORDER BY idUsuario DESC",
															$usuariotempoactivo);
									//echo $query_DatosComprador;
									$DatosUsuario= mysqli_query($con,  $query_DatosUsuario) or die(mysqli_error($con));
									$row_DatosUsuario = mysqli_fetch_assoc($DatosUsuario);
									$totalRows_DatosUsuario = mysqli_num_rows($DatosUsuario);							
		
									$query_DatosComprador = sprintf("SELECT * FROM tblcompra WHERE idUsuario=%s ORDER BY idCompra DESC",
															$usuariotempoactivo);
									//echo $query_DatosComprador;
									$DatosComprador= mysqli_query($con,  $query_DatosComprador) or die(mysqli_error($con));
									$row_DatosComprador = mysqli_fetch_assoc($DatosComprador);
									$totalRows_DatosComprador = mysqli_num_rows($DatosComprador);
									
									$strNombre=$row_DatosUsuario["strNombre"];
									$strApellidos=$row_DatosUsuario["strApellidos"];
									$strDireccion=$row_DatosUsuario["strDireccion"];
									$strProvincia=$row_DatosUsuario["strProvincia"];
									$strPais=$row_DatosUsuario["strPais"];
									$strCP=$row_DatosUsuario["strCP"];
									$strEmail=$row_DatosUsuario["strEmail"];
									$strTelefono=$row_DatosUsuario["strTelefono"];
									$intMetPago=$row_DatosUsuario["intPago"];
								?>	
									<ul class="user_option">
										<li><label for="stNombre"><?php echo _T51;?></label>
											<input name="strNombre"  type="text" id="strNombre"  class="form-control" value="<?php echo $strNombre;?>" required/>
										</li>
										<li><label for="stApellidos"><?php echo _T150;?></label>
											<input name="strApellidos"  type="text" id="strApellidos"  class="form-control" value="<?php echo $strApellidos;?>" required/>
										</li>
										<li><label for="strDireccion"><?php echo _T52;?></label>
											<input name="strDireccion"  type="text" id="strDireccion"  class="form-control" value="<?php echo $strDireccion;?>" required/>
										</li>
										<li><label for="strProvincia"><?php echo _T53;?></label>
											<input name="strProvincia"  type="text" id="strProvincia"  class="form-control" value="<?php echo $strProvincia;?>" required/>
										</li>
										<li><label for="strPais"><?php echo _T54;?></label>
											<input name="strPais"  type="text" id="strPais"  class="form-control" value="<?php echo $strPais;?>" required/>
										</li>
										<li><label for="strCP"><?php echo _T55;?></label>
											<input name="strCP"  type="text" id="strCP"  class="form-control" value="<?php echo $strCP;?>" required/>
										</li>
										<li><label for="strEmail"><?php echo _T56;?></label>
											<input name="strEmail"  type="email" id="strEmail"  class="form-control" value="<?php echo $strEmail;?>" required/>
										</li>
										<li><label for="strTelefono"><?php echo _T57;?></label>
											<input name="strTelefono"  type="mail" id="strTelefono"  class="form-control" value="<?php echo $strTelefono;?>" required/>
										</li>
										<li><br>
											<label for="intPago"><?php echo _T58;?><br></label><br>
											<?php 
							switch($intMetPago)
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
										</li>							
									</ul>
								<?php if ($stockadmisible==1){?>
								<input name="botonpagar" type="submit" class="btn btn-default update" value="<?php echo _T64;?>" title="<?php echo _T64;?>">
								<?php }
								else
								{
									echo _T107;
								}
								?>
						</form>						
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li><?php echo _T62;?><span><?php echo number_format($totalsinimpuestos, 2, ",", "").$_SESSION["monedasimbolo"];?></span></li>
							<li><?php echo _T46;?><span><?php 
								if ($_SESSION["zonaimpuestoactiva"]!="0")
								{
									$totalimpuestos = CalcularImpuestosZona($totalsinimpuestos, $_SESSION["zonaimpuestoactiva"]);
									echo number_format($totalimpuestos, 2, ",", "").$_SESSION["monedasimbolo"];
								}
								else 
									echo number_format($totalimpuestos, 2, ",", "").$_SESSION["monedasimbolo"];?></span></li>
														<li><?php echo _T63;?> <span><?php 
								$portescalculados=CalcularPortes($totalpeso, $_SESSION["zonaactiva"]);
								echo number_format($portescalculados, 2, ",", "").$_SESSION["monedasimbolo"];
								?></span></li>
							<li><?php echo _T48;?> <span><?php echo number_format($totalsinimpuestos+$portescalculados+$totalimpuestos, 2, ",", "").$_SESSION["monedasimbolo"];
								$_SESSION["Total"]=$totalsinimpuestos+$portescalculados+$totalimpuestos;
								$_SESSION["TotalsinImpuestos"]=$totalsinimpuestos;
								$_SESSION["Impuestos"]=$totalimpuestos;
								$_SESSION["Portes"]=$portescalculados;
	
								?></span></li>
						</ul>							
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php }?>
	<?php include("includes/pie.php"); ?>
	<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
//mysqli_free_result($DatosConsulta);
?>