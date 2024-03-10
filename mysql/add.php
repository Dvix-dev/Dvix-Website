<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="crud.css" rel="stylesheet" type="text/css" >
	<title>Añadir Libro</title>
</head>

<body>
	<div class="container">
		
		<?php
		include_once("config.php");
		
		if(isset($_POST['Submit'])) {	
			$titulo = mysqli_real_escape_string($mysqli, $_POST['titulo']);
			$paginas = mysqli_real_escape_string($mysqli, $_POST['paginas']);
			$autor = mysqli_real_escape_string($mysqli, $_POST['autor']);
			
			if(empty($titulo) || empty($paginas) || empty($autor)) {
						
				if(empty($titulo)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Título vacío</div>";
				}
				
				if(empty($paginas)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Páginas vacío.</div>";
				}
				
				if(empty($autor)) {
					echo "<div class=\"alert alert-danger\" role=\"alert\">Autor vacío.</div>";
				}
				echo "<a class=\"btn btn-primary\" href='javascript:self.history.back();'>Volver</a>";
			} else { 
				$result = mysqli_query($mysqli, "INSERT INTO $tabla(titulo,paginas,autor) VALUES('$titulo','$paginas','$autor')");
			
				echo "<div class=\"alert alert-success\">Libro añadido correctamente.</div>";
				echo "<a class=\"btn btn-primary\" href='index.php'>Listar libros</a>";
			}
		}
		?>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
