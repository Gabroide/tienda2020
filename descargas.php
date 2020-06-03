<?php require_once('Connections/conexion.php'); ?>
<?php

?>

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- InstanceBeginEditable name="doctitle" -->
    <title>PCi Express | <?php echo _T141;?></title>
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
		<h1 style="text-align: center"><?php echo _T141;?></h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include("usuario-menu.php"); ?>
				</div>
				<div class="col-sm-8">
					<p><?php echo _T181;?></p>
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