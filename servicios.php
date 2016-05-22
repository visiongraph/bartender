<?php
	function getTemplate(){
		$ruta = 'mail/solicitud_template.php';
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
		//$mail->AddAddress('eloyalejandro@gmail.com');
		$mail->AddAddress('robert.ochoa@gmail.com');
		$mail->IsHTML(true);
		$mail->CharSet = 'UTF-8';
		$body = getTemplate();		
	
		$mail->Subject = 'Solicitud de presupuesto';
				
		$body = sprintf($body,
						$_POST['nombre'],
						$_POST['email'],
						$_POST['telefono'],
						$_POST['tipo_evento'],
						$_POST['empresa'],
						$_POST['cant_invitados'],
						$_POST['fecha_evento'],
						$_POST['dir_evento'],
						$_POST['tipo_servicio'],
						$_POST['detalles']);
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
				var x = document.forms["forma_solicitud"]["nombre"].value;
				if (x == null || x == "") {
					alert("Debe colocar el Nombre Completo");
					return false;
				}
				var x = document.forms["forma_solicitud"]["telefono"].value;
				if (x == null || x == "") {
					alert("Debe colocar el teléfono");
					return false;
				}
				var x = document.forms["forma_solicitud"]["email"].value;
				if (x == null || x == "") {
					alert("Debe colocar el Email");
					return false;
				}
				
				var x = document.forms["forma_solicitud"]["tipo_evento"].value;
				if (x == null || x == "") {
					alert("Debe indicar el tipo de evento");
					return false;
				}
				var x = document.forms["forma_solicitud"]["cant_invitados"].value;
				if (x == null || x == "") {
					alert("Debe indicar la cantidad de invitados");
					return false;
				}
				var x = document.forms["forma_solicitud"]["fecha_evento"].value;
				if (x == null || x == "") {
					alert("Debe indicar la fecha del evento");
					return false;
				}
				var x = document.forms["forma_solicitud"]["dir_evento"].value;
				if (x == null || x == "") {
					alert("Debe indicar la direcció del evento");
					return false;
				}	
				var x = document.forms["forma_solicitud"]["tipo_servicio"].value;
				if (x == null || x == "") {
					alert("Debe indicar el tipo de servicio deseado");
					return false;
				}				
			}		
		</script>		
	</head>
	<body class="home page page-id-1839 page-template page-template-template-front-page-php"> 
		<?php if ($enviado) { ?>		
			<div id="caja-mensaje">
				 Su solicitud se envió con éxito. Un representante de ventas se pondr&aacute; en contacto con usted a la brevedad &nbsp;&nbsp;&nbsp;&nbsp;
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
										<a title="ACADEMIA" href="academia.html" style="transition: none;">ACADEMIA</a>
									</li>
									<li id="menu-item-2609" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2609">
										<a title="SERVICIOS" href="servicios.html" style="transition: none;">SERVICIOS</a>
									</li>
									<li id="menu-item-2610" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2610 dropdown">
										<a title="MULTIMEDIA" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" style="transition: none;">MULTIMEDIA <span class="caret"></span></a>
										<ul role="menu" class=" dropdown-menu">
											<li id="menu-item-2582" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2582"><a title="Vídeos" href="videos.html">Vídeos</a></li>
											<li id="menu-item-2588" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2588"><a title="Galerías" href="galerias.html">Galería</a></li>
										</ul>
									</li>
									<li id="menu-item-2418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2418">
										<a title="EVENTOS" href="eventos.html" style="transition: none;">EVENTOS</a>
									</li>
									<li id="menu-item-2226" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2226">
										<a title="CONTACTO" href="contacto.html" style="transition: none;">CONTACTO</a>
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
								<span class="current">Servicios</span>
							</li>
						</ul>
					</div>
				</div>
			</header>
			
			<div class="page-content">        
				<div class="headingser">                
					<h1>Servicios</h1>            
				</div>
				<div class="news-events-blog">    
					<div class="container">                    
						<div class="row">                        
							<div class="col-md-8">
								<a name="serv1"></a>
								<div id= "post-2513" class="post-2513 news type-news status-publish has-post-thumbnail hentry blog-list">                                    
									<div class="row">                                        
										<div class="col-md-4 col-sm-4">                                    
											<div class="blog-list-img">
												<img src= "imagenes/home/img-bartenderbar2.jpg" alt= "news-event-image">                                                                                                        
											</div>                                            
										</div>                                    
										<div class="col-md-8 col-sm-8">
											<h5><a href="#">Bartender Profesional</a></h5>                                                
											<!--<ul class="list-inline">
												<li class="place">
													<i class="fa fa-map-marker"></i><span class="bl-sort">in</span>Cincinnati, Ohio                                                    
												</li>                                                                                                
												<li class="date">
													<i class="fa fa-calendar"></i>November 23, 2014 at 8:47 pm                                                    
												</li>
											</ul>-->
											<div class="bl-sort">
												<p>
													Sweet turkish, ristretto rich, fair trade, trifecta, latte eu variety single shot 
													robusta ristretto. Filter sit, caffeine foam half and turkish, ristretto rich, fair 
													trade, trifecta, latte eu variety single shot robusta ristretto. Filter sit, caffeine 
													foam half and<br>
												
												</p>                                                     
											</div>                                                                                         
										</div>
									</div>
								</div>
								<a name="serv2"></a>
								<div id= "post-2227" class="post-2227 news type-news status-publish has-post-thumbnail hentry blog-list">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="blog-list-img">
												<img src= "imagenes/home/img-luxurybar2.jpg" alt= "news-event-image">
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<h5><a href="#">Luxury Bar</a></h5>
											<!--<ul class="list-inline">
												<li class="place"><i class="fa fa-map-marker"></i><span class="bl-sort">in</span>Baltimore, Maryland</li>
												<li class="date"><i class="fa fa-calendar"></i>November 16, 2014 at 9:07 am</li>
											</ul>-->
											<div class="bl-sort">
												<p>
													<b>¿Estas buscando exclusividad, elegancia  e innovación en un solo servicio?</b> <br><br>
													Para ello te ofrecemos nuestro servicio Luxury bar donde podrás disfrutas del Glamour y 
													el lujo de los más exquisitos cocteles,  y las más modernas tendencias de Coctelería a 
													nivel mundial. Con este servicio también le brindamos la opción de tener una barra de 
													vinos en su evento utilizando los mejores productos del mercado.<br>													
												</p>
											</div>
										</div>
									</div>
								</div>
								<a name="serv3"></a>
								<div id= "post-2091" class="post-2091 news type-news status-publish has-post-thumbnail hentry tag-tag1 tag-tag2 blog-list">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="blog-list-img">
												<img src= "imagenes/home/img-platinumbar2.jpg" alt= "news-event-image">
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<h5><a href="#">Platinum Bar</a></h5>
											<!--<ul class="list-inline">
												<li class="place"><i class="fa fa-map-marker"></i><span class="bl-sort">in</span>Baltimore, Maryland</li>
												<li class="date"><i class="fa fa-calendar"></i>November 16, 2014 at 9:07 am</li>
											</ul>-->
											<div class="bl-sort">
												<p>
													Diseñado para ofrecer experiencias inolvidables, donde la elegancia es nuestra bandera para hacer de su evento una noche inolvidable. Nuestros cocteles platinium están preparados con productos e ingredientes Premium, buscando siempre complacer los paladares más exigentes. <br>
													
												</p>
											</div>
										</div>
									</div>
								</div>
														
							</div>
							<div class="col-md-4">
                            
								<div class="events-side-panel">
									<div class="widget">
										<h5>Solicitar Presupuesto</h5> <br>    
										<p style="text-align:justify; font-size:14px; color:#5e5e5e">
											Por favor rellenar formulario a continuación<b></b>
										</p>   
										<div class="blog-latest">
											<div class="row">
												<form name="forma_solicitud" action="servicios.php" method="post" class="searchform"  onsubmit="return validateForm();">
													<div class="search-keyword">
														<span class="obligatorio">*</span> Nombre y Apellido:<br>
														<input type="text" placeholder="Nombre Completo" value="" maxlength="50" name="nombre" id="nombre" /><br>
														<span class="obligatorio">*</span> Teléfono:
														<input type="text" placeholder="Codigo de Area y Teléfono" value="" maxlength="20" name="telefono" id="telefono" /><br>
														<span class="obligatorio">*</span> Correo:
														<input type="text" placeholder="Correo válido" value="" name="email" maxlength="50" id="email" /><br>
														<span class="obligatorio">*</span> Tipo de Evento:<br>
														<select name="tipo_evento" id="tipo_evento">
															<option value="Corporativo">Evento Corporativo</option>
															<option value="familiar">Evento Familiar</option>
														</select><br>
														Nombre de la empresa:
														<input type="text" placeholder="Si es un evento corporativo" value="" maxlength="70" name="empresa" id="empresa" /><br>
														<span class="obligatorio">*</span> Cantidad de Invitados:
														<input type="text" placeholder="Número de invitados al evento" maxlength="6"  value="" name="cant_invitados" id="cant_invitados" />
														<span class="obligatorio">*</span> Fecha del Evento:<br>
														<input type="text" placeholder="dd/mm/aaaa ejemplo: 08/11/1978" value="" maxlength="10" name="fecha_evento" id="fecha_evento" /><br>
														<span class="obligatorio">*</span> Dirección del Evento:<br>
														<input type="text" placeholder="ejemplo: Urb. Moltalban1 / Caracas" value="" maxlength="100" name="dir_evento" id="dir_evento" />
														<span class="obligatorio">*</span> Selecciona Servicio Deseado:<br>
														<select id="tipo_servicio" name="tipo_servicio">
															<option value="Bartender_Profesional">Barra Bartender Profesional</option>
															<option value="Luxury">Luxury Bar</option>
															<option value="Kids">Kids Bar</option>
														</select><br>
														Detalles del Evento Mensaje:<br>
														<textarea name="detalles" cols="" rows="8" id="detalles" maxlength="200"></textarea>
														<p class="button-submit" style="width:auto !important;">
															<input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit aligncenter" />														
														</p>
														<div style="text-align: right; font-size: 10px; width:100%; margin-bottom: -25px;">(<span class="obligatorio">*</span>) Campo obligatorio</div>
													</div>
												</form>
												<div class="nota"></div>
											</div>
										</div>									
									</div>
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
												<li><a href="academia.html">- Academia</a></li>              
												<li><a href="servicios.html">- Servicios</a></li>              
												<li><a href="eventos.html">- Eventos</a></li>              
												<li><a href="multimedia.html">- Multimedia</a></li>   
												<li><a href="contacto.html">- Contácto</a></li>             
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