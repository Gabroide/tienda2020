<?php require_once('Connections/conexion.php'); ?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>PCi Express | Usuarios</title>
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
<section>
  <div class="container">
  	
  	<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2><?php echo _T34;?></h2>
						<form action="acceso.php" method="post">
							<label for="strEmail"><?php echo _T41;?></label>
							<input name="strEmail"  type="email" id="strEmail" placeholder="<?php echo _T41;?>" />
							<label for="strPassword"><?php echo _T35;?></label>
							<input name="strPassword" id="strPassword" type="password" placeholder="<?php echo _T35;?>" />
							<span>
							<label for="remember" style="display: none"><?php echo _T36;?></label>
								<input name="remember" id="remember" type="checkbox" value="1">
								<?php echo _T36;?>
							</span>
							<span><br>								
								<a href="recuperar_pwd.php" title="<?php echo _T87;?>"><?php echo _T87;?></a>
							</span>
							<button type="submit" class="btn btn-default"><?php echo _T37;?></button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Ó</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2><?php echo _T38;?></h2>
						<?php echo _T39;?>
						<form action="usuario-alta.php" method="post">
							<label for="strNombre"><?php echo _T40;?></label>
							<input name="strNombre" type="text" id="strNombre" placeholder="<?php echo _T40;?>" required/>
							<label for="strEmail"><?php echo _T41;?></label>
							<input name="strEmail" type="email" id="strEmail" placeholder="<?php echo _T41;?>" required />
							<label for="strPassword"><?php echo _T35;?></label>
							<input name="strPassword" type="password" id="strPassword" placeholder="<?php echo _T35;?>" required/>
							<label for="intClave">3+4=</label>
							<input name="intClave" type="text" id="intClave" placeholder="<?php echo _T85;?>" required/>
							<button type="submit" class="btn btn-default" title="<?php echo _T42;?>"><?php echo _T42;?></button><br>
							<br>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
  </div>
</section>
<?php include("includes/pie.php"); ?>
<?php include("includes/piejs.php"); ?>



<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd -->
</html>
?>