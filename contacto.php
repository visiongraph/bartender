<?php
	function getTemplate(){
		$ruta = 'mail/contacto_template.php';
		if (is_file($ruta)) {
			ob_start();
			include $ruta;
			return ob_get_clean();
		}
	}		

	$enviado = false;
	if(!empty($_POST)){
		include('mail/class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsMail();
		$mail->Host = '127.0.0.1';
		$mail->Host = 'localhost';
		$mail->SetFrom('contacto@bartender.com', 'Contacto desde la pagina web');				
		$mail->AddAddress('eloyalejandro@gmail.com');
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$body = getTemplate();		
	
		$mail->Subject = 'Forma de Contacto';
				
		$body = sprintf($body,$_POST['nombre_bar'],$_POST['email_bar'],$_POST['telefono_bar'],$_POST['mensaje_bar']);
		$mail->Body = $body;
		
		if(!$mail->Send()) {
			var_dump($mail->ErrorInfo);
		} else {
			$enviado = true;
		}	
	}
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Bartender</title>
		<!-- Stylesheets -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel='stylesheet' id='zilla-shortcodes-css'  href='css/shortcodes.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='contact-form-7-css'  href='css/styles.css?ver=4.0.1' type='text/css' media='all' />
		<link rel='stylesheet' id='woocommerce-layout-css'  href='css/woocommerce-layout.css?ver=2.2.8' type='text/css' media='all' />
		<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='css/woocommerce-smallscreen.css?ver=2.2.8' type='text/css' media='only screen and (max-width: 768px)' />
		<link rel='stylesheet' id='woocommerce-general-css'  href='css/woocommerce.css?ver=2.2.8' type='text/css' media='all' />
		<link rel='stylesheet' id='takeaway-roboto-css'  href='http://fonts.googleapis.com/css?family=Roboto+Slab%3A400%2C700&#038;ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='nothing-you-could-do-css'  href='http://fonts.googleapis.com/css?family=Nothing+You+Could+Do&#038;ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='bootstrap-css'  href='css/bootstrap.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='owl.carousel-css'  href='css/owl.carousel.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='font-awesome-css'  href='css/font-awesome.min.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='owl.theme-css'  href='css/owl.theme.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='thumb-slide-css'  href='css/thumb-slide.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='uou-style-css'  href='css/plugins/style.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='responsive-css'  href='css/responsive.css?ver=4.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='masterslider-style-css'  href='css/masterslider.css?ver=4.0.8' type='text/css' media='all' />
		<script type='text/javascript' src='js/jquery.js?ver=1.11.1'></script>
		<script type='text/javascript' src='js/jquery-migrate.min.js?ver=1.2.1'></script>
		<script type='text/javascript' src='js/jquery.ui.core.min.js?ver=1.10.4'></script>
		<script type='text/javascript' src='js/jquery.ui.widget.min.js?ver=1.10.4'></script>
		<script type='text/javascript' src='js/jquery.ui.accordion.min.js?ver=1.10.4'></script>
		<script type='text/javascript' src='js/jquery.ui.tabs.min.js?ver=1.10.4'></script>
		<script type='text/javascript' src='js/zilla-shortcodes-lib.js?ver=4.0.8'></script>
		<link rel='canonical' href='http://188.226.173.21/takeawaywp/' />
		<link rel='shortlink' href='http://188.226.173.21/takeawaywp/' />
		<style type="text/css" title="dynamic-css" class="options-output">
			body{text-align:inherit;line-height:undefinedpx;font-weight:400;}
			h1,h2,h3,h4,h5{line-height:undefinedpx;}
		</style>
		
		<script>
			function validateForm() {
				var x = document.forms["forma_contacto"]["nombre_bar"].value;
				if (x == null || x == "") {
					alert("Debe colocar el Nombre");
					return false;
				}
				var x = document.forms["forma_contacto"]["email_bar"].value;
				if (x == null || x == "") {
					alert("Debe colocar el Email");
					return false;
				}
				var x = document.forms["forma_contacto"]["mensaje_bar"].value;
				if (x == null || x == "") {
					alert("Debe colocar el Mensaje");
					return false;
				}				
			}		
		</script>
		
	</head>
	<body class="home page page-id-1839 page-template page-template-template-front-page-php"> 
		<?php if ($enviado) { ?>		
			<div id="caja-mensaje">
				 Su mensaje se envió con éxito. Responderemos a su inquietud a la brevedad &nbsp;&nbsp;&nbsp;&nbsp;
				 <input type="button" value="OK" class="wpcf7-form-control wpcf7-submit" onclick="document.getElementById('caja-mensaje').hidden = true;"/>
			</div>
		<?php } ?>
	
		<div id="main-wrapper">
			<header id="header">
				<div class="header-top-bar">
					 <div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-9 col-xs-7">
								<div class="header-register">
									Siguenos por:
								</div>                                 
								<!-- Header Social -->
								<ul class="header-social">
										<li>
										<a href="https://www.facebook.com/AcademiaTubartender"><i class="fa fa-facebook-square"></i></a>
									</li> 
									<li>
										<a href="https://twitter.com/TU_BARTENDER"><i class="fa fa-twitter-square"></i></a>
									</li>
									<li>
										<a href="https://www.instagram.com/tubartender/"><i class="fa fa-instagram"></i></a>
									</li>
									
								</ul>
							</div>
							<div class="col-md-5 col-sm-3 col-xs-6 hide-contentresponsive">
								<p class="call-us" style="margin-right:-180px;">
								Llámanos al: <a class="font" href="#">(0212) 271.01.86</a>
								<img src="imagenes/home/icon-divi-vertical-blanco.png"> &nbsp;&nbsp;&nbsp;
								Caracas - Venezuela</span>
								</p>
							</div>
						</div> <!-- end .row --> 
					</div> <!-- end .container -->
				</div>   <!-- end .header-top-bar -->
				<div class="header-nav-bar">
					<nav class="navbar navbar-default" role="navigation">
						<div class="container">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.html">
									<img src="imagenes/home/logo-bartender.png" alt="TakeAway"/>
								</a>
							</div>   <!-- end .navbar-header -->
							<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">							
								<ul id="menu-menu-1" class="nav navbar-nav navbar-right">
									<li id="menu-item-2597" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2597" >
										<a title="INICIO" href="index.html" style="transition: none;">INICIO</a>
									</li>
									<li id="menu-item-2632" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2632">
										<a title="EMPRESA" href="empresa.html" style="transition: none;">EMPRESA</a>
									</li>
									<li id="menu-item-2621" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2621">
										<a title="ACADEMIA" href="academia.php" style="transition: none;">ACADEMIA</a>
									</li>
									<li id="menu-item-2609" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2609">
										<a title="SERVICIOS" href="servicios.php" style="transition: none;">SERVICIOS</a>
									</li>
									<li id="menu-item-2610" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2610 dropdown">
										<a title="MULTIMEDIA" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" style="transition: none;">MULTIMEDIA <span class="caret"></span></a>
										<ul role="menu" class=" dropdown-menu">
											<li id="menu-item-2582" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2582"><a title="Submenu" href="videos.html">Vídeos</a></li>
											<li id="menu-item-2588" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2588"><a title="Submenu" href="galeria.html">Galería</a></li>
										</ul>
									</li>
									<li id="menu-item-2418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2418">
										<a title="EVENTOS" href="eventos.html" style="transition: none;">EVENTOS</a>
									</li>
									<li id="menu-item-2226" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2226">
										<a title="CONTACTO" href="contacto.php" style="transition: none;">CONTACTO</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</div>
				<!-- small menu section -->
				<div class="small-menu">
					<div class="container">
						<ul class="list-unstyled list-inline">
							<li id="crumbs">
								<span typeof="v:Breadcrumb">
									<a rel="v:url" property="v:title" href="index.html">Inicio</a>
								</span>&nbsp;&nbsp; 
								<i class="fa fa-chevron-right"></i> &nbsp;&nbsp;
								<span class="current">Contacto</span>
							</li>
						</ul>
					</div>
				</div>
			</header>
			
			<div class="page-content">
				<input type="hidden" id="map_long" name="map_long" value="-66.81803">
				<input type="hidden" id="map_lat" name="map_lat" value="10.48052">
				<div class="map-section">
					<div id="map_canvas_go"></div>
				</div>
			<div class="contact-us">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="contact-details">
								<h4>Contácto</h4>
								<div class="row">
									<div class="col-md-12 col-sm-8">
										<h5>Datos de contácto</h5>
										<div class="address clearfix">
											<i class="fa fa-map-marker"></i>
											<p> Torre Profesional La California, PH 1 Caracas Venezuela</p>
										</div>
										<div class="address clearfix">
											<i class="fa fa-phone"></i>
											<p>(0212)271.01.86</p>
										</div>										
										<div class="time-to-open clearfix">
											<i class="fa fa-clock-o"></i>
											<p>Lunes a Viernes: 8am - 4pm <br>
Sábados: 8am - 4pm <br>
 Domingos: 10am - 5pm</p>
										</div>
									</div>
									<!--
									<div class="col-md-6 col-sm-6">
										<h5>some other place</h5>
										<div class="address clearfix">
											<i class="fa fa-map-marker"></i>
											<p>Viale della Moschea,85 00197 Roma Italy</p>
										</div>
										<div class="time-to-open clearfix">
											<i class="fa fa-clock-o"></i>
											<p>Monday - Friday:9am - 11pm Saturday:10am - till last customer Sunday:10am - till last customer</p>
										</div>
									</div>-->
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="wpcf7" id="wpcf7-f46-o1" lang="en-US" dir="ltr">
								<div class="screen-reader-response"></div>
									<form name="forma_contacto" action="contacto.php" method="post" class="wpcf7-form"  onsubmit="return validateForm();">
										<div class="send-message">
											<h4>Envíanos un mensaje</h4>
											<div class="row">
												<div class="col-md-12">
													<p>
														<span class="wpcf7-form-control-wrap your-name">
															<input type="text" name="nombre_bar" value="" maxlength="50" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Nombre*" />
														</span>
													</p>
												</div>
												<div class="col-md-6 col-sm-6">
													<p>
														<span class="wpcf7-form-control-wrap your-email">
															<input type="email" name="email_bar" value="" maxlength="100" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" placeholder="Email*" />
														</span>
													</p>
												</div>
												<div class="col-md-6 col-sm-6">
													<p>
														<span class="wpcf7-form-control-wrap your-subject">
															<input type="text" name="telefono_bar" value="" maxlength="20" size="40" class="wpcf7-form-control wpcf7-text" placeholder="Teléfono" />
														</span>
													</p>
												</div>
											</div>
											<p><!-- end nasted .row --></p>
											<p>
												<span class="wpcf7-form-control-wrap your-message">
													<textarea name="mensaje_bar" cols="40" rows="10" maxlength="200" class="wpcf7-form-control wpcf7-textarea" placeholder="Tu mensaje"></textarea>
												</span>
											</p>
											<p class="button-submit"><input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit" /></p>
										</div>
										<div class="wpcf7-response-output wpcf7-display-none"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--footer start-->
			<footer id="footer">
				<div class="container">
					<div class="main-footer">
						<div class="row">
							<div class="col-sm-6 col-md-3">
								<h4>Por que <b>Tubartender.com? </b></h4>
								<p style="text-align:justify; font-size:12px; color:#FFF">
									Por que nos hemos dedicado a transformar el mundo de la coctelería, al ofrecer una original tendencia en 
									la elaboración de las bebidas preparadas más deliciciosas y vanguardistas. 
									De esta forma, evidenciamos que la mixología actual se està utilizando nuevas destrezas que apuntan hacia 
									una novedosa práctica que ha revolucionado el mundo de las bebidas.
								</p>
							</div>
							<div class="col-sm-6 col-md-3">
								<h5>Menú</h5>
								<div class="widget-content">
									<div class="row">
										<div class="col-md-12">
											<ul class="footer-links padd">
												<li><a href="index.html">- Inicio</a></li>        
												<li><a href="academia.php">- Academia</a></li>              
												<li><a href="servicios.php">- Servicios</a></li>              
												<li><a href="eventos.html">- Eventos</a></li>              
												<li><a href="multimedia.html">- Multimedia</a></li>   
												<li><a href="contacto.php">- Contácto</a></li>             
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-3">
								<h5>Contactos</h5><div id="calendar_wrap">


							<b><i class="fa fa-phone-square" aria-hidden="true"></i> 	Teléfono: </b><br>
0212-2710186.<br><br>




<b><i class="fa fa-envelope"></i> Correo: </b><br>
contacto@tubartender.com<br><br>


<b><i class="fa fa-map-marker"></i> Lugar: </b><br>
Tubartender Bar Academy, La California Salida de la estación del metro la California, Caracas.<br><br>
							</div>    
						</div>
							<div class="col-sm-6 col-md-3">
								<h5>Siguenos Por:</h5>
								<div class="tagcloud"><br>
									
									<a href="https://www.facebook.com/AcademiaTubartender"><i class="fa fa-facebook-square" style="margin:5px"></i></a>
									<a href="https://twitter.com/TU_BARTENDER"><i class="fa fa-twitter-square" style="margin:5px"></i></a>
									<a href="https://www.instagram.com/tubartender/"><i class="fa fa-instagram" style="margin:5px"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<p>Tubartender C.A. RIF: J-31263447-2 | © 2016 Todos los derechos reservados</p>
						<div class="logi" style="float:right; text-align:right;">
							Elaborado por:<br>
							<img src="imagenes/home/logo-vision.png" > <br>
							<a href="#">www.visiongraphstudios.com</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<script type='text/javascript' src='js/comment-reply.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.form.min.js?ver=3.51.0-2014.06.20'></script>
		
		<script type='text/javascript' src='js/add-to-cart.min.js?ver=2.2.8'></script>
		<script type='text/javascript' src='js/jquery.blockUI.min.js?ver=2.60'></script>
		<script type='text/javascript' src='js/woocommerce.min.js?ver=2.2.8'></script>
		<script type='text/javascript' src='js/jquery.cookie.min.js?ver=1.3.1'></script>
		<script type='text/javascript' src='js/cart-fragments.min.js?ver=2.2.8'></script>
		<script type='text/javascript' src='js/bootstrap.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery-ui-1.10.4.custom.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.magnific-popup.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.ui.map.js?ver=4.0.8'></script>
		<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false&#038;ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.gomap-1.3.2.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/a.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/owl.carousel.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/masterslider.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.easing.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/jquery.ba-outside-events.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/angular.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/angular-animate.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/angular-strap.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/angular-strap.tpl.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/ngProgress.min.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/angular-custom.js?ver=4.0.8'></script>
		<script type='text/javascript' src='js/add-to-cart-variation.min.js?ver=4.0.8'></script>
	</body>
</html>