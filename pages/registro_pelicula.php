<?php 
	include "../app/categoryController.php";
	include "../app/movieController.php";

	$categoryController = new CategoryController();
	$movieController = new MovieController();

	$categories = $categoryController->get();
	$movies = $movieController->get();

	if (isset($_SESSION)==false || 
		isset($_SESSION['id'])==false){
		
		header("Location:../");
	}

	#echo json_encode($movies);
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
							Registrar pelicula
						</h2>
					</div>
					<!--<form method="POST" action="../auth">-->

					<form action="<?=BASE_PATH?>/movie" method="POST" enctype="multipart/form-data" >
						<ul>
							<li>
								<label>
									Titulo
								</label>
								<input type="text" name="title" placeholder="movie name" required="">
							</li>
							<li>
								<label>
									Description
								</label>
								<textarea name="description" rows="5" placeholder="Description" required=""></textarea>
							</li>
							<li>
								<label>
									Año
								</label>
								<input type="number" name="year" placeholder="2000">
							</li>

							<li>
								<label>
									Cover
								</label>
								<input type="file" name="cover" required="" accept="image/*">
								
							</li>
							<li>
								<label>
									Tipo
								</label>
								<input type="text" name="type" placeholder="pelicula" required="">
							</li>
							<li>
								<label>
									Minutes
								</label>
								<input type="number" name="minutes" placeholder="80" required="">
							</li>
							<li>
								<label>
									Clasification
								</label>
								<select  name="clasification" required="">
									<option> A </option>
									<option> B </option>
									<option> B15 </option>
									<option> C </option>
									<option> N/A</option>
								</select>
							</li>
							<li>
								<label>
									Category
								</label>
								<select  name="category_id" required=""> 
									<?php foreach ($categories as $category): ?>

									<option value="<?= $category['id'] ?>" >
										<?= $category['name'] ?>
									</option>

									<?php endforeach ?>

									<?php 
										// foreach ($categories as $category) {
										// 	echo "<option value=".$category['id']." >". $category['name'] ."</option>";
										// } 
									?>
								</select>
							</li>
						</ul>

						<button type="submit">
							Save
						</button>
						<input type="hidden" name="action" value="store">
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