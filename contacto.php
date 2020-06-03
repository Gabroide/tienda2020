<?php require_once('Connections/conexion.php'); 
$enviado=0;
if (isset($_POST["formenviado"])){
	$contenido='Nombre: '.$_POST["name"].'<br>
	Correo: '.$_POST["email"].'<br>
	Asunto: '.$_POST["subject"].'<br>
	Mensaje: '.$_POST["message"].'<br>';
	$asunto="Contacto desde Tienda Dreamweaver";
	EnvioCorreoHTML(_email, $contenido, $asunto, $concopia=0);
	$enviado=1;
	
	$query_DatosConsultaRedes = sprintf("SELECT * FROM tblredes WHERE idRedes=1");

	$DatosConsultaRedes = mysqli_query($con,  $query_DatosConsultaRedes) or die(mysqli_error($con));
	$row_DatosConsultaRedes = mysqli_fetch_assoc($DatosConsultaRedes);
	$totalRows_DatosConsultaRedes = mysqli_num_rows($DatosConsultaRedes);
}?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>Pci Express | Contacto</title>
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
<?php //include("includes/slider.php"); ?>
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><?php echo _T10006;?> </h2>    			    				    									
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center"><?php echo _T10007;?> </h2>
	    				<div class="status alert alert-success" style="display: none"></div>
	    				<?php if ($enviado=="1"){
							echo _T10005;
						}?>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="contacto.php">
				            <div class="form-group col-md-6">
			                	<label for="name"><?php echo _T10008;?></label>
				                <input type="text" name="name" class="form-control" required="required" placeholder="<?php echo _T10008;?>">
				            </div>
				            <div class="form-group col-md-6">
				                <label for="email"><?php echo _T10009;?></label>
				                <input type="email" name="email" class="form-control" required="required" placeholder="<?php echo _T10009;?>">
				            </div>
				            <div class="form-group col-md-12">
			                	<label for="subject"><?php echo _T10010;?></label>
				                <input type="text" name="subject" class="form-control" required="required" placeholder="<?php echo _T10010;?>">
				            </div>
				            <div class="form-group col-md-12">
			                	<label for="message"><?php echo _T10011;?></label>
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="<?php echo _T10011;?>"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="<?php echo _T10015;?>" title="<?php echo _T10015;?>">
				                <input type="hidden" name="formenviado"  value="formenviado">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center"><?php echo _T10012;?></h2>
	    				<address>
	    					<?php echo _T10013;?>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center"><?php echo _T10014;?></h2>
							<ul>
								<?php
									if($row_ConsultaRedes["strFacebook"] != "")
									{
								?>
									<li><a href="<?php echo $row_ConsultaRedes["strFacebook"];?>" target="_blank" title="<?php echo _T114;?> Facebook"><i class="fa fa-facebook"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strTwitter"] != "")
									{
								?>
									<li><a href="<?php echo $row_ConsultaRedes["strTwitter"];?>" title="<?php echo _T114;?> Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strYoutube"] != "")
									{
								?>
									<li><a href="<?php echo $row_ConsultaRedes["strYoutube"];?>" title="<?php echo _T114;?> Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strLinkedIn"] != "")
									{
								?>								
									<li><a href="<?php echo $row_ConsultaRedes["strLinkedIn"];?>" title="<?php echo _T114;?> LinkedIn" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strWhatsApp"] != "")
									{
								?>								
									<li><a href="https://api.whatsapp.com/send?phone=<?php echo $row_ConsultaRedes["strWhatsApp"];?>" title="<?php echo _T115;?>;?> WhatsApp" target="_blank"><i class="fa fa-phone"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strTelegram"] != "")
									{
								?>								
									<li><a href="<?php $row_ConsultaRedes["strTelegram"];?>" title="<?php echo _T115;?> Telegram" target="_blank"><i class="fa fa-send-o"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strInstagram"] != "")
									{
								?>								
									<li><a href="<?php echo $row_ConsultaRedes["strInstagram"];?>" title="<?php echo _T114;?> Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
								<?php } ?>
								<?php
									if($row_ConsultaRedes["strPinterest"] != "")
									{
								?>								
									<li><a href="<?php echo $row_ConsultaRedes["strPinterest"];?>" title="<?php echo _T114;?> Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<?php } ?>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>

<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>