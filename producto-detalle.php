<?php require_once('Connections/conexion.php'); ?>
<?php

$variable_Consulta = "0";
if (isset($VARIABLE)) {
  $variable_Consulta = $VARIABLE;
}

$query_DatosConsulta = sprintf("SELECT * FROM tblproducto WHERE intEstado=1 AND strSEO_"._idiomaactual."=%s ",
							   GetSQLValueString($_GET["prod"], "text"));

//echo $query_DatosConsulta;
$DatosConsulta = mysqli_query($con,  $query_DatosConsulta) or die(mysqli_error($con));
$row_DatosConsulta = mysqli_fetch_assoc($DatosConsulta);
$totalRows_DatosConsulta = mysqli_num_rows($DatosConsulta);

//INSERTAR VISITA DE PRODUCTO
if (isset($_SESSION['tienda2017Front_UserId']))
	InsertarVisitaProducto($row_DatosConsulta["idProducto"], $_SESSION['tienda2017Front_UserId']);

//DATOS COMENTARIOS
$query_DatosComentarios = sprintf("SELECT * FROM tblcomentario WHERE refProducto=%s AND intEstado=1 ORDER BY strFecha DESC ",
							   GetSQLValueString($row_DatosConsulta["idProducto"], "int"));
//echo $query_DatosConsulta;
$DatosComentarios = mysqli_query($con,  $query_DatosComentarios) or die(mysqli_error($con));
$row_DatosComentarios = mysqli_fetch_assoc($DatosComentarios);
$totalRows_DatosComentarios = mysqli_num_rows($DatosComentarios);

//VALORACION PRODUCTO
$query_DatosValoracion = sprintf("SELECT AVG(intRate) AS Rate FROM tblproductovaloracion WHERE refProducto=%s",
							   GetSQLValueString($row_DatosConsulta["idProducto"], "int"));

//echo $query_DatosValoracion;
$DatosValoracion = mysqli_query($con,  $query_DatosValoracion) or die(mysqli_error($con));
$row_DatosValoracion = mysqli_fetch_assoc($DatosValoracion);
$totalRows_DatosValoracion = mysqli_num_rows($DatosValoracion);

//echo $row_DatosValoracion['Rate'];
?>
             
<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $row_DatosConsulta["strTitleSEO_"._idiomaactual];?></title>
    <meta name="description" content="<?php echo $row_DatosConsulta["strDesSEO_"._idiomaactual];?>">
    <meta name="author" content="">
<!-- InstanceEndEditable -->
    <?php include("includes/cabecera.php"); ?>
<!-- InstanceBeginEditable name="head" -->
  	<link rel="stylesheet" href="css/rating.css">
</head>
   	<!-- InstanceEndEditable -->
</head><!--/head-->

<body>
<!-- InstanceBeginEditable name="Contenido" -->

<?php include("includes/header.php"); ?>
<?php //include("includes/slider.php"); ?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <?php include("includes/menuizquierda.php"); ?>
      </div>
      <div class="col-sm-9 padding-right">
					<div class="product-details" itemscope itemtype="http://schema.org/Product"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">														
								<?php if ($row_DatosConsulta["strImagen1"]!=""){?>
								<img id="placeholder" src="images/productos/<?php echo $row_DatosConsulta["strImagen1"];?>" alt="<?php echo $row_DatosConsulta["strImagen1"];?>" data-big="images/productos/<?php echo $row_DatosConsulta["strImagen1"];?>" itemprop="image" />
								<?php }
								else
								{?>
								<img src="images/usuarios/sinfoto.jpg" alt="<?php echo _T118;?>">
								<?php }?>																													
							</div>
							<div class="row">
								<div class="col-xs-4">
								  <?php if ($row_DatosConsulta["strImagen1"]!=""){?>
									<a onclick="return showPic(this)" href="images/productos/<?php echo $row_DatosConsulta["strImagen1"];?>" title="<?php echo _T123;?>">
										<img src="images/productos/<?php echo $row_DatosConsulta["strImagen1"];?>" alt="<?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?>" id="" width="100%" >
									</a>
									<?php }
									?>
								</div>
								<div class="col-xs-4">
								 <?php if ($row_DatosConsulta["strImagen2"]!=""){?>
									 <a onclick="return showPic(this)" href="images/productos/<?php echo $row_DatosConsulta["strImagen2"];?>" title="<?php echo _T123;?>">
										<img src="images/productos/<?php echo $row_DatosConsulta["strImagen2"];?>" alt="<?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?>" id="" width="100%" >
									</a>
									<?php }
									?>
								</div>
								<div class="col-xs-4">
								<?php if ($row_DatosConsulta["strImagen3"]!=""){?>
									<a onclick="return showPic(this)" href="images/productos/<?php echo $row_DatosConsulta["strImagen3"];?>" title="<?php echo _T123;?>">
										<img src="images/productos/<?php echo $row_DatosConsulta["strImagen3"];?>" alt="<?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?>" id="" width="100%" >
									</a>
									<?php }
									?>
								</div>
								<div class="col-xs-4">
								 <?php if ($row_DatosConsulta["strImagen4"]!=""){?>
									<a onclick="return showPic(this)" href="images/productos/<?php echo $row_DatosConsulta["strImagen4"];?>" title="<?php echo _T123;?>">
										<img src="images/productos/<?php echo $row_DatosConsulta["strImagen4"];?>" alt="<?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?>" id="" width="100%" >
									</a>
									<?php }
									?>
								</div>
								<div class="col-xs-4">
								 <?php if ($row_DatosConsulta["strImagen5"]!=""){?>
									<a onclick="return showPic(this)" href="images/productos/<?php echo $row_DatosConsulta["strImagen5"];?>" title="<?php echo _T123;?>">
										<img src="images/productos/<?php echo $row_DatosConsulta["strImagen5"];?>" alt="<?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?>" id="" width="100%" >
									</a>
									<?php }
									?>
								</div>
							</div>							
						</div>
						<div class="col-sm-7">
							<div class="product-information" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><!--/product-information-->
								<?php if($row_DatosConsulta["intNuevo"]==1)
								{?>
									<img src="images/product-details/new.jpg" class="newarrival" alt="<?php echo _T124;?>" />
								<?php }?>
								
								<!-- RATING -->
								<h2 itemprop="name"><?php echo $row_DatosConsulta["strNombre_"._idiomaactual];?></h2>
								<br>	
								
								<div class="col-sm-6">									
									<form action="producto-detalle-valoracion.php" method="post" class="clasificacion">									
										<?php switch(round($row_DatosValoracion["Rate"]))
										{
											case 5:?>
											<input id="rate-5" type="radio" name="intRate" value="5" checked>
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4">
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3">
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2">
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1">
											<label for="rate-1">★</label>
										<?php 
												break;
											case 4:?>
											<input id="rate-5" type="radio" name="intRate" value="5">
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4" checked>
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3">
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2">
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1">
											<label for="rate-1">★</label>
										<?php
												break;
											case 3:?>
											<input id="rate-5" type="radio" name="intRate" value="5">
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4">
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3" checked>
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2">
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1">
											<label for="rate-1">★</label>
										<?php
												break;
											case 2:?>
											<input id="rate-5" type="radio" name="intRate" value="5">
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4">
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3">
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2" checked>
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1">
											<label for="rate-1">★</label>
										<?php
												break;
											case 1:?>
											<input id="rate-5" type="radio" name="intRate" value="5">
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4">
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3">
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2">
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1" checked>
											<label for="rate-1">★</label>
										<?php 
												break;
											default:
										?>
											<input id="rate-5" type="radio" name="intRate" value="5">
											<label for="rate-5">★</label>
											<input id="rate-4" type="radio" name="intRate" value="4">
											<label for="rate-4">★</label>
											<input id="rate-3" type="radio" name="intRate" value="3">
											<label for="rate-3">★</label>
											<input id="rate-2" type="radio" name="intRate" value="2">
											<label for="rate-2">★</label>
											<input id="rate-1" type="radio" name="intRate" value="1">
											<label for="rate-1">★</label>
										<?php 
												break;
										}?>
										<input name="refProducto" type="hidden" id="refProducto" value="<?php echo $row_DatosConsulta["idProducto"];?>">
										<input name="refURL" type="hidden" id="refURL" value="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?>">
										<input type="submit" value="<?php echo _T33;?>" class="btn btn-default pull-right cart">
									</form>
								</div>
								<br>								
								
																								
								<!--<p>Web ID: 1089772</p>								
							
								<img src="images/product-details/rating.png" alt="<?php //echo _T125;?>" */
-->								
							<?php if ($row_DatosConsulta["intStock"]>0){?>
							<form name="formcompra" id="formcompra" method="post" action="carrito-add.php">
								<span>
								<?php 
									if ($row_DatosConsulta["dblPrecioAnterior"]!=0){?>
										<span class="preciotachado">
											<?php echo $row_DatosConsulta["dblPrecioAnterior"]*$_SESSION["monedavalor"];?><?php echo $_SESSION["monedasimbolo"];?>
										</span>
									<br><br>
								<?php }?>
																
									<span itemprop="price" class="price" data-base-price="<?php echo CalcularPrecioProducto($row_DatosConsulta["idProducto"], 2);?>">
										<?php echo CalcularPrecioProducto($row_DatosConsulta["idProducto"]);?>
									</span>
									<label for="intCantidad"><?php echo _T26;?></label>
									<input name="intCantidad" type="number" id="intCantidad" value="1" />
									<input name="refProducto" type="hidden" id="refProducto" value="<?php echo $row_DatosConsulta["idProducto"];?>" />
									
									<button type="button" class="btn btn-fefault cart" onClick="document.formcompra.submit()" title="<?php echo _T27;?>">
										<?php echo _T27;?>
									</button>
									
									</span>
                             		<?php if ($row_DatosConsulta["refGrupo"]!=0) MostrarPreciosGrupo($row_DatosConsulta["refGrupo"])?>                               
									<br>
									<?php MostrarOpciones($row_DatosConsulta["idProducto"]);?>
									<div style="height: 220px; overflow: auto;">
										<p itemprop="description"><?php echo $row_DatosConsulta["strDescripcion_"._idiomaactual];?></p>
									</div>
									<p><b><?php echo _T131;?></b> <?php echo $row_DatosConsulta["intStock"];?> <?php echo _T132;?> </p>
									<?php /*
										if ($row_DatosConsulta["intCondicion"]==1)
										{
									?>
										<p><b>Condition:</b> New</p>
									<?php }*/?>
							</form>
							<?php }?>
							<!-- BOOK A PRODUCT -->
							<?php if((($row_DatosConsulta["intStock"]==0) && ($row_DatosConsulta["intReservar"]==1)) && ($row_DatosConsulta["intEstado"]==1)) {?>
							<form name="formreserva" id="formreserva" method="post" action="reserva-add.php">
								<span>
									<span itemprop="price" class="price" data-base-price="<?php echo CalcularPrecioProducto($row_DatosConsulta["idProducto"], 2);?>">
										<?php echo CalcularPrecioProducto($row_DatosConsulta["idProducto"]);?>
									</span>
									<label for="intCantidad"><?php echo _T26;?></label>
									<input name="intCantidad" type="number" id="intCantidad" value="1" />
									<input name="refProducto" type="hidden" id="refProducto" value="<?php echo $row_DatosConsulta["idProducto"];?>" />
									
									<button type="button" class="btn btn-fefault cart" onClick="document.formreserva.submit()" title="<?php echo _T126;?>">
										<?php echo _T126;?>
									</button>									
								</span>
								<?php
									if ($row_DatosConsulta["refGrupo"]!=0) MostrarPreciosGrupo($row_DatosConsulta["refGrupo"])?>                               
								<br>
								<?php MostrarOpciones($row_DatosConsulta["idProducto"]);?>
								<div style="height: 220px; overflow: auto;">
									<p itemprop="description"><?php echo $row_DatosConsulta["strDescripcion_"._idiomaactual];?></p>
								</div>
								<?php /*?>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p><?php */?>								
							</form>
							<?php }?>
							
								<!-- Go to www.addthis.com/dashboard to customize your tools -->

							</div><!--/product-information-->
							<div class="addthis_inline_share_toolbox_7pbl" style="padding-left: 60px;"></div>
						</div>
					</div><!--/product-details-->
														
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab" title="<?php echo _T127;?>"><?php echo _T127;?></a></li>
								<li><a href="#companyprofile" data-toggle="tab" title="<?php echo _T28;?>"><?php echo _T28;?></a></li>
								<?php /*?><li><a href="#tag" data-toggle="tab">Tag</a></li><?php */?>
								<li><a href="#reviews" data-toggle="tab" title="<?php echo _T29;?>"><?php echo _T29;?> (<?php echo ObtenerComentariosTotales($row_DatosConsulta["idProducto"], _idiomaactual);?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<div class="col-sm-12" style="height: 500px; overflow: auto;">
									<?php  //MostrarCaracteristicasFrontEnd($row_DatosConsulta["idProducto"]);?>
									<?php echo $row_DatosConsulta["strDescripLarga_"._idiomaactual];?>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-12" style="height: 500px; overflow: auto;">
									<?php echo $row_DatosConsulta["strCaracteristicas_"._idiomaactual];?>
								</div>
							</div>
							
							<?php /*?><div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div><?php */?>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
								<?php
									if ($totalRows_DatosComentarios>0){
										do {
											if(($row_DatosComentarios["intIdioma"]==_idiomaactual))
											{									?>
									<ul>
										<li><a href="javascript:void();"><i class="fa fa-user"></i><?php if ($row_DatosComentarios["refUsuario"]==0) echo $row_DatosComentarios["strNombreComentador"];?></a></li>
										<li><a href="javascript:void();"><i class="fa fa-clock-o"></i><?php echo HoraToHumano($row_DatosComentarios["strFecha"])?></a></li>
										<li><a href="javascript:void();"><i class="fa fa-calendar-o"></i><?php echo DateToHumano($row_DatosComentarios["strFecha"])?></a></li>
									</ul>
									<p><?php echo $row_DatosComentarios["txtComentario"];?></p>
									<?php } 
										}while ($row_DatosComentarios = mysqli_fetch_assoc($DatosComentarios));
									}?>
									<p><b><?php echo _T30;?></b></p>
									
									<form action="producto-detalle-opinion.php" method="post">
										<span>
										<?php if (isset($_SESSION['tienda2017Front_UserId'])){
											?>
											<input name="intCaptcha" type="hidden"  id="intCaptcha" value="6"/>
											<input name="strNombreComentador" type="hidden"  id="strNombreComentador" value="Registrado"/>
											
											<?php }
											else
											{?>
											<label for="strNombreComentador"><?php echo _T40;?>:</label>
											<input name="strNombreComentador" type="text" required id="strNombreComentador" placeholder="<?php echo _T31;?>"/>
											<br>
											<label for="intCaptcha">3+3=</label>
											<input name="intCaptcha" type="number" required id="intCaptcha" placeholder="<?php echo _T32;?>"/>
											<?php }?>											
										</span>
										<span>
										<label for="txtComentario"><?php echo _T189;?>:</label>
										<br>
										<textarea name="txtComentario" id="txtComentario" required></textarea>
										</span>
										<?php /*?><b>Rating: </b> <img src="images/product-details/rating.png" alt="" /><?php */?>
										<input name="refProducto" type="hidden" id="refProducto" value="<?php echo $row_DatosConsulta["idProducto"];?>">
										<input name="refURL" type="hidden" id="refURL" value="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?>">
										<input name="intIdioma" type="hidden" id="intIdioma" value="<?php echo _idiomaactual;?>">										
										<input type="submit" value="<?php echo _T33;?>" class="btn btn-default pull-right">										
								  	</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<?php include("includes/masvendidos.php"); ?><!--/recommended_items-->
					
				</div>
    </div>
  </div>
</section>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>
<script type="text/javascript" src="js/jquery.mlens-1.6.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
	$('.price-option').change(function(){
        var price = parseFloat($('.price').data('base-price'));
        
        $('.price-option').each(function(i, el) {
            price += parseFloat($('option:selected', el).data('price'));
        });
        
        $('.price').text(price.toFixed(2)+'<?php echo $_SESSION["monedasimbolo"];?>');
	});	
});
	
$(document).ready(function()
{
    $("#placeholder").mlens(
    {
        imgSrc: $("#placeholder").attr("data-big"),   // path of the hi-res version of the image
        lensShape: "circle",                // shape of the lens (circle/square)
        lensSize: 180,                  // size of the lens (in px)
        borderSize: 4,                  // size of the lens border (in px)
        borderColor: "#fff",                // color of the lens border (#hex)
        borderRadius: 0,                // border radius (optional, only if the shape is square)
		responsive: true      
    });
});

</script>
<script type="text/javascript" language="javascript">
function showPic (whichpic) {
 if (document.getElementById) {
  document.getElementById('placeholder').src = whichpic.href;
	 document.getElementById('placeholder').setAttribute("data-big", whichpic.href);
	 
	  $("#placeholder").mlens(
    {
        imgSrc: $("#placeholder").attr("data-big"),   // path of the hi-res version of the image
        lensShape: "circle",                // shape of the lens (circle/square)
        lensSize: 180,                  // size of the lens (in px)
        borderSize: 4,                  // size of the lens border (in px)
        borderColor: "#fff",                // color of the lens border (#hex)
        borderRadius: 0,                // border radius (optional, only if the shape is square)
		responsive: true      
    });
	 
	 
	 //$("#placeholder").attr("data-big") = whichpic.href;
  return false;
 } else {
  return true;
 }
}
</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4edf43cf750c0920"></script>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
<?php
//AÑADIR AL FINAL DE LA PÁGINA
mysqli_free_result($DatosConsulta);
?>