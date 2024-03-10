<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/1/18/Estrella_amarilla.png">
	<link href="crud.css" rel="stylesheet" type="text/css" >
	<title>Calificar</title>
</head>

<body>
	<div class="container">
		
		<?php
		include_once("config.php");
		
		if(isset($_POST['Submit'])) {	
			$nombre = mysqli_real_escape_string($mysqli, $_POST['nombre']);
			$calificacion = mysqli_real_escape_string($mysqli, $_POST['calificacion']);
			$comentario = mysqli_real_escape_string($mysqli, $_POST['comentario']);
			
			if(empty($nombre) || empty($calificacion)) {
			// if(empty($nombre) || empty($calificacion) || empty($comentario)) {
						
				if(empty($nombre)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">No indicó su nombre</div>";
				}
				
				if(empty($calificacion)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">No marcó ninguna estrella</div>";
				}
				
				// if(empty($comentario)) {
				// 	echo "<div class=\"alert alert-danger\" role=\"alert\">comentario vacío.</div>";
				// }
				echo "<a class=\"btn btn-primary\" href='javascript:self.history.back();'>Volver</a>";
			} else { 
				$result = mysqli_query($mysqli, "INSERT INTO $tabla(nombre,calificacion,comentario) VALUES('$nombre','$calificacion','$comentario')");
			
				echo "<div class=\"alert alert-success\">¡¡Gracias, su opinion es importante!!</div>";
				echo "<a id=sucess class=\"btn btn-primary\" href='index.php'>Mirar calificaciones</a>";
			}
		}
		?>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
