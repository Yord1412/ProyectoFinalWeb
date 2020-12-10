<?php


include_once "app.php";
include_once "connectionController.php";

if (isset($_POST['action'])) {

	if (isset($_POST['token']) && $_POST['token']==$_SESSION['token']) { 

		$movieController = new MovieController();

		switch ($_POST['action']) {
			case 'store':

				$title = strip_tags($_POST['title']);
				$description = strip_tags($_POST['description']);
				$year = strip_tags($_POST['year']);
				$cover = strip_tags($_POST['cover']);
				$type = strip_tags($_POST['type']);
				$minutes = strip_tags($_POST['minutes']);
				$clasification = strip_tags($_POST['clasification']);
				$category_id = strip_tags($_POST['category_id']);

				$movieController->store($title,$description,$year,$cover,$type,$minutes,$clasification,$category_id);
			break; 
		}
		
	}else{

		$_SESSION['error'] = 'de seguridad';
		header("Location:". $_SERVER['HTTP_REFERER'] );
	}
}

class MovieController
{
	public function get()
	{
		$conn = connect();
		if ($conn->connect_error==false) {
			
			$query = "select * from movies";
			$prepared_query = $conn->prepare($query);
			$prepared_query->execute();

			$results = $prepared_query->get_result();
			$movies = $results->fetch_all(MYSQLI_ASSOC);

			if (count($movies)>0) {
				return $movies;
			}else
				return array();

		}else
			return array();
	}

	public function store($title,$description,$year,$cover,$type,$minutes,$clasification,$category_id)
	{
		$conn = connect();
		if ($conn->connect_error==false){
			
			if ($title!="" && $description!="" && $year!="" && $cover!="" && $type!="" && $minutes!="" && $clasification!="" && $category_id!="" ) {
				
				// SUBIR ARCHIVO COVER
				$target_path = "../assets/imagenes/portadas/";
				$original_name = basename($_FILES['cover']['name']);
				$new_file_name = $target_path.basename($_FILES['cover']['name']);

				if (move_uploaded_file($_FILES['cover']['tmp_name'], $new_file_name)) {
				// SUBIR ARCHIVO COVER
					
					$query = "insert into movies (title, description, year, cover, type, minutes, clasification, category_id(?,?,?,?,?,?,?,?)";
					$prepared_query = $conn->prepare($query);
					$prepared_query->bind_param('ssississ',$title,$description,$year,$cover,$type,$minutes,$clasification,$category_id);

					if ($prepared_query->execute()) {
						
						$_SESSION['success'] = "el registro se ha guardado correctamente";

						header("Location:". $_SERVER['HTTP_REFERER'] );

					}else{

						$_SESSION['error'] = 'verifique los datos envíados';

						header("Location:". $_SERVER['HTTP_REFERER'] );
					}


				}  

			}else{
				$_SESSION['error'] = 'verifique la información del formulario';
				echo $title;
			echo $description;
			echo $year;
			echo $cover;
			echo $type;
			echo $minutes;
			echo $clasification;
			echo $category_id;
				header("Location:". $_SERVER['HTTP_REFERER'] );
			}

		}else{

			$_SESSION['error'] = 'verifique la conexión a la base de datos';

			header("Location:". $_SERVER['HTTP_REFERER'] );
		}
	}
}