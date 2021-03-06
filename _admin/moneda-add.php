<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {
	



  $insertSQL = sprintf("INSERT INTO tblmoneda(strNombre, dblValor, strSimbolo, strCodificacion, strHTML) VALUES (%s,%s, %s, %s, %s)",
                       GetSQLValueString($_POST["strNombre"], "text"),
                       GetSQLValueString(ProcesarComaPrecio($_POST["dblValor"]), "double"),
					   GetSQLValueString($_POST["strSimbolo"], "text"),
					   GetSQLValueString($_POST["strCodificacion"], "text"),
					    GetSQLValueString($_POST["strHTML"], "text")
					  );

  //echo $insertSQL;
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "moneda-lista.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
		
	
}
?>
             

<!DOCTYPE html>
<html lang="es"><!-- InstanceBegin template="/Templates/Administracion.dwt.php" codeOutsideHTMLIsLocked="false" -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administración Tienda | Añadir Moneda</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap Core CSS -->
    <?php include("../includes/adm-cabecera.php"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<!-- InstanceBeginEditable name="ContenidoAdmin" -->
<script src="scriptupload.js"></script>
<script src="../js/scriptadmin.js"></script>
<div id="wrapper">
  <!-- Navigation -->
  <?php include("../includes/adm-menu.php"); ?>
  <div id="page-wrapper">
     <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestión de Moneda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="moneda-lista.php" class="btn btn-outline btn-info" title="Volver atrás">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Moneda
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form action="moneda-add.php" method="post" id="forminsertar" name="forminsertar" role="form">
                                      	<div class="form-group">
                                      		<label for="strNombre">Nombre de Moneda</label>
                                            <input class="form-control" placeholder="Escribir Nombre" name="strNombre" id="strNombre" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="strSimbolo">Simbolo de Moneda</label>
                                            <input class="form-control" placeholder="Escribir Símbolo" name="strSimbolo" id="strSimbolo"  required>
                                        </div>
                                         <div class="form-group">
                                            <label for="dblValor">Valor moneda</label>
                                            <input class="form-control" placeholder="Escribir valor de cambio" name="dblValor" id="dblValor" required>
                                        </div>
                                          <div class="form-group">
                                            <label for="strCodificacion">Codificación</label>
                                            <input class="form-control" placeholder="Escribir codificación (EUR, USD, etc...)" name="strCodificacion" id="strCodificacion" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="strHTML">Codificación HTML</label>
                                            <input class="form-control" placeholder="Escribir codificación en HTML &euro;, etc..." name="strHTML" id="strHTML" required>
                                        </div>
                                        <button type="submit" class="btn btn-success" title="Añadir">Añadir</button>
                                      	<input name="MM_insert" type="hidden" id="MM_insert" value="forminsertar">                                       
                                    </form>
                              </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->
            </div>
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- InstanceEndEditable --><!-- /#wrapper -->

     <?php include("../includes/adm-pie.php"); ?>
   

</body>

<!-- InstanceEnd --></html>