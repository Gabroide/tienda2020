<?php
	global $con;
	
	$query_Consulta = sprintf("SELECT * FROM tblusuario WHERE idUsuario = %s ",
		 GetSQLValueString($_SESSION['tienda2017Front_UserId'], "int"));
	//echo $query_Consulta;
	$Consulta = mysqli_query($con,  $query_Consulta) or die(mysqli_error($con));
	$row_Consulta = mysqli_fetch_assoc($Consulta);
	$totalRows_Consulta = mysqli_num_rows($Consulta);
	
?>           
       	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                	<ul class="nav" id="side-menu">
                    	<li>
                      		<a href="usuario.php" title="<?php echo _T110;?> <?php echo _T137;?>"><i class="fa fa-user  fa-fw"></i> <?php echo _T137;?></a>
                        </li>
						<li>
							<a href="pedido.php" title="<?php echo _T110;?> <?php echo _T140;?>"> <img src="images/cuenta/001-icono-pedido-express.png" class="list-image" title="#"> <?php echo _T140;?></a>
						</li>
						<li>
							<a href="reservas-edit.php" title="<?php echo _T110;?> <?php echo _T135;?>"><img src="" class="list-image" title="#"> <?php echo _T135;?></a>
						</li>
						<li>
							<a href="descargas.php" title="<?php echo _T110;?> <?php echo _T141;?>"><img src="" class="list-image" title="#"> <?php echo _T141;?></a>
						</li>
						<li>
							<a href="direccion-edit.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T142;?>"><img src="images/cuenta/004-icono-direcciones-express.png" class="list-image" title="#"> <?php echo _T142;?></a>
						</li>
						<li>
							<a href="metodos-pago.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php _T143;?>"><img src="images/cuenta/005-Iicono-metodos-de-pago-express.png" class="list-image" title="#"> <?php echo _T143;?></a>
						</li>
						<li>
							<a href="cuenta.php?id=<?php echo $row_Consulta["idUsuario"];?>" title="<?php echo _T110;?> <?php echo _T144;?>"><img src="images/cuenta/002-icono-inicio-y-seguridad-de-tu-cuenta-express.png" class="list-image" title="#"></i> <?php echo _T144;?></a>
						</li>
						<li>
							<a href="reembolso" title="<?php echo _T110;?> <?php echo _T145;?>"><img src="" class="list-image" title="#"></i> <?php echo _T145;?></a>
						</li>
						 <li>
							<a href="facturas" title="<?php echo _T110;?> <?php echo _T146;?>"><img src="images/cuenta/003-icono-mis-facturas-express.png" class="list-image" title="#"> <?php echo _T146;?></a>
						</li>
                        <li>
                           	<a href="ayuda.php" title="<?php echo _T110;?> <?php echo _T147;?>"><img src="images/cuenta/008-icono-ayuda-express.png" class="list-image" title="#"> <?php echo _T147;?></a>
						</li>
               		</ul>
				</div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>