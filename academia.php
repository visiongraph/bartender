<?php
	function getTemplate(){
		$ruta = 'mail/inscripcion_template.php';
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
	
		$mail->Subject = 'Información de Inscripción de '. $_POST['nombre'];
		$body = sprintf($body,
						$_POST['nombre'],
						$_POST['email'],
						$_POST['telefono'],
						$_POST['edad'],
						$_POST['cedula'],
						$_POST['direccion'],
						$_POST['curso'],
						$_POST['deposito'],
						$_POST['fecha_deposito'],
						$_POST['banco'],
						$_POST['mensaje']);
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
				var x = document.forms["forma_solicitud"]["edad"].value;
				if (x == null || x == "") {
					alert("Debe indicar su edad");
					return false;
				}
				var x = document.forms["forma_solicitud"]["cedula"].value;
				if (x == null || x == "") {
					alert("Debe indicar su cédula de identidad");
					return false;
				}
				var x = document.forms["forma_solicitud"]["direccion"].value;
				if (x == null || x == "") {
					alert("Debe indicar su dirección");
					return false;
				}
				var x = document.forms["forma_solicitud"]["curso"].value;
				if (x == null || x == "") {
					alert("Debe indicar el curso al que desea asistir");
					return false;
				}	
				var x = document.forms["forma_solicitud"]["deposito"].value;
				if (x == null || x == "") {
					alert("Debe indicar el número del deposito");
					return false;
				}	
				var x = document.forms["forma_solicitud"]["fecha_deposito"].value;
				if (x == null || x == "") {
					alert("Debe indicar la fecha en la que realizó el deposito");
					return false;
				}		
				var x = document.forms["forma_solicitud"]["banco"].value;
				if (x == null || x == "") {
					alert("Debe indicar el banco en el cual realizó el deposito");
					return false;
				}						
			}		
		</script>				
	</head>
	<body class="home page page-id-1839 page-template page-template-template-front-page-php"> 
		<?php if ($enviado) { ?>		
			<div id="caja-mensaje">
				 La informaci&oacute;n de su inscripci&oacute;n se envió con éxito. Pronto recibir&aacute; la confirmaci&oacute;n de la misma&nbsp;&nbsp;&nbsp;&nbsp;
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
								<span class="current">Academia</span>
							</li>
						</ul>
					</div>
				</div>
			</header>
			<div class="page-content">                      
				<div class="heading-academia">                
					<div class="container">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
							<br><br><br>
							<img src="imagenes/home/academy-logo.png"> <br><br><br>

						  <span class="comas"><div class="quote">Un cocktail es una bebida creada con imaginaci&oacute;n y cuyo &uacute;nico objetivo es la busqueda incansable del deleite y la estimulaci&oacute;n de los sentidos.</div></span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="margin-top:60px">
                        <iframe id="videopromo" src="https://www.youtube.com/embed/6slJ-Q3GRIY" frameborder="0" allowfullscreen></iframe>
						
						</div>
						<div class="bartender">
						<img src="imagenes/academia/barra.png">
						</div>
					</div>    
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
												<img src= "imagenes/academia/cursos/bartenderoctubre.jpg" alt= "news-event-image">                                                                                                        
											</div>                                            
										</div>                                    
										<div class="col-md-8 col-sm-8">
											<h5><a href="curso_mayo2016.html">Certificate como Bartender Profesional “Mayo; 2016 Inscripciones Abiertas”</a></h5>                                                
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
												Academia Tubartender crea el curso más completo en el área de bar, pensando en el incremento de nuevos profesionales al maravilloso mundo de la gastronomía, ofrece la oportunidad de Certificar profesionales con el curso mixto de cocteleria y Flair.

<br><br>
<a  href="curso_mayo2016.html" target="_self" class="btn btn-default-red "><i class="fa fa-file-text-o"></i> Ver Detalles </a>
												
												</p>                                                     
											</div>                                                                                         
										</div>
									</div>
								</div>
								<a name="serv1"></a>
								<div id= "post-2513" class="post-2513 news type-news status-publish has-post-thumbnail hentry blog-list">                                    
									<div class="row">                                        
										<div class="col-md-4 col-sm-4">                                    
											<div class="blog-list-img">
												<img src= "imagenes/academia/cursos/workingflair1.jpg" alt= "news-event-image">                                                                                                        
											</div>                                            
										</div>                                    
										<div class="col-md-8 col-sm-8">
											<h5><a href="curso_flair.html">Curso de Working Flair</a></h5>                                                
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
													Título obtenido
Flairbartender Nivel Básico - Medio
Horario
Disponible en dos bloques:
9:00 am a 12:30 pm
1:00 pm a 4:30 pm
Cantidad de cupos: 8

<br><br>
<a  href="curso_flair.html" target="_self" class="btn btn-default-red "><i class="fa fa-file-text-o"></i> Ver Detalles </a>
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
												<img src= "imagenes/academia/cursos/cafemix1.jpg" alt= "news-event-image">
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<h5><a href="curso_mix_cafe.html">Master Class Mixólogo del Café</a></h5>
											<!--<ul class="list-inline">
												<li class="place"><i class="fa fa-map-marker"></i><span class="bl-sort">in</span>Baltimore, Maryland</li>
												<li class="date"><i class="fa fa-calendar"></i>November 16, 2014 at 9:07 am</li>
											</ul>-->
											<div class="bl-sort">
												<p>
													Instructor:
Diego Rivas Franquiz (Barista - Mixólogo)	

Horario:
8:00 am a 6:00 pm
Duración:
1 día (10 horas académicas)
Incluye:
Manual Digital
Certificado<br>
<br>
<a  href="curso_mix_cafe.html" target="_self" class="btn btn-default-red "><i class="fa fa-file-text-o"></i> Ver Detalles </a>
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
												<img src= "imagenes/academia/cursos/mixologia.jpg" alt= "news-event-image">
											</div>
										</div>
										<div class="col-md-8 col-sm-8">
											<h5><a href="curso_mixologia.html">Curso de Mixología (avanzado)</a></h5>
											<!--<ul class="list-inline">
												<li class="place"><i class="fa fa-map-marker"></i><span class="bl-sort">in</span>Baltimore, Maryland</li>
												<li class="date"><i class="fa fa-calendar"></i>November 16, 2014 at 9:07 am</li>
											</ul>-->
											<div class="bl-sort">
												<p>
												
Mixologo Profesional
para
Profesionales del área no certificados
y Personas que deseen profesionalizarse en corto tiempo para trabajar en forma inmediata
Oportunidad para las personas que se van a vivir a otro país

Horario
8:00 am a 4:00 pm

<br>
<br>
<a  href="curso_mixologia.html" target="_self" class="btn btn-default-red "><i class="fa fa-file-text-o"></i> Ver Detalles </a>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="col-md-4">
								<div class="events-side-panel">
							
									<div class="widget">
                                  
										<h5>Inscribete Curso Aquí</h5> <br>    
                                        <p style="text-align:justify; font-size:14px; color:#5e5e5e">
										Por favor emitir depósitos a: <br>
										<b>Inversiones Tubartender C.A. Rif: J-29704358-6</b><br>
										Banco:<b> Banco Bicentenario</b> <br>
										Cuenta Corriente:<b> No. 01750486010071575154</b>
										</p>   
										<div class="blog-latest">
											<div class="row">
												<form name="forma_inscripcion" action="academia.php" method="post" class="searchform"  onsubmit="return validateForm();">
													<div class="search-keyword">
														<span class="obligatorio">*</span> Nombre y Apellido:<br>
														<input type="text" placeholder="Nombre Completo" value="" name="nombre" maxlength="50" id="nombre" /><br>
														<span class="obligatorio">*</span> Teléfono:
														<input type="text" placeholder="Codigo de Area y Teléfono" value="" maxlength="20" name="telefono" id="telefono" /><br>
														<span class="obligatorio">*</span> Correo:
														<input type="text" placeholder="Correo válido" value="" name="email" maxlength="50" id="email" /><br>
														<span class="obligatorio">*</span> Edad:
														<input type="text" placeholder="Debes ser mayor de edad +18" value="" maxlength="2" name="edad" id="edad" /><br>
														<span class="obligatorio">*</span> Cédula de Identidad:
														<input type="text" placeholder="Debes ser mayor de edad +18" value="" name="cedula" maxlength="11" id="cedula" />
														<span class="obligatorio">*</span> Dirección de Residencia:<br>
														<input type="text" placeholder="ejemplo: Urb. Moltalban1 / Caracas" value="" name="direccion" maxlength="150" id="direccion" />
														<span class="obligatorio">*</span> Selecciona el Curso deseado:<br>
														<select id="curso" name="curso">
															<option value=""></option>
															<option value="flair">Curso de Working Flair</option>
															<option value="mastercafe">Master Class Mixólogo del Café</option> 
															<option value="mixoavanzado">Curso de Mixología Avanzado</option>
														</select><br>
														<span class="obligatorio">*</span> Numero de Depósito:<br>
														<input type="text" placeholder="Numero de depósito completo" value="" name="deposito" maxlength="25" id="deposito" /><br>
														<span class="obligatorio">*</span> Fecha de Depósito:<br>
														<input type="text" placeholder="dd/mm/aaaa ejemplo: 08/11/1978" value="" name="fecha_deposito" maxlength="10" id="fecha_deposito" /><br>
														<span class="obligatorio">*</span> Banco Depositado:<br>
														<select id="banco" name="banco">
															<option value="Bicentenario">Banco Bicentenario</option>
														</select><br>
														Mensaje:<br>
														<textarea name="mensaje" cols="" rows="8" id="mensaje" maxlength="200"></textarea>
														<p class="button-submit" style="width:auto !important;">
															<input type="submit" value="Enviar" class="wpcf7-form-control wpcf7-submit aligncenter" />
														</p>
													</div>
												</form>
												<div class="nota" >
													<h5><a href="#">Nota</a></h5>
													<p class="bl-sort">Todos los participantes deben ser mayor de edad y ser residentes en Venezuela.</p>
												</div>
												<div style="text-align: right; font-size: 10px; width:100%; margin-bottom: -15px;">(<span class="obligatorio">*</span>) Campo obligatorio</div>
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