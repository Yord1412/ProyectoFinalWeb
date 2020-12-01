<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>menu principal</title> 
		
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css?v=0.0.1" media="all">
		<link rel="stylesheet" type="text/css" href="../assets/css/sesion.css?v=0.0.1" media="all">
	</head>
	 
	<body>
		<div id="principal">
			<!-- Menu suoerior estatico -->
			<div id="menu_estatico">
				<div id="margen_estatico">
					<div id="icono_menu">
						<div id="logomenu">
							<a href="#principal"><img src="../assets/imagenes/logo.png"></a>
							
						</div>
						<div id="icono_menu_estatico">
							<a href="#principal">Peli.com</a>
						</div>
					</div>
					<div id="botones_menu">
						
					</div>
				</div>
			</div>
			
			<!-- lugar del formulario de inicio de sesion -->
			<div id="area_formulario">
				<div id="formulario">

					<!--<form method="POST" action="../auth">-->
					<div>
						<form>

							<ul>
								<li>
									<label>
										Correo electronico
									</label>
								</li>
								<li>
									<input type="email" name="email" required="">
								</li>
							</ul>
						
							<ul>
								<li>
									<label>
										Contraseña
									</label>
								</li>
								<li>
									<input type="password" name="password" required="">
								</li>
							</ul>

							<button type="submit">
								iniciar sesion
							</button>
							<!--<input type="hidden" name="action" value="login">
							<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
							-->
						</form>	
					</div>
					
				</div>
			</div>

			<!-- pie de pagina -->
			<div id="pie_pagina">
				<div id="elementos">
					<div id="copyright">
						<p>
							©Copyright 2020 peli
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>