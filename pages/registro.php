<?php 
include "../app/app.php";
?>

<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>Registro</title> 
		
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css?v=0.0.1" media="all">
		<link rel="stylesheet" type="text/css" href="../assets/css/sesion.css?v=0.0.2" media="all">
	</head>
	 
	<body>
		<?php include "../layouts/alerts.template.php"; ?>

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
			
			<!-- lugar del formulario de registro -->
			<div id="area_formulario">
				<div id="formulario">
					<div class="subs">
						<h2>
							Registrarse
						</h2>
					</div>
					<!--<form method="POST" action="../auth">-->
					<form method="POST" action="../auth">

						<ul>
							<li>
								<label>
									nombre
								</label>
								<input type="text" name="name" required="" placeholder="german">
							</li>
							<li>
								<label>
									Correo electronico
								</label>
								<input type="email" name="email" required="" placeholder="pedro1234@hotmail.com">
							</li>
							<li>
								<label>
									Contraseña
								</label>
								<input type="password" name="password" required="" placeholder="contraseña">
								
							</li>
								
						</ul>

						<button type="submit">
							Registrarse
						</button>
						<button type="submit">
							<a href="../index.php">volver</a>
						</button>
						<input type="hidden" name="action" value="register">
						<input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
							
					</form>	
					
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