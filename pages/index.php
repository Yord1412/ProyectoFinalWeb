<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$movieController = new MovieController();
	$movies = $movieController->get();

	if (isset($_SESSION)==false || 
		isset($_SESSION['id'])==false){
		
		header("Location:../");
	}
?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<title>menu principal</title> 
		
		<link rel="stylesheet" type="text/css" href="../assets/css/app.css?v=0.0.3" media="all">
		
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
						<div>
							<a href="peliculas.php">Peliculas</a>
						</div>
						<div>
							<a href="#planes_prin">Shows de TV</a>
						</div>
						<div>
							<a href="registro_pelicula.php">Administrar</a>
						</div>
					</div>
				</div>
			</div>

			<!-- lugar imagen -->
			<div id="imagen">	
				<img src="../assets/imagenes/inicio_imagen.jpg">
			</div>

			<!-- seccion de peliculas destacadas -->
			<div id="peliculas_destacadas">
				<div class="subs">
					<h2>
						Peliculas destacadas
					</h2>
					<p>
						de la semana
					</p>
				</div>
				<div id="cuadro_destacadas">
					<div id="cuadro_peliculas">
						<?php foreach ($movies as $movie): ?>
							<div class="pelicula">
								<div class="info">
									<img src="../assets/imagenes/portadas/<?= $movie['cover'] ?>">
									<h4><?= $movie['title'] ?></h4>
									<p>
										<?= $movie['type'] ?>
										<br>
										<?= $movie['year'] ?>
									</p>
								</div>
							</div>
							
						<?php endforeach ?>
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
					<div id="botones_pie">
						<div>
							<a href="#referencias">Peliculas</a>
						</div>
						<div>
							<a href="#planes_prin">Shows de TV</a>
						</div>
						<div>
							<a href="#">Perfil</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>