<?php

	global $con;
	
	$query_ConsultaRedes = sprintf("SELECT * FROM tblredes WHERE idRedes=1");
	
	//echo $query_ConsultaRedes;
	$ConsultaRedes = mysqli_query($con,  $query_ConsultaRedes) or die(mysqli_error($con));
	$row_ConsultaRedes = mysqli_fetch_assoc($ConsultaRedes);
	$totalRows_ConsultaRedes = mysqli_num_rows($ConsultaRedes);

?>	

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#" title=""><i class="fa fa-phone"></i> <?php echo _telefono;?></a></li>
								<li><a href="mailto:<?php echo _email;?>" title="<?php echo _T113;?>"><i class="fa fa-envelope"></i>  <?php echo _email;?></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
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
								<?php
									if($row_ConsultaRedes["strRSS"] != "")
									{
								?>
									<li><a href="<?php echo $row_ConsultaRedes["strRSS"];?>" title="<?php echo _T114;?> RSS" target="_blank"><i class="fa fa-rss"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="logo pull-left">
							<a href="index.php" title="<?php echo _T116;?>"><img src="images/<?php echo _logo;?>" alt="Logo de Pci Express Soluciones Informáticas" /></a>
						</div>
						<div class="btn-group pull-right">
							<?php /*?><div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div><?php */?>
							<?php BloqueIdiomas();?>
							
							<?php BloqueMonedas(); ?>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">								
								<li><a href="usuario-lista-deseos.php" class="destinodeseos" title="<?php echo _T110;?> <?php echo _T20;?>"><i class="fa fa-heart"></i> <?php echo _T3;?></a></li>
								<li><a href="usuario-lista-comparar.php" class="destinocomparar" title="<?php echo _T110;?> <?php echo _T22;?>"><i class="fa fa-bars"></i> <?php echo _T4;?></a></li>
								<li><a href="carrito.php" title="<?php echo _T110;?> <?php echo _T5;?>"><i class="fa fa-shopping-cart"></i> <?php echo _T5;?> <?php
									if ((isset($_SESSION['tienda2017Front_UserId'])) || (isset($_SESSION['MM2_Temporal'])))
										MostrarCantidadCarrito();?></a></li>
								<?php if (!isset($_SESSION['tienda2017Front_UserId'])){?>
								<li><a href="login.php" title="<?php echo _T110;?> <?php echo _T117;?>"><i class="fa fa-lock"></i> <?php echo _T6;?></a></li>
								<?php }
								else {
									echo '<li><a href="usuario.php" title"'.ObtenerNombreUsuario($_SESSION['tienda2017Front_UserId']).'"><i class="fa fa-user"></i> '.ObtenerNombreUsuario($_SESSION['tienda2017Front_UserId']).'</a></li>';
									echo '<li><a href="logout.php" title="'._T138.'"><i class="fa fa-times-circle"></i> '._T7.'</a></li>';
								}?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" title="<?php echo _T116;?>"><?php echo _T1;?></a></li>								
								<li><a href="contacto.php" title="<?php echo _T110;?> <?php echo _T2;?>"><?php echo _T2;?></a></li>
							</ul>
						</div>
					</div>
					<?php /*?><div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div><?php */?>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>