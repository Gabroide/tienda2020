<?php require_once('../Connections/conexion.php');
RestringirAcceso("1");?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "forminsertar")) {



  $insertSQL = sprintf("INSERT INTO tblcaracteristica(strNombre_1,strNombre_2,strNombre_3,strNombre_4, intEstado, refPadre, intOrden) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST["strNombre_1"], "text"),
					   GetSQLValueString($_POST["strNombre_2"], "text"),
					   GetSQLValueString($_POST["strNombre_3"], "text"),
					   GetSQLValueString($_POST["strNombre_4"], "text"),
                       GetSQLValueString($_POST["intEstado"], "int"),
                       GetSQLValueString($_POST["refPadre"], "int"),
                       GetSQLValueString($_POST["intOrden"], "int")
					  );

  
  $Result1 = mysqli_query($con,  $insertSQL) or die(mysqli_error($con));


  $insertGoTo = "caracteristica-lista.php";
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
    <title>Administración Tienda | Añadir Característica</title>
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
                    <h1 class="page-header">Gestión de Caracteristicas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <a href="caracteristica-lista.php" class="btn btn-outline btn-info" title="Volver Atrés">Volver atrás</a><br>
<br>

            
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Añadir Caracteristica
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form action="caracteristica-add.php" method="post" id="forminsertar" name="forminsertar" role="form" >
                                         <div class="form-group">
                                            <label for="strNombre_1">Nombre de la Característica (Idioma 1)</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la Característica" name="strNombre_1" id="strNombre_1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_2">Nombre de la Característica (Idioma 2)</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la Característica" name="strNombre_2" id="strNombre_2">
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_3">Nombre de la Característica (Idioma 3)</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la Característica" name="strNombre_3" id="strNombre_3">
                                        </div>
                                        <div class="form-group">
                                            <label for="strNombre_4">Nombre de la Característica (Idioma 4)</label>
                                            <input class="form-control" placeholder="Escribir Nombre de la Característica" name="strNombre_4" id="strNombre_4">
                                        </div>                                          
                                          <div class="form-group">
                                            <label for="intOrden">Orden de Caracteristica</label>
                                            <input class="form-control" placeholder="Escribir Orden de la Caracteristica" name="intOrden" id="intOrden" required>
                                        </div>                                                                                		
									   <div class="form-group">
											<label for="intEstado">Estado</label>
											<select name="intEstado" class="form-control" id="intEstado">
												<option value="0">Inactivo</option>
												<option value="1" selected>Activo</option>
											</select>
										</div>
                                        <button type="submit" class="btn btn-success" title="Añadir">Añadir</button>
                                         <input name="refPadre" type="hidden" id="refPadre" value="0">
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